@extends('auth.master')

@section('content')
    @include('auth.menu')
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-3">
                <a class="btn btn-primary mb-3" href="{{ route('pinjam.create') }}">Add Pinjam</a>
            </div>

            @include('pinjam.menu')

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID PINJAM</th>
                    <th>PINJAM</th>
                    <th>BATAS</th>
                    <th>KEMBALI</th>
                    <th>STATUS</th>
                    <th>NAMA SISWA</th>
                    <th>JUDUL BUKU</th>
                    <th colspan="3">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pinjam as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->id_pinjam }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tgl_pinjam)) }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tgl_batas)) }}</td>
                        <td>{{ $data->tgl_kembali == '0000-00-00' ? '-' : date('d-M-Y', strtotime($data->tgl_kembali)) }}</td>
                        <td>{{ $data->status == '0' ? 'Terpinjam' : 'Kembali' }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->judul }}</td>
                        <td><a class="btn btn-warning" href="{{ route('pinjam.edit', $data->id_pinjam) }}">Edit</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{$data->id_pinjam}}">
                                Hapus
                            </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$data->id_pinjam}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Akan Terhapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('pinjam.destroy', $data->id_pinjam) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="">
                                                <p>Data ID {{$data->id_pinjam}} Akan di Hapus!</p>
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

                        <td>
                            @if ($data->status == 0)
                                <form action="{{ route('kembali.update', $data->id_pinjam) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-primary" type="submit">Kembali</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
