<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class GenerateLaporanController extends Controller
{
    public function all()
    {
        $aduans = Pengaduan::with('tanggapan.petugas','masyarakat')->get();
        // return $aduans;
        return view('generate_laporan.all',[
            'aduans' => $aduans
        ]);
    }

    public function tolak()
    {
        $aduans = Pengaduan::where('status', '0')->with('tanggapan.petugas','masyarakat')->get();
        // return $aduans;
        return view('generate_laporan.tolak',[
            'aduans' => $aduans
        ]);
    }

    public function proses()
    {
        $aduans = Pengaduan::where('status', 'proses')->with('tanggapan.petugas','masyarakat')->get();
        // return $aduans;
        return view('generate_laporan.proses',[
            'aduans' => $aduans
        ]);
    }

    public function terima()
    {
        $aduans = Pengaduan::where('status', 'selesai')->with('tanggapan.petugas','masyarakat')->get();
        // return $aduans;
        return view('generate_laporan.terima',[
            'aduans' => $aduans
        ]);
    }
    public function cetak_pdf_all()
    {
        $aduans = Pengaduan::with('tanggapan.petugas','masyarakat')->get();

        $pdf = PDF::loadview('laporan_pdf.laporan_pdf',[
            'aduans' => $aduans
        ]);
        return $pdf->download('laporan-all.pdf');
    }

    public function cetak_pdf_tolak()
    {
        $aduans = Pengaduan::where('status', '0')->with('tanggapan.petugas','masyarakat')->get();

        $pdf = PDF::loadview('laporan_pdf.laporan_pdf',[
            'aduans' => $aduans
        ]);
        return $pdf->download('laporan-tolak.pdf');
    }

    public function cetak_pdf_terima()
    {
        $aduans = Pengaduan::where('status', 'selesai')->with('tanggapan.petugas','masyarakat')->get();

        $pdf = PDF::loadview('laporan_pdf.laporan_pdf',[
            'aduans' => $aduans
        ]);
        return $pdf->download('laporan-terima.pdf');
    }

    public function cetak_pdf_proses()
    {
        $aduans = Pengaduan::where('status', 'proses')->with('tanggapan.petugas','masyarakat')->get();

        $pdf = PDF::loadview('laporan_pdf.laporan_pdf',[
            'aduans' => $aduans
        ]);
        return $pdf->download('laporan-proses.pdf');
    }

    public function cetak_pdf_select($id)
    {
        $aduan = Pengaduan::find($id)->load('tanggapan.petugas','masyarakat');

        $pdf = PDF::loadview('laporan_pdf.laporan_select_pdf',[
            'aduan' => $aduan
        ]);
        return $pdf->download('laporan-id-' . $aduan->id . '.pdf');
    }
}
