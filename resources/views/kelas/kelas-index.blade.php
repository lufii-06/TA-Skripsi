@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Daftar Kelas</h1>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-9 mb-2">
                <form action="{{ route('kelas-search') }}" method="get" id="searchForm">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Nama kelas">
                        <label for="floatingInput">Cari Kelas</label>
                    </div>
                </form>
            </div>
            @if ($user->status == '4')
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <a href="{{ route('kelas.cetak') }}" class="btn btn-primary">
                        <i class="fas fa-download me-2"></i>
                        Laporan Kelas</a>
                    <a href=""data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                        <i class="fas fa-download me-2"></i>
                        Laporan Materi Kelas</a>
                </div>
            @endif
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary">
                    <form action="{{ route('materi.cetakperkelas') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Materi Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas</label>
                                <select class="form-select" id="kelas" name="kelas">
                                    <option disabled selected>Pilih Kelas</option>
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kelas') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($user->status == '1')
            <div class="text-danger mt-3 mb-0">Saat Anda bergabung ke satu kelas anda tidak dapat keluar lagi</div>
        @elseif($user->status == '3')
            <div class="d-flex justify-content-end">
                <a href="{{ route('kelas-detail', $kelas_id) }}" class="btn btn-primary ">Kelas Saya</a>
            </div>
        @endif
        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Jumlah Anggota</th>
                            <th scope="col">{{ $user->status == '1' ? 'Aksi' : 'Token' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ count($item->anggotakelas) > 0 ? count($item->anggotakelas) : 0 }}</td>
                                @if ($user->status == '1')
                                    <td><a class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->id }}">Gabung</a></td>
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered">
                                            <form action="{{ route('kelas-gabung', $item->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-content bg-secondary">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gabung Kelas
                                                            {{ $item->name }}
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="token">Token</label>
                                                            <input type="text" class="form-control w-100" id="token"
                                                                name="token" value="{{ old('token') }}"
                                                                placeholder="Isi Token">
                                                            @error('token')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Gabung</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <td>{{ $item->token }}</td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="11">Kelas Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($kelas)
                    {{ $kelas->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
