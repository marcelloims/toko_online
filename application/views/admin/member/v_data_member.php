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

                        <h3 class="m-0 text-dark mb-3 mt-3">Data Member</h3>
                        <!-- Main content -->
                        <button class="btn btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#tambah_member"><i class="fas fa-plus fa-sm"> Data Member</i></button>
                        <!-- Batas Modal -->
                        <div class="modal fade" id="tambah_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php echo base_url() . 'admin/c_admin/tambah_member' ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Member</label>
                                                <input type="text" name="nama_pengguna" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>E-Mail</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="text" name="telepon_pengguna" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat_pengguna" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Save changes</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Batas Modal -->


                        <table class="table table-hover" id="example1">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">ID Member</th>
                                    <th scope="col">Nama Member</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($member as $mbr) :
                                ?>
                                    <tr>
                                        <th scope="row" align="center"><?= $no++ ?></th>
                                        <td align="center"><?= $mbr->id_user; ?></td>
                                        <td><?= $mbr->nama_pengguna; ?></td>
                                        <td><?= $mbr->telepon_pengguna ?></td>
                                        <td><?= $mbr->alamat_pengguna; ?></td>
                                        <td align="center">
                                            <div class="btn btn-sm btn-success">
                                                <a href="<?= base_url() . 'admin/c_admin/detail_member/' . $mbr->id_user; ?>"><i class="fas fa-info-circle bg-success"></i></a>
                                            </div>
                                            <div class="btn btn-sm btn-warning">
                                                <a href="<?= base_url() . 'admin/c_admin/edit_member/' . $mbr->id_user; ?>"><i class="fas fa-edit bg-warning"></i></a>
                                            </div>
                                            <div class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin HAPUS Data ini?')">
                                                <a href="<?= base_url() . 'admin/c_admin/hapus_member/' . $mbr->id_user; ?>"><i class="fas fa-trash bg-red"></i></a>
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