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

                        <h3 class="m-0 text-dark mb-3 mt-3">Data Tenant Endorse</h3>
                        <!-- Main content -->
                        <button class="btn btn-sm btn-primary mt-3 mb-3" data-toggle="modal" data-target="#tambah_tenant"><i class="fas fa-plus fa-sm"> Data Tenant</i></button>
                        <!-- Batas Modal -->
                        <div class="modal fade" id="tambah_tenant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Form Input Data Tenant</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?php echo base_url() . 'admin/c_admin/tambah_endorse' ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Tenant Photographer</label>
                                                <input type="text" name="nama_tenant" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Sewa</label>
                                                <input type="text" name="harga_tenant" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Qty</label>
                                                <input type="text" name="qty" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Masuk</label>
                                                <input type="date" name="tanggal_masuk" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Keluar</label>
                                                <input type="date" name="tanggal_keluar" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="alamat_tenant" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" name="kecamatan" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Kabupaten</label>
                                                <input type="text" name="kabupaten" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <input type="text" name="provinsi" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>ID User</label>
                                                <input type="text" name="id_user" class="form-control">
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
                                    <th scope="col">Kode Tenant</th>
                                    <th scope="col">Nama Tenant</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Keluar</th>
                                    <th scope="col">Status Aktif</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($endorse as $end) :
                                ?>
                                    <tr>
                                        <th scope="row" align="center"><?= $no++ ?></th>
                                        <td align="center"><?= $end->kode_tenant; ?></td>
                                        <td><?= $end->nama_tenant; ?></td>
                                        <td align="center"><?= date('d-M-Y', strtotime($end->tanggal_masuk)) ?></td>
                                        <td align="center"><?= date('d-M-Y', strtotime($end->tanggal_keluar)) ?></td>
                                        <td align="center"><?= $end->keterangan; ?></td>
                                        <td align="center">
                                            <a class="btn btn-sm btn-success" href="<?= base_url() . 'admin/c_admin/detail_endorse/' . $end->kode_tenant; ?>"><i class="fas fa-info-circle bg-success"></i></a>
                                            <a class="btn btn-sm btn-warning" href="<?= base_url() . 'admin/c_admin/edit_endorse/' . $end->kode_tenant; ?>"><i class="fas fa-edit bg-warning"></i></a>
                                            <a class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin HAPUS Data ini?')" href="<?= base_url() . 'admin/c_admin/hapus_endorse/' . $end->kode_tenant; ?>"><i class="fas fa-trash bg-red"></i></a>
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