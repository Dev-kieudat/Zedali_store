<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Zeldali Stores</title>
</head>

<body>
    <div class="wraper">
        <header>
            <div class="red-line">
                <h7>MIỄN PHÍ GIAO HÀNG TỪ 300K</h7>
            </div>
        </header>
        <div class="all-menu">
            <div class="logo"><a href="index.php?API=home"><img src="images/logo.png" alt="company logo"></a></div>
            <div class="nav-main">
                <ul>
                    <li><a class="home-link" href="index.php?API=home">TRANG CHỦ</a></li>
                    <li><a class="menu-link" href="#">QUẦN</a></li>
                    <li><a class="menu-link" href="#">ÁO</a></li>
                    <li><a class="menu-link" href="#">PHỤ KIỆN</a></li>
                </ul>
            </div>
            <div class="search">
                <form action=""><input class="search-bar" type="search" placeholder="TÌM KIẾM..." name="" id="" required><img class="search-logo" src="images/search-icon.png" alt=""></form>
            </div>
            <div class="user-cart">
                <a href="index.php?API=cart"><img class="cart" src="images/cart-logo.png" alt=""></a>
                <img class="user" src="images/user.png" alt="">
            </div>
            <div class="management-user">
                <?php if(isset($_SESSION['user'])): ?>
                <a class="user-select-link" href="index.php?API=information">
                    <div class="user-select">Tài Khoản của tôi</div>
                </a><?php endif; ?>
                <?php if(isset($_SESSION['user'])): ?>
                <a class="user-select-link" href="index.php?API=log_out">
                    <div class="user-select">Đăng Xuất</div>
                </a><?php endif; ?>
                <?php if(!isset($_SESSION['user'])): ?>
                <a class="user-select-link" href="index.php?API=login">
                    <div class="user-select">Đăng nhập</div>
                </a>
                <a class="user-select-link" href="index.php?API=register">
                    <div class="user-select">Tạo tài khoản</div>
                </a>
                </a><?php endif; ?>
            </div>
            <div class="toggle-categories">
                <div class="content-categories">
                    <div class="category">
                        <div class="category-card">
                            <h5>ÁO</h5>
                            <?php foreach ($list_Category as $value): ?>
                                <?php if ($value->category_type == "Áo"): ?>
                                    <p><a href="index.php?API=category&id=<?= $value->category_id ?>"><?= $value->category_name ?></a></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="category">
                        <div class="category-card">
                            <h5>QUẦN</h5>
                            <?php foreach ($list_Category as $value): ?>
                                <?php if ($value->category_type == "Quần"): ?>
                                    <p><a href="index.php?API=category&id=<?= $value->category_id ?>"><?= $value->category_name ?></a></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="category">
                        <div class="category-card">
                            <h5>PHỤ KIỆN</h5>
                            <?php foreach ($list_Category as $value): ?>
                                <?php if ($value->category_type == "Phụ Kiện"): ?>
                                    <p><a href="index.php?API=category&id=<?= $value->category_id ?>"><?= $value->category_name ?></a></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="logo-category">
                    <div><img class="category-logo" src="images/category_logo.png" alt=""></div>
                    <div class="admin-page-link">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == "admin"): ?>
                        <a href="view/admin/"><h7>QUẢN TRỊ</h7></a>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
</body>

</html>