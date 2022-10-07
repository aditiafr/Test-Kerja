<div class="mb-2">
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link {{ Request::is('pinjam') ? 'active' : '' }} aria-current="page"
            href="{{ route('pinjam') }}">Data Peminjaman</a>
        <a class="flex-sm-fill text-sm-center nav-link {{ Request::is('pinjam/tersedia') ? 'active' : '' }}"
            href="{{ route('tersedia') }}">Buku Yang Masih Tersedia</a>
        <a class="flex-sm-fill text-sm-center nav-link {{ Request::is('pinjam/kembali') ? 'active' : '' }}"
            href="{{ route('kembali') }}">Buku Yang Belum di Kembalikan</a>
        <a class="flex-sm-fill text-sm-center nav-link {{ Request::is('pinjam/jumlah') ? 'active' : '' }}"
            href="{{ route('jumlah') }}">Buku Yang Sudah di Pinjam</a>
    </nav>
</div>
