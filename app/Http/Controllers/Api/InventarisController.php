<?php

namespace App\Http\Controllers\Api;

use App\Models\{Inventaris, Jenis};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventarisController extends Controller
{
    public function getJenis($id)
    {
        $jenis = Jenis::orderBy('created_at','DESC')->get();
	    $jenisPush = [
	    	[
	    		"id" => 0,
	    		"nama" => "-- Pilih Jenis --",
        		"item" => 0,
	    	]
	    ];

		if(count($jenis) > 0){
			foreach ($jenis as $jen) {
	    		$inventaris = Inventaris::where([
	    			"ruang_id" => $id,
	    			"jenis_id" => $jen->id])->get();
		        array_push($jenisPush, [
		        	"id" => $jen->id,
		        	"nama" => $jen->nama_jenis,
		        	"item" => count($inventaris)]);
			}
			return response()->json($jenisPush);
		}
    }

    public function getInventarisById(Request $r)
    {
        $inventaris = Inventaris::where([
            'ruang_id' => $r->ruang_id, 
            'jenis_id' => $r->jenis_id
        ])->get();
        
        return response()->json($inventaris);
    }
}
