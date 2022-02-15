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
                        <div class="col mt-5">
                            <!-- Batas Memasukan Konten -->
                            <h4>Invoice Pembayaran</h4>
                            <table class="table table-bordered table-hover table-striped" id="example1">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>No Invoice</th>
                                        <th>Total Pembayaran</th>
                                        <th>Bukti Pelunasan</th>
                                        <th width="150px">Bank</th>
                                        <th>Status Pembayaran</th>
                                        <th width="100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pembayaran as $byr) : ?>
                                        <tr>
                                            <td align="center"><?= $no++; ?></td>
                                            <td align="center"><?= $byr->kode_pembayaran; ?></td>
                                            <td align="center"><?= $byr->no_invoice; ?></td>
                                            <td align="right">Rp. <?= number_format($byr->total_pembayaran, 0, ',', '.') ?></td>
                                            <td><?= $byr->bukti_pelunasan; ?></td>
                                            <td><?= $byr->bank; ?></td>
                                            <td><?= $byr->status_pembayaran; ?></td>
                                            <?php if ($byr->metode_pembayaran == 'Cash') : ?>
                                                <td align="center">
                                                    <a href="<?= base_url() . 'invoice/c_invoice/form_pembayaran/' . $byr->no_invoice; ?>" class="btn btn-sm btn-success btn-lg"><i class="fas fa-money-bill-wave"></i>Payment</a>
                                                </td>
                                            <?php else : ?>
                                                <td align="center">
                                                    <a href="<?= base_url() . 'invoice/c_invoice/form_pembayaran/' . $byr->no_invoice; ?>" class="btn btn-sm btn-info btn-lg"><i class="fas fa-money-bill-wave"></i>Payment</a>
                                                </td>
                                            <?php endif; ?>
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