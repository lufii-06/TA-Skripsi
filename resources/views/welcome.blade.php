<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        .dropdown-toggle::after {
            display: none !important;
            content: none !important;
        }

        .tulisan {
            font-size: 65px;
        }

        .gambar {
            height: 28rem;
        }

        .gambar1 {
            height: 24rem;
        }

        .jumbotron {
            height: 80vh;
            background-position: center;
            border-image: fill 0 linear-gradient(#0001, #000);
            background-size: cover;
            position: relative;
            overflow: hidden;
            background-image: url({{ asset('images/jumbotron.jpg') }});

        }

        .text-justify {
            text-align: justify;
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        @media (max-width: 575.98px) {
            .custom-mt-sm {
                margin-top: 24px !important;
            }
        }
    </style>
</head>

<body class="" style="font-family: 'Montserrat', sans-serif;">
    <div class="jumbotron">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand text-white" href="#"><b class="fs-3">星光</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-2">
                            <a class="nav-link active fs-4 text-white" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2 fs-4 ">
                            <a class="nav-link text-white" href="#">About</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuButton"
                                style="text-decoration: none;" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="icon-account" style="font-size: 1rem"><i
                                        class="fas fa-user"></i>&nbsp;Akun</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#"></a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger bolder" href="#">Logout</a></li>
                            </ul>
                        </div>
                    </span>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column mb-3" style="height:25rem">
            <div class="mx-auto my-auto" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-mirror="true">
                <h5 class="text-white text-center fs-4" style="font-family: 'Montserrat', sans-serif;">Selamat Datang
                </h5>
                <h1 class="text-white text-center tulisan" style="font-family: 'Montserrat', sans-serif;"><b>Hoshi
                        Hikari</b></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-between flex-column flex-lg-row">
            <div class="">
                <img src="{{ asset('images/background.png') }}" alt="" class="gambar" data-aos="fade-up-right"
                    data-aos-mirror="true" data-aos-delay="500" data-aos-duration="3000">
            </div>
            <div class="d-flex align-items-center">
                <h5 class="ms-5">
                    <div class="fs-1 text-danger"><b>言語と文化</b></div>
                    <div class="fs-4">{{ 'Bahasa & Budaya' }}</div>
                    <div class="fs-5 mt-3 text-body-secondary text-justify">
                        "Bahasa dan Budaya" mencerminkan hubungan erat antara cara kita berkomunikasi dan kehidupan
                        budaya
                        kita. "Bahasa" adalah alat komunikasi yang penting, sementara "budaya" mencakup nilai-nilai dan
                        tradisi masyarakat. Gabungan keduanya menekankan pentingnya bahasa dalam memelihara keberagaman
                        budaya yang kaya. <br>
                    </div>
                    <button class="btn btn-outline-danger mt-3">Daftar Sekarang</button>
                </h5>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row">
            <div class="d-flex align-items-center">
                <h5 class="me-5 ms-5 mt-sm-4 custom-mt-sm">
                    <div class="fs-1 text-danger"><b>日本語学校</b></div>
                    <div class="fs-4">{{ 'Sekolah Bahasa Jepang' }}</div>
                    <div class="fs-5 mt-3 text-body-secondary text-justify">
                        Sekolah bahasa Jepang mengajarkan bahasa dan budaya Jepang kepada non-penutur asli, mencakup
                        keterampilan berbahasa dan pengetahuan budaya. Programnya bervariasi, termasuk persiapan ujian
                        JLPT
                        serta studi dan kerja di Jepang. <br>
                    </div>
                    <button class="btn btn-outline-danger mt-3">Jadwal Belajar</button>
                </h5>
            </div>
            <div class="">
                <img src="{{ asset('images/background2.png') }}" alt="" class="gambar1" data-aos="zoom-in-left"
                    data-aos-mirror="true" data-aos-duration="3000">
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 py-4" style="background-color: salmon">
        <div class="container fs-4 text-justify">
            "新しい言葉を学ぶたびに、理解する文を理解するたびに、夢に一歩近づきます。どんな努力も無駄ではありません。情熱と喜びを持って学び続けてください。君ならできる！" <br>
            "Setiap kata baru yang kamu pelajari, setiap kalimat yang kamu pahami, membawa kamu lebih dekat pada
            impianmu.
            Ingatlah, tidak ada usaha yang sia-sia. Teruslah belajar dengan semangat dan keceriaan. Kimi nara dekiru!"
            <div class="text-center mt-5 fw-bold">Menurut Mereka</div>
            <div class="row mt-3">
                <div class="col-sm-12 col-md-6 col-lg-4 mx-auto my-2">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="icon-account" style="font-size: 1rem"><i
                                        class="fas fa-user"></i>&nbsp;</span>Asep
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mx-auto my-2">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="icon-account" style="font-size: 1rem"><i
                                        class="fas fa-user"></i>&nbsp;</span>Agus
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 mx-auto mx-md-0 my-2">
                    <div class="card">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">
                                <span class="icon-account" style="font-size: 1rem"><i
                                        class="fas fa-user"></i>&nbsp;</span>Rahmat
                            </h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-4">Alamat</h5>
                    <p>Jl. Parak Anau Jl. Aren No.8, Parupuk Tabing, <br> Kec. Koto Tangah, Kota Padang, Sumatera Barat
                        25586
                    </p>
                    <p>+62-812-1838-8011</p>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-4">Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Daftar</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-4">Ikuti Kami</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-tiktok"></i> Tiktok</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p>&copy; 2024 Hoshi Hikari. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
