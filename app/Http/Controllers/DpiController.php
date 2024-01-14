<?php

namespace App\Http\Controllers;

use App\Models\DpiModel;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpKernel\Debug\VirtualRequestStack;

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
        Alert::success('Success!', 'Data berhasil di tambahkan');
        return redirect('/dpi')->with(['success' => 'data berhasil di tambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return view('pages.Dpi.EditDpi');
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $get = DpiModel::where('id_dpi', $id)->first();
        return view('pages.Dpi.EditDpi', compact('get'), [
            'title' => 'Edit Data Daearah Penangkapan Ikan',
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
        $data = $request->validate(
            [
                'nama_dpi' => 'required',
                'luas' => 'required',
            ]
        );

        DpiModel::where('id_dpi', $id)->update($data);
        Alert::success('Success!', 'Data Berhasil di Update');
        return redirect('/dpi')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        DpiModel::where('id_dpi', $id)->delete();

        return redirect('/dpi')->with('success', 'Data Berhasil di Hapus');
    }
}
