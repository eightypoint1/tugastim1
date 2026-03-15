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
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama
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
        $mahasiswa = Mahasiswa::where('nim' , $id)->first();

        if(!$mahasiswa){
            return response()->json([
                'message' => 'data tidak ditemukan'
            ], 404);
        }
         try{
            $validated = $request->validate([
                'nim' => 'sometimes|string|max:15|unique:mahasiswa,nim,' . $id,
            'nama' => 'sometimes|string|max:255',
            ]);
        } catch(\Illuminate\Validation\ValidationException $th){
            return response() -> json ([
                "Message"=> "Validation Failed",
                "errors" => $th->validator->errors()
            ], 422);
        }

        $mahasiswa -> update($validated);

        return response() ->json([
            "message" => "Data Mahasiswa {$id} berhasil diupdate",
            "data" => $mahasiswa
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
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