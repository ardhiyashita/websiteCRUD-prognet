@extends('layout.app')

@section('title', 'Website CRUD')
<div class="center shadow w-75 p-3 mb-5 bg-white rounded fixed-center">

@section('header', 'Website CRUD')

@section('contents')
    <div class="mb-3">
        <a type="button" class="btn btn-primary btn-lg w-100" href="{{ route('animal-list') }}">Animal CRUD</a>
    </div>    
    <div class="mb-3">
        <a type="button" class="btn btn-secondary btn-lg w-100" href="{{ route('kab-list') }}">Kabupaten CRUD</a>
    </div>
    <div class="mb-3">
        <a type="button" class="btn btn-success btn-lg w-100" href="{{ route('provinsi-list') }}">Provinsi CRUD</a>
    </div>
    <div class="card-footer text-muted">
    By Ardhiya Shita
  </div>
@endsection
