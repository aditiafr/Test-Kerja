<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('siswa') ? 'active' : '' }}" aria-current="page" href="{{ url('siswa') }}">Siswa</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('buku') ? 'active' : '' }}" aria-current="page" href="{{ route('buku') }}">Buku</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('pinjam') ? 'active' : '' }}" aria-current="page" href="{{ url('pinjam') }}">Pinjam</a>
    </li>
</ul>
