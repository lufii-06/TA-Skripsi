@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Data Siswa</h1>
        <form action="{{ route('siswa-search') }}" method="get" id="searchForm">
            <div class="form-floating">
                <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem" id="floatingInput"
                    name="search" id="search" value="{{ request('search') }}"
                    placeholder="Cari Nama, alamat nohp siswa">
                <label for="floatingInput">Cari data siswa</label>
            </div>
        </form>
        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nohp</th>
                            <th scope="col">Lahir</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Pendidikan Terakhir</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswa as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->detailuser->alamat }}</td>
                                <td>{{ $item->detailuser->nohp }}</td>
                                <td>{{ $item->detailuser->tempat_lahir . ', ' . date('d F Y', strtotime($item->detailuser->tanggal_lahir)) }}</td>
                                <td>{{ $item->detailuser->usia }}</td>
                                <td>{{ $item->detailuser->tinggibadan }}&nbsp;cm</td>
                                <td>{{ $item->detailuser->beratbadan }}&nbsp;kg</td>
                                <td>{{ $item->detailuser->pendidikanterakhir }}</td>
                                <td class=" d-flex pb-5">
                                    <a href="{{ route('siswa-hapus', $item->id) }}"
                                        class="btn btn-outline-primary me-2">Hapus</a>
                                    <a href="{{ route('siswa-lulus', $item->id) }}"
                                        class="btn btn-outline-success">Lulus</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="11">Siswa Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($siswa)
                    {{ $siswa->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
