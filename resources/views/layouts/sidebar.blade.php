@extends('layouts.app')

@section('sidebar')
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <div class="d-flex flex-column">
                <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class=" text-primary">星光</h3>
                </a>
                <div class="ms-3">
                    <h6 class="mb-2">
                        <div class="d-flex">
                            <i class="fa fa-user fs-4 me-2"></i>&nbsp;
                            {{ ucfirst(explode(' ', $user->name)[0]) . ' -' }}&nbsp;
                            <div class="text-success">
                                {{ $user->status == '4' ? 'Admin' : ($user->status == '3' ? 'Guru' : 'Siswa') }}
                            </div>
                        </div>
                    </h6>
                </div>
            </div>
            <div class="navbar-nav w-100 mt-2">
                <a href="{{ route('home') }}"
                    class="nav-item nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                @if ($user->status == '4')
                    <a href="{{ route('siswa-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'siswa-index' ? 'active' : '' }}"><i
                            class="fa fa-users me-2"></i>Siswa</a>
                    <a href="{{ route('sensei-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'sensei-index' ? 'active' : '' }}"><i
                            class="fa fa-user-tie me-2"></i>Sensei</a>
                    <a href="{{ route('kelas-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kelas-index' ? 'active' : '' }}"><i
                            class="fa fa-torii-gate me-2"></i>Kelas</a>
                    <a href="{{ route('materi') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'materi' ? 'active' : '' }}"><i
                            class="fa fa-book me-2"></i>Materi</a>
                    <a href="{{ route('kuis-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kuis' ? 'active' : '' }}"><i
                            class="fa fa-star me-2"></i>Kuis</a>
                    <a href=""
                        class="nav-item nav-link {{ Route::currentRouteName() == 'nilai' ? 'active' : '' }}"><i
                            class="fa fa-clipboard-list me-2"></i>nilai</a>
                @elseif($user->status == '3')
                    <a href="{{ route('kelas-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kelas-index' ? 'active' : '' }}"><i
                            class="fa fa-torii-gate me-2"></i>Kelas</a>
                    <a href="{{ route('materi') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'materi' ? 'active' : '' }}"><i
                            class="fa fa-book me-2"></i>Materi</a>
                    <a href="{{ route('kuis-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kuis' ? 'active' : '' }}"><i
                            class="fa fa-star me-2"></i>Kuis</a>
                    <a href="{{ route('nilai') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'nilai' ? 'active' : '' }}"><i
                            class="fa fa-clipboard-list me-2"></i>nilai</a>
                @else
                    <a href="{{ route('kelas-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kelas-index' ? 'active' : '' }}"><i
                            class="fa fa-torii-gate me-2"></i>Kelas</a>
                    <a href="{{ route('materi') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'materi' ? 'active' : '' }}"><i
                            class="fa fa-book me-2"></i>Materi</a>
                    <a href="{{ route('kuis-index') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'kuis' ? 'active' : '' }}"><i
                            class="fa fa-star me-2"></i>Kuis</a>
                    <a href="{{ route('nilai-detail') }}"
                        class="nav-item nav-link {{ Route::currentRouteName() == 'nilai' ? 'active' : '' }}"><i
                            class="fa fa-clipboard-list me-2"></i>nilai</a>
                @endif
            </div>
        </nav>
    </div>
@endsection
