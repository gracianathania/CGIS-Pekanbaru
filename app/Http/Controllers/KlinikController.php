<?php

namespace App\Http\Controllers;

use App\Models\Klinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KlinikController extends Controller
{
    public function index()
    {
        try {
            $kliniks = Klinik::all();
            if ($kliniks->isEmpty()) {
                $kliniks = $this->getKliniksFromJson();
            }
        } catch (\Throwable $e) {
            Log::warning('Database connection failed, falling back to data_klinik.json: ' . $e->getMessage());
            $kliniks = $this->getKliniksFromJson();
        }

        return view('klinik.index', compact('kliniks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_klinik' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'bpjs' => 'required|string|in:menerima,tidak-menerima',
            'harga' => 'required|string|max:255',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);
        $lastNo = Klinik::max('data->No');
        $nextNo = $lastNo ? $lastNo + 1 : 1;

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

        try {
            $klinik = new Klinik();
            $klinik->data = $data;
            $klinik->save();
        } catch (\Throwable $e) {
            Log::error('Could not save clinic to database: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Data klinik berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|json',
        ]);

        $klinik = Klinik::find($id);
        if (!$klinik) {
            return response()->json(['message' => 'Klinik tidak ditemukan'], 404);
        }

        $klinik->data = json_decode($request->data, true);
        $klinik->save();

        return response()->json([
            'message' => 'Data klinik berhasil diperbarui',
            'data' => $klinik
        ]);
    }

    public function destroy($id)
    {
        $klinik = Klinik::find($id);
        if (!$klinik) {
            return response()->json(['message' => 'Klinik tidak ditemukan'], 404);
        }

        $klinik->delete();

        return response()->json(['message' => 'Data klinik berhasil dihapus']);
    }

    public function getKlinikData()
    {
        try {
            $kliniks = Klinik::all();
            if ($kliniks->isEmpty()) {
                $kliniks = $this->getKliniksFromJson();
            }
        } catch (\Throwable $e) {
            Log::warning('Database connection failed in getKlinikData, falling back to data_klinik.json: ' . $e->getMessage());
            $kliniks = $this->getKliniksFromJson();
        }

        $features = [];
        foreach ($kliniks as $klinik) {
            $data = is_array($klinik->data) ? $klinik->data : (is_string($klinik->data) ? json_decode($klinik->data, true) : []);
            if (!$data) continue;

            $features[] = [
                "type" => "Feature",
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        (float) ($data["Bujur"] ?? 0),
                        (float) ($data["Lintang"] ?? 0),
                    ],
                ],
                "properties" => [
                    "Nama_Klinik" => $data["Nama Klinik"] ?? '',
                    "Jam_Operasional" => $data["Jam Operasional"] ?? '',
                    "BPJS" => $data["BPJS/tidak BPJS"] ?? '',
                    "Harga" => $data["Harga"] ?? '',
                    "Rating" => $data["Rating"] ?? 4.0,
                ],
            ];
        }

        return response()->json([
            "type" => "FeatureCollection",
            "features" => $features,
        ]);
    }

    private function getKliniksFromJson()
    {
        $jsonPath = base_path('data_klinik.json');
        if (!file_exists($jsonPath)) {
            return collect();
        }
        $jsonContent = file_get_contents($jsonPath);
        $arrayData = json_decode($jsonContent, true) ?? [];
        
        return collect(array_map(function ($item, $index) {
            $obj = new \stdClass();
            $obj->id = $index + 1;
            $obj->data = $item;
            return $obj;
        }, $arrayData, array_keys($arrayData)));
    }
}
