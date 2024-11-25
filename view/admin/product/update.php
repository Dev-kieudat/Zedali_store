    <div class="main">
        <div class="option">
        </div>
        <div class="product-main">
            <div class="add_product">
                <div style="width: 90%; margin-top: 50px;margin-left: 40px; background: #fff; padding: 25px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <h3 style="text-align: center; color: #333;">sửa sản Phẩm</h3>
                    <form action="index.php?API=update_product&id=<?= $product->product_id ?>" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column;">
                        <select name="Uid_cate" id="id_cate" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;" required>
                            <?php foreach ($update_id_cate as $values): ?>
                                <option value="<?= htmlspecialchars($values->category_id) ?>"
                                    <?= isset($category) && $values->category_id == $category->category_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($values->category_name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label for="name" style="margin-bottom: 10px; color: #555;">Tên Sản Phẩm:</label>
                        <input type="text" id="name" value="<?= $product->name ?>" name="Uname_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                        <label for="name" style="margin-bottom: 10px; color: #555;">Giá Sản Phẩm:</label>
                        <input type="number" id="name" value="<?= $product->price ?>" name="Uprice_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                        <label for="name" style="margin-bottom: 10px; color: #555;">chọn ảnh sản phẩm:</label>
                        <input type="file" id="name" value="<?= $product->image_url ?>" name="Uimg_src_product" style="padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;">
                        <input type="hidden" name="old_img" value="<?= $product->image_url ?>">
                        <div style="border: 3px solid gray;width: 250px;height: 300px;border-radius: 3px;">
                            <img style="height: 100%;width: 100%;padding: 2px;" src="../<?= $product->image_url ?>" alt="">
                        </div>
                        <br>
                        <label for="name" style="margin-bottom: 10px; color: #555;">Nhập mô sản phẩm:</label>
                        <textarea id="name" name="Udescrip_product" style="height: 100px;padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px;"><?= $product->description ?></textarea>
                        <div style="width: 100%;text-align: center;">
                            <input type="submit" name="sbm_update_product" value="lưu" style="height: 40px;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;">
                            <a class="sbm_slist_product" style="height: 40px;text-decoration: none;text-align: center;display: inline-block;width: 49%;padding: 10px; color: #fff; background-color: #5cb85c; border: none; border-radius: 4px; cursor: pointer;" href="index.php?act=listsp">xem sản phẩm</a>
                        </div>
                        <h4 style="color: red;margin-top: 20px;text-align: center;"><?= $erro ?></h4>
                        <h4 style="color: green;margin-top: 20px;text-align: center;"><?= $success ?></h4>
                    </form>
                </div>
            </div>
        </div>
    </div>