@extends('auth.master')
@section('content')
    <div class="container mt-2">
        <div class="text-center mb-3">
            <h3>UPDATE SISWA</h3>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ url('siswa', $siswa->nis) }}" method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nis" class="form-label">NIS Siswa</label>
                <input type="number" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" disabled>
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama }}">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Tanggal Lahir Siswa</label>
                <input type="Date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki - laki</option>
                    <option value="P" @if ($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
        </form>
    </div>
    <script>
        if ($("#form-siswa").length > 0) {
            $("#form-siswa").validate({
                rules: {
                    nis: {
                        required: true,
                    },
                    nama: {
                        required: true,
                    },
                    tgl_lahir: {
                        required: true,
                    },
                    jenis_kelamin: {
                        required: true,
                    },
                },
                messages: {
                    nis: {
                        required: "Masukan NIS Siswa",
                    },
                    nama: {
                        required: "Masukan Nama Siswa",
                    },
                    tgl_lahir: {
                        required: "Masukan Tanggal Lahir Siswa",
                    },
                    jenis_kelamin: {
                        required: "Pilih Jenis Kelamin Siswa",
                    },
                },
            })
        }
    </script>
@endsection
