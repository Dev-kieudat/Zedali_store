<div class="main">
    <div class="option">

    </div>
    <div class="product-main">
        <div class="add_product">
            <div style="width: 90%; margin-top: 50px;margin-left: 40px; background: #fff; padding: 25px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <h3 style="text-align: center; color: #333;">Thêm Sản Phẩm</h3>
                <form method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column;">
                    <label for="name" style="margin-bottom: 10px; color: #555;">Danh mục Sản Phẩm:</label>
                    <select name="id_cate" id="id_cate" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required>
                        <option value="0">Chọn danh mục</option>
                        <?php 
                        $key_type = $_GET['product_type'];
                        foreach ($add_id_cate as $values): 
                            if($values->category_type == $key_type):?>
                            <option value="<?=$values->category_id ?>"><?=$values->category_name ?></option>
                        <?php endif;
                    endforeach; ?>
                    </select>
                    <label for="name" style="margin-bottom: 10px; color: #555;">Tên Sản Phẩm:</label>
                    <input type="text" id="name" name="name_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required>
                    <label for="price_product" style="margin-bottom: 10px; color: #555;">Giá Sản Phẩm:</label>
                    <input type="number" id="price_product" name="price_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required>
                    <label for="img_src_product" style="margin-bottom: 10px; color: #555;">Chọn ảnh sản phẩm:</label>
                    <input type="file" id="img_src_product" name="img_src_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required>
                    <label for="descrip_product" style="margin-bottom: 10px; color: #555;">Mô tả sản phẩm:</label>
                    <textarea id="descrip_product" name="descrip_product" style="height: 100px;padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required></textarea>
                    <div style="width: 100%; text-align: center;">
                        <input type="submit" name="sbm_add_product" value="Thêm" style="height: 40px;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;">
                        <a class="sbm_slist_product" style="height: 40px;text-decoration: none;text-align: center;display: inline-block;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;" href="index.php?act=listsp">Xem sản phẩm</a>
                    </div>
                    <h4 style="color: red;margin-top: 20px;text-align: center;"><?= $erro ?></h4>
                    <h4 style="color: green;text-align: center;"><?= $success ?></h4>
                </form>
            </div>
        </div>
    </div>
</div>
