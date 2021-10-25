@extends('layout.app')

@section('title', 'Kabupaten CRUD')

@section('header', 'Kabupaten lists')

@section('contents')
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('kab-new') }}">Tambah Kabupaten</a>
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('prov-new') }}">Tambah Provinsi</a>
    <a type="button" class="mb-3 btn btn-primary" href="/">Back</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th class="kabupaten" scope="col">Nama Kabupaten</th>
                <th class="provinsi_id" scope="col">Nama Provinsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kabupatens as $item)
                <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $item->kabupaten }}</td>
                    <td>{{ $item->provinsis['provinsi'] }}</td>
                    <td>
                        <form action="{{ route('kab-delete', $item->id) }}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-success" href="{{ route('kab-detail', $item->id) }}">Details</a>
                                <a type="button" class="btn btn-primary" href="{{ route('kab-edit', $item->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
