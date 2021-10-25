@extends('layout.app')

@section('title', 'Animal CRUD')

@section('header', 'Animal lists')

@section('contents')
    <a type="button" class="mb-3 btn btn-primary" href="{{ route('animal-new') }}">Add new animal</a>
    <a type="button" class="mb-3 btn btn-primary" href="/">Back</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th class="nama_hewan" scope="col">Nama Hewan</th>
                <th class="jumlah_kaki" scope="col">Foto Hewan</th>
                <th scope="col">Jumlah Kaki</th>
                <th scope="col">Suara</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <th scope="row">{{ $loop->index + 1 + ($animals->currentPage() - 1) * 5 }}</th>
                    <td>{{ $animal->name }}</td>
                    <td>
                        <img class="img-thumbnail" alt="200px" src="{{ $animal->foto }}">
                    </td>
                    <td>{{ $animal->jumlah_kaki }}</td>
                    <td>{{ $animal->suara }}</td>
                    <td class="deskripsi">{{ Str::limit($animal->description, 100) }}</td>
                    <td>
                        <form action="{{ route('animal-delete', $animal->id) }}" method="POST">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @csrf
                                <a type="button" class="btn btn-success" href="{{ route('animal-detail', $animal->id) }}">Details</a>
                                <a type="button" class="btn btn-primary" href="{{ route('animal-edit', $animal->id) }}">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Delete</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $animals->links() }}

@endsection
