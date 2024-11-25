<link rel="stylesheet" href="Css/login.css">
<div id="container">
    <div id="main">
      <form method="POST" class="login">
        <h3>Đăng ký tài khoản</h3>
        <div class="mb-3">
          <label class="form-label">Họ tên</label>
          <input type="text" name="get_username" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="get_email" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="get_phone" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Mật khẩu</label>
          <input type="password" name="get_password" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Nhập lại mật khẩu</label>
          <input type="password" name="get_check_password" class="form-control">
        </div>    
        
        <button type="submit" name="sbm_register" style="width: 100%;" class="btn btn-primary">Đăng ký</button>
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
