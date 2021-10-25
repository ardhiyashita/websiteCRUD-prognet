@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Kecamatan Lists')

@section('contents')
    <a type="button" class="mb-3 btn btn-success" href="{{ route('kecamatan-new', $kabupaten->id) }}">Tambah Kecamatan</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th class="kabupaten" scope="col">Nama Kabupaten</th>
                <th class="kecamatan" scope="col">List Kecamatan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kecamatan as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1}}</th>
                    @if($loop->index < 1)
                        <td>{{ $kabupaten->kabupaten }}</td>
                    @endif
                    @if($loop->index >= 1)
                        <td></td>
                    @endif
                    <td>{{ $item->kecamatan }}</td>
                    <td>
                        <form action="{{ route('kecamatan-delete', $item->id) }}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-primary" href="{{ route('kecamatan-edit', $item->id) }}">Edit</a>
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
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('provinsi-detail-kab', $kabupaten->provinsi_id) }}">Previous</a>
@endsection
