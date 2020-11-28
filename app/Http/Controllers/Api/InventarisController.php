<?php

namespace App\Http\Controllers\Api;

use App\Models\{Inventaris, Jenis};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventarisController extends Controller
{
    public function getInventarisById(Request $r)
    {
        $inventaris = Inventaris::where([
            'ruang_id' => $r->ruang_id, 
            'jenis_id' => $r->jenis_id
		])->get();
		
		$response = [];
        foreach($inventaris as $inv) {
            $response[] = [
                "id" => $inv->id,
                "jumlah" => $inv->jumlah,
                "text" => ucwords($inv->nama . " - (" . $inv->jumlah . " Unit )"),
            ];
        }
        
        return response()->json($response);
    }
}
