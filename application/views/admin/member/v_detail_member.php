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


                        <h3 class="m-0 text-dark mb-3 mt-3">Detail Data Member</h3>
                        <!-- Main content -->
                        <?php foreach ($member as $mbr) : ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url() . '/uploads_user/' . $mbr->foto ?>" class="card-img-top">
                                </div>
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr>
                                            <td>ID User</td>
                                            <td><strong><?php echo $mbr->id_user; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nama User</td>
                                            <td><strong><?php echo $mbr->nama_pengguna; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td><strong><?php echo $mbr->password; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail</td>
                                            <td><strong><?php echo $mbr->email; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td><strong><?php echo $mbr->telepon_pengguna; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><strong><?php echo $mbr->alamat_pengguna; ?></strong></td>
                                        </tr>
                                    </table>

                                    <?php echo anchor('admin/c_admin/data_member/', '<div class="btn btn-sm btn-danger float-right">Kembali</div>') ?>
                                </div>
                            </div>

                        <?php endforeach; ?>
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