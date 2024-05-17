<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Log in</title>
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
                            <h5 class="ms-3 mt-2">Anda Wajib Mengisikan Profile</h5>
                        </div>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control w-100" placeholder="Alamat">
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="birthPlace" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="birthPlace"
                                        placeholder="Tempat lahir">
                                </div>
                                <div class="colsm-12 col-md-6">
                                    <label for="birthDate" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="birthDate">
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="usia">Usia</label>
                                <input type="number" id="usia" name="usia" class="form-control w-25"
                                    placeholder="Usia">
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="pendidikanterakhir" name="pendidikanterakhir"
                                            class="form-label">Pendidikan Terakhir</label>
                                        <select class="form-select" id="pendidikanterakhir" name="pendidikanterakhir">
                                            <option disabled>Pilih Pendidikan Terakhir</option>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">Diploma (D3)</option>
                                            <option value="S1">Sarjana (S1)</option>
                                            <option value="S2">Magister (S2)</option>
                                            <option value="S3">Doktor (S3)</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="jurusan">Jurusan</label>
                                        <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan"
                                            class="form-control mt-2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label for="tinggibadan">Tinggi Badan
                                        <small>-cm</small>
                                    </label>
                                    <input type="number" name="tinggibadan" id="tinggibadan" class="form-control"
                                        placeholder="Tinggi Badan">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="beratbadan">Berat Badan
                                        <small class="">-kg</small>
                                    </label>
                                    <input type="number" name="beratbadan" id="beratbadan" class="form-control"
                                        placeholder="Berat Badan">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nohp">Nohp</label>
                                <input type="text" id="nohp" nohp="nohp" class="form-control w-50"
                                    placeholder="Nohp">
                            </div>
                            <h4 class="mt-4">Anda wajib menjawab semua pertanyaan dibawah ini</h4>
                            <div class="mb-3">
                                <label class="form-label">Apakah Anda mengetahui tentang budaya jepang?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kopi" id="kopiYa"
                                            value="ya">
                                        <label class="form-check-label" for="kopiYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="kopi" id="kopiTidak"
                                            value="tidak">
                                        <label class="form-check-label" for="kopiTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah anda, saudara, family pernah pergi keluar
                                    negri?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pergiKeluarNegri"
                                            id="pergiKeluarNegriYa" value="ya">
                                        <label class="form-check-label" for="pergiKeluarNegriYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="pergiKeluarNegri"
                                            id="pergiKeluarNegriTidak" value="tidak">
                                        <label class="form-check-label" for="pergiKeluarNegriTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah anda mempunyai tindik atau tato?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tindikTato"
                                            id="tindikTatoYa" value="ya">
                                        <label class="form-check-label" for="tindikTatoYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="tindikTato"
                                            id="tindikTatoTidak" value="tidak">
                                        <label class="form-check-label" for="tindikTatoTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah anda sanggup bekerja dibawah tekanan?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bekerjaTekanan"
                                            id="bekerjaTekananYa" value="ya">
                                        <label class="form-check-label" for="bekerjaTekananYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="bekerjaTekanan"
                                            id="bekerjaTekananTidak" value="tidak">
                                        <label class="form-check-label" for="bekerjaTekananTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah kedua orang tua anda masih ada?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="orangTuaMasihAda"
                                            id="orangTuaMasihAdaYa" value="ya">
                                        <label class="form-check-label" for="orangTuaMasihAdaYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="orangTuaMasihAda"
                                            id="orangTuaMasihAdaTidak" value="tidak">
                                        <label class="form-check-label" for="orangTuaMasihAdaTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah orangtua anda mengetahui tentang pendaftaran
                                    ini?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="orangTuaTahu"
                                            id="orangTuaTahuYa" value="ya">
                                        <label class="form-check-label" for="orangTuaTahuYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="orangTuaTahu"
                                            id="orangTuaTahuTidak" value="tidak">
                                        <label class="form-check-label" for="orangTuaTahuTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Untuk mengikuti program ini apakah atas kemauan anda
                                    sendiri?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kemauanSendiri"
                                            id="kemauanSendiriYa" value="ya">
                                        <label class="form-check-label" for="kemauanSendiriYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="kemauanSendiri"
                                            id="kemauanSendiriTidak" value="tidak">
                                        <label class="form-check-label" for="kemauanSendiriTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah anda memiliki cacat tubuh, patah tulang, bekas dan
                                    sebagainya?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cacatTubuh"
                                            id="cacatTubuhYa" value="ya">
                                        <label class="form-check-label" for="cacatTubuhYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="cacatTubuh"
                                            id="cacatTubuhTidak" value="tidak">
                                        <label class="form-check-label" for="cacatTubuhTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah penglihatan anda rabun jauh atau buta Warna?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="rabunButaWarna"
                                            id="rabunButaWarnaYa" value="ya">
                                        <label class="form-check-label" for="rabunButaWarnaYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="rabunButaWarna"
                                            id="rabunButaWarnaTidak" value="tidak">
                                        <label class="form-check-label" for="rabunButaWarnaTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Apakah anda mempunyai gigi palsu?</label>
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gigiPalsu"
                                            id="gigiPalsuYa" value="ya">
                                        <label class="form-check-label" for="gigiPalsuYa">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check ms-5">
                                        <input class="form-check-input" type="radio" name="gigiPalsu"
                                            id="gigiPalsuTidak" value="tidak">
                                        <label class="form-check-label" for="gigiPalsuTidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-3">Jawab Pertanyaan ini dengan baik dan benar</h4>
                            <div class="mb-3">
                                <label for="soal1" class="mb-3">1. Menurut anda apa definisi kesuksesan ?</label>
                                <textarea name="soal1" id="soal1" cols="30" rows="10" style="max-height:100px;"
                                    class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="soal2" class="mb-3">2. Menurut anda apa definisi kegagalan ?</label>
                                <textarea name="soal2" id="soal2" cols="30" rows="10" style="max-height:100px;"
                                    class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Simpan</button>
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
