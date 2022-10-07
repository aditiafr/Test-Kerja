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
                    <th>ID PINJAM</th>
                    <th>NAMA SISWA</th>
                    <th>JUDUL BUKU</th>
                    <th>PINJAM</th>
                    <th>BATAS</th>
                    <th>DENDA</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pinjam as $data)
                    @php
                        $date = date('Y-m-d');

                        $lasttgl = date('Y-m-d', strtotime($data->tgl_batas));

                        $tgl1 = new DateTime("$data->tgl_batas");
                        $tgl2 = new DateTime("$date");
                        $d = $tgl2->diff($tgl1)->days;
                        $denda = $d * 5000;
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->id_pinjam }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tgl_pinjam)) }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tgl_batas)) }}</td>
                        @if ($data->tgl_batas < $date)
                        <td>Rp {{ number_format($denda, 0, ".", ".") }}</td>
                        @else
                        <td>Rp 0</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
