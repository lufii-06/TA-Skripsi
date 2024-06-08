@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Kelas Saya</h1>
        <div class="bg-secondary p-4 rounded">
            <h5>Nama Kelas : <span class="text-muted">{{ $kelas->name }}</span></h5>
            <h5>Nama Pemilik : <span class="text-muted">{{ $user->name }}</span></h5>
            <h5>Jumlah Anggota : <span class="text-muted">{{ count($anggotakelas) }}</span></h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Level Kemampuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggotakelas as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->user->detailuser->levelkemampuan ?? 'Tidak Ada' }}</td>
                                <td>
                                    @if ($item->user->status == '4')
                                        {{ 'Admin' }}
                                    @elseif($item->user_id == $kelas->user_id)
                                        {{ 'Pemilik' }}
                                    @else
                                        {{ 'Anggota' }}
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="11">Kelas Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
