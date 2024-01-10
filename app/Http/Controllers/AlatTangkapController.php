<?php

namespace App\Http\Controllers;

use App\Models\AlatTangkapModel;
use Illuminate\Http\Request;

class AlatTangkapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'alat' => AlatTangkapModel::getAllAlatTangkap()->get(),
            'title' => 'Data Alat Tangkap',
            'no' => 1
        ];

        return view('pages.AlatTangkap.AlatTangkap', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Alat Tangkap'
        ];

        return view('pages.AlatTangkap.TambahAlatTangkap', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahAction(Request $request)
    {
        $request->validate([
            'nama_alat_tangkap' => 'required',
        ]);

        $data = [
            'nama_alat_tangkap' => $request->nama_alat_tangkap

        ];

        AlatTangkapModel::created('$data');
        return redirect('/alat-tangkap')->with(['success' => 'data berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('');
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
