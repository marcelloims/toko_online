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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="col">
                    <div class="row">
                        <!-- Batas Memasukan Konten -->
                        <div class="col mt-3">
                            <!-- Batas Memasukan Konten -->
                            <h4>Data Pemesanan Anda</h4>

                            <table class="table table-bordered table-hover table-striped mt-5" id="example1">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>No Invoice</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Tanggal Invoice</th>
                                        <th>Status Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th width="100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pesanan as $psn) : ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $psn->no_invoice; ?></td>
                                            <td align="center"><?= $psn->kode_pembayaran; ?></td>
                                            <td align="center"><?= $psn->tanggal_pesanan; ?></td>
                                            <td align="center"><?= $psn->tanggal_invoice; ?></td>
                                            <td align="center"><?= $psn->status_pesanan; ?></td>
                                            <td align="center"><?= $psn->nama_pemesan; ?></td>
                                            <td align="center">
                                                <a href="<?= base_url() . 'invoice/c_invoice/detail_pesanan_pelanggan/' . $psn->no_invoice ?>" class="btn btn-sm btn-info"><i class="fas fa-info-circle bg-info"></i></a>
                                                <a href="<?= base_url() . 'invoice/c_invoice/print_invoice/' . $psn->no_invoice; ?>" class="btn btn-sm btn-light"><i class="fas fa-print bg-light"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- Batas Memasukan Konten -->
                        </div>
                        <!-- Batas Memasukan Konten -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php $this->load->view('_partial_pelanggan/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_partial_pelanggan/js'); ?>
</body>

</html>