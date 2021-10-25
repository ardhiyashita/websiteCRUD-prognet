<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{

    // ===================== LIST ===================== //

    public function index()
    {
        $provinsi = Provinsi::paginate(10);
        Paginator::useBootstrap();
        return view('provinsi.list', compact('provinsi'));
        // $kabupatens = Kabupaten::with('provinsis')->paginate(5);
        // Paginator::useBootstrap();
        // return view('kabupaten.list', compact('kabupatens',));
    }

    public function provinsidetailkab($id)
    {
        $provinsi = Provinsi::find($id);
        $kabupaten = Kabupaten::where('provinsi_id', '=', $id)->get();
        return view('provinsi.detailkab', compact('provinsi', 'kabupaten'));
    }

    public function provinsidetailkec($id)
    {
        $kabupaten = Kabupaten::find($id);
        $kecamatan = Kecamatan::where('kabupaten_id', '=', $id)->get();
        return view('provinsi.detailkec', compact('kecamatan', 'kabupaten'));
    }


    // ===================== ADD NEW ===================== //

    public function newprovinsi()
    {
        return view('provinsi.newprov');
    }
    
    public function savenewprovinsi(Request $request)
    {
        $request->validate([
            'provinsi' => 'required',
        ]);
        Provinsi::create([
            'provinsi' => $request->provinsi,
        ]);
        return redirect()->route('provinsi-list');
    }


    public function newkabupaten($id)
    {
        // $kab = Kabupaten::find($id);
        // $prov = Kabupaten::where('provinsi_id', '=', $id)->get();
        $prov = Provinsi::where('id', '=', $id)->first();
        return view('provinsi.newkab', compact('prov'));
    }

    public function savenewkabupaten(Request $request)
    {
        $request->validate([
            'kabupaten' => 'required',
            'prov' => 'required',
        ]);

        Kabupaten::create([
            'kabupaten' => $request->kabupaten,
            'provinsi_id' => $request->prov,
        ]);

        return redirect()->route('provinsi-list');
    }

    public function newkecamatan($id)
    {
        // $kab = Kabupaten::find($id);
        // $prov = Kabupaten::where('provinsi_id', '=', $id)->get();
        $kab = Kabupaten::where('id', '=', $id)->first();
        return view('provinsi.newkec', compact('kab'));
    }

    public function savenewkecamatan(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required',
            'kab' => 'required',
        ]);

        Kecamatan::create([
            'kecamatan' => $request->kecamatan,
            'kabupaten_id' => $request->kab,
        ]);

        return redirect()->route('provinsi-list');
    }
    
    // ===================== EDITING ===================== //

    public function provinsiedit($id)
    {
        $provinsi = Provinsi::find($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function provinsisaveedit(Request $request, $id)
    {
        $request->validate([
            'provinsi' => 'required',
        ]);
        // POKOKNYA REQUEST ITU NAME-NYA YANG DIMINTA // NAME ITU PUNYA NILAI YAITU 'VALUE = ...'
        $provinsi = Provinsi::find($id);
        $provinsi->provinsi = $request->provinsi;
        // ini tuu $kabupaten tu merujuk ke tabelnya yaitu                           field "provinsi_id" dari model
        // trus $request->kabupaten tuu merujuk ke name yg ada di views-nya yaitu    name = "provinsi", 
            //jd "name" nya tuu mengandung nilai yaitu                               value = "provinsi_id"
        $provinsi->save();
        return redirect()->route('provinsi-list');
    }

    public function kabupatenedit($id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('provinsi.editkab', compact('kabupaten'));
    }

    public function kabupatensaveedit(Request $request, $id)
    {
        $request->validate([
            'kabupaten' => 'required',
        ]);
        $kabupaten = Kabupaten::find($id);
        $kabupaten->kabupaten = $request->kabupaten;
        $kabupaten->save();
        return redirect()->route('provinsi-list');
    }

    public function kecamatanedit($id)
    {
        $kecamatan = Kecamatan::find($id);
        return view('provinsi.editkec', compact('kecamatan'));
    }

    public function kecamatansaveedit(Request $request, $id)
    {
        $request->validate([
            'kecamatan' => 'required',
        ]);
        $kecamatan = Kecamatan::find($id);
        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->save();
        return redirect()->route('provinsi-list');
    }


    // ===================== DELETE ==========================//

    public function provinsidelete($id)
    {
        $provinsi = Provinsi::find($id);
        $provinsi->delete();
        return redirect()->route('provinsi-list');
    }

    public function kabupatendelete($id)
    {
        $kabupaten = Kabupaten::find($id);
        $kabupaten->delete();
        return redirect()->route('provinsi-list');
    }

    public function kecamatandelete($id)
    {
        $kecamatan = Kecamatan::find($id);
        $kecamatan->delete();
        return redirect()->route('provinsi-list');
    }
}
