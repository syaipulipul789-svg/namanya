<?php
namespace App\Http\Controllers;

use App\Models\LaporanWarga;
use App\Models\Report;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'bukti' => 'nullable|file|mimes:png, jpg',
        ]);
        if ($request->hasFile('bukti')){
            $file = $request->file('bukti');
            $name = Str::random(12);
            $extension = $file->getClientOriginalExtension();
            $namabukti = $name.'.'.$extension;
            $path = $request->file('bukti')->storeAs(
                'bukti', $namabukti
            );
            $data['bukti']=$path;
        }
        LaporanWarga::create($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim');
    }

    public function edit($id)
    {
        $laporan = LaporanWarga::find($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanWarga::find($id);
        $data = $request->validate([
            'judul' => 'nullable',
            'isi_laporan' => 'nullable',
            'kategori' => 'nullable',
            'nama_pelapor' => 'nullable',
            'no_hp' => 'nullable',
            'bukti' => 'nullable|file|mimes:png, jpg',
            'status' => 'nullable|in:proses,selesai,ditolak'
        ]);
        if ($request->hasFile('bukti')){
            $file = $request->file('bukti');
            if(Storage::disk('public')->exists($laporan->bukti)){
                Storage::disk('public')->delete($laporan->bukti);
            }
            $name = Str::random(12);
            $extension = $file->getClientOriginalExtension();
            $namabukti = $name.'.'.$extension;
            $path = $request->file('bukti')->storeAs(
                'bukti', $namabukti
            );
            $data['bukti'] = $path;
            $laporan->update($data);

        }
        $laporan->update($data);

        return redirect()->route('laporan.index')
            ->with('success', 'Laporan berhasil dikirim');
    }
}
