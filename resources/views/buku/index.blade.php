@extends('auth.master')

@section('content')
    @include('auth.menu')
    <div class="container mt-2">

        <a class="btn btn-primary mb-3" href="{{ route('buku.create') }}">Add Buku</a>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID BUKU</th>
                    <th>JUDUL</th>
                    <th>ISBN</th>
                    <th>PENGARANG</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($buku as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->id_buku }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->isbn }}</td>
                        <td>{{ $data->pengarang }}</td>
                        <td><a class="btn btn-warning" href="{{ route('buku.edit', $data->id_buku) }}">Edit</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $data->id_buku }}">
                                Hapus
                            </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $data->id_buku }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Akan Terhapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('buku.destroy', $data->id_buku) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="">
                                                <p>Data ID Buku <b>{{ $data->id_buku }}</b> Dengan Judul <b>{{ $data->judul }}</b> Akan di Hapus!</p>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
