@extends('auth.master')

@section('content')

    @include('auth.menu')
    <div class="container mt-2">

        <a class="btn btn-primary mb-3" href="{{ route('buku.create') }}">Add Buku</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>JUDUL</th>
                    <th>ISBN</th>
                    <th>PENGARANG</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $data)
                    <tr>
                        <td>{{ $data->id_buku }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->isbn }}</td>
                        <td>{{ $data->pengarang }}</td>
                        <td><a class="btn btn-warning" href="{{ route('edit.buku', $data->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Hapus">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
