@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Daftar nilai</h1>
        {{-- <form action="{{ route('kelas-search') }}" method="get" id="searchForm">
            <div class="form-floating">
                <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem" id="floatingInput"
                    name="search" id="search" value="{{ request('search') }}" placeholder="Cari Nama kelas">
                <label for="floatingInput">Cari Kelas</label>
            </div>
        </form> --}}
        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul Kuis</th>
                            <th scope="col">Type Kuis</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kuis as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->judulkuis }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('kuis-detail', $item->id) }}">Detail</a>
                                </td>
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
