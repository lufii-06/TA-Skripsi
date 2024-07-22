@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h2 class="mb-5">Profile
            @if ($user->status != '4')
                <a href="{{ route('profile-edit', $user->id) }}">
                    <span class="fs-5"><i class="fa fa-pen"></i></span>
                </a>
            @endif
        </h2>
        <div class="bg-secondary p-4 rounded">
            @if ($user->status == '4')
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-7">

                        User : Admin <br>
                        Nohp : {{ $user->detailuser->nohp }} <br>

                        @if (!empty($qr))
                            {{ 'Koneksi Wa : No Connection' }} <br>
                            <span class="text-primary">!! penting <br> Saat berhasil menautkan WhatsApp Tolong Untuk
                                Merefresh
                                halaman web</span> <br>
                        @else
                            {{ 'Koneksi Wa : Connected' }}
                            
                        @endif
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                        @if (!empty($qr))
                            <iframe src="{{ $qr }}" frameborder="0" width="100%" height="500"
                                class="bg-white"></iframe>
                        @endif
                    </div>
                </div>
            @elseif ($user->status == '1')
                <div class="rowzz">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p class="text-white">ID</p>
                        <p class="text-white">Nama</p>
                        <p class="text-white">Email</p>
                        <p class="text-white">Alamat</p>
                        <p class="text-white">Tempat, Tanggal lahir</p>
                        <p class="text-white">Usia</p>
                        <p class="text-white">Jenis Kelamin</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->user_nomor ?? "Anda belum Masuk kelas" }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->name }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->email }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->alamat }}</p>
                        <p><span
                                class="text-white">:</span>&nbsp;{{ $user->detailuser->tempat_lahir . ', ' . $user->detailuser->tanggal_lahir }}
                        </p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->usia }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->jenkel }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p class="text-white">Pendidikan Terakhir</p>
                        <p class="text-white">Jurusan</p>
                        <p class="text-white">Tinggi Badan</p>
                        <p class="text-white">Berat Badan</p>
                        <p class="text-white">Nohp</p>
                        <p class="text-white">Level Kemampuan</p>
                        <p class="text-white">
                            {{ $user->status == '4' ? '' : 'Bergabung Ke Kelas' }}
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->pendidikanterakhir }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->jurusan }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->tinggibadan }}&nbsp;cm</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->beratbadan }}&nbsp;kg</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->nohp }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->levelkemampuan }}</p>
                        @if ($user->status != '4')
                            <p><span class="text-white">:</span>&nbsp;{{ $kelas->name }}</p>
                        @endif
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p class="text-white">ID</p>
                        <p class="text-white">Nama</p>
                        <p class="text-white">Email</p>
                        <p class="text-white">Alamat</p>
                        <p class="text-white">Tempat, Tanggal lahir</p>
                        <p class="text-white">Usia</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->user_nomor }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->name }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->email }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->alamat }}</p>
                        <p><span
                                class="text-white">:</span>&nbsp;{{ $user->detailuser->tempat_lahir . ', ' . $user->detailuser->tanggal_lahir }}
                        </p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->usia }}</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p class="text-white">Nohp</p>
                        <p class="text-white">Level Kemampuan</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->nohp }}</p>
                        <p><span class="text-white">:</span>&nbsp;{{ $user->detailuser->levelkemampuan }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
