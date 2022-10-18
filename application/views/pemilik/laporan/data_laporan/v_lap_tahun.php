<div class="mailbox-view-area mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel email-compose mailbox-view mg-b-15">
                    <div class="panel-heading hbuilt">

                        <div class="p-xs h4">
                            <small class="pull-right">
                                08:26 PM (16 hours ago)
                            </small> <?= $title ?>

                        </div>
                    </div>
                    <div class="border-top border-left border-right bg-light">
                        <div class="p-m custom-address-mailbox">
                            <div>
                                <!-- <span class="font-extra-bold">Date: </span> <?= $tahun ?> -->
                            </div>
                        </div>
                    </div>
                    <div class="panel-body panel-csm">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Size</th>
                                        <th>No Transaksi</th>
                                        <th>Tanggal Order</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $grand_total = 0;
                                    foreach ($laporan as $key => $value) {
                                        $tot_harga = $value->qty * $value->harga;
                                        $grand_total = $grand_total + $tot_harga;
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_produk ?></td>
                                            <td><?= $value->size ?></td>
                                            <td><?= $value->no_order ?></td>
                                            <td><?= $value->tgl_order ?></td>
                                            <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                            <td><?= $value->qty ?></td>
                                            <td>Rp.<?= number_format($tot_harga, 0) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h3>Grand Total : Rp. <?= number_format($grand_total, 0) ?> </h3>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <div class="btn-group">
                            <a href="<?= base_url('laporan/tahun') ?>" class="btn btn-default"><i class="fa fa-reply"></i> Kembali</a>
                            <button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>