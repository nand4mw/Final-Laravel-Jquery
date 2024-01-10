<?php

namespace App\Http\Controllers;

use App\Models\PemilikModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'pemilik' =>  PemilikModel::getAllPemilik()->get(),
            'title' => 'Data Pemilik',
            'no' => 1
        ];
        return view('pages.Pemilik.Pemilik', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        $data =  PemilikModel::getAllPemilik()->get();
        return view('pages.Pemilik.TambahPemilik', $data, [
            'title' => 'Tambah Data Pemilik'
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
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required ',
        ]);

        $data = [
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ];

        PemilikModel::create($data);
        return redirect('/tambah-data-pemilik')->with([
            'success' => 'data berhasil di tambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =
            [
                'pemilik' =>   PemilikModel::where('id_pemilik', $id)->first(),
                'title' => 'Edit Data Pemilik'
            ];

        return view('pages.Pemilik.EditPemilik', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAction(Request $request, $id)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required ',
        ]);

        $data = [
            'nama_pemilik' => $request->nama_pemilik,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ];

        PemilikModel::where('id_pemilik', $id)->update($data);

        return redirect('pemilik')->with(['success' => 'data berhasil di ubah']);
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
