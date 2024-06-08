@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-4">Detail Materi</h2>
        <div class="p-4 bg-secondary rounded">
            @if ($materi)
                <div class="d-flex justify-content-between mb-3">
                    <div class="">
                        <h4>Judul: {{ $materi->judul }}</h4>
                    </div>
                    <div class="">
                        Jam : {{ $materi->created_at->format('H:i') }}
                        <br>Tanggal : {{ $materi->created_at->translatedFormat('d F Y ') }}
                    </div>
                </div>
                <div class="download-section d-flex align-items-end flex-column mb-4">
                    @if ($materi->filemateri)
                        <a href="{{ asset($materi->filemateri) }}" target="_blank"
                            class="btn btn-outline-primary d-flex align-items-center mb-2">
                            <i class="fas fa-download me-2"></i>
                            Download Materi
                        </a>
                    @endif
                    @if ($user->id == $materi->user_id)
                        <a class="btn btn-outline-primary" href="{{ route('materi-destroy', $materi->id) }}"><i
                                class="fa fa-trash"></i>&nbsp;Hapus</a>
                    @endif
                </div>
                <div class="">{!! $materi->isimateri !!}</div>
                @if ($user->status == '1')
                    <p>Anda bisa mengisi Absensi setelah membaca dan memahami materi yang diberikan</p>
                    <a href="{{ route('absen-create', $materi->id) }}"
                        class="btn btn-primary {{ $absensi ? 'disabled' : '' }}">{{ $absensi ? 'Sudah Absen' : 'Isi Absen' }}</a>
                @endif
            @else
                <h3>Materi tidak ditemukan</h3>
            @endif
        </div>
    </div>
@endsection
