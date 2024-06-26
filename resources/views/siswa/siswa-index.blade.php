@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Data Siswa</h1>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-10">
                <form action="{{ route('siswa-search') }}" method="get" id="searchForm">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Nama, alamat nohp siswa">
                        <label for="floatingInput">Cari data siswa</label>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-2 mt-2">
                <a href=""data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i
                        class="fas fa-download me-2"></i>
                    Data Siswa
                </a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                    <form action="{{ route('siswa-cetak') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Siswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="Periode" class="form-label">Periode</label>
                                        <select class="form-select" id="Periode" name="periode" required required>
                                            <option disabled selected>Pilih Periode</option>
                                            <option value="Ganjil" {{ old('Periode') == 'Ganjil' ? 'selected' : '' }}>
                                                Ganjil</option>
                                            <option value="Genap" {{ old('Periode') == 'Genap' ? 'selected' : '' }}>
                                                Genap</option>
                                        </select>
                                        @error('Periode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control w-100 @error('tahun') is-invalid @enderror" name="tahun"
                                    value="{{ old('tahun') }}" required autocomplete="tahun" autofocus id="tahun"
                                    tahun="tahun" placeholder="Masukkan Tahun">
                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
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
                                <td>{{ $item->detailuser->user_nomor }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->detailuser->alamat }}</td>
                                <td>{{ $item->detailuser->jenkel }}</td>
                                <td>{{ $item->detailuser->nohp }}</td>
                                <td>{{ $item->detailuser->tempat_lahir . ', ' . date('d F Y', strtotime($item->detailuser->tanggal_lahir)) }}
                                </td>
                                <td>{{ $item->detailuser->usia }}</td>
                                <td>{{ $item->detailuser->tinggibadan }}&nbsp;cm</td>
                                <td>{{ $item->detailuser->beratbadan }}&nbsp;kg</td>
                                <td>{{ $item->detailuser->pendidikanterakhir }}</td>
                                <td>
                                    <a href="{{ route('siswa-hapus', $item->id) }}"
                                        class="btn btn-outline-primary me-2 mb-2">Hapus</a>
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
