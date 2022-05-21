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