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
            <!-- Batas Memasukan Konten -->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php $grand_total = 0;
                        if ($keranjang = $this->cart->contents()) {
                            foreach ($keranjang as $item) {
                                $grand_total = $grand_total + $item['subtotal'];
                            }
                            echo "<div class='btn btn-sm btn-success mt-3'>";
                            echo "<h4>Total Belanja Anda : Rp. " . number_format($grand_total, 0, ',', '.');
                            echo "</div>"
                        ?>
                            <br>
                            <h3>Input Alamat dan Pembayaran Customer</h3>
                            <form action="<?= base_url() ?>pelanggan/c_pelanggan/proses_pesanan" method="POST">
                                <div class="form-group">
                                    <label>Nama Pemesan</label>
                                    <input type="hidden" name="total_pembayaran" value="<?= $grand_total; ?>">
                                    <input type="text" name="nama_pemesan" placeholder="Nama Lengkap Pemesan" class="form-control" value="<?= $this->session->userdata('nama_pengguna'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon Pemesan</label>
                                    <input type="text" name="telepon_pemesan" placeholder="No Telepon Pemesan" class="form-control" value="<?= $this->session->userdata('telepon_pengguna'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Pemesan</label>
                                    <input type="text" name="alamat_pemesan" placeholder="Alamat Lengkap Pemesan" class="form-control" value="<?= $this->session->userdata('alamat_pengguna'); ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pilih Pembayaran</label>
                                    <select class="form-control" name="metode_pembayaran">
                                        <option value="Cash">Cash</option>
                                        <option value="Down Payment">Down Payment</option>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Total Bayar [ DP / LUNAS ] Sesuai Pilihan Pembayaran</label>
                                    <input type="text" name="total_bayar" placeholder="Total Bayar" class="form-control">
                                </div> -->
                                <div class="form-group">
                                    <label>Pilih Bank</label>
                                    <select class="form-control" name="bank">
                                        <option value="BCA - XXXXXXX">BCA - XXXXXXX</option>
                                        <option value="BNI - XXXXXXX">BNI - XXXXXXX</option>
                                        <option value="BRI - XXXXXXX">BRI - XXXXXXX</option>
                                        <option value="MANDIRI - XXXXXXX">MANDIRI - XXXXXXX</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 float-right">Pesan</button>
                            </form>
                        <?php
                        } else {
                            echo "<div class='btn btn-sm btn-danger mt-3'>";
                            echo "<h4>Keranjang Belanja Anda Masih Kosong";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Batas Memasukan Konten -->
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