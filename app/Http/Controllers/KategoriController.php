<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::all(); //SELECT * FROM db
        return view('kategori', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Kategori::create([
            "nama_kategori" => $request->nama_kategori,
        ]);

        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kategori::where('id', $id)->first();
        if ($data) {
            return view('editkategori', ["data" => $data]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Kategori::where('id', $id)->first();
        if ($data) {
            //merubah data yang sudah didapatkan dari database menjadi data yang didapat dari input website
            $data->nama_kategori = $request->nama_kategori;
            //proses menyimpan atau memperbaharui data yang sudah ada di database
            $result = $data->save();

            //pengecekan jika berhasil terubah maka akan kembali kehalaman artikel
            if ($result) {
                return redirect()->route('kategori');
            } else {
                return abort("404");
            }
            
            return view('editkategori', ["data" => $data]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kategori::where('id', $id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('kategori');
            } else {
                return abort("404");
            }
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }
}
