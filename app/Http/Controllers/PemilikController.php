<?php

namespace App\Http\Controllers;

use App\Models\PemilikModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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

        $dataValidate = $request->validate([
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required ',
        ]);

        PemilikModel::create($dataValidate);
        Alert::success('Success!', 'Data berhasil di tambahkan');
        return redirect('/pemilik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemilik =  PemilikModel::where('id_pemilik', $id)->first();


        return view('pages.Pemilik.EditPemilik', compact('pemilik'), [
            'title' => 'Edit Data Pemilik'
        ]);
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
        Alert::success('Success!', 'Data Berhasil di Update');
        return redirect('/pemilik')->with(['success' => 'data berhasil di ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PemilikModel::where('id_pemilik', $id)->delete();

        return redirect('/pemilik')->with(['success' => 'Data berhasil dihapus']);
    }
}
