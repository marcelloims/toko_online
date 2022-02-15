<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_partial_admin/header'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- ./wrapper -->
    <div class="wrapper">
        <?php $this->load->view('_partial_admin/navbar'); ?>
        <?php $this->load->view('_partial_admin/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Batas Konten -->


                        <h3 class="m-0 text-dark mb-3 mt-3">Detail Data Makeup Artist</h3>
                        <!-- Main content -->
                        <section class="content">

                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">
                                                <img src="<?php echo base_url() . '/uploads_tenant/' . $makeup->logo; ?>" class="product-image" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3">Kode: <?= $makeup->kode_tenant ?> - <?= $makeup->nama_tenant ?></h3>
                                            <h3>ID User<?= $makeup->id_user ?></h3>
                                            <p>Kami sangat mengutamankan kemauan pelanggan agar mendapatkan kepuasan dan pengalaman yang tak terlupakan.</p>

                                            <hr>

                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <h4><?= $makeup->status ?></h4>
                                                </div>
                                                <div class="col-lg-2">
                                                    <h4>Qty : <?= $makeup->qty ?></h4>
                                                </div>
                                                <div class="col-lg-7">
                                                    <h4>Kategori : <?= $makeup->kategori ?></h4>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h5><?= $makeup->alamat_tenant ?>, <?= $makeup->kecamatan ?>. <?= $makeup->kabupaten ?> - <?= $makeup->provinsi ?></h5>
                                                </div>
                                            </div>

                                            <div class="bg-gray py-2 px-3 mt-4">
                                                <h2 class="mb-0 text-right">
                                                    Rp. <?= number_format($makeup->harga_tenant, 0,  ',', '.') ?>
                                                </h2>
                                            </div>

                                            <div class="mt-4 float-right">
                                                <a href="<?= base_url() ?>admin/c_admin/data_makeup/" class="btn btn-danger btn-flat mr-2">
                                                    <i class="fa fa-arrow-left bg-danger" aria-hidden="true"> Back</i>
                                                </a>
                                                <button type="button" class="btn btn-primary ml-3 float-right" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-plus"></i> Photo
                                                </button>
                                                <button type="button" class="btn btn-primary ml-3 float-right" data-toggle="modal" data-target="#exampleModal1">
                                                    <i class="fas fa-plus"></i> Video
                                                </button>
                                            </div>

                                            <div class="mt-4 product-share">
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
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/c_admin/tambah_foto_makeup/' . $makeup->kode_tenant) ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Foto</label>
                                                                <input type="file" name="foto" class="form-control-file" id="formGroupExampleInput" placeholder="Example input placeholder">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput2">Kode Tenant</label>
                                                                <input type="text" name="kode_tenant" class="form-control" id="formGroupExampleInput2" placeholder="Kode Tenant">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('admin/c_admin/tambah_video_makeup/' . $makeup->kode_tenant) ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Video</label>
                                                                <input type="file" name="video" class="form-control-file" id="formGroupExampleInput" placeholder="Example input placeholder">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput2">Kode Tenant</label>
                                                                <input type="text" name="kode_tenant" class="form-control" id="formGroupExampleInput2" placeholder="Kode Tenant">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-solid">
                                            <div class="row mt-3 ml-1 mr-1">
                                                <?php foreach ($photo as $pht) : ?>
                                                    <div class="rounded float-left col-lg-3 ">
                                                        <a href="<?= base_url('admin/c_admin/hapus_foto_makeup/' . $pht->kode_photo) ?>" class="btn btn-sm btn-danger float-right"><i class="fas fa-close bg-danger"></i></a>
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
                                                        <a href="<?= base_url('admin/c_admin/hapus_video_makeup/' . $vid->kode_video) ?>" class="btn btn-sm btn-danger float-right mt-3"><i class="fas fa-close bg-danger"></i></a>
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
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view('_partial_admin/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- page script -->
    <?php $this->load->view('_partial_admin/js'); ?>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
    </script>
    <!-- page script -->
</body>

</html>