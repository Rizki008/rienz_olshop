<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h4>Kategori List</h4>
                    <div class="add-product">
                        <a href="<?= base_url('master_produk/add_kategori') ?>">Add Product</a>
                    </div>
                    <table>
                        <tr>
                            <th>Image</th>
                            <th>Product Title</th>
                            <th>Setting</th>
                        </tr>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <tr>
                                <td><img src="<?= base_url('assets/kategori/' . $value->gambar) ?>" alt="" /></td>
                                <td><?= $value->nama_kategori ?></td>
                                <td>
                                    <a href="<?= base_url('master_produk/edit_kategori/' . $value->id_kategori) ?>" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?= base_url('master_produk/delete_kategori/' . $value->id_kategori) ?>" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
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