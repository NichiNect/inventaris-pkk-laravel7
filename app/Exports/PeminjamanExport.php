<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeminjamanExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Peminjam',
            'Status Pinjam',
        ];
    }

    public function array(): array
    {
        $peminjamanData = Peminjaman::orderBy('created_at', 'DESC')->get();
        $peminjaman = [];
        $status;
        $no = 1;

        foreach($peminjamanData as $row) {
            if ($row->status_peminjaman == 0) {
                $status = "Request Peminjaman Belum di ACC";
            } elseif($row->status_peminjaman == 1) {
                $status = "Peminjaman telah di ACC";
            } elseif($row->status_peminjaman == 2) {
                $status = "Request Kembali";
            } elseif($row->status_peminjaman == 3) {
                $status = "Dikembalikan";
            }

            $peminjaman[] = [
                '#' => $no,
                'Tanggal Pinjam' => $row->tanggal_pinjam,
                'Tanggal Kembali' => $row->tanggal_kembali,
                'Peminjam' => $row->pegawai->nama_pegawai,
                'Status Pinjam' => $status,
            ];
            $no++;
        }

        return $peminjaman;
    }
}
