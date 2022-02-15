<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php $this->load->view('_partial_pelanggan/header'); ?>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partial_pelanggan/navbar'); ?>
        <!-- /.navbar -->

        <!-- Container -->
        <div class="container-fluid" style="background-color: #2b7df8;">
            <!-- Info Panel -->
            <div class="row justify-content-center">
                <div class="col-10 info-panel mt-3 mb-3">
                    <div class="row ">
                        <div class="col-lg mt-5 mr-5">
                            <span class="ml-3">Hai kamu,</span><br>
                            <span class="ml-5">Mau cari apa?</span>
                        </div>
                        <div class="col-lg text-center">
                            <img src="<?= base_url() ?>assets/dist/img/icon/photographer.png" alt="Photographer">
                            <h4>Photographer</h4>
                            <p>Aku siap mengabadikan cerita kamu.</p>
                        </div>
                        <div class="col-lg text-center">
                            <img src="<?= base_url() ?>assets/dist/img/icon/makeupartist.png" alt="Photographer">
                            <h4>Makeup Artist</h4>
                            <p>Aku siap buat mempercantik dirimu</p>
                        </div>
                        <div class="col-lg text-center">
                            <img src="<?= base_url() ?>assets/dist/img/icon/endorse.png" alt="Photographer">
                            <h4>Endorse</h4>
                            <p>Aku siap memperkenalkan produk kamu</p>
                        </div>
                    </div>
                    <hr>
                    <form method="GET" action="<?= base_url() ?>pelanggan/c_pelanggan/data_endorse">
                        <div class="row text-center">
                            <div class="col-lg">
                                <h4>Tanggal Mulai</h4>
                                <input type="date" name="tanggal_mulai" class="form-control btn-outline-info" value="<?php echo isset($_GET['tanggal_mulai'])
                                                                                                                            ? $_GET['tanggal_mulai'] : '' ?>">
                            </div>
                            <div class="col-lg text-center">
                                <h4>Tanggal Akhir</h4>
                                <input type="date" name="tanggal_akhir" class="form-control btn-outline-info" value="<?php echo isset($_GET['tanggal_akhir'])
                                                                                                                            ? $_GET['tanggal_akhir'] : '' ?>">
                            </div>
                            <!-- <div class="col-lg text-center">
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
                            </div> -->
                        </div>
                        <hr>
                        <div class="row text-center float-right">
                            <?php
                            if (isset($error) && !empty($error)) : ?>
                                <div class="alert alert-light alert-dismissible fade show" role="alert">
                                    <i class="fas fa-info-circle"></i> <?= $error ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg">
                                <button class="btn btn-primary tombol">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Info Panel -->

        </div>
        <!-- Container -->

        <!-- Working Space -->

        <div class="container-fluid bg-light">
            <div class=" row">
                <?php foreach ($query as $pht) : ?>
                    <div class="card mt-3 mr-3 ml-3" style="width: 14rem;">
                        <div class="benner_logo" style="background-image: url('<?= base_url() . '/uploads_tenant/' . $pht->logo; ?>')"></div>
                        <!-- <img src="<?= base_url() . '/uploads_tenant/' . $pht->logo; ?>" class="card-img-top" alt="..."> -->
                        <div class="card-body text-center">
                            <h5 class="card-title-center text-blue"><?= $pht->nama_tenant; ?></h5>
                            <p>Rp. <?= number_format($pht->harga_tenant, 0, ',', '.') . "<br>";
                                    echo $pht->kabupaten . " - ";
                                    echo $pht->provinsi; ?> </p>

                            <form method="GET" action="<?= base_url('pelanggan/c_pelanggan/tambah_ke_keranjang/') . $pht->kode_tenant ?>">
                                <input type="hidden" name="tanggal_mulai" class="form-control" value="<?php echo isset($_GET['tanggal_mulai'])
                                                                                                            ? $_GET['tanggal_mulai'] : '' ?>">
                                <input type="hidden" name="tanggal_akhir" class="form-control" value="<?php echo isset($_GET['tanggal_akhir'])
                                                                                                            ? $_GET['tanggal_akhir'] : '' ?>">
                                <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"> Pesan</i></button>
                                <a href="<?= base_url('pelanggan/c_pelanggan/detail_photographer/' . $pht->kode_tenant) ?>" class="btn btn-outline-info"><i class="fa fa-info-circle" aria-hidden="true"> Detail</i></a>
                            </form>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Working Space -->

        <!-- Main Footer -->
        <div class="container text-center text-md-left ">
            <div class="row">
                <div class="col-lg col-md-6 mb-4 ">
                    <ul class="list-unstyled">
                        <li>
                            <div class="row justify-content-center text-center">
                                <div class="col mb-4 mt-4 d-flex text-center">
                                    <img src="<?= base_url() ?>assets/dist/img/icon/logo.png" class="float-left ml-5 mr-3 gambar_logo" alt="Simtotis">
                                    <h6 class="font_logo">SIMTOTIS</h6>
                                </div>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/icon/whatsapp.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
                            <h6 class="font_footer">0896-6090-9030</h6>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/icon/instagram.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
                            <h6 class="font_footer">@simtotis</h6>
                        </li>
                        <li>
                            <img src="<?= base_url() ?>assets/dist/img/icon/telegram.png" class="float-left ml-5 mr-3 gambar_contact" alt="Simtotis">
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
        <?php $this->load->view('_partial_pelanggan/footer'); ?>
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_partial_pelanggan/js'); ?>
</body>

</html>