<?php include_once VIEW . "Client/base/header.php"; ?>
<link rel="stylesheet" href="Assets/Client/Css/category.css">

<div class="main">
    <div class="gray-line">ZELDALI STORES</div>
    <div class="back-main">
        <a href="index.php?act=">Trang chủ</a> |
        <span><?= $category['type'] ?></span> |
        <span><?= $category['cate_name'] ?></span>
    </div>
    <div class="containers">
        <div class="sidebar">
            <?php 
            $displayedTypes = []; // Mảng tạm lưu các kiểu đã hiển thị
            foreach ($categories as $value): 
                if ($value['type'] != $category['type'] && !in_array($value['type'], $displayedTypes)): 
                    $displayedTypes[] = $value['type']; // Thêm kiểu mới vào mảng tạm
            ?>
                <button class="accordion"><?= $value['type'] ?></button>
                <div class="panel">
                    <ul>
                        <?php 
                        foreach ($categories as $subCategory):
                            if ($subCategory['type'] == $value['type']):
                        ?>
                            <li><a href="index.php?act=Category&id=<?= $subCategory['id'] ?>"><?= $subCategory['cate_name'] ?></a></li>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </ul>
                </div>
            <?php endif; endforeach; ?>
        </div>
        
        <div class="content">
            <div class="products">
                <?php foreach ($products as $values): ?>
                    <?php if ($values['category_id'] == $category['id']): ?>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="<?= $values['image'] ?>" alt="">
                            </div>
                            <a class="detail-btn" href="index.php?act=Detail&id=<?= $values['id'] ?>">
                                <button class="detail-product-btn">XEM NGAY</button>
                            </a>
                            <div class="product-name-price">
                                <h3><?= $values['name'] ?></h3>
                                <span><?= number_format($values['price'], 0, ',', '.') ?> vnđ</span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script src="Assets/Js/scripts.js"></script>
<?php include_once VIEW . "Client/base/foot.php"; ?>
