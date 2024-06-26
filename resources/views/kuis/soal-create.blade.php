@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2>Buat Soal</h4>
            <div class="bg-secondary p-3 rounded">
                Judul Kuis : {{ $kuis->judulkuis }}
                <br>Tipe Kuis : {{ $kuis->type }}
                <br>Jumlah Soal : {{ $kuis->jumlahsoal }}
                <br>Sudah terbuat : {{ $createdsoal }}
            </div>
            @if ($kuis->type == 'CHOKAI')
                <form action="{{ route('soalchokai-store', $kuis->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-secondary p-3 rounded mt-4">
                        <div class="mb-3">
                            <label for="soalaudio" class="form-label">Soal&nbsp;</label>
                            <input class="form-control bg-dark" type="file" id="soalaudio" name="soalaudio">
                            @error('soalaudio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jawabanbenar">Jawaban Benar</label>
                            <input type="text" class="form-control w-100 @error('jawabanbenar') is-invalid @enderror"
                                value="{{ old('jawabanbenar') }}" required autocomplete="jawabanbenar" autofocus
                                id="jawabanbenar" name="jawabanbenar" placeholder="Masukkan Jawaban">
                            @error('jawabanbenar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jawabansatu">Opsi Satu</label>
                            <input type="text" class="form-control w-100 @error('jawabansatu') is-invalid @enderror"
                                value="{{ old('jawabansatu') }}" required autocomplete="jawabansatu" autofocus
                                id="jawabansatu" name="jawabansatu" placeholder="Masukkan Opsi Satu">
                            @error('jawabansatu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jawabandua">Opsi Dua</label>
                            <input type="text" class="form-control w-100 @error('jawabandua') is-invalid @enderror"
                                value="{{ old('jawabandua') }}" required autocomplete="jawabandua" autofocus
                                id="jawabandua" name="jawabandua" placeholder="Masukkan Opsi dua">
                            @error('jawabandua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="jawabantiga">Opsi Tiga</label>
                            <input type="text" class="form-control w-100 @error('jawabantiga') is-invalid @enderror"
                                value="{{ old('jawabantiga') }}" required autocomplete="jawabantiga" autofocus
                                id="jawabantiga" name="jawabantiga" placeholder="Masukkan Opsi tiga">
                            @error('jawabantiga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($createdsoal == $kuis->jumlahsoal - 1)
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        @else
                            <button type="submit" class="btn btn-primary mt-3">Buat Soal Selanjutnya</button>
                        @endif
                    </div>
                </form>
            @else
                <form action="{{ route('soal-store', $kuis->id) }}" method="POST">
                    @csrf
                    @for ($i = 0; $i < $kuis->jumlahsoal; $i++)
                        <div class="bg-secondary p-3 rounded mt-4">
                            <div class="mb-3">
                                <label for="soal{{ $i + 1 }}">Soal &nbsp;{{ $i + 1 }}</label>
                                <input type="text"
                                    class="form-control w-100 @error('soal{{ $i + 1 }}') is-invalid @enderror"
                                    value="{{ old('soal' . $i + 1) }}" required autocomplete="soal{{ $i + 1 }}"
                                    autofocus id="soal{{ $i + 1 }}" name="soal{{ $i + 1 }}"
                                    placeholder="Masukkan Soal">
                                @error('soal{{ $i + 1 }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jawabanbenar{{ $i + 1 }}">Jawaban Benar</label>
                                <input type="text"
                                    class="form-control w-100 @error('jawabanbenar{{ $i + 1 }}') is-invalid @enderror"
                                    value="{{ old('jawabanbenar' . $i + 1) }}" required
                                    autocomplete="jawabanbenar{{ $i + 1 }}" autofocus
                                    id="jawabanbenar{{ $i + 1 }}" name="jawabanbenar{{ $i + 1 }}"
                                    placeholder="Masukkan Jawaban">
                                @error('jawabanbenar{{ $i + 1 }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jawabansatu{{ $i + 1 }}">Opsi Satu</label>
                                <input type="text"
                                    class="form-control w-100 @error('jawabansatu{{ $i + 1 }}') is-invalid @enderror"
                                    value="{{ old('jawabansatu' . $i + 1) }}" required
                                    autocomplete="jawabansatu{{ $i + 1 }}" autofocus
                                    id="jawabansatu{{ $i + 1 }}" name="jawabansatu{{ $i + 1 }}"
                                    placeholder="Masukkan Opsi Satu">
                                @error('jawabansatu{{ $i + 1 }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jawabandua{{ $i + 1 }}">Opsi Dua</label>
                                <input type="text"
                                    class="form-control w-100 @error('jawabandua{{ $i + 1 }}') is-invalid @enderror"
                                    value="{{ old('jawabandua' . $i + 1) }}" required
                                    autocomplete="jawabandua{{ $i + 1 }}" autofocus
                                    id="jawabandua{{ $i + 1 }}" name="jawabandua{{ $i + 1 }}"
                                    placeholder="Masukkan Opsi dua">
                                @error('jawabandua{{ $i + 1 }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jawabantiga{{ $i + 1 }}">Opsi Tiga</label>
                                <input type="text"
                                    class="form-control w-100 @error('jawabantiga{{ $i + 1 }}') is-invalid @enderror"
                                    value="{{ old('jawabantiga' . $i + 1) }}" required
                                    autocomplete="jawabantiga{{ $i + 1 }}" autofocus
                                    id="jawabantiga{{ $i + 1 }}" name="jawabantiga{{ $i + 1 }}"
                                    placeholder="Masukkan Opsi tiga">
                                @error('jawabantiga{{ $i + 1 }}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endfor
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            @endif

    </div>
@endsection
