@extends('auth.master')

@section('content')
    @include('auth.menu')
    <div class="container mt-2">
        <div class="row">

            @include('pinjam.menu')

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID BUKU</th>
                    <th>JUDUL BUKU</th>
                    <th>ISBN</th>
                    <th>PENGARANG</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pinjam as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->id_buku }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->isbn }}</td>
                            <td>{{ $data->pengarang }}</td>
                            <td>{{ $data->status == 1 ? 'TERSEDIA' : '' }}</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection
