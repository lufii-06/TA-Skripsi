<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scasmle=1">
    <title>Hoshi Hikari</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        .navbar {
            transition: background-color 0.3s ease;
        }

        .navbar.bg-dark {
            background-color: #343a40 !important;
            /* Ganti dengan warna latar belakang navbar yang Anda inginkan */
        }


        html,
        body {
            font-family: 'Montserrat', sans-serif;
        }

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

        /* .gambar1 {
            height: 28rem;
        } */

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

        @media (max-width: 575.98px) {
            .custom-mt-sm {
                margin-top: 24px !important;
            }
        }

        .position-relative img {
            transition: filter 0.3s ease-in-out;
        }

        .position-relative:hover img {
            filter: brightness(70%);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .position-relative:hover .image-overlay {
            opacity: 1;
        }

        .overlay-content {
            text-align: center;
        }

        .row.d-flex.overflow-auto::-webkit-scrollbar-track {
            background-color: #888;
            /* Warna thumb scrollbar */
            border-radius: 6px;
            /* Radius border thumb scrollbar */
        }

        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .navbar,
        .dark-mode .card {
            color: #ffffff;
        }

        .mode-toggle-btn {
            position: fixed;
            top: 50%;
            left: 20px;

            transform: translateY(-50%);

            z-index: 9999;

            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            background-color: #333;
            color: #fff;
            border: 2px solid #fff;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
        }

        .mode-toggle-btn:hover {
            background-color: #fff;
            color: #333;
            transform: translateY(-50%) scale(1.1);
        }

        .dark-mode .mode-toggle-btn {
            background-color: #fff;
            color: #333;
            border-color: #333;
        }

        .dark-mode .mode-toggle-btn:hover {
            background-color: #333;
            color: #fff;
        }

        .ajakan {
            transition: background-color 0.3s;
        }

        .item:hover {
            color: #EB1616;
        }

        .btn-outline-custom {
            color: #EB1616;
            background-color: transparent;
            border: 1px solid #EB1616;
            /* padding: 10px 20px; */
            border-radius: 1rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            cursor: pointer;
        }

        .btn-outline-custom:hover {
            color: #fff;
            background-color: #EB1616;
            border-color: #EB1616;
        }
    </style>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="" data-bs-theme="dark" style="font-family: 'Montserrat', sans-serif;">
    <div class="jumbotron">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="#"><b class="fs-3 item">星光</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mx-auto mb-2 mb-lg-0 ">
                        <li class="nav-item mx-2">
                            <a class="nav-link active text-white fs-5 fw-bold" aria-current="page" href="#home">
                                <div class="item">Home</div>
                            </a>
                        </li>
                        <li class="nav-item mx-2 ">
                            <a class="nav-link text-white fs-5 fw-bold" href="#about">
                                <div class="item">About</div>
                            </a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <a style="text-decoration: none;" href="{{ route('login') }}" class="text-white fs-5 fw-bold">
                            <span class="icon-account item" style="font-size: 1rem"><i
                                    class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;Log
                                in</span>
                        </a>
                    </span>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column mb-3" style="height:25rem">
            <button id="darkModeToggle" class="btn btn-dark mode-toggle-btn" onclick="dark()">🌙</button>
            <div class="mx-auto my-auto" data-aos="zoom-in-up" data-aos-duration="1000" data-aos-mirror="true">
                <h5 class="text-white text-center fs-1">いらっしゃいませ</h5>
                <h5 class="text-white text-center fs-4" style="font-family: 'Montserrat', sans-serif;">Selamat Datang
                </h5>
                <h1 class="text-white text-center tulisan" style="font-family: 'Montserrat', sans-serif;"><b>Hoshi
                        Hikari</b></h1>
            </div>
        </div>
    </div>

    <div class="container" id="home">
        <div class="d-flex justify-content-between flex-column flex-lg-row">
            <div class="overflow-hidden text-center">
                <img src="{{ asset('images/background.png') }}" alt="" class="gambar mt-5 img-fluid w-75 w-lg-100"
                    data-aos="fade-up-right" style="border-radius: 50px" data-aos-mirror="true" data-aos-delay="500"
                    data-aos-duration="3000">
            </div>
            <div class="d-flex align-items-center">
                <h5 class=" ms-5 custom-mt-sm">
                    <div class="fs-1 " style="color: #EB1616"><b>言語と文化</b></div>
                    <div class="fs-4 fw-bold">{{ 'Bahasa & Budaya' }}</div>
                    <div class="fs-5 mt-3 mb-4 text-body-secondary text-justify">
                        "Bahasa dan Budaya" mencerminkan hubungan erat antara cara kita berkomunikasi dan kehidupan
                        budaya
                        kita. "Bahasa" adalah alat komunikasi yang penting, sementara "budaya" mencakup nilai-nilai dan
                        tradisi masyarakat. Gabungan keduanya menekankan pentingnya bahasa dalam memelihara keberagaman
                        budaya yang kaya.
                    </div>
                    <a href="{{ route('register') }}" class="px-2 py-2 btn-outline-custom"
                        style="text-decoration: none">Daftar Sekarang</a>
                </h5>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-column flex-lg-row">
            <div class="d-flex align-items-center">
                <h5 class="ms-5 mt-sm-4 custom-mt-sm">
                    <div class="fs-1 " style="color: #EB1616"><b>日本語学校</b></div>
                    <div class="fs-4 fw-bold">{{ 'Sekolah Bahasa Jepang' }}</div>
                    <div class="fs-5 mt-3 text-body-secondary text-justify mb-4">
                        Sekolah bahasa Jepang mengajarkan bahasa dan budaya Jepang kepada non-penutur asli, mencakup
                        keterampilan berbahasa dan pengetahuan budaya. Programnya bervariasi, termasuk persiapan ujian
                        JLPT
                        serta studi dan kerja di Jepang. <br>
                    </div>
                    <div class="d-inline-flex flex-column">
                        <a href="" class="btn-outline-custom px-2 py-2 mb-2 me-auto"
                            style="text-decoration: none" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Jadwal
                            Belajar</a>
                        <a href="{{ route('sensei-create') }}" class="btn-outline-custom px-2 py-2"
                            style="text-decoration: none">Daftar Sebagai Pengajar</a>
                    </div>
                </h5>
            </div>
            <div class="overflow-hidden">
                <img src="{{ asset('images/background2.png') }}" alt="" class="ms-5 gambar1 img-fluid w-75 w-lg-100 mt-3"
                    data-aos="zoom-in-left" style="border-radius: 50px" data-aos-mirror="true"
                    data-aos-duration="3000">
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Jadwal Belajar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Senin - jumat</td>
                                <td>08:00 - 10:00, 14:15 - 16:15</td>
                            </tr>
                            <tr>
                                <td>Sabtu</td>
                                <td>08:00 - 10:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-outline-custom p-2" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div id="ajakanContainer" class="container-fluid mt-5 py-4 ajakan">
        <div class="container fs-4 text-justify text-white" style="font-family: 'Montserrat', sans-serif;">
            "新しい言葉を学ぶたびに、理解する文を理解するたびに、夢に一歩近づきます。どんな努力も無駄ではありません。情熱と喜びを持って学び続けてください。君ならできる！" <br>
            "Setiap kata baru yang kamu pelajari, setiap kalimat yang kamu pahami, membawa kamu lebih dekat pada
            impianmu.
            Ingatlah, tidak ada usaha yang sia-sia. Teruslah belajar dengan semangat dan keceriaan. Kimi nara dekiru!"
        </div>
    </div>
    <div id="about" class=" pb-5"></div>
    <div class="container">
        <div class="text-center mt-5 fs-2 fw-bold">Program kami</div>
        <div class="row mt-3 bg-danger-rgb">
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto my-2">
                <div class="card">
                    <div class="card-body" style="height: 12rem">
                        <h5 class="card-title">
                            <span class="icon-account" style="font-size: 1rem"><i
                                    class="fas fa-book-open fs-3"></i>&nbsp;</span>Pelajaran Bahasa Jepang
                        </h5>
                        <p class="card-text text-justify">program pelajaran bahasa Jepang yang mencakup kursus intensif
                            untuk mempersiapkan peserta dengan kemampuan berkomunikasi di lingkungan profesional Jepang.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto my-2">
                <div class="card">
                    <div class="card-body" style="height: 12rem">
                        <h5 class="card-title">
                            <span class="icon-account" style="font-size: 1rem"><i
                                    class="fas fa-user-nurse fs-3"></i>&nbsp;</span>Persiapan Calon Pekerja Jepang
                        </h5>
                        <p class="card-text text-justify">program persiapan calon pekerja Jepang, termasuk pelatihan
                            budaya dan etika kerja, simulasi lingkungan kerja.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 mx-auto mx-md-0 my-2">
                <div class="card">
                    <div class="card-body" style="height: 12rem">
                        <h5 class="card-title">
                            <span class="icon-account" style="font-size: 1rem"><i
                                    class="fa-solid fa-certificate fs-3"></i>&nbsp;</span>Pelatihan SSW
                        </h5>
                        <p class="card-text text-justify">Program pelatihan SSW dirancang untuk membantu peserta mengembangkan
                            keterampilan berbahasa
                            Jepang dalam suatu bidang pekerjaan.</p>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="text-center my-5 fw-bold fs-2">Bidang Pekerjaan</h5>
        <div class="row d-flex overflow-auto pb-2">
            <div class="d-flex border">
                <div class="mx-2 me-2 position-relative border" data-aos="flip-left" data-aos-mirror="true"
                    data-aos-delay="100">
                    <img class="img-fluid" src="{{ asset('images/industri.jpg') }}"
                        style="max-width: 20rem; height: 12rem" alt="">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-none">
                        <div class="overlay-content text-center text-white">
                            <p>Industri</p>
                            {{-- <button class="btn btn-primary">Tombol 1</button> --}}
                        </div>
                    </div>
                </div>
                <div class="mx-2 me-2 position-relative" data-aos="flip-left" data-aos-mirror="true"
                    data-aos-delay="500">
                    <img class="img-fluid" src="{{ asset('images/konstruksi.png') }}"
                        style="max-width: 20rem; height: 12rem" alt="">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-none">
                        <div class="overlay-content text-center text-white">
                            <p>Konstruksi</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 me-2 position-relative" data-aos="flip-left" data-aos-mirror="true"
                    data-aos-delay="900">
                    <img class="img-fluid" src="{{ asset('images/perawat.png') }}"
                        style="max-width: 20rem; height: 12rem" alt="">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-none">
                        <div class="overlay-content text-center text-white">
                            <p>Perawat <br> Lansia</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 me-2 position-relative" data-aos="flip-left" data-aos-mirror="true"
                    data-aos-delay="1300">
                    <img class="img-fluid" src="{{ asset('images/pertanian.jpg') }}"
                        style="max-width: 20rem; height: 12rem" alt="">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-none">
                        <div class="overlay-content text-center text-white">
                            <p>Pertanian</p>
                        </div>
                    </div>
                </div>
                <div class="mx-2 me-2 position-relative" data-aos="flip-left" data-aos-mirror="true"
                    data-aos-delay="1700">
                    <img class="img-fluid" src="{{ asset('images/restoran.jpg') }}"
                        style="max-width: 20rem;height: 12rem" alt="">
                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-none">
                        <div class="overlay-content text-center text-white">
                            <p>Restoran</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-lg-6 d-flex justify-content-center">
                <img class="mb-4" src="{{ asset('images/background3.png') }}" style="height: 17.7rem"
                    alt="">
            </div>
            <div class="col-sm-12 col-lg-6 fs-5 text-justify d-flex align-items-center ">
                "Ayo!! bergabunglah dengan LPK kami untuk pelatihan keterampilan terbaik dan persiapan karier yang
                mantap.
                Dengan fasilitas lengkap, pengajar berpengalaman, dan dukungan penuh, kami siap memandu Anda menuju
                sukses dalam dunia kerja. Temukan potensi Anda bersama kami dan mulailah perjalanan menuju masa depan
                yang cerah!"
            </div>
        </div>
    </div>
    </div>

    <footer class="bg-dark text-white py-4 mt-5" style="border-top: 2px solid white;">
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
                        <li><a href="#home" class="text-white" style="text-decoration: none">Home</a></li>
                        <li><a href="#about" class="text-white" style="text-decoration: none">About</a></li>
                        <li><a href="{{ route('register') }}" class="text-white" style="text-decoration: none">Daftar</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-4">Ikuti Kami</h5>
                    <ul class="list-unstyled">
                        {{-- <li><a href="#" class="text-white" style="text-decoration: none"><i
                                    class="fab fa-facebook"></i> Facebook</a></li> --}}
                        <li><a href="https://www.tiktok.com/@bonihikari?_t=8mfilQkjOm9&_r=1" class="text-white" style="text-decoration: none" target="_blank"><i
                                    class="fab fa-tiktok"></i> Tiktok</a></li>
                        <li><a href="https://www.instagram.com/lpkhoshi_hikariofficial?igsh=aGw4c2V3Z2QxeW1q"
                                target="_blank" class="text-white" style="text-decoration: none"><i
                                    class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="https://kelembagaan.kemnaker.go.id/home/companies/d517b234-e261-4b3f-92ef-68cd0e33fb06/profiles" target="_blank"
                                class="text-white" style="text-decoration: none"><i class="fas fa-building"></i>
                                kemnaker</a></li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4">
            <div class="text-center">
                <p>&copy; 2024 Hoshi Hikari. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            var navbar = document.querySelector('.navbar');
            if (window.scrollY > 0) {
                navbar.classList.add('bg-dark');
            } else {
                navbar.classList.remove('bg-dark');
            }
        });

        document.querySelectorAll('.position-relative').forEach(function(element) {
            element.addEventListener('mouseenter', function() {
                element.querySelector('.image-overlay').classList.remove('d-none');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var element = document.body;
            if (element.dataset.bsTheme) {
                element.dataset.bsTheme = "dark";
            }
            const ajakanContainer = document.getElementById('ajakanContainer');
            ajakanContainer.style.backgroundColor = element.dataset.bsTheme === "dark" ? '#333' : '#EB1616';
        });

        function dark() {
            var element = document.body;
            element.dataset.bsTheme = element.dataset.bsTheme == "light" ? "dark" : "light";

            var darkModeToggle = document.getElementById('darkModeToggle');
            if (element.dataset.bsTheme === "dark") {
                darkModeToggle.classList.remove('btn-dark');
                darkModeToggle.classList.add('btn-light');
                darkModeToggle.innerText = "☀️";
            } else {
                darkModeToggle.classList.remove('btn-light');
                darkModeToggle.classList.add('btn-dark');
                darkModeToggle.innerText = "🌙";
            }
            const ajakanContainer = document.getElementById('ajakanContainer');
            ajakanContainer.style.backgroundColor = element.dataset.bsTheme === "dark" ? '#333' : '#EB1616';
        }
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
