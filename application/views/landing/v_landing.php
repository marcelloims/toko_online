<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!-- My_CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/style.css">
    <title>SIMTOTIS</title>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">Simtotis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">Photographer</a>
                    <a class="nav-link" href="#">Makeup Artist</a>
                    <a class="nav-link" href="#">Endorsement</a>
                    <a class="btn btn-primary tombol" href="#">Join Us</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->


    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo base_url('assets/dist/img/tiket1.jpg') ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url('assets/dist/img/tiket2.jpg') ?>" class=" d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?php echo base_url('assets/dist/img/tiket3.jpg') ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->


    <!-- Container -->
    <div class="container">


        <!-- Info Panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row ">
                    <div class="col-lg mt-5 mr-5">
                        <span class="ml-3">Hai kamu,</span><br>
                        <span class="ml-5">Mau cari apa?</span>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/photographer.png" alt="Photographer">
                        <h4>Photographer</h4>
                        <p>Aku siap mengabadikan cerita kamu.</p>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/makeup_artist.png" alt="Photographer">
                        <h4>Makeup Artist</h4>
                        <p>Aku siap buat mempercantik dirimu</p>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/endorse.png" alt="Photographer">
                        <h4>Endorse</h4>
                        <p>Aku siap memperkenalkan produk kamu</p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-lg">
                        <h4>Tanggal Mulai</h4>
                        <input type="date" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Tanggal Akhir</h4>
                        <input type="date" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Provinsi</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Kabupaten</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Kecamatan</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                </div>
                <hr>
                <div class="row text-center float-right">
                    <div class="col-lg">
                        <button class="btn btn-primary tombol">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Info Panel -->


        <!-- Working Space -->
        <div class="row workingspace">
            <div class="col">
                <img src="<?= base_url() ?>assets/dist/img/profile.png" alt="profile" class="img-fluid float-left mr-5">
                <h4 class="h">Simple Profile</h4>
                <p class="p">Pesan lebih cepat dan mudah dengan sekali klik</p>
            </div>
            <div class="col">
                <img src="<?= base_url() ?>assets/dist/img/selling.png" alt="profile" class="img-fluid float-left mr-5">
                <h4 class="h">Simple Selling</h4>
                <p class="p">Memudahkan anda dalam menjual jasa anda dimana saja</p>
            </div>
        </div>
        <div class="row workingspace">
            <div class="col">
                <img src="<?= base_url() ?>assets/dist/img/calendar.png" alt="profile" class="img-fluid float-left mr-5">
                <h4 class="h">Simple Booking</h4>
                <p class="p">Mudahkan anda mencari jasa Photographer, Makeup Artist, dan Endorsement</p>
            </div>
            <div class="col">
                <img src="<?= base_url() ?>assets/dist/img/buying.png" alt="profile" class="img-fluid float-left mr-5">
                <h4 class="h">Simple Payments</h4>
                <p class="p">Kami telah menyediakan pembayaran yang aman dan cepat demi kenyamanan anda</p>
            </div>
        </div>
        <!-- Working Space -->
        <hr>
    </div>
    <!-- Container -->

    <!-- Footer -->
    <div class="container-fluid" style="background-color: white;">

        <div class="container text-center text-md-left mt-5">
            <div class="row">
                <div class="col-lg col-md-6 mb-4 mt-3">
                    <ul class="list-unstyled">
                        <li>
                            <div class="row justify-content-center text-center">
                                <div class="col mb-4 mt-4 d-flex text-center">
                                    <img src="<?= base_url() ?>assets/dist/img/logo.png" class="float-left ml-5 mr-3 gambar_logo" alt="Simtotis">
                                    <h6 class="font_logo">SIMTOTIS</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/whatsapp.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
                            <h6 class="font_footer">0896-6090-9030</h6>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/instagram.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
                            <h6 class="font_footer">@simtotis</h6>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/telegram.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
                            <h6 class="font_footer">0896-6090-9030</h6>
                        </li>
                    </ul>
                </div>
                <div class="col-lg col-md-6 mb-4 mt-5">
                    <h6 class="text-uppercase font-weight-bold">Perusahaan</h6>
                    <hr class="bg-warning mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 2px;">
                    <ul class="list-unstyled">
                        <li>Blog</li>
                        <li>Karir</li>
                        <li>Corporate</li>
                        <li>Perlindungan</li>
                    </ul>
                </div>
                <div class="col-lg col-md-6 mb-4 mt-5">
                    <h6 class="text-uppercase font-weight-bold">Produk</h6>
                    <hr class="bg-warning mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 2px;">
                    <ul class="list-unstyled">
                        <li>Photographer</li>
                        <li>Makeup Artist</li>
                        <li>Endorse</li>
                    </ul>
                </div>
                <div class="col-lg col-md-6 mb-4 mt-5">
                    <h6 class="text-uppercase font-weight-bold">Dukungan</h6>
                    <hr class="bg-warning mb-4 mt-0 d-inline-block max-auto" style="width: 125px; height: 2px;">
                    <ul class="list-unstyled">
                        <li>Pusat Bantuan</li>
                        <li>Kebijakan Privasi</li>
                        <li>Syarat dan Ketentuan</li>
                        <li>Daftarkan Usaha Anda</li>
                        <li>Cicilan</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row footer bg-white">
            <div class="col-lg text-center">
                <p class="font_footer mt-3">2020 All Rights Reserved by Marcello Imanuel.</p>
            </div>
        </div>

    </div>
    <!-- Footer -->






    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>