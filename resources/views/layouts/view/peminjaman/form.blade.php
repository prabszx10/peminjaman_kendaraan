@extends('layouts.backend-dashboard.app')
@section('title','Tambah Peminjaman')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="card-body bg-gradient-white">
            <div class="card-header">
                @if(Auth::user()->role == 'admin')
                <h2 class="fw-bold">{{isset($form)? 'Edit Data':'Tambah Data'}}</h2>
                @elseif(Auth::user()->role == 'approval')
                <h2>Approval</h2>
                @endif
            </div>
        </div>
        <form action="{{isset($form)? route('updatePeminjaman'):route('addPeminjaman')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if(Auth::user()->role == 'admin')
            <div class="card-body bg-gradient-white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama Peminjam</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text"
                                        class="form-control bg-light @error('nama_peminjam') is-invalid @enderror"
                                        id="nama_peminjam" name="nama_peminjam" placeholder="Nama Peminjaman"
                                        value="{{(isset($data->nama_peminjam))?$data->nama_peminjam:old('nama_peminjam')}}"
                                        required>
                                    @error('nama_peminjam')
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
                                    <label for="user_type">Kendaraan</label>
                                    <div class="">
                                        <select id="kendaraan_id"
                                            class="col-md-12 form-select @error('kendaraan_id') is-invalid @enderror"
                                            name="kendaraan_id" value="{{ old('kendaraan_id') }}" required
                                            autocomplete="kendaraan_id" autofocus>
                                            <option value="" style="display: {{isset($form)?"none":"block"}}" selected
                                                disabled hidden>Pilih Kendaraan</option>
                                            @foreach ($kendaraan as $item)
                                            <option value="{{$item->id}}"
                                                {{ isset($form)? ($data->kendaraan_id == $item->id ? 'selected':'unselected'):''}}>
                                                {{$item->jenis_kendaraan}} ({{$item->plat_kendaraan}})</option>
                                            @endforeach
                                        </select>
                                        @error('kendaraan_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_type">Pengemudi</label>
                                    <div class="">
                                        <select id="driver_id"
                                            class="col-md-12 form-select @error('driver_id') is-invalid @enderror"
                                            name="driver_id" value="{{ old('driver_id') }}" required
                                            autocomplete="driver_id" autofocus>
                                            <option value="" style="display: {{isset($form)?"none":"block"}}" selected
                                                disabled hidden>Pilih Pengemudi</option>
                                            @foreach ($driver as $item)
                                            <option value="{{$item->id}}"
                                                {{ isset($form)? ($data->driver_id == $item->id ? 'selected':'unselected'):''}}>
                                                {{$item->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('driver_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_type">Approval</label>
                                    <div class="">
                                        <select id="driver_id"
                                            class="col-md-12 form-select @error('user_id') is-invalid @enderror"
                                            name="user_id" value="{{ old('user_id') }}" required
                                            autocomplete="user_id" autofocus>
                                            <option value="" style="display: {{isset($form)?"none":"block"}}" selected
                                                disabled hidden>Pilih Approval</option>
                                            @foreach ($user as $item)
                                            <option value="{{$item->id}}"
                                                {{ isset($form)? ($data->user_id == $item->id ? 'selected':'unselected'):''}}>
                                                {{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alasan Peminjaman</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="text"
                                        class="form-control bg-light @error('alasan_peminjaman') is-invalid @enderror" id="alasan_peminjaman"
                                        name="alasan_peminjaman" placeholder="Alasan Peminjaman"
                                        value="{{(isset($data->alasan_peminjaman))?$data->alasan_peminjaman:old('alasan_peminjaman')}}" required>
                                    @error('alasan_peminjaman')
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
                                    <label for="mulai">Mulai Peminjaman</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="date"
                                        class="form-control bg-light @error('mulai') is-invalid @enderror"
                                        id="mulai" name="mulai" placeholder="Mulai Peminjaman"
                                        value="{{(isset($data->mulai))?$data->mulai:old('mulai')}}"
                                        required>
                                    @error('mulai')
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
                                    <label for="selesai">Selesai Peminjaman</label>
                                    <input type="hidden" name="id" value="{{(isset($data->id))?$data->id:''}}">
                                    <input type="date"
                                        class="form-control bg-light @error('selesai') is-invalid @enderror"
                                        id="selesai" name="selesai" placeholder="Selesai Peminjaman"
                                        value="{{(isset($data->selesai))?$data->selesai:old('selesai')}}"
                                        required>
                                    @error('selesai')
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
            @elseif(Auth::user()->role == 'approval')
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="nama_peminjam" value="{{$data->nama_peminjam}}">
            <input type="hidden" name="mulai" value="{{$data->mulai}}">
            <input type="hidden" name="selesai" value="{{$data->selesai}}">
            <input type="hidden" name="alasan_peminjaman" value="{{$data->alasan_peminjaman}}">
            <input type="hidden" name="kendaraan_id" value="{{$data->kendaraan_id}}">
            <input type="hidden" name="driver_id" value="{{$data->driver_id}}">
            <input type="hidden" name="user_id" value="{{$data->user_id}}">

            <table>
                <tr>
                    <td style="width:200px">Nama Peminjam</td>
                    <td>: {{$data->nama_peminjam}}</td>
                </tr>
                <tr>
                    <td>Kendaraan</td>
                    <td>: {{$data->kendaraan->jenis_kendaraan}} ({{$data->kendaraan->plat_kendaraan}})</td>
                </tr><tr>
                    <td>Nama Driver</td>
                    <td>: {{$data->driver->nama}}</td>
                </tr><tr>
                    <td>Mulai Peminjaman</td>
                    <td>: {{Carbon\Carbon::parse($data->mulai)->format('d M Y')}}</td>
                </tr>
                <tr>
                    <td>Selesai Peminjaman</td>
                    <td>: {{Carbon\Carbon::parse($data->selesai)->format('d M Y')}}</td>
                </tr>
                <tr>
                    <td>Alasan Peminjaman</td>
                    <td>: {{$data->alasan_peminjaman}}</td>
                </tr>
            </table>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="user_type">Status</label>
                        <div class="">
                            <select id="status"
                                class="col-md-12 form-select @error('status') is-invalid @enderror"
                                name="status" value="{{ old('status') }}" required
                                autocomplete="status" autofocus>
                                <option value="" style="display: {{isset($form)?"none":"block"}}" selected
                                    disabled hidden>Pilih Kendaraan</option>
                                <option value="Pending"
                                    {{ isset($form)? ($data->status == "Pending" ? 'selected':'unselected'):''}}>
                                    Pending</option>
                                    <option value="Accepted"
                                    {{ isset($form)? ($data->status == "Accepted" ? 'selected':'unselected'):''}}>
                                    Accepted</option>
                                    <option value="Declined"
                                    {{ isset($form)? ($data->status == "Declined" ? 'selected':'unselected'):''}}>
                                    Declined</option>
                            </select>
                            @error('kendaraan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            @endif

            <div>
                <button class="btn btn-primary btn-sm float-right text-white mr-md-1" type="submit">Save</button>
                <a href="{{ url()->previous() }}">
                    <button class="btn btn-danger btn-sm float-right text-white mr-md-1" type="button">Cancel</button>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
