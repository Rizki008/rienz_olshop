<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span><?= $title ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="contact__content">

                    <div class="contact__form">
                        <h5><?= $title ?></h5>
                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                        ?>
                        <form action="<?= base_url('pelanggan/register') ?>" method="POST">
                            <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" placeholder="Name">
                            <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
                            <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password">
                            <input type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" placeholder="Ulangi Password">
                            <button type="submit" class="site-btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__map">
                    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd" height="780" style="border:0" allowfullscreen="">
                    </iframe> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->