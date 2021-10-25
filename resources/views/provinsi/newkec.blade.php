@extends('layout.app')

@section('title', 'Provinsi CRUD')
<div class="center shadow w-75 p-3 mb-5 bg-white rounded fixed-center">

@section('header', 'Tambah Kecamatan')

@section('contents')
    <form action="{{ route('kecamatan-savenew') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="name" name="kecamatan">
            @error('kecamatan')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div>
            <select class="form-select form-select-md mb-3" name="kab" aria-label=".form-select-md example">
                <option selected value="{{ $kab->id }}"> {{ $kab->kabupaten }} </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('provinsi-list') }}">Back</a>
        </form>

  <div class="card-footer text-muted">
    By Ardhiya Shita
  </div>
</div>
@endsection