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
                        <td>{{ $data->tgl_kembali == 0 ? '-' : date('d-M-Y', strtotime($data->tgl_kembali)) }}</td>
                        <td>{{ $data->status == '0' ? 'Terpinjam' : 'Kembali' }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->judul }}</td>
                        <td><a class="btn btn-warning" href="{{ route('pinjam.edit', $data->id_pinjam) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('pinjam.destroy', $data->id_pinjam) }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Hapus">
                            </form>
                        </td>
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
