<link rel="stylesheet" href="Css/category.css">
<div class="main">
    <div class="gray-line">ZELDALI STORES</div>
    <div class="back-main"><a href="index.php?API=home">Trang chủ</a>|<span>ALL Product</span></div>
    <div class="containers">
        <div class="same-category">
            <h1>Other</h1>
            <?php
            $unique_categories = [];
            foreach ($list_Category as $value) {
                if (!in_array($value->category_type, $unique_categories)) {
                    $unique_categories[] = $value->category_type;
                }
            }
            foreach ($unique_categories as $category_type): ?>
                <div class="same-category-card">
                    <h3><?= $category_type ?></h3>
                    <?php foreach ($list_Category as $item): ?>
                        <?php if ($item->category_type == $category_type): ?>
                            <p><a href="index.php?API=category&id=<?= $item->category_id ?>"><?= $item->category_name ?></a></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="product-area">
            <?php foreach ($list_all_product as $value): ?>
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?= str_replace("../", "", $value->image_url) ?>" alt="">
                    </div>
                    <a class="detail-btn" href="index.php?API=detail&id=<?= $value->product_id ?>"><button class="detail-product-btn">XEM NGAY</button></a>
                    <div class="product-name-price">
                        <h3><?= $value->name ?></h3>
                        <span><?= number_format($value->price, 0, ',', '.') ?> vnđ</span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>