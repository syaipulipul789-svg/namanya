<?php
namespace App\Http\Controllers;

use App\Models\LaporanWarga;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $laporans = LaporanWarga::latest()->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'isi_laporan' => 'required',
            'kategori' => 'required',
            'nama_pelapor' => 'required',
            'no_hp' => 'required',
        ]);

        LaporanWarga::create($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim');
    }
}
