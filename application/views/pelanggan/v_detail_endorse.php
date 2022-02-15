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

        <!-- Main Sidebar Container -->
        <?php $this->load->view('_partial_pelanggan/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Batas Konten -->


                        <h3 class="m-0 text-dark mb-3 mt-3">Detail Data Endorsement</h3>
                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">
                                                <img src="<?php echo base_url() . '/uploads_tenant/' . $endorse->logo; ?>" class="product-image" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3"><?= $endorse->nama_tenant ?></h3>
                                            <h3>ID User<?= $endorse->id_user ?></h3>
                                            <p>Kami sangat mengutamankan kemauan pelanggan agar mendapatkan kepuasan dan pengalaman yang tak terlupakan.</p>

                                            <hr>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h4><?= $endorse->status ?></h4>
                                                </div>
                                                <div class="col-lg-2">
                                                    <h4>Qty : <?= $endorse->qty ?></h4>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h4>Kategori : <?= $endorse->kategori ?></h4>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><?= $endorse->alamat_tenant ?>, <?= $endorse->kecamatan ?>. <?= $endorse->kabupaten ?> - <?= $endorse->provinsi ?></h5>
                                                </div>
                                            </div>

                                            <div class="bg-gray py-2 px-3 mt-4">
                                                <h2 class="mb-0 text-right">
                                                    Rp. <?= number_format($endorse->harga_tenant, 0,  ',', '.') ?>
                                                </h2>
                                            </div>

                                            <div class="mt-4 product-share float-right">
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-facebook-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-twitter-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-envelope-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-rss-square fa-2x"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </section>
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-solid">
                                            <div class="row mt-3 ml-1 mr-1">
                                                <?php foreach ($photo as $pht) : ?>
                                                    <div class="rounded float-left col-lg-3 ">
                                                        <a href="<?php echo base_url() . '/uploads_gallery/' . $pht->foto; ?>" data-toggle="lightbox" data-title="<?= $pht->foto ?>">
                                                            <img src="<?php echo base_url() . '/uploads_gallery/' . $pht->foto; ?>" class="img-fluid mb-2" alt="white sample" />
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="card card-solid">
                                            <div class="row  ml-1">
                                                <?php foreach ($video as $vid) : ?>
                                                    <div class="rounded float-left col-lg-3 mb-3">
                                                        <video width="257px" height="250px" controls>
                                                            <source src="<?php echo base_url() . '/uploads_gallery/' . $vid->video; ?>" type="video/mp4">
                                                            <source src="<?php echo base_url() . '/uploads_gallery/' . $vid->video; ?>" type="video/ogg">
                                                        </video>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- Main content -->
                        <!-- Batas Konten -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <?php $this->load->view('_partial_pelanggan/control_sidebar'); ?>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php $this->load->view('_partial_pelanggan/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_partial_pelanggan/js'); ?>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });
        })
    </script>
</body>

</html>