@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid  pt-4 px-4">
        <h1>Materi Create</h1>
        <div class="bg-secondary p-4 rounded">
            <form action="{{ route('materi-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="level">
                        <option {{ old('level') == 'Pilih' ? 'selected' : '' }}>Pilih</option>
                        <option value="n5" {{ old('level') == 'n5' ? 'selected' : '' }}>N5</option>
                        <option value="n4" {{ old('level') == 'n4' ? 'selected' : '' }}>N4</option>
                        <option value="n3" {{ old('level') == 'n3' ? 'selected' : '' }}>N3</option>
                        <option value="n2" {{ old('level') == 'n2' ? 'selected' : '' }}>N2</option>
                        <option value="n1" {{ old('level') == 'n1' ? 'selected' : '' }}>N1</option>
                    </select>
                    <label for="floatingSelect">Level Materi</label>
                    @error('level')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Judul Materi" name="judul"
                        value="{{ old('judul') }}">
                    <label for="floatingInput">Judul Materi</label>
                    @error('judul')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-floating ">
                            <textarea class="form-control" placeholder="Isi Materi" id="floatingTextarea" style="height: 150px;" name="isimateri">{{ old('isimateri') }}</textarea>
                            <label for="floatingTextarea">Isi Materi</label>
                            @error('isimateri')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="formFile" class="form-label">Masukan Materi Berupa File (opsional)</label>
                        <input class="form-control bg-dark" type="file" id="formFile" name="filemateri">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Buat</button>
            </form>
        </div>
    </div>
@endsection
