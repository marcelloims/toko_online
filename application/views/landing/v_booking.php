<!doctype html>
<html lang="en">

<head>
    <?php $this->load->view('_templates_marcell_booking/header') ?>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <?php $this->load->view('_templates_marcell_booking/navbar') ?>
    <!-- Navbar -->

    <!-- Container -->
    <div class="container-fluid" style="background-color: #2b7df8;">
        <!-- Info Panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel mt-3">
                <div class="row ">
                    <div class="col-lg mt-5 mr-5">
                        <span class="ml-3">Hai kamu,</span><br>
                        <span class="ml-5">Mau cari apa?</span>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/photographer.png" alt="Photographer">
                        <h4>Photographer</h4>
                        <p>Aku siap mengabadikan cerita kamu.</p>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/makeup_artist.png" alt="Photographer">
                        <h4>Makeup Artist</h4>
                        <p>Aku siap buat mempercantik dirimu</p>
                    </div>
                    <div class="col-lg text-center">
                        <img src="<?= base_url() ?>assets/dist/img/endorse.png" alt="Photographer">
                        <h4>Endorse</h4>
                        <p>Aku siap memperkenalkan produk kamu</p>
                    </div>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-lg">
                        <h4>Tanggal Mulai</h4>
                        <input type="date" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Tanggal Akhir</h4>
                        <input type="date" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Provinsi</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Kabupaten</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                    <div class="col-lg text-center">
                        <h4>Kecamatan</h4>
                        <input type="text" class="form-control btn-outline-info">
                    </div>
                </div>
                <hr>
                <div class="row text-center float-right">
                    <div class="col-lg">
                        <button class="btn btn-primary tombol">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Info Panel -->

        <!-- Working Space -->
        <div class="container">
        </div>
        <!-- Working Space -->

        <hr>
    </div>
    <!-- Container -->

    <!-- Footer -->
    <?php $this->load->view('_templates_marcell_booking/footer') ?>
    <!-- Footer -->





    <!-- Jquery -->
    <?php $this->load->view('_templates_marcell_booking/js') ?>
    <!-- JQuery -->
</body>

</html>