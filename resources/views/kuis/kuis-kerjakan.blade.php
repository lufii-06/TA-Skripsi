@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-5">
        @livewire('kuis-index', [
            'detailjawaban' => $detailjawaban,
            'soal' => $soal,
            'jawaban' => $jawaban,
        ])
    </div>
@endsection
