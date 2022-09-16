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
                    <div class="contact__address">
                        <!-- <h5>Contact info</h5>
                        <ul>
                            <li>
                                <h6><i class="fa fa-map-marker"></i> Address</h6>
                                <p>160 Pennsylvania Ave NW, Washington, Castle, PA 16101-5161</p>
                            </li>
                            <li>
                                <h6><i class="fa fa-phone"></i> Phone</h6>
                                <p><span>125-711-811</span><span>125-668-886</span></p>
                            </li>
                            <li>
                                <h6><i class="fa fa-headphones"></i> Support</h6>
                                <p>Support.photography@gmail.com</p>
                            </li>
                        </ul> -->
                    </div>
                    <div class="contact__form">
                        <h5><?= $title ?></h5>
                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-success-style3 alert-st-bg2">
                        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                        <p><strong>Warning!</strong> Coba Lagi!!!</p>', '</div>');

                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
                          <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
              <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
                          <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                          <p><strong>Danger!</strong> Gagal.</p>';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        }

                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-success-style1 alert-st-bg">
                          <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
              <span class="icon-sc-cl" aria-hidden="true">&times;</span>
            </button>
                          <i class="fa fa-check adminpro-checked-pro admin-check-pro admin-check-pro-clr" aria-hidden="true"></i>
                          <p><strong>Success!</strong>successful</p>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                        ?>
                        <form action="<?= base_url('pelanggan/login') ?>" method="POST">
                            <input type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
                            <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password">
                            <button type="submit" class="site-btn">Login</button>
                            <a href="<?= base_url('pelanggan/register') ?>" class="site-btn">Register</a>
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