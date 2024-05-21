@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-4">Detail Materi</h2>
        @if ($materi)
            <h4>{{ $materi->judul }}</h4>
            <h5>
            {{ $materi->isimateri }}
            </h5>
        @else
            <h3>Materi tidak ditemukan</h3>
        @endif
    </div>
@endsection
