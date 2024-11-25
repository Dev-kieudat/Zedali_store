<div class="main">
    <div class="option">
    </div>
    <div class="product-main">
        <form action="" method="post" style="display: flex; gap: 10px; background-color: #f9f9f9; padding: 15px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); max-width: 500px; margin: 15px 25px;">
            <input type="search" name="search_prl" placeholder="Tìm kiếm sản phẩm..." style="flex: 1; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
            <select name="id_cate" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px;">
                <option value="0">Tất cả</option>
                <?php foreach ($listdm as $values): ?>
                    <option value="<?= htmlspecialchars($values->id, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($values->name, ENT_QUOTES, 'UTF-8') ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="sbm_filler" value="Tìm" style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; background-color: #007BFF; color: white; cursor: pointer;">
        </form>
        <div class="show_list" style="width: 97%; margin: 20px 0; border-collapse: collapse; margin-left: 2%;">
            <table style="width: 100%; border: 1px solid gray;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">ID</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Tên sản phẩm</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Ảnh</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Giá</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Mô tả</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Lượt xem</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Ngày tạo</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product as $value): ?>
                        <tr>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;width: 50px;"><?= $value->product_id ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;width: 250px;"><?= $value->name ?></td>
                            <td style="background-color: #f8f8f8; text-align: left; border: 1px solid #ccc;width: 150px;">
                                <img style="width: 100%; height: 170px;" src="../<?= $value->image_url ?>" alt="">
                            </td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;width: 200px;"><?= $value->price ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc; max-width: 290px;"><?= $value->description ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc; width: 100px;"><?= $value->view ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc; width: 150px;"><?= $value->created_at ?></td>
                            <td style="width: 200px; background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;">
                                <a href="index.php?API=update_product&id=<?= $value->product_id ?>"><input style="margin-left: 5px; width: 50px; height: 25px;" type="button" value="Sửa"></a>
                                <a href="index.php?API=delete_product&id=<?= $value->product_id ?>"><input style="margin-left: 20px; width: 50px; height: 25px;" type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
