<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="product-status-wrap">
                    <h4>Products List</h4>
                    <div class="add-product">
                    </div>
                    <table>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Size</th>
                        </tr>
                        <?php foreach ($pesanan_detail as $key => $value) { ?>
                            <tr>
                                <td><?= $value->nama_produk ?></td>
                                <td><?= $value->qty ?></td>
                                <td><?= $value->size ?></td>
                            </tr>
                        <?php }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="product-status-wrap">
                    <h4><?= $title ?> | <?= $value->no_order ?></h4>
                    <div class="add-product">
                    </div>
                    <table>
                        <tr>
                            <th>Nama Pelanggan : </th>
                            <td><?= $value->nama_depan ?> <?= $value->nama_belakang ?></td>
                        </tr>
                        <tr>
                            <th>No Telphon : </th>
                            <td><?= $value->no_tlpn ?></td>
                        </tr>
                        <tr>
                            <th>Kota : </th>
                            <td><?= $value->kota ?></td>
                        </tr>
                        <tr>
                            <th>Provinsi : </th>
                            <td><?= $value->provinsi ?></td>
                        </tr>
                        <tr>
                            <th>Kode Post : </th>
                            <td><?= $value->kode_pos ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Lengkap : </th>
                            <td><?= $value->alamat ?></td>
                        </tr>
                        <tr></tr>
                    </table>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="text-center custom-pro-edt-ds">
                                <a href="#" data-toggle="modal" data-target="#WarningModalalert<?= $value->id_transaksi ?>" title="Edit" class="btn btn-ctl-bt waves-effect waves-light">Kirim</a>
                                <a href="<?= base_url('transaksi') ?>" class="btn btn-ctl-bt waves-effect waves-light">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<?php foreach ($proses_kirim as $key => $value) { ?>
    <div id="WarningModalalert<?= $value->id_transaksi ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <?php echo form_open('transaksi/kirim/' . $value->id_transaksi) ?>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>No Resi!</h2>
                    <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="no_resi" value="<?= set_value('no_resi') ?>" placeholder="No Resi Pengiriman">
                    </div>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <button type="submit" href="#">Kirim</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>