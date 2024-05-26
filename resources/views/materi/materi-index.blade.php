@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1>Materi</h1>
        <div class="d-flex justify-content-between mt-4 align-items-center mb-5">
            <form action="{{ route('materi-search') }}" method="get" id="searchForm">
                <div class="form-floating">
                    <input type="text" class="form-control bg-secondary rounded-pill" style="width: 18rem" id="floatingInput"
                        name="search" id="search" value="{{ request('search') }}"
                        placeholder="Cari Judul, Level atau Sensei">
                    <label for="floatingInput">Cari Judul, Level atau Sensei</label>
                </div>
            </form>
            @if ($user->status == '2' or $user->status == '3')
                <div class="">
                    <a href="{{ route('materi-create') }}" class="btn rounded-pill btn-primary">Buat Materi</a>
                </div>
            @endif
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
