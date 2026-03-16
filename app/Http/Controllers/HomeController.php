<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json($mahasiswas);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswas = Mahasiswa::find($id);
        return response()->json($mahasiswas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'mata_kuliah' => json_encode($request->mata_kuliah)
        ]);

        return response()->json($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswas = Mahasiswa::where('nim', $id)->first();

        if(!$mahasiswas){
            return response()->json([
                'message' => 'data tidak ditemukan'
            ], 404);
        }
         try{
            $validated = $request->validate([
                'nim' => 'sometimes|string|max:15|unique:mahasiswas,nim,' . $id,
                'nama' => 'sometimes|string|max:255',
                'mataKuliah.*.kode' => 'sometimes|required|regex:/^[A-Z]{3}[0-9]{5}$/',
                'mataKuliah.*.nama' => 'sometimes|required|string|max:50',
                'mataKuliah.*.sks' => 'sometimes|required|numeric|min:1|max:6',
            ]);
        } catch(\Illuminate\Validation\ValidationException $th){
            return response() -> json ([
                "Message"=> "Validation Failed",
                "errors" => $th->validator->errors()
            ], 422);
        }

        $mahasiswas -> update($validated);

        return response() ->json([
            "message" => "Data Mahasiswa {$id} berhasil diupdate",
            "data" => $mahasiswas
        ]);


    }
    public function destroy(string $id) {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $mahasiswa->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}