<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index(){
        if(Auth::user()->role == 'approval'){
            $data['peminjaman'] = Peminjaman::where('status', '=', 'Pending')->get();
            $data['kendaraan'] = Kendaraan::all();
        }
        elseif(Auth::user()->role == 'admin'){
            $data['peminjaman'] = Peminjaman::all();
            $data['kendaraan'] = Kendaraan::all();
        }
        return view('layouts.view.peminjaman.index',$data);
    }

    public function tambah(){
        $data['kendaraan'] = Kendaraan::all();
        $data['driver'] = Driver::all();
        $data['user'] = User::all();
        return view('layouts.view.peminjaman.form',$data);
    }

    public function create(Request $request)
    {
        $data = new Peminjaman;
        $data->nama_peminjam = $request->nama_peminjam;
        $data->kendaraan_id = $request->kendaraan_id;
        $data->driver_id = $request->driver_id;
        $data->user_id = $request->user_id;
        $data->mulai = $request->mulai;
        $data->selesai = $request->selesai;
        $data->alasan_peminjaman = $request->alasan_peminjaman;
        $data->status = "Pending";
        $data->save();
        return redirect()->route('dataPeminjaman');
    }

    public function edit($id, Request $request)
    {
        $data['kendaraan'] = Kendaraan::all();
        $data['data'] = Peminjaman::findOrFail($id);
        $data['driver'] = Driver::all();
        $data['user'] = User::all();
        $data['form'] = 'edit';
        return view('layouts.view.peminjaman.form',$data);
    }

    public function update(Request $request){
        $id = $request->id;
        $peminjaman= Peminjaman::findOrFail($id);
        $data = $request->except('id');
        $peminjaman->update($data);
        return redirect()->route('dataPeminjaman');
    }

    public function hapus($id)
    {
        $data['peminjaman'] = Peminjaman::where('id',$id)->delete();
        return redirect()->route('dataPeminjaman',$data);
    }
}
