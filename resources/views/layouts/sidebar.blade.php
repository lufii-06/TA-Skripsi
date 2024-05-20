@extends('layouts.app')

@section('sidebar')
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <div class="d-flex flex-column">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class=" text-primary">星光</h3>
                </a>
                <div class="ms-3">
                    <h6 class="mb-2">
                        <div class="d-flex">
                            <i class="fa fa-user fs-4 me-2"></i>&nbsp;
                            {{ ucfirst(explode(' ', $user->name)[0]) . ' -' }}&nbsp;
                            <div class="text-success">
                                {{ $user->status == '3' ? 'Admin' : ($user->status == '2' ? 'Guru' : 'Siswa') }}
                            </div>
                        </div>
                    </h6>
                </div>
            </div>
            <div class="navbar-nav w-100 mt-2">
                <a href="{{ route('home') }}" class="nav-item nav-link active"><i
                        class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                @if ($user->status == '3')
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Materi</a>
                @elseif($user->status == '2')
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Materi</a>
                @else
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Materi</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-star me-2"></i>Kuis</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-clipboard-list me-2"></i>nilai</a>
                @endif
            </div>
        </nav>
    </div>
@endsection
