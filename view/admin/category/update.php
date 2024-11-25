<div class="main">
    <div class="option">

    </div>
    <div class="product-main">
        <div class="add_category">
            <div style="width: 90%; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <h3 style="text-align: center; color: #333;">Thêm Danh Mục</h3>
                <form method="POST" style="display: flex; flex-direction: column;">
                    <label for="name" style="margin-bottom: 10px; color: #555;">Tên danh mục:</label>
                    <input type="text" id="update_category" value="<?= $category->category_name ?>" name="update_category" placeholder="Enter data here..." style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                    <label for="type" style="margin-bottom: 10px; color: #555;">Loại danh mục:</label>
                    <select id="update_category_type" name="update_category_type" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="Áo" <?php echo ($category->category_type == "Áo") ? 'selected' : ''; ?>>Áo</option>
                        <option value="Quần" <?php echo ($category->category_type == "Quần") ? 'selected' : ''; ?>>Quần</option>
                        <option value="Phụ Kiện" <?php echo ($category->category_type == "Phụ Kiện") ? 'selected' : ''; ?>>Phụ kiện</option>
                    </select>
                    <div style="width: 100%; text-align: center;">
                        <input type="submit" name="sbm_update_cate" value="Lưu" style="height: 40px;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;">
                        <a class="sbm_slist_cate" style="height: 40px;text-decoration: none;text-align: center;display: inline-block;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;" href="index.php?act=listdm">Xem danh mục</a>
                    </div>
                    <h4 style="color: red;margin-top: 20px;text-align: center;"><?= $erro ?></h4>
                    <h4 style="color: green;text-align: center;"><?= $success ?></h4>
                </form>
            </div>
        </div>
    </div>
</div>