<?php include_once VIEW . "Client/base/header.php" ?>
<link rel="stylesheet" href="Assets/Client/Css/detail.css">
<div class="main">
    <div class="gray-line">ZELDALI STORES</div>
    <div class="back-main"><a href="index.php?API=home">Trang chủ</a>|<span><?= $detail['type'] ?> |<span><?= $detail['name'] ?></span></div>
    <div class="container">
        <div class="image-gallery">
            <img src="<?= $detail['image'] ?>" alt="Sản phẩm chính">
        </div>
        <div class="product-details">
            <h2><span><?= $detail['name'] ?></h2>
            <div class="product-code">Mã SP: <span><?= $detail['id'] ?></div>
            <div class="price">Giá: <span><?= number_format($detail['price'], 0, ',', '.') ?> VNĐ</div>
                <div class="size-options">
                    <label for="sizes">Kích cỡ:</label>
                    <div class="size" onclick="selectSize(this, 'M')">M</div>
                    <div class="size" onclick="selectSize(this, 'L')">L</div>
                    <div class="size" onclick="selectSize(this, '2XL')">2XL</div>
                </div>
                <a href="index.php?act=AddToCart&id=<?= $detail['id'] ?>"><button type="submit"  class="add-to-cart">THÊM VÀO GIỎ HÀNG</button></a>
            <div class="description">
                <h3>MÔ TẢ</h3>
                <p><?= $detail['description'] ?></p>
            </div>
        </div>
    </div>
    <div class="similar-products">
        <h3>Sản phẩm tương tự</h3>
        <div class="products-container">
            <div class="products">
                <?php foreach($products as $product) : ?>
                <?php if($product['category_id'] == $detail['category_id'] && $product['id'] !== $detail['id'] ) : ?>
                <a href="index.php?act=Detail&id=<?= $product['id'] ?>">
                <div class="product">
                    <img src="<?= $product['image'] ?>" alt="Sản phẩm tương tự 1">
                    <div class="product-details">
                        <div class="product-name"><?= $product['name'] ?></div>
                        <div class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> VNĐ</div>
                    </div>
                </div>
                </a>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script src="Assets/Js/detail.js"></script>
<?php include_once VIEW . "Client/base/foot.php" ?>
