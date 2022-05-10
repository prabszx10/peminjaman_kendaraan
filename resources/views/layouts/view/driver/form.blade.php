@extends('layouts.backend-dashboard.app')
@section('title','Tambah Kendaraan')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-body bg-gradient-white">
            <div class="card-header"><h2 class="fw-bold">{{isset($form)? 'Edit Data':'Tambah Data'}}</h2></div>
        </div>
        <form action="{{isset($form)? route('updateDriver'):route('addDriver')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            <div class="card-body bg-gradient-white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">nama</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text" class="form-control bg-light @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{(isset($data->nama))?$data->nama:old('nama')}}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="jabatan">Alamat</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text" class="form-control bg-light @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{(isset($data->alamat))?$data->alamat:old('alamat')}}" required>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Usia</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="number" class="form-control bg-light @error('usia') is-invalid @enderror" id="usia" name="usia" placeholder="Usia" value="{{(isset($data->usia))?$data->usia:old('usia')}}" required>
                                    @error('usia')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> 
            <div>
                <button class="btn btn-primary btn-sm float-right text-white mr-md-1"
                    type="submit">Save</button>
                <a href="{{ url()->previous() }}">
                    <button class="btn btn-danger btn-sm float-right text-white mr-md-1"
                        type="button">Cancel</button>
                </a>
            </div> 
        </form>
    </div>
</div>
@endsection
