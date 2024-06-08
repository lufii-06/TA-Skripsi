@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1>Materi</h1>
        <div class="row mb-5">
            <div class="col-12 col-sm-12 col-md-6 col-lg-9">

                <form action="{{ route('materi-search') }}" method="get" id="searchForm">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 18rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Judul, Level atau Sensei">
                        <label for="floatingInput">Cari Judul, Level atau Sensei</label>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
                @if ($user->status == '3')
                    <div class="">
                        <a href="{{ route('materi-create') }}" class="btn rounded-pill btn-primary">Buat Materi</a>
                    </div>
                @elseif($user->status == '4')
                    <div class="">
                        <a href="" class="btn rounded-pill btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="fas fa-download me-2"></i>Laporan Materi</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-secondary">
                                <form action="{{ route('materi-cetak') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Materi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div class="mb-3">
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
                                    </div> --}}
                                        <div class="mb-3">
                                            <label for="Periode" class="form-label">Periode</label>
                                            <select class="form-select" id="Periode" name="periode">
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
                                        <div class="mb-3">
                                            <label for="tahun">Tahun</label>
                                            <input type="text"
                                                class="form-control w-100 @error('tahun') is-invalid @enderror"
                                                name="tahun" value="{{ old('tahun') }}" autocomplete="tahun" autofocus
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
                @endif
            </div>
        </div>
        <h2>Daftar Materi</h2>
        <div style="max-height: 50vh" class=" overflow-auto">
            @forelse ($materi as $item)
                <summary class="bg-secondary rounded text-white p-4 mb-2 d-flex flex-column">
                    <span class="text-success">Pengunggah : {{ ucfirst(explode(' ', $item->user->name)[0]) }}</span>
                    <span class="text-muted">Level : {{ $item->level }}</span>
                    <span>Judul : {{ $item->judul }}</span>
                    <a href="{{ route('materi-detail', $item->id) }}" class="justify-content-end">Lihat</a>
                </summary>
            @empty
                <h5 class="text-muted bg-secondary p-3 rounded">Sensei Belum Mengupload Materi</h5>
            @endforelse
            @if ($materi)
                <div class="mt-2">
                    {{ $materi->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
