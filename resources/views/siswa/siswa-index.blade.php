@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mb-4">Data Siswa</h1>
        <form action="{{ route('materi-search') }}" method="get" id="searchForm">
            <div class="form-floating">
                <input type="text" class="form-control bg-secondary rounded-pill" style="width: 20rem" id="floatingInput"
                    name="search" id="search" value="{{ request('search') }}"
                    placeholder="Cari Nama, alamat nohp siswa">
                <label for="floatingInput">Cari Nama, alamat atau nohp siswa</label>
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
                            <th scope="col">Tinggi Badan</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Pendidikan Terakhir</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>jhon@email.com</td>
                            <td>USA</td>
                            <td>123</td>
                            <td>Member</td>
                            <td>Member</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
