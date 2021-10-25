@extends('layout.app')

@section('title', 'Provinsi CRUD')
<div class="center shadow w-75 p-3 mb-5 bg-white rounded fixed-center">

@section('header', 'Tambah Kabupaten')

@section('contents')
    <form action="{{ route('kabupaten-savenew') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="name" name="kabupaten">
            @error('kabupaten')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div>
            <select class="form-select form-select-md mb-3" name="prov" aria-label=".form-select-md example">
                <option readonly selected value="{{ $prov->id }}"> {{ $prov->provinsi }} </option>
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