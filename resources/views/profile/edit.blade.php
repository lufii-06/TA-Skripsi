@extends('layouts.sidebar')
@section('content')
    <div class="container-fluid pt-4 px-4 ">
        <h2 class="mb-5">Profile</h2>
        @if ($user->status == '1')
            <div class="p-4 bg-secondary rounded">
                <form action="{{ route('siswa-update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control w-100 @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus id="name"
                            name="name" placeholder="Masukkan Nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control w-100 @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $user->email) }}" required autocomplete="email"
                            placeholder="Masukkan E-Mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control w-100" id="alamat" name="alamat"
                            value="{{ old('alamat', $user->detailuser->alamat) }}" placeholder="Alamat">
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="birthPlace" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="birthPlace" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $user->detailuser->tempat_lahir) }}"
                                placeholder="Tempat lahir">
                            @error('tempat_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="birthDate" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthDate" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $user->detailuser->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usia">Usia</label>
                        <input type="number" id="usia" name="usia" class="form-control w-25" placeholder="Usia"
                            value="{{ old('usia', $user->detailuser->usia) }}">
                        @error('usia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="pendidikanterakhir" name="pendidikanterakhir" class="form-label">Pendidikan
                                    Terakhir</label>
                                <select class="form-select" id="pendidikanterakhir" name="pendidikanterakhir">
                                    <option disabled selected>Pilih Pendidikan Terakhir</option>
                                    <option value="SD"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'SD' ? 'selected' : '' }}>
                                        SD
                                    </option>
                                    <option value="SMP"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'SMP' ? 'selected' : '' }}>
                                        SMP
                                    </option>
                                    <option value="SMA"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'SMA' ? 'selected' : '' }}>
                                        SMA
                                    </option>
                                    <option value="SMA"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'SMK' ? 'selected' : '' }}>
                                        SMK
                                    </option>
                                    <option value="D3"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'D3' ? 'selected' : '' }}>
                                        Diploma
                                        (D3)
                                    </option>
                                    <option value="S1"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'S1' ? 'selected' : '' }}>
                                        Sarjana
                                        (S1)
                                    </option>
                                    <option value="S2"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'S2' ? 'selected' : '' }}>
                                        Magister
                                        (S2)
                                    </option>
                                    <option value="S3"
                                        {{ old('pendidikanterakhir', $user->detailuser->pendidikanterakhir) == 'S3' ? 'selected' : '' }}>
                                        Doktor
                                        (S3)
                                    </option>
                                </select>
                                @error('pendidikanterakhir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan"
                                    class="form-control mt-2" value="{{ old('jurusan', $user->detailuser->jurusan) }}">
                                @error('jurusan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="tinggibadan">Tinggi Badan<small>-cm</small></label>
                            <input type="number" name="tinggibadan" id="tinggibadan" class="form-control"
                                placeholder="Tinggi Badan"
                                value="{{ old('tinggibadan', $user->detailuser->tinggibadan) }}">
                            @error('tinggibadan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="beratbadan">Berat Badan<small>-kg</small></label>
                            <input type="number" name="beratbadan" id="beratbadan" class="form-control"
                                placeholder="Berat Badan" value="{{ old('beratbadan', $user->detailuser->beratbadan) }}">
                            @error('beratbadan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nohp">Nohp</label>
                        <input type="text" id="nohp" name="nohp" class="form-control w-50"
                            placeholder="Nohp" value="{{ old('nohp', $user->detailuser->nohp) }}">
                        @error('nohp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="ms-2 mt-2 text-primary" href="{{ route('profile-detail') }}">Kembali
                    </a>
                </form>
            </div>
        @else
            <div class="bg-secondary p-4 rounded">
                <form action="{{ route('sensei-update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control w-100 @error('name') is-invalid @enderror"
                            value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus id="name"
                            name="name" placeholder="Masukkan Nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control w-100 @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ old('email', $user->email) }}" required
                            autocomplete="email" placeholder="Masukkan E-Mail">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control w-100" id="alamat" name="alamat" required
                            value="{{ old('alamat', $user->detailuser->alamat) }}" placeholder="Alamat">
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="birthPlace" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="birthPlace" name="tempat_lahir" required
                                value="{{ old('tempat_lahir', $user->detailuser->tempat_lahir) }}"
                                placeholder="Tempat lahir">
                            @error('tempat_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="birthDate" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthDate" name="tanggal_lahir" required
                                value="{{ old('tanggal_lahir', $user->detailuser->tanggal_lahir) }}">
                            @error('tanggal_lahir')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="usia">Usia</label>
                        <input type="number" id="usia" name="usia" class="form-control w-25" required
                            placeholder="Usia" value="{{ old('usia', $user->detailuser->usia) }}">
                        @error('usia')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nohp">Nohp</label>
                        <input type="text" id="nohp" name="nohp" class="form-control w-50" required
                            placeholder="Nohp" value="{{ old('nohp', $user->detailuser->nohp) }}">
                        @error('nohp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="levelkemampuan" class="form-label">Level Kemampuan</label>
                                <select class="form-select" id="levelkemampuan" name="levelkemampuan" required required>
                                    <option disabled selected>Pilih Level Kemampuan</option>
                                    <option value="N4"
                                        {{ old('levelkemampuan', $user->detailuser->levelkemampuan) == 'N4' ? 'selected' : '' }}>
                                        N4</option>
                                    <option value="N3"
                                        {{ old('levelkemampuan', $user->detailuser->levelkemampuan) == 'N3' ? 'selected' : '' }}>
                                        N3</option>
                                    <option value="N2"
                                        {{ old('levelkemampuan', $user->detailuser->levelkemampuan) == 'N2' ? 'selected' : '' }}>
                                        N2</option>
                                    <option value="N1"
                                        {{ old('levelkemampuan', $user->detailuser->levelkemampuan) == 'N1' ? 'selected' : '' }}>
                                        N1</option>
                                </select>
                                @error('levelkemampuan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a class="ms-2 mt-2 text-primary" href="{{ route('profile-detail') }}">Kembali
                    </a>
                </form>
            </div>
        @endif

    </div>
@endsection
