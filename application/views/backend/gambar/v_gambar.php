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
                            <th>Image Cover</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Gambar</th>
                            <th>Setting</th>
                        </tr>
                        <?php foreach ($gambar as $key => $value) { ?>
                            <tr>
                                <td><img src="<?= base_url('assets/produk/' . $value->images) ?>" alt="" /></td>
                                <td><?= $value->nama_produk ?></td>
                                <td><?= $value->total_gambar ?></td>
                                <td>
                                    <a href="<?= base_url('master_produk/add_gambar/' . $value->id_produk) ?>" data-toggle="tooltip" title="Add Images" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </table>
                    <div class="custom-pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>