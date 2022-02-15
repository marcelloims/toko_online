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


                        <h3 class="m-0 text-dark mb-3 mt-3">Form Edit Endorse</h3>
                        <!-- Main content -->
                        <form action="<?php echo base_url() . 'admin/c_admin/update_endorse' ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="kode_tenant" class="form-control" value="<?= $makeup['kode_tenant'] ?>">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4 col-12 mb-3">
                                        <img src="<?php echo base_url() . '/uploads_tenant/' . $makeup['logo']; ?>" class="card-img-top">
                                    </div>
                                    <div class="col-lg-4 col-12">
                                        <label>ID User (Pemilik)</label>
                                        <input type="text" name="id_user" class="form-control" value="<?= $makeup['id_user'] ?>">

                                        <label>Status Tenant</label>
                                        <select name="status" class="form-control">
                                            <?php foreach ($status as $s) : ?>

                                                <?php if ($s == $makeup['status']) : ?>
                                                    <option value="<?= $s ?>" selected><?= $s ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $s ?>"><?= $s ?></option>
                                                <?php endif ?>
                                            <?php endforeach; ?>
                                        </select>

                                        <label>Kategori</label>
                                        <select name="kategori" class="form-control">
                                            <?php foreach ($kategori as $k) : ?>

                                                <?php if ($k == $makeup['kategori']) : ?>
                                                    <option value="<?= $k ?>" selected><?= $k ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $k ?>"><?= $k ?></option>
                                                <?php endif ?>

                                            <?php endforeach; ?>
                                        </select>

                                        <label>Keterangan</label>
                                        <select name="keterangan" class="form-control">
                                            <?php foreach ($keterangan as $ket) : ?>

                                                <?php if ($ket == $makeup['keterangan']) : ?>
                                                    <option value="<?= $ket ?>" selected><?= $ket ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $ket ?>"><?= $ket ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <label>Nama Tenant</label>
                                        <input type="text" name="nama_tenant" class="form-control" value="<?= $makeup['nama_tenant'] ?>">

                                        <label>Qty</label>
                                        <input type="text" name="qty" class="form-control" value="<?= $makeup['qty'] ?>">

                                        <label>Tanggal Masuk</label>
                                        <input type="date" name="tanggal_masuk" class="form-control" value="<?= $makeup['tanggal_masuk'] ?>">

                                        <label>Tanggal Keluar</label>
                                        <input type="date" name="tanggal_keluar" class="form-control" value="<?= $makeup['tanggal_keluar'] ?>">
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-lg-8 col-12">
                                    <label>Logo</label>
                                    <input type="file" name="logo" class="form-control mb-3">
                                </div>
                                <div class="form-group col-lg-4 col-12">
                                    <label>Harga</label>
                                    <input type="text" name="harga_tenant" class="form-control" value="<?= $makeup['harga_tenant'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat_tenant" class="form-control" value="<?= $makeup['alamat_tenant'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" value="<?= $makeup['kecamatan'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control" value="<?= $makeup['kabupaten'] ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" value="<?= $makeup['provinsi'] ?>">
                                </div>
                            </div>


                            <a href="<?= base_url() ?>admin/c_admin/data_endorse" class="btn btn-sm btn-danger float-right">Kembali</a>
                            <button type="submit" class="btn btn-sm btn-primary mb-3 float-right mr-2">Simpan</button>

                        </form>
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