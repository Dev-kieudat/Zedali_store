<link rel="stylesheet" href="Css/detail.css">
<div class="main">
    <div class="gray-line">ZELDALI STORES</div>
    <div class="back-main"><a href="index.php?API=home">Trang chủ</a>|<span><?= $detail->name ?></span></div>
    <div class="container">
        <div class="detail-card">
            <div class="big-images-product">
                <img src="<?= str_replace("../", "", $detail->image_url) ?>" alt="">
            </div>
            <div class="infomations-product">
                <div class="information">
                    <h3><?= $detail->name ?></h3>
                    <span><?= number_format($detail->price, 0, ',', '.') ?> vnđ</span>
                    <br>
                    <br>
                    <label for="size">SIZE:</label><br>
                    <form class="size">
                        <input id="size-m" name="size" class="check-box cb1" value="M" type="radio">
                        <input id="size-l" name="size" class="check-box cb2" value="L" type="radio">
                        <input id="size-xl" name="size" class="check-box cb3" value="XL" type="radio">
                        <input id="size-2xl" name="size" class="check-box cb4" value="2XL" type="radio">
                    </form>
                    <a href="#"><button class="add-to-cart-btn">THÊM VÀO GIỎ HÀNG</button></a>
                </div>
                <div class="description">
                    <div class="text">
                    <h4>Mô tả sản phẩm:</h4>
                    <div><?= $detail->description ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="same-product-area"> </div>
    </div>
</div>