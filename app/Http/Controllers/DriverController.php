<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
class DriverController extends Controller
{
    public function index(){
        $data['driver'] = Driver::all();
        return view('layouts.view.driver.index',$data);
    }

    public function tambah(){
        return view('layouts.view.driver.form');
    }

    public function create(Request $request)
    {
        $data = $request->except('id');
        Driver::create($data);
        return redirect()->route('dataDriver');
    }

    public function edit($id, Request $request)
    {
        $data['data'] = Driver::findOrFail($id);
        $data['form'] = 'edit';
        return view('layouts.view.driver.form',$data);
    }

    public function update(Request $request){
        $id = $request->id;
        $driver = Driver::findOrFail($id);
        $data = $request->except('id');
        $driver->update($data);
        return redirect()->route('dataDriver');
    }

    public function hapus($id)
    {
        $data['driver'] = Driver::where('id',$id)->delete();
        return redirect()->route('dataDriver',$data);
    }
}
