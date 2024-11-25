<div class="main">
    <div class="product-main">
        <div class="show_list" style="width: 90%; margin: 20px 0; border-collapse: collapse;margin-left: 2%;">
            <table style="width: 100%; border: 1px solid gray;">
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">ID</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Tên danh mục</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Loại danh mục</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_Category as $value) : ?>
                        <tr>
                            <td style="background-color: #f8f8f8;padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->category_id ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->category_name ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->category_type ?></td>
                            <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;width: 200px;"><a href="index.php?API=update_category&id=<?= $value->category_id ?>"><input style="width: 50px;height: 25px;" type="button" value="Sửa"></a>
                                <a href="index.php?API=delete_category&id=<?= $value->category_id ?>"><input style="width: 50px;height: 25px;" type="button" value="Xóa"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>