<link rel="stylesheet" href="Css/category.css">
<div class="main">
    <div class="gray-line">ZELDALI STORES</div>
    <div class="back-main"><a href="index.php?API=home">Trang chủ</a>|<span><?= $category->category_type ?></span>|<span><?= $category->category_name ?></span></div>
    <div class="containers">
        <div class="same-category">
            <h3>Other</h3>
            <?php
            foreach($list_Category as $value): ?>
                <?php if($value->category_id !== $category->category_id): ?>
                    <div class="same-category-card">
                        <h5><?= $value->category_type ?></h5>
                        <?php
                        foreach($list_Category as $item): ?>
                            <?php if($item->category_type == $value->category_type): ?>
                                <p><a href="index.php?API=category&id=<?= $item->category_id ?>"><?= $item->category_name ?></a></p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="product-area">
            <?php foreach($list_all_product as $value): 
                if($value->category_id == $category->category_id): ?>
            <div class="product-card">
                <div class="product-image">
                    <img src="<?= str_replace("../", "", $value ->image_url) ?>" alt="">
                </div>
                <a class="detail-btn" href="index.php?API=detail&id=<?= $value->product_id ?>"><button class="detail-product-btn">XEM NGAY</button></a>
                <div class="product-name-price">
                    <h5><?= $value->name ?></h5>
                    <span><?= number_format($value->price, 0, ',', '.') ?> vnđ</span>
                </div>
            </div>  
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
