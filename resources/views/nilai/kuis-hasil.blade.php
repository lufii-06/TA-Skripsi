@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h3 class="mb-4">Hasil Kuis {{ $kuis->judulkuis }}</h3>
        <form action="{{ route('kelas-search') }}" method="get" id="searchForm">
            <div class="form-floating">
                <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem" id="floatingInput"
                    name="search" id="search" value="{{ request('search') }}" placeholder="Cari Nama kelas">
                <label for="floatingInput">Cari Kuis</label>
            </div>
        </form>
        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <p>Status : {{ $kuis->status }}</p>
            <p>Sudah di kerjakan : {{ count($nilai) }} Siswa</p>
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
        </div>
    </div>
@endsection
