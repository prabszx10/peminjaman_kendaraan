@extends('layouts.backend-dashboard.app')
@section('title','Tambah Kendaraan')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-body bg-gradient-white">
            <div class="card-header"><h2 class="fw-bold">{{isset($form)? 'Edit Data':'Tambah Data'}}</h2></div>
        </div>
        <form action="{{isset($form)? route('updateKendaraan'):route('addKendaraan')}}" method="POST" enctype="multipart/form-data">
            @csrf    
            <div class="card-body bg-gradient-white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Jenis Kendaraan</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text" class="form-control bg-light @error('jenis_kendaraan') is-invalid @enderror" id="jenis_kendaraan" name="jenis_kendaraan" placeholder="Jenis Kendaraan" value="{{(isset($data->jenis_kendaraan))?$data->jenis_kendaraan:old('nama')}}" required>
                                    @error('jenis_kendaraan')
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
                                    <label for="jabatan">Plat Kendaraan</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text" class="form-control bg-light @error('plat_kendaraan') is-invalid @enderror" id="plat_kendaraan" name="plat_kendaraan" placeholder="Plat Kendaraan" value="{{(isset($data->plat_kendaraan))?$data->plat_kendaraan:old('plat_kendaraan')}}" required>
                                    @error('plat_kendaraan')
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
                                    <label>Ketersediaan BBM</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="number" class="form-control bg-light @error('sisa_bbm') is-invalid @enderror" id="sisa_bbm" name="sisa_bbm" placeholder="Ketersediaan BBM" value="{{(isset($data->sisa_bbm))?$data->sisa_bbm:old('sisa_bbm')}}" required>
                                    @error('sisa_bbm')
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
                                    <label>Status</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text" class="form-control bg-light @error('status') is-invalid @enderror" id="status" name="status" placeholder="Status" value="{{(isset($data->status))?$data->status:old('status')}}" required>
                                    @error('status')
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
                                    <label for="nip">Jadwal Service</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="date" class="form-control bg-light @error('jadwal_service') is-invalid @enderror" id="jadwal_service" name="jadwal_service" placeholder="Jadwal Service" value="{{(isset($data->jadwal_service))?$data->jadwal_service:old('jadwal_service')}}" required>
                                    @error('jadwal_service')
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
