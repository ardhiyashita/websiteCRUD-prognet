@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Kabupaten Lists')

@section('contents')
    <a type="button" class="mb-3 btn btn-success" href="{{ route('kabupaten-new', $provinsi->id) }}">Tambah Kabupaten</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th class="provinsi" scope="col">Nama Provinsi</th>
                <th class="kabupaten" scope="col">List Kabupaten</th>
                <th class="kabupaten" scope="col">List Kecamatan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kabupaten as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1}}</th>
                    @if($loop->index < 1)
                        <td>{{ $provinsi->provinsi }}</td>
                    @endif
                    @if($loop->index >= 1)
                        <td></td>
                    @endif
                    <td>{{ $item->kabupaten }}</td>
                    <td>
                        <a type="button" class="btn btn-success" href="{{ route('provinsi-detail-kec', $item->id) }}">Kecamatan</a>
                    </td>
                    <td>
                        <form action="{{ route('kabupaten-delete', $item->id) }}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-primary" href="{{ route('kabupaten-edit', $item->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('provinsi-list') }}">Back to Main</a>
@endsection
