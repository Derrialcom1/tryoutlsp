<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artikel::all(); //SELECT * FROM db
        return view('artikel', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kategori::all(); //SELECT * FROM db
        return view('addartikel', ["data" => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->gambar_artikel->extension();  
        $request->file('gambar_artikel')->move(public_path('images'), $imageName);
        $data = Artikel::create([
            "user_id" => $request->user_id,
            "kategori_id" => $request->kategori_id,
            "judul_artikel" => $request->judul_artikel,
            "isi_artikel" => $request->isi_artikel,
            "gambar_artikel" => $imageName,
        ]);

        return redirect()->route('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // mengambil data artikel yang id nya sesuai dengan parameter
        // first mengambil data pertama
        $kategori = Kategori::all(); //SELECT * FROM db
        $data = Artikel::where('id', $id)->first();
        if ($data) {
            return view('editartikel', ["data" => $data, "kategori" => $kategori]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Artikel::where('id', $id)->first();
        if ($data) {
            //merubah data yang sudah didapatkan dari database menjadi data yang didapat dari input website
            $data->user_id = $request->user_id;
            $data->kategori_id = $request->kategori_id;
            $data->judul_artikel = $request->judul_artikel;
            $data->isi_artikel = $request->isi_artikel;
            $data->gambar_artikel = $request->gambar_artikel;  
            //proses menyimpan atau memperbaharui data yang sudah ada di database
            $result = $data->save();

            //pengecekan jika berhasil terubah maka akan kembali kehalaman artikel
            if ($result) {
                return redirect()->route('artikel');
            } else {
                return abort("404");
            }
            
            return view('editartikel', ["data" => $data]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Artikel::where('id', $id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('artikel');
            } else {
                return abort("404");
            }
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    public function isi()
    {
        $kategori = Kategori::all(); //SELECT * FROM db
        $terbaru = Artikel::orderBy('created_at', 'desc')->paginate(3);
        $favorit = Artikel::orderBy('updated_at', 'desc')->paginate(3);
        $data = Artikel::paginate(5);
        return view('isidashboard', ["data" => $data, "terbaru" => $terbaru, "kategori" => $kategori, "favorit" => $favorit]);
    }

    public function isiartikel($id)
    {
        $data = Artikel::where('id', $id)->first();
        if ($data) {
            return view('isiartikel', ["data" => $data]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    public function dashuser()
    {
        $data = Artikel::all(); //SELECT * FROM db
        return view('dashboardUser', ["data" => $data]);
    }

}
