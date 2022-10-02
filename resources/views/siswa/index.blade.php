@extends('auth.master')

@section('content')
    @include('auth.menu')
    <div class="container mt-2">
        <a class="btn btn-primary mb-3" href="{{ url('siswa/create') }}">Add Siswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tgl_lahir }}</td>
                        <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td><a class="btn btn-warning" href="siswa/{{ $data->nis }}/edit">Edit</a></td>
                        <td>
                            <form action="{{ url('siswa', $data->nis) }}" method="POST">
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
