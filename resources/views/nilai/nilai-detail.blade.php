@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h3 class="mb-4">Daftar nilai Saya</h3>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-9">
                <form action="{{ route('nilai-search') }}" method="get" id="searchForm">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Kuis atau Nilai">
                        <label for="floatingInput">Cari Kuis</label>
                    </div>
                </form>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 mt-2">
                <a href=""data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i
                        class="fas fa-download me-2"></i>
                    Cetak Nilai
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cetak Nilai</h1>
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
                            <th scope="col">Judul Kuis</th>
                            <th scope="col">Type Kuis</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilai as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->kuis->judulkuis }}</td>
                                <td>{{ $item->kuis->type }}</td>
                                <td>{{ $item->nilai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="11">Kuis Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($nilai)
                {{ $nilai->links() }}
            @endif
        </div>
    </div>
@endsection
