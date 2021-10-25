@extends('layout.app')

@section('title', 'Provinsi CRUD')

@section('header', 'Provinsi Lists')

@section('contents')
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('provinsi-new') }}">Tambah Provinsi</a>
    <a type="button" class="mb-3 btn btn-primary" href="/">Back</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th class="provinsi" scope="col">Nama Provinsi</th>
                <th class="kabupaten" scope="col">List Kabupaten</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($provinsi as $item)
                <tr>
                <th scope="row">{{ $loop->index + 1 + ($provinsi->currentPage() - 1) * 5 }}</th>
                    <td>{{ $item->provinsi }}</td>
                    <td>
                        <a type="button" class="btn btn-success" href="{{ route('provinsi-detail-kab', $item->id) }}">Kabupaten</a>
                    </td>
                    <td>
                        <form action="{{ route('provinsi-delete', $item->id) }}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-primary" href="{{ route('provinsi-edit', $item->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
       {{ $provinsi->links() }}

@endsection
