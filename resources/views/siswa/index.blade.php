@extends('auth.master')

@section('content')
    @include('auth.menu')
    <div class="container mt-2">
        <a class="btn btn-primary mb-3" href="{{ route('siswa.create') }}">Add Siswa</a>
        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>TANGGAL LAHIR</th>
                    <th>JENIS KELAMIN</th>
                    <th colspan="2">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ date('d-M-Y', strtotime($data->tgl_lahir)) }}</td>
                        <td>{{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td><a class="btn btn-warning" href="{{ route('siswa.edit', $data->nis) }}">Edit</a></td>
                        <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $data->nis }}">
                                Hapus
                            </button>
                        </td>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $data->nis }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Akan Terhapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('siswa.destroy', $data->nis) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <div class="">
                                                <p>Data NIS <b>{{ $data->nis }}</b> dengan Nama <b>{{$data->nama}}</b> Akan di Hapus!</p>
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
