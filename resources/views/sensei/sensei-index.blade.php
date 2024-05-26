@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Data Sensei</h1>
        <form action="{{ route('sensei-search') }}" method="get" id="searchForm">
            <div class="form-floating">
                <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem" id="floatingInput"
                    name="search" id="search" value="{{ request('search') }}"
                    placeholder="Cari Nama, alamat nohp sensei">
                <label for="floatingInput">Cari data sensei</label>
            </div>
        </form>

        <div class="bg-secondary rounded h-100 p-4 mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nohp</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Level kemampuan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($sensei as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->detailuser->nohp }}</td>
                                <td>{{ $item->detailuser->usia }}</td>
                                <td>{{ $item->detailuser->levelkemampuan }}</td>
                                @if ($item->status == '2')
                                    <td>
                                        <a href="{{ route('sensei-terima', $item->id) }}"
                                            class="btn btn-outline-success">Terima</a>
                                        <a href="{{ route('sensei-tolak', $item->id) }}"
                                            class="btn btn-outline-primary">Tolak</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('sensei-berhenti', $item->id) }}"
                                            class="btn btn-outline-primary">Berhentikan</a>
                                    </td>
                                @endif

                            </tr>
                        @empty
                            <tr>
                                <td class="p-4" colspan="7">Sensei Tidak Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if ($sensei)
                    {{ $sensei->links() }}
                @endif
            </div>
        </div>
    </div>
@endsection
