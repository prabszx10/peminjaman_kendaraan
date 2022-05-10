<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index(){
        $data['kendaraan'] = Kendaraan::all();
        return view('layouts.view.kendaraan.index',$data);
    }

    public function tambah(){
        return view('layouts.view.kendaraan.form');
    }

    public function create(Request $request)
    {
        $data = $request->except('id');
        Kendaraan::create($data);
        return redirect()->route('dataKendaraan');
    }

    public function edit($id, Request $request)
    {
        $data['data'] = Kendaraan::findOrFail($id);
        $data['form'] = 'edit';
        return view('layouts.view.kendaraan.form',$data);
    }

    public function update(Request $request){
        $id = $request->id;
        $kendaraan = Kendaraan::findOrFail($id);
        $data = $request->except('id');
        $kendaraan->update($data);
        return redirect()->route('dataKendaraan');
    }

    public function hapus($id)
    {
        $data['kendaraan'] = Kendaraan::where('id',$id)->delete();
        return redirect()->route('dataKendaraan',$data);
    }
}
