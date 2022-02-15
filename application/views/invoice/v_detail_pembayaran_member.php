<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_partial_member/header'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- ./wrapper -->
    <div class="wrapper">
        <?php $this->load->view('_partial_member/navbar'); ?>
        <?php $this->load->view('_partial_member/sidebar'); ?>
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
                            <?php endif; ?>

                            <a href="<?= base_url() ?>invoice/c_invoice/data_pembayaran_member" class="btn btn-sm btn-danger">Kembali</a>
                            <!-- Batas Memasukan Konten -->

                        </div>
                        <!-- Batas Memasukan Konten -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view('_partial_member/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- page script -->
    <?php $this->load->view('_partial_member/js'); ?>
    <script>
    </script>
    <!-- page script -->
</body>

</html>