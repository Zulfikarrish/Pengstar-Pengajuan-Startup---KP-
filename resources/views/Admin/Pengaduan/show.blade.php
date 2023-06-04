@extends('layouts.admin')

@section('title', 'Detail Pengaduan')
    
@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #6c757d;
        }

        .text-grey:hover {
            color: #6c757d;
        }

        .btn-purple {
            background: #6a70fc;
            border: 1px solid #6a70fc;
            color: #fff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
    <a href="{{ route('pengaduan.index') }}" class="text-primary">Data Pengajuan Startup</a>
    <a href="#" class="text-grey">/</a>
    <a href="#" class="text-grey">Detail Pengaduan</a>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Pengajuan Startup
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td>{{ $pengaduan->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Startup</th>
                                <td>:</td>
                                <td>{{ $pengaduan->user->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pengaduan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->tgl_pengaduan->format('d-M-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Foto Startup/UMKM Bisnis</th>
                                <td>:</td>
                                <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive"></td>
                            </tr>
                            <tr>
                                <th>Nama Startup</th>
                                <td>:</td>
                                <td>{{ $pengaduan->judul_laporan }}</td>
                            <tr>
                                <th>Deskripsi Startup</th>
                                <td>:</td>
                                <td>{{ $pengaduan->isi_laporan }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Start</th>
                                <td>:</td>
                                <td>{{ ucwords($pengaduan->kategori_kejadian) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>
                                    @if ($pengaduan->status == '0')
                                        <a href="" class="badge badge-warning text-white">Sedang Diproses</a>
                                    @elseif($pengaduan->status == 'gagal')
                                        <a href="" class="badge badge-danger">Gagal Seleksi</a>
                                    @else
                                        <a href="" class="badge badge-success">Lulus Seleksi</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Harapan pendaftar Untuk Startupnya Kedepan</th>
                                <td>:</td>
                                <td>{{ $pengaduan->lokasi_kejadian }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="text-center">
                        Tanggapan Admin
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="input-group mb-3">
                                <select name="status" id="status" class="custom-select">
                                    @if ($pengaduan->status == '0')
                                        <option selected value="0">Sedang Diproses</option>
                                        <option value="gagal">Gagal Seleksi</option>
                                        <option value="lulus">Lulus Seleksi</option>
                                    @elseif($pengaduan->status == 'gagal')
                                        <option value="0">Sedang Diproses</option>
                                        <option selected value="gagal">Gagal Seleksi</option>
                                        <option value="lulus">Lulus Seleksi</option>
                                    @else
                                        <option value="0">Sedang Diproses</option>
                                        <option value="gagal">Gagal Seleksi</option>
                                        <option selected value="lulus">Lulus Seleksi</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-purple">KIRIM</button>
                    </form>
                    @if (Session::has('status'))
                        <div class="alert alert-success mt-2">
                            {{ Session::get('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection