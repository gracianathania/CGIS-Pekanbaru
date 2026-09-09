import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import "../css/map.css";
import { Map, Overlay, Tile, View } from "ol";
import TileLayer from "ol/layer/Tile";
import VectorLayer from "ol/layer/Vector";
import { fromLonLat } from "ol/proj";
import OSM from "ol/source/OSM";
import GeoJSON from "ol/format/GeoJSON.js";
import VectorSource from "ol/source/Vector";
import { Icon, Style } from "ol/style.js";

import axios from "axios"; // Jika menggunakan Axios

const riau = new VectorLayer({
    source: new VectorSource({
        format: new GeoJSON(),
        url: "data/polygon_riau.json",
    }),
});

const klinik = new VectorLayer({
    source: new VectorSource({
        format: new GeoJSON(),
        url: "data/klinik.json",
    }),
    style: new Style({
        image: new Icon({
            anchor: [0.5, 46],
            anchorXUnits: "flaticon",
            anchorYUnits: "pixels",
            src: "icon/klinik.png",
            width: 32,
            height: 32,
        }),
    }),
});

const container = document.getElementById("popup");
const content_element = document.getElementById("popup-content");
const closer = document.getElementById("popup-closer");
//Buat overlay popup

const overlay = new Overlay({
    element: container,
    autoPan: {
        animation: {
            duration: 250,
        },
    },
});

const kabRiau = new VectorLayer({
    background: "#1a2b39",
    source: new VectorSource({
        url: "data/kab_riau.json",
        format: new GeoJSON(),
    }),
    style: {
        "fill-color": [
            "interpolate",
            ["linear"],
            ["get", "FID"],
            1,
            "#ffff33",
            13,
            "#3358ff",
        ],
    },
});

const pekanbaru = new VectorLayer({
  // background: "#1a2b39",
  source: new VectorSource({
      url: "pekanbaru.json",
      format: new GeoJSON(),
  }),
  style: {
      "fill-color": [
          "interpolate",
          ["linear"],
          ["get", "FID"],
          1,
          "#ffff3360",
          13,
          "#3358ff60",
      ],
  },
});

const map = new Map({
    overlays: [overlay],
    target: document.getElementById("map"),
    layers: [
        new TileLayer({
            source: new OSM(),
        }),
        pekanbaru
    ],
    view: new View({
        center: fromLonLat([101.458609, 0.51044]),
        zoom: 13,
    }),
});
// Membuat elemen popup
const popupElement = document.createElement("div");
popupElement.id = "popup";
popupElement.className = "ol-popup";

// Membuat overlay popup
const popupOverlay = new Overlay({
  element: popupElement,
  positioning: "bottom-center",
  stopEvent: false,
  offset: [0, -10],
});

// Tambahkan overlay ke peta
map.addOverlay(popupOverlay);

// Fungsi untuk memproses penampilkan popup khusus untuk fitur Klinik
function handleKlinikFeature(pixel) {
  const feature = map.forEachFeatureAtPixel(pixel, function (feat) {
    return feat;
  });

  // Kunci utama: Hanya tampilkan jika fitur yang tersentuh adalah Pin Klinik (memiliki properti 'Nama_Klinik')
  if (feature && feature.get("Nama_Klinik")) {
    const coordinates = feature.getGeometry().getCoordinates();
    const klinikName = feature.get("Nama_Klinik");
    const jamOperasional = feature.get("Jam_Operasional") || "Buka 24 jam";
    const harga = feature.get("Harga") || "Start from 50k";
    const bpjsInfo = feature.get("BPJS") || "BPJS";

    // Isi konten popup dengan styling seragam khas C-GIS
    const formattedHarga = (harga || "Start from 50k").replace(/\n/g, '<br/>');
    popupElement.innerHTML = `
      <div style="font-family: 'Poppins', sans-serif; padding: 4px; max-width: 380px; word-break: break-word; white-space: normal;">
        <div style="display: flex; align-items: center; gap: 4px; margin-bottom: 2px;">
          <span style="font-size: 10px; font-weight: 700; color: #ff9900; text-transform: uppercase; letter-spacing: 0.5px;">📍 LOKASI KLINIK</span>
        </div>
        <h4 style="font-size: 14px; font-weight: 700; color: #111827; margin: 2px 0 8px 0; line-height: 1.3;">${klinikName}</h4>
        <div style="font-size: 11px; color: #374151; line-height: 1.6;">
          <p style="margin: 0 0 4px 0;">⏰ <strong>Jam:</strong> ${jamOperasional}</p>
          <p style="margin: 0 0 4px 0;">💳 <strong>BPJS:</strong> ${bpjsInfo}</p>
          <p style="margin: 0;">💰 <strong>Biaya:</strong> ${formattedHarga}</p>
        </div>
      </div>
    `;

    popupOverlay.setPosition(coordinates);
    map.getTargetElement().style.cursor = "pointer";
  } else {
    // Sembunyikan popup seketika jika kursor tidak berada di atas pin klinik
    popupOverlay.setPosition(undefined);
    map.getTargetElement().style.cursor = "";
  }
}

