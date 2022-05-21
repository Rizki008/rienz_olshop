<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Products List</h4>
                    <div class="add-product">
                    </div>
                    <table>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Nama Diskon</th>
                            <th>Harga Diskon</th>
                            <th>Setting</th>
                        </tr>
                        <tr>
                            <?php foreach ($diskon as $key => $value) { ?>
                                <td><?= $value->nama_produk ?></td>
                                <td><?= $value->nama_diskon ?></td>
                                <td>
                                    <button class="pd-setting">Rp. <?= number_format($value->diskon, 0) ?></button>
                                </td>
                                <td>
                                    <!-- <a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">Warning</a> -->
                                    <a href="#" data-toggle="modal" data-target="#WarningModalalert<?= $value->id_diskon ?>" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#DangerModalalert<?= $value->id_diskon ?>" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            <?php }
                            ?>
                        </tr>
                    </table>
                    <div class="custom-pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($diskon as $key => $value) { ?>
    <div id="WarningModalalert<?= $value->id_diskon ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <?php echo form_open('master_produk/edit_diskon/' . $value->id_diskon) ?>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>Update!</h2>
                    <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="nama_diskon" value="<?= set_value('nama_diskon') ?>" placeholder="Nama Diskon">
                    </div>
                    <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                        <input type="number" class="form-control" name="diskon" value="<?= set_value('diskon') ?>" placeholder="Harga Diskon">
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <button type="submit" href="#">Process</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>
<?php foreach ($diskon as $key => $value) { ?>
    <div id="DangerModalalert<?= $value->id_diskon ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <?php echo form_open('master_produk/delete_diskon/' . $value->id_diskon) ?>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>Delete!</h2>
                    <p>Apakah Anda Yakin Hapus Diskon <?= $value->nama_diskon ?></p>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <a href="<?= base_url('master_produk/delete_diskon/' . $value->id_diskon) ?>">Process</a>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>