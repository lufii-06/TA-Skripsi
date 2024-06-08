@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Data Sensei</h1>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-10">
                <form action="{{ route('sensei-search') }}" method="get" id="searchForm">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Nama, alamat nohp sensei">
                        <label for="floatingInput">Cari data sensei</label>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-2 mt-2">
                <a href=""data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i
                        class="fas fa-download me-2"></i>
                    Data Sensei
                </a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                    <form action="{{ route('sensei-cetak') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Sensei</h1>
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
                                <input type="text" class="form-control w-100 @error('tahun') is-invalid @enderror"
                                    name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus
                                    id="tahun" tahun="tahun" placeholder="Masukkan Tahun">
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
                            <th scope="col">Nohp</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Level kemampuan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sensei as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->detailuser->user_nomor }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->detailuser->nohp }}</td>
                                <td>{{ $item->detailuser->jenkel }}</td>
                                <td>{{ $item->detailuser->usia }}</td>
                                <td>{{ $item->detailuser->levelkemampuan }}</td>
                                @if ($item->status == '2')
                                    <td>
                                        <a href="{{ route('sensei-terima', $item->id) }}"
                                            class="btn btn-outline-success">Terima</a>
                                        <a href="{{ route('sensei-tolak', $item->id) }}"
                                            class="btn btn-outline-primary">Tolak</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('sensei-berhenti', $item->id) }}"
                                            class="btn btn-outline-primary">Berhentikan</a>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="9">Sensei Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($sensei)
                    {{ $sensei->links() }}
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Nama Kelas</label>
                            <input type="text" class="form-control w-100" id="name" name="name"
                                value="{{ old('name') }}" placeholder="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Terima dan Buat Kelas</button>
                </div>
            </div>
        </div>
    </div>
@endsection
