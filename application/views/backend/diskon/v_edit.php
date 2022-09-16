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

                                echo form_open('master_produk/update') ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                <input type="text" value="<?= $diskon->nama_diskon ?>" name="nama_diskon" class="form-control" placeholder="Nama Diskon" />
                                            </div>
                                            <?= form_error('nama_diskon', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="number" value="<?= $diskon->diskon ?>" name="diskon" class="form-control" placeholder="Besar Diskon" aria-label="Amount (to the nearest dollar)" />
                                            </div>
                                            <?= form_error('diskon', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                <input type="date" value="<?= $diskon->tgl_selesai ?>" name="tgl" class="form-control" placeholder="Tanggal Selesai" />
                                            </div>
                                            <?= form_error('tgl', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                <input type="text" value="<?= number_format($diskon->harga)  ?>" name="harga" class="harga form-control" readonly />
                                            </div>
                                            <?= form_error('harga', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                                            <select id="produk-diskon" name="produk" class="form-control pro-edt-select form-control-primary">
                                                <option value="opt1">Pilih Produk</option>
                                                <?php
                                                foreach ($produk as $key => $value) {
                                                ?>
                                                    <option data-harga="<?= number_format($value->harga, 0) ?>" value="<?= $value->id_produk ?>" <?php if ($diskon->id_produk == $value->id_produk) {
                                                                                                                                                        echo 'selected';
                                                                                                                                                    } ?>><?= $value->nama_produk ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?= form_error('produk', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
                                            <br>
                                            <select name="level" class="form-control pro-edt-select form-control-primary">
                                                <option value="opt1">Pilih Level member</option>
                                                <option value="1" <?php if ($diskon->member == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Gold</option>
                                                <option value="2" <?php if ($diskon->member == '2') {
                                                                        echo 'selected';
                                                                    } ?>>Silver</option>
                                                <option value="3" <?php if ($diskon->member == '3') {
                                                                        echo 'selected';
                                                                    } ?>>Clasic</option>
                                            </select>
                                            <?= form_error('level', '<div id="defaultFormControlHelp" class="form-text">', '</div>') ?>
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