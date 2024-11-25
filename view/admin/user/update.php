<link rel="stylesheet" href="../../Css/login.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div id="container">
    <div id="main">
        <form method="POST" class="login">
            <h3>Sửa người dùng</h3>
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="get_username" value="<?= htmlspecialchars($userData->username ?? '') ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="get_email" value="<?= htmlspecialchars($userData->email ?? '') ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="get_phone" value="<?= htmlspecialchars($userData->phone ?? '') ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="get_password" class="form-control" placeholder="Để trống nếu không thay đổi">
            </div>
            <div class="mb-3">
                <label class="form-label">Quyền</label>
                <select name="get_role" class="form-control">
                    <option value="admin" <?= isset($userData) && $userData->role === 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="user" <?= isset($userData) && $userData->role === 'user' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="get_status" class="form-control">
                    <option value="active" <?= isset($userData) && $userData->status === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= isset($userData) && $userData->status === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
            </div>
            <div style="display: flex;"> 
                <button type="submit" name="sbm_user_update" style="width: 100%;padding-right: 5px;" class="btn btn-primary">Cập nhật</button>
                <button type="button" class="btn btn-primary" style="width: 100%; padding-left: 5px;" onclick="window.location.href='index.php?API=list_user'">Trang người dùng</button>

        </div>
            <?php if (!empty($errors)) : ?>
                <h4 style="color: red; margin-top: 20px; text-align: center;">
                    <?php 
                    foreach ($errors as $error) {
                        echo $error . '<br>';
                    }
                    ?>
                </h4>
            <?php endif; ?>
            <?php if (!empty($success)) : ?>
                <h4 style="color: green; margin-top: 20px; text-align: center;"><?= $success ?></h4>
            <?php endif; ?>
        </form>
    </div>
</div>
