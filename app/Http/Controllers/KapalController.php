<?php

namespace App\Http\Controllers;

use App\Models\DpiModel;
use Barryvdh\DomPDF\PDF;
use App\Models\KapalModel;
use App\Models\PemilikModel;
use Illuminate\Http\Request;
use Illuminate\Foundation\Vite;
use App\Models\AlatTangkapModel;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
// use PDF;

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
            'pemilik' => PemilikModel::all(),
            'alat' => AlatTangkapModel::all(),
            'dpi' => DpiModel::all(),
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
        // ddd($request->all());


        // return  $request->file('foto_kapal')->store('post-kapal');
        $validateData =  $request->validate([
            'nama_kapal' => 'required',
            'id_pemilik' => 'required',
            'id_dpi' => 'required',
            'id_alat_tangkap' => 'required',
            'foto_kapal' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        if ($request->file('foto_kapal')) {
            $validateData['foto_kapal'] = $request->file('foto_kapal')->store('post-kapal');
        }


        KapalModel::create($validateData);
        Alert::success('Success!', 'Data berhasil di tambahkan');
        return redirect('/kapal')->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'kapal' => KapalModel::where('id_kapal', $id)->first(),
            'pemilik' => PemilikModel::all(),
            'data_dpi' => DpiModel::all(),
            'alat_tangkap' => AlatTangkapModel::all(),
            'title' => 'Edit Data Kapal'
        ];


        return view('pages.kapal.EditKapal', $data);
    }

    public function showModal($id)
    {
        $kapal = KapalModel::findOrFail($id);
        return view('pages.kapal.Kapal', compact('kapal'));
    }

    public function view_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $pdf = KapalModel::all();

        $mpdf->WriteHTML(view('pages.kapal.Kapal', [
            'data' => $pdf,
            'title' => 'Kapal'
        ]));

        $mpdf->Output();
    }

    public function download_pdf()
    {
        $mpdf = new \Mpdf\Mpdf();
        $pdf = KapalModel::all();

        $mpdf->WriteHTML(view('pages.kapal.Kapal', [
            'data' => $pdf
        ]));

        $mpdf->Output('download-pdf', 'D');
    }


    public function editAction(Request $request, $id)
    {
        $data = $request->validate([
            'nama_kapal' => 'required',
            'id_pemilik' => 'required',
            'id_dpi' => 'required',
            'id_alat_tangkap' => 'required',
            'foto_kapal' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->file('foto_kapal')) {
            $data['foto_kapal'] = $request->file('foto_kapal')->store('post-kapal');
        }

        KapalModel::where('id_kapal', $id)->update($data);
        Alert::success('Success!', 'Data Berhasil di Update');
        return redirect('/kapal')->with('success', 'Kapal berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        KapalModel::where('id_kapal', $id)->delete();
        // Alert::success('Hore!', 'Post Deleted Successfully');
        return redirect('/kapal')->with('success', 'Data Berhasil Dihapus');
    }
}
