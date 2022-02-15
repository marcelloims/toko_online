<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a class="navbar-brand" href="#">Simtotis</a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav mr-5">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>pelanggan/c_pelanggan/data_photographer" class="nav-link">Photographer</a>
                </li>
                <li class="nav-item" style="width: 180px;">
                    <a href="<?= base_url() ?>pelanggan/c_pelanggan/data_makeup" class="nav-link">Makeup Artist</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>pelanggan/c_pelanggan/data_endorse" class="nav-link">Endorse</a>
                </li>
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-3">
                <div class="navbar">
                    <ul class="nav navbar-nav navbar-right">

                        <?php if ($this->session->userdata('nama_panggilan')) { ?>
                            <li class="nav-item dropdown text-bold">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class=" dropdown-toggle"> Selamat datang <?= $this->session->userdata('nama_panggilan') ?> <i class="fa fa-cog" aria-hidden="true"></i></a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <li><a href="#" class="dropdown-item">Edit Profile</a></li>
                                    <li><a href="<?= base_url() ?>invoice/c_invoice/data_pesanan_pelanggan" class="dropdown-item">Orders</a></li>
                                    <li><a href="<?= base_url() ?>invoice/c_invoice/data_pembayaran_pelanggan" class="dropdown-item">Payments</a></li>
                                    <li><a href="<?= base_url('auth/c_auth/logout') ?>" class="dropdown-item">Logout</a></li>
                                <?php } else { ?>
                                    <li><?php echo anchor('auth/c_auth/login', 'Login') ?></li>
                                    <li class="dropdown-divider"></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                    <li class="nav-item mr-3">
                        <?php $keranjang = '<i class="fa fa-cart-plus" aria-hidden="true"></i> Pesanan Anda : ' . $this->cart->total_items() . ' items' ?>
                        <?= anchor('pelanggan/c_pelanggan/detail_keranjang', $keranjang) ?>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!-- /.navbar -->