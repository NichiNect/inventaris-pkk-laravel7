<?php

namespace App\Exports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventarisExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Nama Inventaris',
            'Kondisi',
            'Keterangan',
            'Jumlah Tersedia',
            'Tanggal Register',
            'Kode Inventaris',
            'Jenis',
            'Ruang',
            'Penanggung Jawab',
        ];
    }

    public function array(): array
    {
        $inventarisData = Inventaris::orderBy('created_at', 'DESC')->get();
        $inventaris = [];
        $no = 1;

        foreach($inventarisData as $row) {
            $inventaris[] = [
                '#' => $no,
                'Nama Inventaris' => $row->nama,
                'Kondisi' => $row->kondisi,
                'Keterangan' => $row->keterangan,
                'Jumlah Tersedia' => $row->jumlah,
                'Tanggal Register' => $row->tanggal_register,
                'Kode Inventaris' => $row->kode_inventaris,
                'Jenis' => $row->jenis->nama_jenis,
                'Ruang' => $row->ruang->nama_ruang,
                'Penanggung Jawab' => $row->petugas->nama_petugas,
            ];
            $no++;
        }

        return $inventaris;
    }
}
