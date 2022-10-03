@extends('auth.master')
@section('content')
    <div class="container mt-4">
        <div class="text-center mb-3">
            <h3>FORM PINJAM BUKU</h3>
        </div>
        <form action="{{ route('pinjam.store') }}" method="POST" name="form-pinjam" id="form-pinjam">
            @csrf

            <div class="mb-3">
                <label for="id_pinjam" class="form-label">ID Pinjam Buku</label>
                <input type="text" class="form-control" id="id_pinjam" name="id_pinjam"
                    placeholder="Masukan ID Pinjam Buku">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="{{ date('Y-m-d') }}">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tgl_batas" class="form-label">Tanggal Batas</label>
                <input type="date" class="form-control" id="tgl_batas" name="tgl_batas">
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" class="form-control" id="tgl_kembali" name="tgl_kembali">
            <input type="hidden" class="form-control" id="status" name="status" value="0">
            <div class="mb-3">
                <label for="nis" class="form-label">Nama Siswa</label>
                <select class="form-control js-example-basic-single" name="nis" id="nis">
                    <option value="">- Pilih Nama Siswa -</option>
                    @foreach ($siswa as $s)
                        <option value="{{ $s->nis }}">{{ $s->nama }}</option>
                    @endforeach
                </select>
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Judul Buku</label>
                <select class="form-control js-example-basic-single" name="id_buku" id="id_buku">
                    <option value="">- Pilih Judul Buku -</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id_buku }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
                @error('title')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
            <input class="btn btn-outline-primary" type="reset" name="batal" value="Batal">
        </form>
    </div>
    <script>
        if ($("#form-pinjam").length > 0) {
            $("#form-pinjam").validate({
                rules: {
                    id: {
                        required: true,
                    },
                    tgl_pinjam: {
                        required: true,
                    },
                    tgl_batas: {
                        required: true,
                    },
                    nis: {
                        required: true,
                    },
                    id_buku: {
                        required: true,
                    },
                },
                messages: {
                    id: {
                        required: "Masukan ID Pinjam Buku",
                    },
                    tgl_pinjam: {
                        required: "Masukan Tanggal Pinjam Buku",
                    },
                    tgl_batas: {
                        required: "Masukan Tanggal Batas Pinjam Buku",
                    },
                    nis: {
                        required: "Masukan Nama Siswa",
                    },
                    id_buku: {
                        required: "Masukan Judul Buku",
                    },
                },
            })
        }
    </script>
@endsection
