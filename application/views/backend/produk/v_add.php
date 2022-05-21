<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> <?= $title ?></a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <?php
                                //notifikasi form kosong
                                echo validation_errors('<div class="alert alert-warning alert-st-three alert-st-bg2 alert-st-bg13" role="alert">
                                <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2 admin-check-pro-clr13" aria-hidden="true"></i>
                                <p class="message-mg-rt"><strong>Warning!</strong>', '</p></div>');

                                //notifikasi gagal upload gambar
                                if (isset($error_upload)) {
                                    echo '<div class="alert alert-warning alert-success-style3 alert-st-bg2">
                                    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                                            <span class="icon-sc-cl" aria-hidden="true">&times;</span>
                                        </button>
                                    <i class="fa fa-exclamation-triangle adminpro-warning-danger admin-check-pro admin-check-pro-clr2" aria-hidden="true"></i>
                                    <p><strong>Warning!</strong>' . $error_upload . '</p></div>';
                                }
                                echo form_open_multipart('master_produk/add_produk') ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="nama_produk" value="<?= set_value('nama_produk') ?>" placeholder="Nama Produk">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                <input type="number" class="form-control" name="stock" value="<?= set_value('stock') ?>" placeholder="Stock">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="file" name="images" id="preview_gambar" class="form-control" placeholder="Regular Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="harga" value="<?= set_value('harga') ?>" placeholder="Harga Produk">
                                            </div>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="deskripsi" value="<?= set_value('deskripsi') ?>" placeholder="Product Description">
                                            </div>
                                            <select name="id_kategori" class="form-control pro-edt-select form-control-primary">
                                                <option value="opt1">Pilih Kategori Produk</option>
                                                <?php foreach ($kategori as $key => $value) { ?>
                                                    <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center custom-pro-edt-ds">
                                            <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                            </button>
                                            <a href="<?= base_url('master_produk/produk') ?>" class="btn btn-ctl-bt waves-effect waves-light">Kembali
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>