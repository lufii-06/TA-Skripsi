@extends('layouts.sidebar')
@section('content')
    @if ($user->status == '4')
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6 d-flex flex-column">
                    <div class="bg-secondary rounded p-4 mb-4 d-flex">
                        <i class="fa fa-hourglass-half fa-3x text-primary ms-2"></i>
                        <div class="ms-4">
                            <p class="mb-2">Periode</p>
                            <h6 class="mb-0">{{ $semester }}</h6>
                        </div>
                    </div>
                    <div class="bg-secondary rounded p-4 mb-4 d-flex">
                        <i class="fa fa-users fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Jumlah Siswa Aktif</p>
                            <h6 class="mb-0">{{ $jmluser }}</h6>
                        </div>
                    </div>
                    <div class="bg-secondary rounded p-4 d-flex">
                        <i class="fa fa-user-tie fa-4x me-1 text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Jumlah Sensei Aktif</p>
                            <h6 class="mb-0">{{ $jmlsensei }}</h6>
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
    <div class="mx-4 p-4 rounded mt-5 bg-secondary">Bagi yang baru bergabung di hoshi hikari silahkan join grup whatsapp <a
            href="https://chat.whatsapp.com/IpvgoBopaok7ga3bHAqxVM" class="text-primary fw-bold" target="_blank">ini</a></div>
    <livewire:pengumuman-index />
@endsection
