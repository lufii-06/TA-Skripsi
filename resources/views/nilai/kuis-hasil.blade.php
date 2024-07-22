@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h3 class="mb-4">Hasil Kuis {{ $kuis->judulkuis }}</h3>
        <a href="{{ route('kuis-cetak',$kuis->id) }}" target="_blank" class="btn rounded-pill btn-primary mt-2">Cetak Nilai Kuis</a>
        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <p>
                Type kuis : {{ $kuis->type }}<br>
                Status : {{ $kuis->status }} <br>
            Sudah di kerjakan : {{ count($nilai) }} Siswa</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kiswa</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilai as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $item->user->name }}</th>
                                <td>{{ $item->nilai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="3">Kuis Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
