<x-app-layout>
    <style>
    .ol-popup {
            position: absolute;
            background-color: white;
            padding: 5px 10px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.2);
            white-space: nowrap;
            font-size: 12px;
        }

        .ol-popup:after,
        .ol-popup:before {
            top: 100%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .ol-popup:after {
            border-top-color: white;
            border-width: 10px;
            left: 50%;
            margin-left: -10px;
        }

        .ol-popup:before {
            border-top-color: #cccccc;
            border-width: 11px;
            left: 50%;
            margin-left: -11px;
        }
    </style>

    </style>
    <div id="map" style="width: 100%; height: 100%;"></div>
    <div id="popup" class="ol-popup"></div>
</x-app-layout>