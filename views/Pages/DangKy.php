<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1000px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .left-side {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .left-side img {
            max-width: 100%;
            border-radius: 5px;
        }

        .right-side {
            flex: 1;
            padding: 20px;
        }

        .login-container {
            background-color: #fff;
            border-radius: 5px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 40px;
            color: #333;
        }

        .login-form input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #326e51;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #228B22;
        }

        .social-login {
            margin-top: 20px;
            white-space: nowrap;
        }

        .social-login p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .social-login a {
            color: #326e51;
        }

        .note {
            margin-top: -10px;
        }

        select option {
            font-size:18px;
        }

        .alert-container {
            position: fixed;
            top: 20px; 
            right: 20px; 
            z-index: 9999; 
        }

        .alert {
            width: 300px; 
            margin-bottom: 10px; 
            border-radius: 5px; 
        }

        .alert-danger {
            color: #721c24; 
            background-color: #f8d7da; 
            border-color: #f5c6cb; 
        }
    </style>
</head>

<body>
    <div class="alert-container">
        <?php
            if (isset($data['errorMessage'])) {
                echo "<div class='alert alert-danger'>{$data['errorMessage']}</div>";
            }
        ?>
    </div>
    <div class="container">
        <div class="left-side">
            <img src="views/assets/img/login.jpg" alt="Your Image">
        </div>
        <div class="right-side">
            <div class="login-container">
                <h2>Đăng Ký</h2>
                <form class="login-form" action="?controller=nguoidung&action=createUser_Khach" method="post">
                    <input type="text" name="hoTen" placeholder="Họ và tên" value="<?php echo isset($data['hoTen']) ? $data['hoTen'] : ''; ?>" required>
                    <select name="gioiTinh" required>
                        <option hidden>Giới tính</option>
                        <option value="Nam" <?php echo (isset($data['gioiTinh']) && $data['gioiTinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
                        <option value="Nữ" <?php echo (isset($data['gioiTinh']) && $data['gioiTinh'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                    </select>
                    <input type="date" name="ngaySinh" placeholder="Ngày sinh" value="<?php echo isset($data['ngaySinh']) ? $data['ngaySinh'] : ''; ?>"required>
                    <input type="phone" name="sdt" placeholder="Số điện thoại" value="<?php echo isset($data['sdt']) ? $data['sdt'] : ''; ?>" required>
                    <input type="text" name="diaChi" placeholder="Địa chỉ" value="<?php echo isset($data['diaChi']) ? $data['diaChi'] : ''; ?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" required>
                    <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" required>
                    <input type="password" name="confirmPassword" placeholder="Xác nhận mật khẩu" required>
                    
                    <button type="submit">Đăng Ký</button>
                </form>
                <div class="social-login">
                    <p class="note">Bạn đã có tài khoản? <a href="?controller=home&action=DangNhap">ĐĂNG NHẬP</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript để hiển thị và ẩn thông báo -->
    <script>
        function hideAlert() {
            var alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 3000); 
            }
        }
        window.onload = hideAlert;
    </script>
</body>
</html>
