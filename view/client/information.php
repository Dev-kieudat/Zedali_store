<style>
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        .info {
            margin: 10px 0;
        }
        .info label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
        .actions button {
            padding: 10px 20px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions button:hover {
            background-color: #45a049;
        }
    </style>
    <div class="container">
        <?php if(isset($_SESSION['user'])):?>
        <h1>Thông Tin Tài Khoản</h1>
        <div class="info">
            <label>Tên tài khoản:</label>
            <span><?= $_SESSION['user']['username'] ?></span>
        </div>
        <div class="info">
            <label>Email:</label>
            <span><?= $_SESSION['user']['email'] ?></span>
        </div>
        <div class="info">
            <label>Số điện thoại:</label>
            <span><?= $_SESSION['user']['phone'] ?></span>
        </div>
        <div class="info">
            <label>Ngày tham gia:</label>
            <span><?= $_SESSION['user']['created_at'] ?></span>
        </div>
        <h2>Quản Lý Tài Khoản</h2>
        <div class="actions">
            <button>Thay đổi mật khẩu</button>
            <a href="index.php?API=log_out"><button>Đăng xuất</button></a>
        </div>
        <?php endif; ?>
    </div>