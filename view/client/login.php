<link rel="stylesheet" href="Css/login.css">
<div id="container">
        <div id="main">
            <span><?= $noti ?></span>
            <div class="border">
                <form method="POST" class="login">
                    <img src="../../../DuAn1_dev_kieudat/images/login-baner.png" alt=""> <br><br>
                    <h3>Đăng nhập</h3>
                    <div class="mb-3">
                        <label class="form-label">Tên tài khoản</label>
                        <input type="text" name="get_email_login" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu</label>
                        <input type="password" name="get_password_login" class="form-control">
                    </div>
                    <a href="index.php?ctl=dangky">Đăng ký tại đây</a><br> <br>
                    <button type="submit" name="submit_login" class="btn btn-primary" style="width: 100%;">Đăng nhập</button> 

                </form>
            </div>

        </div>
    </div>