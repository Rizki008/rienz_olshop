<!-- Single pro tab start-->
<div class="single-product-tab-area mg-t-0 mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-product-pr">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                            <div id="myTabContent1" class="tab-content">
                                <div class="product-tab-list tab-pane fade active in" id="single-tab1">
                                    <img src="<?= base_url('./assets/produk/' . $produk->images) ?>" alt="" />
                                </div>
                            </div>
                            <ul id="single-product-tab">
                                <?php foreach ($gambar as $key => $value) { ?>
                                    <li class="active">
                                        <a href="#single-tab1"><img src="<?= base_url('assets/gambar/' . $value->img) ?>" id="gambar_load" alt="" /></a>
                                        <h1><?= $value->keterangan ?></h1>
                                        <a href="#" data-toggle="modal" data-target="#DangerModalalert<?= $value->id_gambar ?>" title="Edit" class="btn btn-ctl-bt waves-effect waves-light"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="single-product-details res-pro-tb">
                                <h1><?= $produk->nama_produk ?></h1>
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
                                echo form_open_multipart('') ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="keterangan" value="<?= set_value('keterangan') ?>" placeholder="Keterangan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="input-group mg-b-pro-edt">
                                                <span class="input-group-addon"><i class="fa fa-image" aria-hidden="true"></i></span>
                                                <input type="file" name="img" id="preview_gambar" class="form-control" placeholder="Regular Price">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center custom-pro-edt-ds">
                                            <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                            </button>
                                            <a href="<?= base_url('master_produk/gambar') ?>" class="btn btn-ctl-bt waves-effect waves-light">Kembali
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
<!-- Single pro tab End-->

<?php foreach ($gambar as $key => $value) { ?>
    <div id="DangerModalalert<?= $value->id_gambar ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>Delete!</h2>
                    <p>Apakah Anda Yakin Hapus Gambar <?= $value->keterangan ?></p>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <a href="<?= base_url('master_produk/delete_gambar/' . $value->id_produk . '/' . $value->id_gambar) ?>">Process</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>