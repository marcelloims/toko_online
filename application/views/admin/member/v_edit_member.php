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


                        <h3 class="m-0 text-dark mb-3 mt-3">Form Edit Data Member</h3>
                        <!-- Main content -->
                        <form action="<?php echo base_url() . 'admin/c_admin/update_member' ?>" method="POST" enctype="multipart/form-data">
                            <?php foreach ($member as $mbr) : ?>
                                <div class="form-group">
                                    <label>ID User</label>
                                    <input type="text" name="id_user" class="form-control" value="<?= $mbr->id_user; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" name="nama_pengguna" class="form-control" value="<?= $mbr->nama_pengguna; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control" value="<?= $mbr->password; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= $mbr->email; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="text" name="telepon_pengguna" class="form-control" value="<?= $mbr->telepon_pengguna; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat_pengguna" class="form-control" value="<?= $mbr->alamat_pengguna; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <img src="<?php echo base_url() . '/uploads_user/' . $mbr->foto; ?>" class="card-img-top">
                                </div>
                            <?php endforeach; ?>
                            <?php echo anchor('admin/c_admin/data_member/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
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