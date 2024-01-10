<?php

namespace App\Http\Controllers;

use App\Models\KapalModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = [
            'data' => KapalModel::getAllKapal(),
            'title' => 'Data Kapal',
            'no' => 1
        ];
        return view('pages.Kapal.Kapal', $query);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $data = [
            'kapal' => kapalModel::getAllKapal(),
            'title' => 'Tambah Data Kapal'
        ];

        return view('pages.kapal.TambahKapal', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahAction(Request $request)
    {
        $validateData =  $request->validate([
            'nama_kapal' => 'required',
            'id_pemilik' => 'required',
            'id_dpi' => 'required',
            'id_alat_tangkap' => 'required',
            'foto_kapal' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->file('foto_kapal')) {
            $validateData['foto_kapal'] = $request->file('foto_kapal')->store('foto-kapal-storage');
        }



        KapalModel::create($validateData);

        return redirect('/kapal')->route(['success' => 'Data Kapal berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
