<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="<?= base_url('pemilik') ?>"><img class="main-logo" src="<?= base_url() ?>backend/img/logo/logo.png" alt="" /></a>
            <strong><img src="<?= base_url() ?>backend/img/logo/logosn.png" alt="" /></strong>
        </div>
        <div class="nalika-profile">
            <div class="profile-dtl">
                <a href="#"><img src="<?= base_url() ?>backend/img/notification/4.jpg" alt="" /></a>
                <h2><?= $this->session->userdata('username'); ?> </h2>
            </div>
            <div class="profile-social-dtl">
                <ul class="dtl-social">
                    <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                    <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                    <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <li class="">
                        <a class="has-arrow" href="<?= base_url('pemilik') ?>">
                            <i class="icon nalika-home icon-wrap"></i>
                            <span class="mini-click-non">Ecommerce</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-mail icon-wrap"></i> <span class="mini-click-non">Master Laporan</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Inbox" href="<?= base_url('laporan/hari') ?>"><span class="mini-sub-pro">Laporan Hari</span></a></li>
                            <li><a title="View Mail" href="<?= base_url('laporan/bulan') ?>"><span class="mini-sub-pro">Laporan Bulan</span></a></li>
                            <li><a title="Compose Mail" href="<?= base_url('laporan/tahun') ?>"><span class="mini-sub-pro">Laporan Tahun</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-diamond icon-wrap"></i> <span class="mini-click-non">Master Analisis</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="Google Map" href="<?= base_url('transaksi') ?>"><span class="mini-sub-pro">Histori Analisis Transaksi</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="mailbox.html" aria-expanded="false"><i class="icon nalika-pie-chart icon-wrap"></i> <span class="mini-click-non">User</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a title="File Manager" href="<?= base_url('pemilik/user') ?>"><span class="mini-sub-pro">Kelola User</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>