<?php

namespace App\Http\Controllers;

use App\Models\AlatTangkapModel;
use App\Models\DpiModel;
use App\Models\KapalModel;
use App\Models\PemilikModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('home', $data);
    }


    public function dashboard()
    {
        $total_alat = AlatTangkapModel::count();
        $total_dpi = DpiModel::count();
        $total_kapal = KapalModel::count();
        $total_pemilik = PemilikModel::count();


        return view('home', compact(
            'total_alat',
            'total_dpi',
            'total_kapal',
            'total_pemilik',

        ),  [
            'title' => 'Dashboard'
        ]);
    }

    public function queryAll()
    {
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
        //
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
