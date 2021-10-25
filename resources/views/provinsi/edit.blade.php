@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Edit Provinsi')

@section('contents')
    <form action="{{ route('provinsi-saveedit', $provinsi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Provinsi</label>
            <input type="text" class="form-control" id="name" name="provinsi" value="{{$provinsi->provinsi}}">
            @error('provinsi')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('provinsi-list') }}">Back</a>
    </form>
@endsection
