<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupatens = Kabupaten::with('provinsis')->get();
        // dd($kabupatens);
        return view('kabupaten.list', compact('kabupatens'));
    }

    public function newkabupaten()
    {
        $provinsis = Provinsi::all();
        return view('kabupaten.new', compact('provinsis'));
    }

    public function newprovinsi()
    {
        return view('kabupaten.newprovinsi');
    }

    public function savenewkabupaten(Request $request)
    {
        $request->validate([
            'kabupaten' => 'required',
            'provinsi' => 'required',
        ]);

        Kabupaten::create([
            'kabupaten' => $request->kabupaten,
            'provinsi_id' => $request->provinsi,
        ]);

        return redirect()->route('kab-list');
    }

    public function savenewprovinsi(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
        ]);
        Provinsi::create([
            'provinsi' => $request->provinsi,
        ]);
        return redirect()->route('kab-list');
    }

    public function kabupatenedit($id)
    {
        $kabupaten = Kabupaten::find($id);
        $provinsi = Provinsi::all();
        // $select_provinsi = Provinsi::where('id', '=', $kabupaten->provinsi_id)->get();
        // dd($provinsi);
        return view('kabupaten.edit', compact('kabupaten', 'provinsi'));
    }

    public function kabupatensaveedit(Request $request, $id)
    {
        $kabupaten = Kabupaten::find($id);
        $kabupaten->kabupaten = $request->kabupaten;
        $kabupaten->provinsi_id = $request->provinsi;
        // ini tuu $kabupaten tu merujuk ke tabelnya yaitu                           field "provinsi_id" dari model
        // trus $request->kabupaten tuu merujuk ke name yg ada di views-nya yaitu    name = "provinsi", 
            //jd "name" nya tuu mengandung nilai yaitu                               value = "provinsi_id"
        $kabupaten->save();
        return redirect()->route('kab-list');
    }

    public function kabupatendetail($id)
    {
        $kabupaten = Kabupaten::find($id);
        $provinsis = DB::table('provinsis')
            ->join('kabupatens', 'kabupatens.provinsi_id', '=', 'provinsis.id')
            ->select('provinsis.provinsi')
            ->where('kabupatens.id', '=', $id) 
            ->get()
            ->first();

            // $query = "SELECT c.*, s.* FROM tbl_customer c JOIN tbl_stock s ON s.customer_id = c.customer_id AND c.customer_id = 1";
        // dd($provinsi);
        return view('kabupaten.detail', compact('kabupaten', 'provinsis'));
    }
    public function kabupatendelete($id)
    {
        $kabupaten = Kabupaten::find($id);
        $kabupaten->delete();
        return redirect()->route('kab-list');
    }

}
