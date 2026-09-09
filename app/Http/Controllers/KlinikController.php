<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KlinikController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel klinik
        $kliniks = Klinik::all();

        // Kirim data ke view
        return view('klinik.index', compact('kliniks'));
    }

    // Menambah data baru ke tabel klinik
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_klinik' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'bpjs' => 'required|string|in:menerima,tidak-menerima',
            'harga' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);
        $lastNo = Klinik::max('data->No'); // Mengambil nilai terbesar dari kolom 'No' dalam JSON
        $nextNo = $lastNo ? $lastNo + 1 : 1;
        // Format data sebagai JSON
        $data = [
            'No' => $nextNo,
            'Nama Klinik' => $request->nama_klinik,
            'Jam Operasional' => $request->jam_operasional,
            'BPJS/tidak BPJS' => $request->bpjs,
            'Harga' => $request->harga,
            'Bujur' => (float) $request->longitude,
            'Lintang' => (float) $request->latitude,
            'Rating' => 3.5
        ];

        // Simpan ke database
        $klinik = new Klinik();
        $klinik->data = $data;
        $klinik->save();

        // Kembalikan response atau redirect
        return redirect()->back()->with('success', 'Data klinik berhasil ditambahkan!');
    }


    // Mengedit data klinik berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari request
        $request->validate([
            'data' => 'required|json', // Validasi format JSON
        ]);

        // Mencari data klinik berdasarkan ID
        $klinik = Klinik::find($id);

        // Jika tidak ditemukan
        if (!$klinik) {
            return response()->json([
                'message' => 'Klinik tidak ditemukan'
            ], 404);
        }

        // Mengupdate data klinik
        $klinik->data = json_decode($request->data, true); // Mengonversi JSON menjadi array
        $klinik->save();

        return response()->json([
            'message' => 'Data klinik berhasil diperbarui',
            'data' => $klinik
        ]);
    }

    // Menghapus data klinik berdasarkan ID
    public function destroy($id)
    {
        // Mencari data klinik berdasarkan ID
        $klinik = Klinik::find($id);

        // Jika tidak ditemukan
        if (!$klinik) {
            return response()->json([
                'message' => 'Klinik tidak ditemukan'
            ], 404);
        }

        // Menghapus data klinik
        $klinik->delete();

        return response()->json([
            'message' => 'Data klinik berhasil dihapus'
        ]);
    }
    public function getKlinikData()
    {
        // Ambil semua data dari tabel klinik
        $kliniks = Klinik::all();

        // Transformasikan data JSON ke GeoJSON
        $features = [];
        foreach ($kliniks as $klinik) {
            $json = preg_replace('/[[:^print:]]/', '', $klinik);
            $data = json_decode($json, true); // Decode JSON dari database

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON Decode Error: ' . json_last_error_msg());
                continue;
            }

            $features[] = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        $data["data"]["Bujur"], // Longitude
                        $data["data"]["Lintang"], // Latitude
                    ],
                ],
                "properties" => [
                    "Nama_Klinik" => $data["data"]["Nama Klinik"],
                    "Jam_Operasional" => $data["data"]["Jam Operasional"],
                    "BPJS" => $data["data"]["BPJS/tidak BPJS"],
                    "Harga" => $data["data"]["Harga"],
                    "Rating" => $data["data"]["Rating"],
                ],
            ];
        }

        // Bungkus ke dalam FeatureCollection
        $geoJSON = [
            "type" => "FeatureCollection",
            "features" => $features,
        ];

        // Return dalam format JSON
        return response()->json($geoJSON);
    }
}
