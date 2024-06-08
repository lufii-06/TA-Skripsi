@extends('layouts.sidebar')

@section('content')
<style>
    .btn-success:hover {
        background-color: #6C7293;
        border-color: #6C7293;
        color: white;
    }

    .badge:hover {
        background-color: #6C7293;
        border-color: #6C7293;
        color: white;
    }
</style>
    <div class="container-fluid pt-4 px-5">
        @livewire('kuis-index', [
            'detailjawaban' => $detailjawaban,
            'soal' => $soal,
            'jawaban' => $jawaban,
            'kuis' => $kuis,
            'user' => $user,
        ])
    </div>
@endsection