// Event pointermove: Cukup arahkan kursor ke pin, popup langsung muncul secara otomatis!
map.on("pointermove", function (evt) {
  if (evt.dragging) return;
  const pixel = map.getEventPixel(evt.originalEvent);
  handleKlinikFeature(pixel);
});

// Event singleclick: Juga bisa diklik untuk interaksi langsung
map.on("singleclick", function (evt) {
  const pixel = map.getEventPixel(evt.originalEvent);
  handleKlinikFeature(pixel);
});

// Fungsi untuk memuat data GeoJSON dan menangani Auto-Zoom dari URL
async function fetchKlinikData() {
  try {
    const response = await axios.get("/api/klinik-data"); // API endpoint
    const geoJSONData = response.data; // GeoJSON dari API

    const klinikLayer = new VectorLayer({
      source: new VectorSource({
        features: new GeoJSON().readFeatures(geoJSONData, {
          dataProjection: "EPSG:4326", // Proyeksi data GeoJSON
          featureProjection: "EPSG:3857", // Proyeksi peta OpenLayers
        }),
      }),
      style: new Style({
        image: new Icon({
          anchor: [0.5, 0.5],
          src: "/icon/klinik.png", // URL icon klinik
          scale: 0.05, // Ukuran icon
        }),
      }),
    });

    // Tambahkan layer ke peta
    map.addLayer(klinikLayer);

    // Cek Parameter URL untuk Auto-Zoom & Popup Highlight Klinik Spesifik
    const urlParams = new URLSearchParams(window.location.search);
    const targetLat = parseFloat(urlParams.get("lat"));
    const targetLng = parseFloat(urlParams.get("lng"));
    const targetName = urlParams.get("name") || "";
    const targetJam = urlParams.get("jam") || "";
    const targetHarga = urlParams.get("harga") || "";
    const targetBpjs = urlParams.get("bpjs") || "";

    if (!isNaN(targetLat) && !isNaN(targetLng)) {
      const coords = fromLonLat([targetLng, targetLat]);

      // Animasikan zoom dan pusatkan peta ke lokasi klinik
      map.getView().animate({
        center: coords,
        zoom: 17,
        duration: 1200,
      });

      // Tampilkan popup highlight untuk klinik yang dipilih
      popupElement.innerHTML = `
        <div style="font-family: 'Poppins', sans-serif; padding: 4px;">
          <span style="font-size: 10px; font-weight: 700; color: #ff9900; text-transform: uppercase; letter-spacing: 0.5px;">📍 Lokasi Klinik Dipilih</span>
          <h4 style="font-size: 14px; font-weight: 700; color: #111827; margin: 4px 0 6px 0; leading-height: 1.2;">${targetName || "Klinik Kesehatan"}</h4>
          <div style="font-size: 11px; color: #4b5563; line-height: 1.5;">
            ${targetJam ? `<p style="margin: 0 0 2px 0;">⏰ <strong>Jam:</strong> ${targetJam}</p>` : ''}
            ${targetBpjs ? `<p style="margin: 0 0 2px 0;">💳 <strong>BPJS:</strong> ${targetBpjs}</p>` : ''}
            ${targetHarga ? `<p style="margin: 0;">💰 <strong>Biaya:</strong> ${targetHarga}</p>` : ''}
          </div>
        </div>
      `;

      setTimeout(() => {
        popupOverlay.setPosition(coords);
      }, 1300);
    }

  } catch (error) {
    console.error("Error fetching klinik data:", error);
  }
}

