<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatTangkapModel;
use Illuminate\Routing\Controller;
use RealRashid\SweetAlert\Facades\Alert;

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
            'alat' => AlatTangkapModel::getAlatTangkap()->get(),
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
            'nama_alat_tangkap' => $request->nama_alat_tangkap,
        ];

        AlatTangkapModel::create($data);
        Alert::success('Success!', 'Data berhasil di tambahkan');
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
        $data = AlatTangkapModel::where('id_alat_tangkap', $id)->first();

        return view('pages.AlatTangkap.EditAlatTangkap', compact('data'), [
            'title' => 'Edit Data Alat Tangkap',
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
        $data = $request->validate([
            'nama_alat_tangkap' => 'required',
        ]);

        AlatTangkapModel::where('id_alat_tangkap', $id)->update($data);
        Alert::success('Success!', 'Data Berhasil di Update');
        return redirect()->route('editAlatTangkap')->with('success', 'Data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        AlatTangkapModel::where('id_alat_tangkap', $id)->delete();

        return redirect('/alat-tangkap')->with('success', 'Data berhasil di hapus');
    }
}
