@extends('layouts.backend-dashboard.app')
@section('title','Data Driver')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex; justify-content:space-between;">
            <h2>Data Driver</h2>
            <a href="/tambahDriver">
                <button class="btn btn-primary btn-sm text-white mr-md-1" type="button">+ Tambah Data</button>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($driver as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->usia}}</td>
                    <td>{{$item->alamat}}</td>
                    {{-- <td>{{$item->jabatan}}</td>
                    <td>{{$item->nip}}</td> --}}
                    {{-- <td class="text-center"><img src="{{url('/images/data-pegawai/'.$item->images)}}"
                    height="50" width="50"></td>
                    <td class="text-center">{{Carbon\Carbon::parse($item->updated_at)->format('d M Y')}}</td> --}}
                    <td class="text-center">
                        <a class="btn btn-success ml-1" href="{{route('editDriver',$item->id)}}">Edit Data</a>
                        <a class="btn btn-danger ml-1" href="{{route('hapusDriver',$item->id)}}">Hapus Data</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
