@extends('auth.master')
@section('content')
    <div class="container mt-4">
        <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="id_buku" class="form-label">ID Buku</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="{{ $buku->id_buku }}">
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Nama Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $buku->judul }}">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN Buku</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $buku->isbn }}">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Nama Pengarang Buku</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $buku->pengarang }}">
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
        </form>
    </div>
@endsection
