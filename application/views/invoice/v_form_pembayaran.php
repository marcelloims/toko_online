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
                            <?php foreach ($pembayaran as $metode) : ?>
                            <?php endforeach; ?>
                            <?php if ($metode->metode_pembayaran == 'Down Payment') : ?>
                                <table class="table table-bordered table-hover table-striped" id="example1">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>#</th>
                                            <th>Items</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Bukti DP</th>
                                            <th>Bukti Pelunasan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Harga Tenant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pembayaran as $byr) : ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $byr->kode_tenant; ?></td>
                                                <td align="center"><?= $byr->nama_tenant; ?></td>
                                                <td align="center"><?= $byr->tanggal_mulai ?></td>
                                                <td align="center"><?= $byr->tanggal_akhir ?></td>
                                                <td align="center"><?= $byr->bukti_dp; ?></td>
                                                <td><?= $byr->bukti_pelunasan; ?></td>
                                                <td align="center"><?= $byr->status_pembayaran; ?></td>
                                                <td align="right">Rp. <?= number_format($byr->harga_tenant, 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php
                                        $total = 0;
                                        foreach ($pembayaran as $hitung) :
                                            $total += $hitung->harga_tenant;
                                        endforeach;
                                        ?>
                                        <tr>
                                            <td colspan="8" align="right">Total Belanja :</td>
                                            <td align="right">Rp. <?= number_format($total, 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="8" align="right">Metode Pembayaran :</td>
                                            <td align="right"><?= $hitung->metode_pembayaran ?></td>
                                        </tr>
                                        <?php if ($hitung->metode_pembayaran != 'Pembayaran Lunas') : ?>
                                            <tr>
                                                <td colspan="8" align="right">Total Pembayaran DP :</td>
                                                <td align="right">Rp. <?= number_format($hitung->total_pembayaran * 0.3, 0, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="8" align="right">Sisa Pembayaran :</td>
                                                <td align="right">Rp. <?= number_format(($total) - ($hitung->total_pembayaran * 0.3), 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if ($hitung->bukti_dp == NULL && $hitung->bukti_pelunasan == NULL) : ?>
                                    <form action="<?= base_url() ?>invoice/c_invoice/process_payment_dp" method="post" enctype="multipart/form-data">
                                        <div class="form-btn-group">
                                            <label>Upload Bukti Pembayaran DP</label>
                                            <input type="hidden" name="kode_pembayaran" value="<?php echo $byr->kode_pembayaran ?>">
                                            <input type="hidden" name="no_invoice" value="<?php echo $byr->no_invoice ?>">
                                            <input type="file" name="bukti_dp" class="form-control-file">
                                            <button type="submit" class="btn btn-sm bg-info mt-3"><i class="fas fa-money-check-alt fa-2x"> Sent</i></button>
                                        </div>
                                    </form>
                                <?php elseif ($hitung->bukti_dp != NULL && $hitung->bukti_pelunasan == NULL) : ?>
                                    <form action="<?= base_url() ?>invoice/c_invoice/process_payment_pelunasan" method="post" enctype="multipart/form-data">
                                        <div class="form-btn-group">
                                            <label>Upload Bukti Pembayaran Pelunasan</label>
                                            <input type="hidden" name="kode_pembayaran" value="<?php echo $byr->kode_pembayaran ?>">
                                            <input type="hidden" name="no_invoice" value="<?php echo $byr->no_invoice ?>">
                                            <input type="file" name="bukti_pelunasan" class="form-control-file">
                                            <button type="submit" class="btn btn-sm bg-info mt-3"><i class="fas fa-money-check-alt fa-2x"> Sent</i></button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php else : ?>
                                <table class="table table-bordered table-hover table-striped" id="example1">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>#</th>
                                            <th>Items</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Akhir</th>
                                            <th>Bukti Pelunasan</th>
                                            <th>Status Pembayaran</th>
                                            <th>Harga Tenant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pembayaran as $byr) : ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="center"><?= $byr->kode_tenant; ?></td>
                                                <td align="center"><?= $byr->nama_tenant; ?></td>
                                                <td align="center"><?= $byr->tanggal_mulai ?></td>
                                                <td align="center"><?= $byr->tanggal_akhir ?></td>
                                                <td><?= $byr->bukti_pelunasan; ?></td>
                                                <td><?= $byr->status_pembayaran; ?></td>
                                                <td align="right">Rp. <?= number_format($byr->harga_tenant, 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php
                                        $total = 0;
                                        foreach ($pembayaran as $hitung) :
                                            $total += $hitung->harga_tenant;
                                        endforeach;
                                        ?>
                                        <tr>
                                            <td colspan="7" align="right">Total Belanja :</td>
                                            <td align="right">Rp. <?= number_format($total, 0, ',', '.') ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" align="right">Metode Pembayaran :</td>
                                            <td align="right"><?= $hitung->metode_pembayaran ?></td>
                                        </tr>
                                        <?php if ($hitung->metode_pembayaran != 'Cash') : ?>
                                            <tr>
                                                <td colspan="7" align="right">Total Pembayaran DP :</td>
                                                <td align="right">Rp. <?= number_format($hitung->total_pembayaran * 0.3, 0, ',', '.') ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" align="right">Sisa Pembayaran :</td>
                                                <td align="right">Rp. <?= number_format(($total) - ($hitung->total_pembayaran * 0.3), 0, ',', '.') ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <?php if ($hitung->bukti_pelunasan == NULL) : ?>
                                    <form action="<?= base_url() ?>invoice/c_invoice/payment_pelunasan" method="post" enctype="multipart/form-data">
                                        <div class="form-btn-group">
                                            <label>Upload Bukti Pembayaran</label>
                                            <input type="hidden" name="kode_pembayaran" value="<?php echo $byr->kode_pembayaran ?>">
                                            <input type="hidden" name="no_invoice" value="<?php echo $byr->no_invoice ?>">
                                            <input type="file" name="bukti_pelunasan" class="form-control-file">
                                            <button type="submit" class="btn btn-sm bg-success mt-3"><i class="fas fa-money-check-alt fa-2x"> Sent</i></button>
                                        </div>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>


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