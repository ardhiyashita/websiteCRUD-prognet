@extends('layout.app')

@section('title', 'Animal CRUD')
<div class="center shadow w-75 p-3 mb-5 bg-white rounded fixed-center">

@section('header', 'Add new animal')

@section('contents')
    <form action="{{ route('animal-savenew') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Hewan</label>
            <input type="text" class="form-control" id="name" name="name">
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="usia" class="form-label">Usia</label>
            <input type="number" class="form-control" id="usia" name="usia">
            @error('usia')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3 input-group">
            <label for="inputGroupFile02" class="form-label">Foto Hewan</label>
            <div class="mb-3 input-group">
                <input name="foto" type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            @error('foto')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Jumlah Kaki</label>
            @foreach ($animal_options_jumlah_kaki as $item)
                <div class="form-check">
                    <input value="{{ $item }}" class="form-check-input" type="radio" id="{{ $item }}"
                        name="jumlah_kaki">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('jumlah_kaki')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Suara</label>
            @foreach ($animal_options_suara as $item)
                <div class="form-check">
                    <input value="{{ $item }}" class="form-check-input" type="radio" id="{{ $item }}"
                        name="suara">
                    <label class="form-check-label" for="{{ $item }}">
                        {{ $item }}
                    </label>
                </div>
            @endforeach
            @error('suara')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="10"></textarea>
            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('animal-list') }}">Back</a>
        </form>

  <div class="card-footer text-muted">
    By Ardhiya Shita
  </div>
</div>
@endsection
