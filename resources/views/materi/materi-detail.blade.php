@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-4">Detail Materi</h2>
        <div class="p-4 bg-secondary">
            @if ($materi)
                <h4>Judul: {{ $materi->judul }}</h4>
                @if ($materi->filemateri)
                    <div class="download-section d-flex justify-content-end">
                        <a href="{{ Storage::url($materi->filemateri) }}" target="_blank"
                            class="btn btn-primary d-flex align-items-center">
                            <i class="fas fa-download me-2"></i>
                            Download Materi
                        </a>
                    </div>
                @endif
                <p>
                    {{ $materi->isimateri }}
                </p>
            @else
                <h3>Materi tidak ditemukan</h3>
            @endif
        </div>
    </div>
@endsection
