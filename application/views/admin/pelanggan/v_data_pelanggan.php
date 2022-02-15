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

                        <h3 class="m-0 text-dark mb-5 mt-3">Data Pelanggan</h3>
                        <!-- Main content -->


                        <table class="table table-hover" id="example1">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Alamat Pelanggan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pelanggan as $plg) :
                                ?>
                                    <tr>
                                        <th scope="row" align="center"><?= $no++ ?></th>
                                        <td align="center"><?= $plg->nama_pengguna; ?></td>
                                        <td align="center"><?= $plg->email; ?></td>
                                        <td align="center"><?= $plg->password; ?></td>
                                        <td><?= $plg->telepon_pengguna; ?></td>
                                        <td><?= $plg->alamat_pengguna; ?></td>
                                        <td align="center">
                                            <div class="btn btn-sm btn-success">
                                                <a href="<?= base_url() . 'admin/c_admin/detail_pelanggan/' . $plg->id_user; ?>"><i class="fas fa-info-circle bg-success"></i></a>
                                            </div>
                                            <div class="btn btn-sm btn-warning">
                                                <a href="<?= base_url() . 'admin/c_admin/edit_pelanggan/' . $plg->id_user; ?>"><i class="fas fa-edit bg-warning"></i></a>
                                            </div>
                                            <div class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin HAPUS Data ini?')">
                                                <a href="<?= base_url() . 'admin/c_admin/hapus_pelanggan/' . $plg->id_user; ?>"><i class="fas fa-trash bg-red"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- page script -->
</body>

</html>