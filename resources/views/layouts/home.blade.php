@extends('layouts.sidebar')
@section('content')
    @if ($user->status == '3')
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6 d-flex flex-column">
                    <div class="bg-secondary rounded p-4 mb-4 d-flex">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Jumlah Siswa</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                    <div class="bg-secondary rounded p-4 d-flex">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Jumlah guru</p>
                            <h6 class="mb-0">$1234</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="h-100 bg-secondary rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Kalender</h6>
                        </div>
                        <div id="calender"></div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="pt-5 ps-5 fs-2 text-white fw-blod custom-font">星光へようこそ</div>
        <p class="ps-5">Selamat Datang di Hoshi Hikari</p>
    @endif
    <livewire:pengumuman-index />
@endsection
