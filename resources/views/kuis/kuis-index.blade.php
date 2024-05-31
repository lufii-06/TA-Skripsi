@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-0">Kuis</h2>
        <div class="d-flex justify-content-between">
            <div class="">
                <form action="{{ route('kuis-search') }}" method="get" id="searchForm" class="my-5">
                    <div class="form-floating">
                        <input type="text" class="form-control bg-secondary rounded-pill" style="width: 18rem"
                            id="floatingInput" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Cari Judul, Level atau Sensei">
                        <label for="floatingInput">Cari Kuis, Status atau Type</label>
                    </div>
                </form>
            </div>
            <div class="">
                @if ($user->status == '3')
                    <a href="" class="btn btn-primary mt-5" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Buat
                        Kuis</a>
                @endif
            </div>
        </div>
        @forelse ($kuis as $item)
            <details class="mb-3 bg-secondary p-3 rounded">
                <summary class="" style="list-style-type: none;">
                    <div class="d-flex justify-content-between">
                        <div class="text-white"> {{ strtoupper('Judul : ' . $item->judulkuis) }}</div>
                        <div class="">PEMBUAT : {{ strtoupper($item->user->name) }}|TIPE&nbsp;{{ $item->type }}
                            |
                            {{ strtoupper($item->status) }}</div>
                    </div>
                </summary>
                <div class="d-flex justify-content-end mt-2 mb-0">
                    @if ($item->status == 'belum mulai')
                        @if ($user->status == '3')
                            <a href="{{ route('soal-create', $item->id) }}" class="btn btn-primary me-2">Buat Soal</a>
                        @else
                            <a href="" class="btn btn-primary me-2 disabled">Kerjakan</a>
                        @endif
                    @elseif($item->status == 'siap mulai')
                        @if ($user->status == '3')
                            <a href="{{ route('kuis-mulai', $item->id) }}" class="btn btn-primary me-2">Mulai Kuis</a>
                        @else
                            <a href="" class="btn btn-primary me-2 disabled">Mulai Kuis</a>
                        @endif
                    @elseif($item->status == 'sedang mulai')
                        @if ($user->status == '3')
                            <a href="{{ route('kuis-tutup', $item->id) }}" class="btn btn-primary me-2">Tutup Kuis</a>
                        @else
                            <a href="{{ route('kuis-kerjakan',$item->id) }}" class="btn btn-primary me-2 mt-2 " id="kerjakan{{ $item->id }}">Kerjakan
                            </a>
                        @endif
                    @else
                        @if ($user->status == '3')
                            <a href="" class="btn btn-primary me-2">Lihat Hasil</a>
                        @else
                            <a href="" class="btn btn-primary me-2">Nilai</a>
                        @endif
                    @endif
                </div>
                <p style="margin-top: -65px">
                    <br>Jumlah Soal : {{ $item->jumlahsoal }}
                    <br>Persyaratan : 
                    @if (!$item->persyaratan)
                        Tidak ada Persyaratan
                    @else
                        @foreach ($item->persyaratan as $itempersyaratan)
                            <ul>
                                <li><a
                                        @if ($user->status == '1') href="{{ route('materi-detail', $itempersyaratan->materi->id) }}" @endif>
                                        {{ $itempersyaratan->materi->judul }}
                                    </a>
                                    @if ($itempersyaratan->materi->absensi->contains('user_id', $user->id))
                                        &nbsp;-&nbsp;Selesai
                                    @else
                                        <script>
                                            var element = document.getElementById('kerjakan{{ $item->id }}');
                                            if (element) {
                                                element.classList.add('disabled');
                                            }
                                        </script>
                                    @endif
                                </li>
                            </ul>
                        @endforeach
                    @endif
                    @if ($user->status == '1')
                        <span class="text-danger">Jika ada pastikan sudah mengikuti materi yang menjadi syarat dalam kuis ini
                            !!</span>
                    @endif
                </p>

            </details>
        @empty
            <p class="bg-secondary rounded p-3">Tidak Ada Kuis</p>
        @endforelse
        {{ $kuis->links() }}
    </div>
    @if ($user->status == '3')
        <form action="{{ route('kuis-create') }}" method="POST">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Buat Kuis</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipe Kuis</label>
                                <select class="form-select" id="type" name="type" required>
                                    <option disabled selected>Pilih Tipe Kuis</option>
                                    <option value="TANGO" {{ old('type') == 'TANGO' ? 'selected' : '' }}>TANGO</option>
                                    <option value="BUNPOU" {{ old('type') == 'BUNPOU' ? 'selected' : '' }}>BUNPOU</option>
                                    <option value="CHOKAI" {{ old('type') == 'CHOKAI' ? 'selected' : '' }}>CHOKAI</option>
                                    <option value="DOKKAI" {{ old('type') == 'DOKKAI' ? 'selected' : '' }}>DOKKAI</option>
                                </select>
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="judulkuis">Judul Kuis</label>
                                <input type="text" class="form-control w-100 @error('judulkuis') is-invalid @enderror"
                                    value="{{ old('judulkuis') }}" required autocomplete="judulkuis" autofocus
                                    id="judulkuis" name="judulkuis" placeholder="Masukkan Judul Kuis">
                                @error('judulkuis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jumlahsoal">Jumlah Soal</label>
                                <input type="number" id="jumlahsoal" name="jumlahsoal" class="form-control" required
                                    min="1" placeholder="Jumlah Soal" value="{{ old('jumlahsoal') }}">
                                @error('jumlahsoal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="persyaratan1" class="form-label">Syarat pengerjaan Pertama (opsional)</label>
                                <select class="form-select" id="persyaratan1" name="persyaratan1">
                                    <option disabled selected>Pilih Syarat pengerjaan</option>
                                    @foreach ($syaratmateri as $item1)
                                        <option value="{{ $item1->id }}"
                                            {{ old('persyaratan1') == $item1->id ? 'selected' : '' }}>{{ $item1->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('persyaratan1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="persyaratan2" class="form-label">Syarat pengerjaan Kedua (opsional)</label>
                                <select class="form-select" id="persyaratan2" name="persyaratan2">
                                    <option disabled selected>Pilih Syarat pengerjaan</option>
                                    @foreach ($syaratmateri as $item2)
                                        <option value="{{ $item2->id }}"
                                            {{ old('persyaratan2') == $item2->id ? 'selected' : '' }}>{{ $item2->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('persyaratan2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="persyaratan3" class="form-label">Syarat pengerjaan Ketiga (opsional)</label>
                                <select class="form-select" id="persyaratan3" name="persyaratan3">
                                    <option disabled selected>Pilih Syarat pengerjaan</option>
                                    @foreach ($syaratmateri as $item3)
                                        <option value="{{ $item3->id }}"
                                            {{ old('persyaratan3') == $item3->id ? 'selected' : '' }}>{{ $item3->judul }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('persyaratan3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Buat Kuis</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
