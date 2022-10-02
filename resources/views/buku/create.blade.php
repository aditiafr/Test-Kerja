@extends('auth.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM BUKU</h3>
        </div>
        <form action="{{ route('buku.store') }}" method="POST" name="form-buku" id="form-buku">
            @csrf

            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Masukan ID Buku">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Nama Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Nama Judul Buku">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN Buku</label>
                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukan ISBN Buku">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Nama Pengarang Buku</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Pengarang Buku">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
        </form>
    </div>
    <script>
        if ($("#form-buku").length > 0) {
            $("#form-buku").validate({
                rules: {
                    id_buku: {
                        required: true,
                    },
                    judul: {
                        required: true,
                    },
                    isbn: {
                        required: true,
                    },
                    pengarang: {
                        required: true,
                    },
                },
                messages: {
                    id_buku: {
                        required: "Masukan ID Buku",
                    },
                    judul: {
                        required: "Masukan Nama Judul Buku",
                    },
                    isbn: {
                        required: "Masukan ISBN Buku",
                    },
                    pengarang: {
                        required: "Masukan Nama Pengarang Buku",
                    },
                },
            })
        }
    </script>
@endsection
