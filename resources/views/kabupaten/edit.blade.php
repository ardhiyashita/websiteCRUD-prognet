@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Edit Provinsi')

@section('contents')
    <form action="{{ route('kab-saveedit', $kabupaten->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Kabupaten</label>
            <input type="text" class="form-control" id="name" name="kabupaten" value="{{$kabupaten->kabupaten}}">
            @error('kabupaten')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Provinsi</label>
                <select class="form-select form-select-md mb-3" name="provinsi" aria-label=".form-select-md example">
                    
                        @foreach( $provinsi as $item)
                            <option value="{{ $item->id }}"> {{ $item->provinsi }} </option>
                        @endforeach
                </select>
                @error('provinsi')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a type="button" class="btn btn-success" href="{{ route('kab-list') }}">Back</a>
    </form>
@endsection
