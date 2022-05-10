@extends('layouts.backend-dashboard.app')
@section('title','Data Peminjaman')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display:flex; justify-content:space-between;">
            <h2>Data Peminjaman</h2>
            @if(Auth::user()->role == 'admin')
            <a href="/tambahPeminjaman">
                <button class="btn btn-primary btn-sm text-white mr-md-1" type="button">+ Tambah Data</button>
            </a>
            @endif
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Peminjaman</th>
                    <th class="text-center">Kendaraan</th>
                    <th class="text-center">Nama Pengemudi</th>
                    <th class="text-center">Nama Approval</th>
                    <th class="text-center">Mulai Peminjaman</th>
                    <th class="text-center">Selesai Peminjaman</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->nama_peminjam}}</td>
                    <td>{{$item->kendaraan->jenis_kendaraan}} ({{$item->kendaraan->plat_kendaraan}})</td>
                    <td>{{$item->driver->nama}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{Carbon\Carbon::parse($item->mulai)->format('d M Y')}}</td>
                    <td>{{Carbon\Carbon::parse($item->selesai)->format('d M Y')}}</td>
                    <td>{{$item->status}}</td>
                    {{-- <td>{{$item->jabatan}}</td>
                    <td>{{$item->nip}}</td> --}}
                    {{-- <td class="text-center"><img src="{{url('/images/data-pegawai/'.$item->images)}}"
                    height="50" width="50"></td>
                    <td class="text-center">{{Carbon\Carbon::parse($item->updated_at)->format('d M Y')}}</td> --}}
                    <td class="text-center">
                        @if(Auth::user()->role == 'approval')
                        <a class="btn btn-success ml-1"
                        href="{{route('editPeminjaman',$item->id)}}">Detail Data</a>
                        @elseif(Auth::user()->role == 'admin')
                        <a class="btn btn-success ml-1"
                        href="{{route('editPeminjaman',$item->id)}}">Edit Data</a>
                        <a class="btn btn-danger ml-1"
                        href="{{route('hapusPeminjaman',$item->id)}}">Hapus Data</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
