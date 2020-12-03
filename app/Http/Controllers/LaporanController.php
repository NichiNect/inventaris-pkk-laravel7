<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\{Peminjaman, Inventaris, Jenis, Ruang};
use App\Exports\{PeminjamanExport, InventarisExport, JenisExport, RuangExport};
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin');
        return view('admin.laporan.index');
    }

    /**
     * Method cetak laporan `peminjaman` PDF
     */
    public function exportPeminjamanPDF()
    {
        $this->authorize('isAdmin');
        $peminjaman = Peminjaman::orderBy('created_at','DESC')->get();
        $pdf = PDF::loadView('admin.laporan.export-peminjaman-pdf', compact('peminjaman'));
        return $pdf->download(date('d-m-Y', time()) . '-peminjaman-' . time() . '.pdf');
    }

    /**
     * Method cetak laporan `peminjaman` Excel
     */
    public function exportPeminjamanExcel()
    {
        $this->authorize('isAdmin');
        return Excel::download(new PeminjamanExport, date('d-m-Y', time()) . '-peminjaman-' . time() . '.xlsx');
    }

    /**
     * Method cetak laporan `inventaris` PDF
     */
    public function exportInventarisPDF()
    {
        $this->authorize('isAdmin');
        $inventaris = Inventaris::orderBy('created_at','DESC')->get();
        $pdf = PDF::loadView('admin.laporan.export-inventaris-pdf', compact('inventaris'));
        return $pdf->download(date('d-m-Y', time()) . '-inventaris-' . time() . '.pdf');
    }

    /**
     * Method cetak laporan `inventaris` Excel
     */
    public function exportInventarisExcel()
    {
        $this->authorize('isAdmin');
        return Excel::download(new InventarisExport, date('d-m-Y', time()) . '-inventaris-' . time() . '.xlsx');
    }

    /**
     * Method cetak laporan `jenis` PDF
     */
    public function exportJenisPDF()
    {
        $this->authorize('isAdmin');
        $jenis = Jenis::orderBy('created_at','DESC')->get();
        $pdf = PDF::loadView('admin.laporan.export-jenis-pdf', compact('jenis'));
        return $pdf->download(date('d-m-Y', time()) . '-jenis-' . time() . '.pdf');
    }

    /**
     * Method cetak laporan `jenis` Excel
     */
    public function exportJenisExcel()
    {
        $this->authorize('isAdmin');
        return Excel::download(new JenisExport, date('d-m-Y', time()) . '-jenis-' . time() . '.xlsx');
    }

    /**
     * Method cetak laporan `ruang` PDF
     */
    public function exportRuangPDF()
    {
        $this->authorize('isAdmin');
        $ruang = Ruang::orderBy('created_at','DESC')->get();
        $pdf = PDF::loadView('admin.laporan.export-ruang-pdf', compact('ruang'));
        return $pdf->download(date('d-m-Y', time()) . '-ruang-' . time() . '.pdf');
    }

    /**
     * Method cetak laporan `ruang` Excel
     */
    public function exportRuangExcel()
    {
        $this->authorize('isAdmin');
        return Excel::download(new RuangExport, date('d-m-Y', time()) . '-ruang-' . time() . '.xlsx');
    }
}
