<?php

namespace App\Http\Controllers;

use App\Models\DpiModel;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class DpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'dpi' => DpiModel::getAllDpi()->get(),
            'title' => 'Data Daerah Penangkapan Ikan',
            'no' => 1
        ];

        return view('pages.Dpi.Dpi', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $data = DpiModel::getAllDpi()->get();

        return view('pages.Dpi.TambahDpi', $data, [
            'title' => 'Tambah Data Dpi'
        ]);
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
            'nama_dpi' => 'required',
            'luas' => 'required',
        ]);

        $data = [
            'nama_dpi' => $request->nama_dpi,
            'luas' => $request->luas
        ];



        DpiModel::create($data);

        return redirect('/dpi')->with(['success' => 'data berhasil di tambahkan']);
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
