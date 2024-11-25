<div class="main">
    <div class="option">
        <!-- Các tùy chọn khác nếu có -->
    </div>
    <div class="product-main">
        <div class="show_list" style="width: 97%; margin: 20px 0; border-collapse: collapse; margin-left: 2%;">
            <!-- Bảng tài khoản quản trị -->
            <table style="width: 100%; border: 1px solid gray;">
                <div style="width: 100%; height: 40px; background-color: white; border: 1px solid gray; border-radius: 5px; margin-top: 20px; text-align: center;">
                    <h3 style="margin-top: 10px;">Tài khoản quản trị</h3>
                </div>
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">ID</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Tên người dùng</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Email</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Số điện thoại</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Mật khẩu</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Ngày tạo</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Role</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Status</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $checkUser = "admin";
                    foreach ($list_user as $value) :
                        if ($value->role == $checkUser) :
                    ?>
                            <tr>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->user_id ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->username ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->email ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->phone ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->password ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->created_at ?></td> <!-- Ngày tạo -->
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->role ?></td> <!-- Role -->
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->status ?></td> <!-- Status -->
                                <td style="width: 200px; background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;">
                                <a href="index.php?API=update_user&id=<?= $value->user_id ?>"><input style="margin-left: 5px; width: 50px; height: 25px;" type="button" value="Sửa"></a>
                                <a href="index.php?API=delete_user&id=<?= $value->user_id ?>"><input style="margin-left: 20px; width: 50px; height: 25px;" type="button" value="Xóa"></a>
                                </td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </tbody>
            </table>

            <!-- Bảng tài khoản người dùng -->
            <table style="width: 100%; border: 1px solid gray;">
                <div style="width: 100%; height: 40px; background-color: white; border: 1px solid gray; border-radius: 5px; margin-top: 20px; text-align: center;">
                    <h3 style="margin-top: 10px;">Tài khoản người dùng</h3>
                </div>
                <thead style="background-color: #f2f2f2;">
                    <tr>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">ID</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Tên người dùng</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Email</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Số điện thoại</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Mật khẩu</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Ngày tạo</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Role</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Status</th>
                        <th style="background-color: #f8f8f8; color: #333; font-weight: bold; padding: 10px; text-align: left; border: 1px solid #ccc;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list_user as $value) :
                        if ($value->role !== $checkUser) :
                    ?>
                            <tr>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->user_id ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->username ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->email ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->phone ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->password ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->created_at ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->role ?></td>
                                <td style="background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;"><?= $value->status ?></td>
                                <td style="width: 200px; background-color: #f8f8f8; padding: 10px; text-align: left; border: 1px solid #ccc;">
                                    <a href="index.php?API=update_user&id=<?= $value->user_id ?>"><input style="margin-left: 5px; width: 50px; height: 25px;" type="button" value="Sửa"></a>
                                    <a href="index.php?API=delete_user&id=<?= $value->user_id ?>"><input style="margin-left: 20px; width: 50px; height: 25px;" type="button" value="Xóa"></a>
                                </td>
                            </tr>
                    <?php
                        endif;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
