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
                        <th>NAMA SISWA</th>
                        <th>JUMLAH BUKU</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pinjam as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jumlah }} Buku</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
