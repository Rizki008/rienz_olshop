<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg" data-setbg="<?= base_url() ?>frontend/img/categories/category-1.jpg">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php foreach ($ketegori as $key => $value) { ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                            <div class="categories__item set-bg" data-setbg="<?= base_url('assets/kategori/' . $value->gambar) ?>">
                                <div class="categories__text">
                                    <h4><?= $value->nama_kategori ?></h4>
                                    <p>358 items</p>
                                    <a href="#">Shop now</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php if (count($produk) > 0) : ?>
                <?php foreach ($produk as $value) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <?php
                            echo form_open('belanja/add');
                            echo form_hidden('id', $value->id_produk);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $value->harga);
                            echo form_hidden('name', $value->nama_produk);
                            echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                            <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/produk/' . $value->images) ?>">
                                <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="<?= base_url('assets/produk/' . $value->images) ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><a href="<?= base_url('home/detail_produk/' . $value->id_produk) ?>"><span class="icon_heart_alt"></span></a></li>
                                    <li><button type="submit" data-name="<?= $value->nama_produk ?>" data-price="<?= $value->harga ?>" data-id="<?= $value->id_produk ?>"><span class="icon_bag_alt"></span></button></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#"><?= $value->nama_produk ?></a></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rp. <?= number_format($value->harga, 0) ?></div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="<?= base_url() ?>frontend/img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    <?php foreach ($produk_baru as $key => $value) { ?>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" width="70px">
                            </div>
                            <div class="trend__item__text">
                                <h6><?= $value->nama_produk ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rp. <?= number_format($value->harga) ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best seller</h4>
                    </div>
                    <?php if (count($produk_bagus) > 0) : ?>
                        <?php foreach ($produk_bagus as $key => $value) { ?>
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><?= $value->nama_produk ?></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">Rp. <?= number_format($value->harga, 0) ?></div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php else : ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Discount</h4>
                    </div>
                    <?php foreach ($diskon as $key => $value) { ?>
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6><?= $value->nama_produk ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">Rp. <?= number_format($value->harga, 0) ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="<?= base_url() ?>frontend/img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2019</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="#">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->