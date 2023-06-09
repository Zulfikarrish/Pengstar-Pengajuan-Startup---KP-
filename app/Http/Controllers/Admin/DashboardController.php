<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $masyarakat = Masyarakat::all()->count();

        $gagal = Pengaduan::where('status', 'gagal')->get()->count();

        $lulus = Pengaduan::where('status', 'lulus')->get()->count();

        return view('Admin.Dashboard.index', ['petugas' => $petugas, 'masyarakat' => $masyarakat, 'gagal' => $gagal, 'lulus' => $lulus]);
    }
}
