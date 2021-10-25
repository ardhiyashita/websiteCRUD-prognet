@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Edit Kecamatan')

@section('contents')
    <form action="{{ route('kecamatan-saveedit', $kecamatan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kecamatan</label>
            <input type="text" class="form-control" id="name" name="kecamatan" value="{{$kecamatan->kecamatan}}">
            @error('kecamatan')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('provinsi-list') }}">Back</a>
    </form>
@endsection
