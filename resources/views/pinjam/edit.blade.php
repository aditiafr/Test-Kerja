@extends('auth.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>UPDATE PINJAM BUKU</h3>
        </div>
        <form action="{{ route('pinjam.update', $pinjam->id_pinjam) }}" method="POST" name="form-pinjam" id="form-pinjam">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="id_pinjam" class="form-label">ID Pinjam Buku</label>
                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam"
                    value="{{ $pinjam->id_pinjam }}">
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ $pinjam->tgl_pinjam }}">
            </div>
            <div class="mb-3">
                <label for="tgl_batas" class="form-label">Tanggal Batas</label>
                <input type="date" class="form-control" id="tgl_batas" name="tgl_batas" value="{{ $pinjam->tgl_batas }}">
            </div>
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="{{ $pinjam->tgl_kembali }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Pinjam</label>
                <select class="form-control" name="status" id="status">
                    <option value="0" @if ($pinjam->status == 0) selected @endif>Pinjam</option>
                    <option value="1" @if ($pinjam->status == 1) selected @endif>Kembali</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">Nama Siswa</label>
                <select class="form-control js-example-basic-single" name="nis" id="nis">
                    <option value="{{ $pinjam->nis }}">{{ $pinjam->nama }}</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Judul Buku</label>
                <select class="form-control js-example-basic-single" name="id_buku" id="id_buku">
                    <option value="{{ $pinjam->id_buku }}">{{ $pinjam->judul }}</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id_buku }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
            <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
        </form>
    </div>
@endsection
