<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Pesanan</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4><?= $title ?></h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">

                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".women">Pesanan Baru</li>
                    <li data-filter=".men">Diproses</li>
                    <li data-filter=".accessories">Dikirim</li>
                    <li data-filter=".cosmetic">Selesai</li>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <div class="col-lg-12 col-md-8 col-sm-12 mix women">
                <div class="product__item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Order.</th>
                                <th>Expedisi</th>
                                <th>Biaya Ongkir</th>
                                <th>Total Bayar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pesanan as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                    <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                    <td><b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>

                                        <?php if ($value->status_bayar == 0) { ?>
                                            <span class="badge badge-warning">Belum bayar</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Sudah bayar</span><br>
                                            <span class="badge badge-primary">Menunggu Verifikasi</span>
                                        <?php } ?>
                                    </td>
                                    <td></td>
                                    <td>
                                        <?php if ($value->status_bayar == 0) { ?>
                                            <a href="<?= base_url('pesanan_saya/bayar/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
                                            <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#dibatalkan<?= $value->id_transaksi ?>">Batalkan</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 col-sm-12 mix men">
                <div class="product__item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Order.</th>
                                <th>Expedisi</th>
                                <th>Biaya Ongkir</th>
                                <th>Total Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($diproses as $key => $value) { ?>
                                <tr>
                                    <td><a href="<?= base_url('transaksi/detail/' . $value->no_order) ?>"><?= $value->no_order ?></a></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                    <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                    <td>Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                        <label class="badge badge-info">Diproses</label>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 col-sm-12 mix accessories">
                <div class="product__item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Order.</th>
                                <th>Expedisi</th>
                                <th>Biaya Ongkir</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dikirim as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                    <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                    <td>Rp. <?= number_format($value->total_bayar, 0) ?>
                                        <label class="badge badge-primary">Dikirim</label>
                                    </td>
                                    <td class="text-info"><?= $value->no_resi ?></td>
                                    <td><button class="btn btn-sm btn-flat btn-success" data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>">Diterima</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 col-sm-12 mix cosmetic">
                <div class="product__item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No Order</th>
                                <th>Tanggal Order.</th>
                                <th>Expedisi</th>
                                <th>Biaya Ongkir</th>
                                <th>Total Bayar</th>
                                <th>No Resi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($selesai as $key => $value) { ?>
                                <tr>
                                    <td><?= $value->no_order ?></td>
                                    <td><?= $value->tgl_order ?></td>
                                    <td><?= $value->expedisi ?><br><?= $value->paket ?><br><?= $value->estimasi ?></td>
                                    <td class="text-warning">Rp. <?= number_format($value->ongkir, 0) ?><i class="mdi mdi-arrow-down"></i></td>
                                    <td>Rp. <?= number_format($value->total_bayar, 0) ?><br>
                                        <label class="badge badge-success">Selesai</label>
                                    </td>
                                    <td class="text-info"><?= $value->no_resi ?></td>
                                    <td><a href="<?= base_url('pesanan_saya/riview/' . $value->id_transaksi) ?>" class="btn btn-success btn-sm">Riviews</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php foreach ($dikirim as $key => $value) { ?>
            <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Pesanan Diterima</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin Pesanan Sudah Diterima?
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url('pesanan_saya/diterima/' . $value->id_transaksi) ?>" class="btn btn-primary">Ya</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        <?php } ?>
    </div>
</section>
<!-- Product Section End -->