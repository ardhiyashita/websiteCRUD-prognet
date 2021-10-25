@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Provinsi Details')

@section('contents')
    <div class="mb-3">
        <label for="name" class="form-label">Kabupaten</label>
        <input type="text" class="form-control" id="name" name="kabupaten" value="{{ $kabupaten->kabupaten }}" readonly>
    </div>
    
    <div class="mb-3">
            <label for="name" class="form-label">Provinsi</label>
            <input type="text" class="form-control" id="name" name="provinsi" value="{{ $provinsis->provinsi }}" readonly>
                
        </div>

    <a type="button" class="btn btn-success" href="{{ route('kab-list') }}">Back</a>
@endsection
