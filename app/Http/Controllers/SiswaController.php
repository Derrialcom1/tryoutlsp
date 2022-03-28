<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all(); //SELECT * FROM db
        return view('siswa', ["data" => $data]);
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
        $data = Siswa::create([
            "nama" => $request->nama,
            "kelas" => $request->kelas,
            "tanggal_pulang" => $request->tanggal_pulang,
        ]);

        return redirect()->route('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::where('id', $id)->first();
        if ($data) {
            return view('editsiswa', ["data" => $data]);
        } else {
            // abort untuk mengalihkan ke page 404 atau halaman not found
            return abort("404");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Siswa::where('id', $id)->first();
        if ($data) {
            $data->nama = $request->nama;
            $data->kelas = $request->kelas;
            $data->tanggal_pulang = $request->tanggal_pulang;
            $result = $data->save();
            if ($result) {
                return redirect()->route('siswa');
            } else {
                return abort("404");
            }
            return view('editsiswa', ["data" => $data]);
        } else {
            return abort("404");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::where('id', $id)->first();
        if ($data) {
            if ($data->delete()) {
                return redirect()->route('siswa');
            } else {
                return abort("404");
            }
        } else {
            return abort("404");
        }
    }
}
