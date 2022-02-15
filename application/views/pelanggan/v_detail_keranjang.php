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
                <div class="row">
                    <div class="col mt-5"><br>

                        <!-- Batas Memasukan Konten -->
                        <h4>Keranjang Belanja</h4>

                        <table class="table table-bordered table-striped table-hover">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>

                            <?php
                            $no = 1;
                            foreach ($this->cart->contents() as $items) :
                            ?>

                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $items['name'] ?></td>
                                    <td><?php echo $items['kategori'] ?></td>
                                    <td><?php echo $items['tanggal_mulai'] ?></td>
                                    <td><?php echo $items['tanggal_akhir'] ?></td>
                                    <td><?php echo $items['qty'] ?></td>
                                    <td align="right">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                                    <td align="right">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <td align="center" colspan="7">Grand Total</td>
                                <td align="right">Rp. <?php echo number_format($this->cart->total(), 0, ',', '.')  ?></td>
                            </tr>
                        </table>

                        <div align="right">
                            <a href="<?php echo base_url('pelanggan/c_pelanggan/hapus_keranjang') ?>">
                                <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                            </a>
                            <a href="<?php echo base_url('pelanggan/c_pelanggan/data_photographer') ?>">
                                <div class="btn btn-sm btn-primary">Lanjutkan Belanja</div>
                            </a>
                            <a href="<?php echo base_url('pelanggan/c_pelanggan/pemesanan') ?>">
                                <div class="btn btn-sm btn-success">Pembayaran</div>
                            </a>
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