// Panggil fungsi fetchKlinikData
fetchKlinikData();


// const popup = new Overlay({
//     element: document.getElementById("popup"),
//     positioning: "top-center",
//     stopEvent: false,
//     offset: [0, -15],
// });
// map.addOverlay(popup);
// map.on("singleclick", function (evt) {
//     const feature = map.forEachFeatureAtPixel(evt.pixel, function (feat) {
//         return feat;
//     });

//     if (feature) {
//         const coordinates = feature.getGeometry().getCoordinates();
//         let content = "<h3>Informasi Fitur</h3>";
//         content +=
//             "<p>Nama Daerah: <strong>" +
//             feature.get("Nama_Pemetaan") +
//             "</strong></p>" +
//             "<p>Jumlah Korban: " +
//             feature.get("Jumlah_Korban") +
//             "</p>";
//         document.getElementById("popup-content").innerHTML = content;

//         popup.setPosition(coordinates);
//     } else {
//         popup.setPosition(undefined);
//     }
// });

// const featureOverlay = new VectorLayer({
//   source: new VectorSource(),
//   map: map,
//   style: {
//     "stroke-color": "rgba(255, 255, 255, 0.7)",
//     "stroke-width": 2,
//   },
// });
// let highlight;
// const highlightFeature = function (pixel) {
//   const feature = map.forEachFeatureAtPixel(pixel, function (feature) {
//     return feature;
//   });
//   if (feature !== highlight) {
//     if (highlight) {
//       featureOverlay.getSource().removeFeature(highlight);
//     }
//     if (feature) {
//       featureOverlay.getSource().addFeature(feature);
//     }
//     highlight = feature;
//   }
// };
// const displayFeatureInfo = function (pixel) {
//   const feature = map.forEachFeatureAtPixel(pixel, function (feat) {
//     return feat;
//   });
//   const info = document.getElementById("info");
//   if (feature) {
//     info.innerHTML = feature.get("Kabupaten") || "&nbsp;";
//   } else {
//     info.innerHTML = "&nbsp;";
//   }
// };

// map.on("pointermove", function (evt) {
//   if (evt.dragging) {
//     popup.setPosition(undefined);
//   }
//   const pixel = map.getEventPixel(evt.originalEvent);
//   highlightFeature(pixel);
//   displayFeatureInfo(pixel);
// });


// const polygonLayerCheckbox = document.getElementById("polygon");
// const pointLayerCheckbox = document.getElementById("point");
// polygonLayerCheckbox.addEventListener("change", function () {
//   kabRiau.setVisible(polygonLayerCheckbox.checked);
// });
// pointLayerCheckbox.addEventListener("change", function () {
//   banjir.setVisible(pointLayerCheckbox.checked);
// });

// map.addOverlay(overlay);

// // map.on("singleclick", function (evt) {
// //   const feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
// //     return feature;
// //   });
// //   if (!feature) {
// //     return;
// //   }

// //   const coordinate = evt.coordinate;
// //   const content =
// //     "<h3>Nama Daerah: " +
// //     feature.get("Nama_Pemetaan") +
// //     "</h3>" +
// //     "<p>Jumlah Korban: " +
// //     feature.get("Jumlah_Korban") +
// //     "</p>";
// //   content_element.innerHTML = content;
// //   overlay.setPosition(coordinate);
// // });

// closer.onclick = function () {
//   overlay.setPosition(undefined);
//   closer.blur();
//   return false;
// };
