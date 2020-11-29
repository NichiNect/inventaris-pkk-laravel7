<?php

namespace App\Exports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JenisExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            '#',
            'Nama Jenis',
            'Kode Jenis',
            'Keterangan',
            'Tanggal Terdaftar',
        ];
    }

    public function array(): array
    {
		$jenis_data = Jenis::orderBy('created_at','DESC')->get();
		$jenis= [];
		$no = 1;

		foreach ($jenis_data as $row) {
			$jenis[] = [
				"#" => $no,
            	'Nama Jenis' => $row->nama_jenis,
            	'Kode Jenis' => $row->kode_jenis,
                'Keterangan' => $row->keterangan,
                'Tanggal Terdaftar' => $row->created_at,
			];
			$no++;
        }
        
        return $jenis;
    }
}
