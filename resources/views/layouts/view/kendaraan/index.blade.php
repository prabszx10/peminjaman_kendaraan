@extends('layouts.backend-dashboard.app')
@section('title','Data Kendaraan')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex; justify-content:space-between;">
            <h2>Data Kendaraan</h2>
            <a href="/tambahKendaraan">
                <button class="btn btn-primary btn-sm text-white mr-md-1" type="button">+ Tambah Data</button>
            </a>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jenis Kendaraan</th>
                    <th class="text-center">Plat Kendaraan</th>
                    <th class="text-center">Jadwal Service</th>
                    <th class="text-center">Sisa BBM</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kendaraan as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->jenis_kendaraan}}</td>
                    <td>{{$item->plat_kendaraan}}</td>
                    <td>{{$item->sisa_bbm}}</td>
                    <td>{{Carbon\Carbon::parse($item->jadwal_service)->format('d M Y')}}</td>
                    <td>{{$item->status}}</td>
                    {{-- <td>{{$item->jabatan}}</td>
                    <td>{{$item->nip}}</td> --}}
                    {{-- <td class="text-center"><img src="{{url('/images/data-pegawai/'.$item->images)}}"
                    height="50" width="50"></td>
                    <td class="text-center">{{Carbon\Carbon::parse($item->updated_at)->format('d M Y')}}</td> --}}
                    <td class="text-center">
                        <a class="btn btn-success ml-1"
                            href="{{route('editKendaraan',$item->id)}}">Edit Data</a>
                        <a class="btn btn-danger ml-1"
                            href="{{route('hapusKendaraan',$item->id)}}">Hapus Data</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
