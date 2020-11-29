<?php

namespace App\Exports;

use App\Models\Ruang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RuangExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Nama Ruang',
            'Kode Ruang',
            'Keterangan',
            'Tanggal Terdaftar',
        ];
    }

    public function array(): array
    {
        $ruangData = Ruang::orderBy('created_at','DESC')->get();
        $ruang = [];
        $no = 1;

        foreach($ruangData as $row) {
            $ruang[] = [
                '#' => $no,
                'Nama Ruang' => $row->nama_ruang,
                'Kode Ruang' => $row->kode_ruang,
                'Keterangan' => ucwords($row->keterangan),
                'Tanggal Terdaftar' => $row->created_at,
            ];
            $no++;
        }

        return $ruang;
    }

}
