<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Kendaraan;
use App\Models\Driver;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $data['kendaraan'] = Kendaraan::count();
        $data['driver'] = Driver::count();
        $data['user'] = User::count();
        $data['peminjaman'] = Peminjaman::count();
        return view('layouts.view.dashboard.index',$data);
    }
}
