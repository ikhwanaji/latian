<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MahasiswaController extends Controller{
    public function index()
    {
        $data = mahasiswa::orderBy('id', 'asc')->get();

        return response()->json([
            'status'=> true,
            'message'=> 'Data ditemukan',
            'data'=> $data
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $dataMahasiswa = new mahasiswa;

        $rules =[
            'nama'=>'required',
            'nim'=>'required',
            'jurusan'=>'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'massage'=>'Gagal memasukan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataMahasiswa-> nama = $request->nama;
        $dataMahasiswa-> nim = $request->nim;
        $dataMahasiswa-> jurusan = $request->jurusan;
        $dataMahasiswa-> tanggal_lahir = $request->tanggal_lahir;
        $dataMahasiswa-> alamat = $request->alamat;

        $post = $dataMahasiswa->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses Memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     */

     public function show(string $id)
    {
        $data = mahasiswa::find($id);
        if ($data){
            return response()-> json([
                'status'=> true,
                'message'=> 'Data ditemukan',
                'data'=> $data
            ], 200);
        } else{
            return response()-> json([
                'status'=> false,
                'message'=> 'Data tidak ditemukan', 
            ]);
        }
    }
     /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
        $dataMahasiswa = mahasiswa::find($id);
        if(empty($dataMahasiswa)){
            return response()->json ([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ], 404);
        }

        $rules =[
            'nama'=>'required',
            'nim'=>'required',
            'jurusan'=>'required',
            'tanggal_lahir'=>'required',
            'alamat'=>'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status'=> false,
                'message'=>'Gagal update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataMahasiswa->nama = $request->nama;
        $dataMahasiswa->nim = $request->nim;
        $dataMahasiswa->jurusan = $request->jurusan;
        $dataMahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $dataMahasiswa->alamat = $request->alamat;

        $post = $dataMahasiswa->save();

        return response()->json([
            'status'=>true,
            'message'=>'Sukses melakukan update data'
        ]);

     }

     /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id)
     {
         $dataMahasiswa = mahasiswa::find($id);
         if(empty($dataMahasiswa)){
             return response()->json ([
                 'status'=>false,
                 'message'=>'Data tidak ditemukan'
             ], 404);
         }
 
         $post = $dataMahasiswa->delete();
 
         return response()->json([
             'status'=>true,
             'message'=>'Sukses melakukan delete data'
         ]);
     }  
}