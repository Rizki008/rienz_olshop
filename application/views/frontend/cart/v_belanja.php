<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <?php echo form_open('belanja/update'); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php $total_berat = 0;
                            $total = 0;
                            foreach ($this->cart->contents() as $items) {
                                // $produk = $this->m_home->detail_produk($items['id']);
                                $berat = $items['qty'] * $items['netto'];
                                $total_berat = $total_berat + $berat ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="<?php echo base_url('assets/produk/' . $items['images']) ?>" alt="" width="70px">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $items['name'] ?></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price"><?php echo $items['size'] ?></td>
                                    <td class="cart__price">Rp. <?= number_format($items['price'], 0); ?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <?php echo form_input(
                                                array(
                                                    'name' => $i . '[qty]',
                                                    'value' => $items['qty'],
                                                    'maxlength' => '3',
                                                    'min' => '0',
                                                    'max' => 'stock',
                                                    'size' => '5',
                                                    'type' => 'number',
                                                    'class' => 'form-control'
                                                )
                                            ); ?>
                                        </div>
                                    </td>
                                    <td class="cart__total">Rp. <?= number_format($items['subtotal'], 0); ?></td>
                                    <td class="cart__close"><a href="<?= base_url('belanja/delete/') . $items['rowid'] ?>"><span class="icon_close"></span></a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="<?= base_url() ?>">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                    <button type="submit"><span class="icon_loading"></span> Update cart</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <!-- <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form> -->
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>Rp. <?= number_format($this->cart->total(), 0) ?></span></li>
                        <li>Total <span>Rp. <?= number_format($this->cart->total(), 0) ?></span></li>
                    </ul>
                    <a href="<?= base_url('belanja/cekout') ?>" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- Shop Cart Section End -->