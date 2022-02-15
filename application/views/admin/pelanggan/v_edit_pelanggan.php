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


                        <h3 class="m-0 text-dark mb-3 mt-3">Form Edit Pelanggan</h3>
                        <!-- Main content -->
                        <form action="<?php echo base_url() . 'admin/c_admin/update_pelanggan' ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode_tenant" class="form-control" value="<?= $pelanggan['id_user'] ?>">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4 col-12 mb-3">
                                        <img src="<?php echo base_url() . '/uploads_user/' . $pelanggan['foto']; ?>" class="card-img-top">
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <label>ID User</label>
                                        <input type="text" name="id_user" class="form-control" value="<?= $pelanggan['id_user'] ?>" readonly>

                                        <label>Nama Pengguna</label>
                                        <input type="text" name="nama_pengguna" class="form-control" value="<?= $pelanggan['nama_pengguna'] ?>">

                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?= $pelanggan['email'] ?>">
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" value="<?= $pelanggan['password'] ?>">

                                        <label>Telepon</label>
                                        <input type="text" name="telepon_pengguna" class="form-control" value="<?= $pelanggan['telepon_pengguna'] ?>">

                                        <label>Foto</label>
                                        <input type="file" name="foto" class="form-control mb-3">


                                        <label>Alamat</label>
                                        <input type="text" name="alamat_pengguna" class="form-control" value="<?= $pelanggan['alamat_pengguna'] ?>">

                                    </div>

                                </div>
                            </div>


                            <a href="<?= base_url() ?>admin/c_admin/data_pelanggan" class="btn btn-sm btn-danger float-right">Kembali</a>
                            <button type="submit" class="btn btn-sm btn-primary mb-3 float-right mr-2">Simpan</button>

                        </form>
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

    </script>
    <!-- page script -->
</body>

</html>