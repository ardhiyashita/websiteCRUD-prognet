<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function first()
    {
        return view('first');
    }

    public function index()
    {
        $animals = Animal::where('is_delete', '=', 0)->paginate(5);
        Paginator::useBootstrap();
        return view('animal.list', compact('animals'));
    }

    public function newanimal()
    {
        $animal_options_jumlah_kaki = Animal::getPossibleEnumValues('jumlah_kaki');
        $animal_options_suara = Animal::getPossibleEnumValues('suara');
        return view('animal.new', compact('animal_options_jumlah_kaki', 'animal_options_suara'));
    }

    public function savenewanimal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg',
            'usia' => 'required',
            'jumlah_kaki' => 'required',
            'suara' => 'required',
            'description' => 'required',
        ]);
        if ($request->file('foto')) {
            $gambar = $request->file('foto');
            $destinationPath = 'img/';
            $filename = $destinationPath."/".$gambar->getClientOriginalName();
            $gambar->move($destinationPath, $filename);
            $urlgambar = $filename;
        }
        Animal::create([
            'name' => $request->name,
            'usia' => $request->usia,
            'foto' => $urlgambar,
            'jumlah_kaki' => $request->jumlah_kaki,
            'suara' => $request->suara,
            'description' => $request->description,
        ]);
        return redirect()->route('animal-list');
        
    }

    public function animaldetail($id)
    {
        $animal_options_jumlah_kaki = Animal::getPossibleEnumValues('jumlah_kaki');
        $animal_options_suara = Animal::getPossibleEnumValues('suara');
        $animal = Animal::find($id);
        return view('animal.detail', compact('animal', 'animal_options_jumlah_kaki', 'animal_options_suara'));
    }

    public function animaledit($id)
    {
        $animal_options_jumlah_kaki = Animal::getPossibleEnumValues('jumlah_kaki');
        $animal_options_suara = Animal::getPossibleEnumValues('suara');
        $animal = Animal::find($id);
        return view('animal.edit', compact('animal', 'animal_options_jumlah_kaki', 'animal_options_suara'));
    }

    public function saveedit(Request $request, $id)
    {

        $animal = Animal::find($id);
        $path = $animal->foto;
        // if ($animal->foto) {
        //     unlink($path);
        // }
        if ($request->hasfile('foto')) {
            unlink($path);
            $gambar = $request->file('foto');
            $destinationPath = 'img/';
            $filename = $destinationPath."/".$gambar->getClientOriginalName();
            $gambar->move($destinationPath, $filename);
            $path = $filename;
        }
        $animal->foto = $path;
        $animal->name = $request->name;
        $animal->usia = $request->usia;
        $animal->description = $request->description;
        $animal->save();
        return redirect()->route('animal-list');
    }

    public function deleteanimal($id)
    {
        $animal = Animal::find($id);
        $animal->is_delete = 1;
        $animal->save();
        return redirect()->route('animal-list');
    }
}