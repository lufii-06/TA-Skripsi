<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" style="width: 80vw">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex mb-3">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i></h3>
                            <h5 class="ms-3 mt-2">Daftar Sebagai Pengajar Hoshi Hikari</h5>
                        </div>
                        <form action="{{ route('sensei-store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control w-100 @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus id="name"
                                    name="name" placeholder="Masukkan Nama">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control w-100 @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" placeholder="Masukkan E-Mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password"
                                    class="form-control w-100 @error('password') is-invalid @enderror" id="password"
                                    name="password" required autocomplete="new-password"
                                    placeholder="Masukkan Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control w-100" id="password-confirm"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control w-100" id="alamat" name="alamat" required
                                    value="{{ old('alamat') }}" placeholder="Alamat">
                                @error('alamat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="birthPlace" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="birthPlace" name="tempat_lahir"
                                        required value="{{ old('tempat_lahir') }}" placeholder="Tempat lahir">
                                    @error('tempat_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="birthDate" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="birthDate" name="tanggal_lahir"
                                        required value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="usia">Usia</label>
                                <input type="number" id="usia" name="usia" class="form-control w-25"
                                    required placeholder="Usia" value="{{ old('usia') }}">
                                @error('usia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="nohp">Nohp</label>
                                <input type="text" id="nohp" name="nohp" class="form-control w-50"
                                    required placeholder="Nohp" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="levelkemampuan" class="form-label">Level Kemampuan</label>
                                        <select class="form-select" id="levelkemampuan" name="levelkemampuan" required
                                            required>
                                            <option disabled selected>Pilih Level Kemampuan</option>
                                            <option value="N4"
                                                {{ old('levelkemampuan') == 'N4' ? 'selected' : '' }}>N4</option>
                                            <option value="N3"
                                                {{ old('levelkemampuan') == 'N3' ? 'selected' : '' }}>N3</option>
                                            <option value="N2"
                                                {{ old('levelkemampuan') == 'N2' ? 'selected' : '' }}>N2</option>
                                            <option value="N1"
                                                {{ old('levelkemampuan') == 'N1' ? 'selected' : '' }}>N1</option>
                                        </select>
                                        @error('levelkemampuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a class="ms-2 mt-2 text-primary" href="{{ url('/') }}">Kembali
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
