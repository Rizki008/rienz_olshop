<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Products List</h4>
                    <div class="add-product">
                        <a href="#" data-target="#PrimaryModalalert" data-toggle="modal">Add User</a>
                    </div>
                    <table>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Setting</th>
                        </tr>
                        <?php foreach ($user as $key => $value) { ?>
                            <tr>
                                <td><?= $value->username ?></td>
                                <td><?= $value->password ?></td>
                                <td>
                                    <?php if ($value->level == 1) { ?>
                                        <button class="ps-setting">Admin</button>
                                    <?php } elseif ($value->level == 2) { ?>
                                        <button class="ds-setting">Pemilik</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <!-- <a class="Warning Warning-color mg-b-10" href="#" data-toggle="modal" data-target="#WarningModalalert">Warning</a> -->
                                    <a href="#" data-toggle="modal" data-target="#WarningModalalert<?= $value->id_user ?>" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="#" data-toggle="modal" data-target="#DangerModalalert<?= $value->id_user ?>" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
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
<div id="PrimaryModalalert" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>

            <?php echo form_open('pemilik/add') ?>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                <h2>Update!</h2>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="Username">
                </div>
                <div class="input-group mg-b-pro-edt">
                    <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="password" value="<?= set_value('password') ?>" placeholder="Password">
                </div>
                <select name="level" class="form-control pro-edt-select form-control-primary">
                    <option>Pilih Level User</option>
                    <option value="1">Admin</option>
                    <option value="2">Pemilik</option>
                </select>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
                <button type="submit" href="#">Process</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php foreach ($user as $key => $value) { ?>
    <div id="WarningModalalert<?= $value->id_user ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <?php echo form_open('pemilik/update/' . $value->id_user) ?>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>Update!</h2>
                    <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" value="<?= $value->username ?>" placeholder="Username">
                    </div>
                    <div class="input-group mg-b-pro-edt">
                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="password" value="<?= $value->password ?>" placeholder="Password">
                    </div>
                    <select name="level" class="form-control pro-edt-select form-control-primary">
                        <option>Pilih Level User</option>
                        <option value="1">Admin</option>
                        <option value="2">Pemilik</option>
                    </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div id="DangerModalalert<?= $value->id_user ?>" class="modal modal-adminpro-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>

                <?php echo form_open('pemilik/delete/' . $value->id_user) ?>
                <div class="modal-body">
                    <span class="adminpro-icon adminpro-warning-danger modal-check-pro information-icon-pro"></span>
                    <h2>Delete!</h2>
                    <p>Apakah Anda Yakin Hapus User <?= $value->username ?></p>
                </div>
                <div class="modal-footer">
                    <a data-dismiss="modal" href="#">Cancel</a>
                    <a href="<?= base_url('pemilik/delete/' . $value->id_user) ?>">Process</a>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>