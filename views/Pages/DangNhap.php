<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Đăng Nhập</title>
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

        .login-form input {
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
        .social-login button {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #3b5998; 
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .social-login button.google {
            background-color: #db4a39; 
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

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

    </style>
</head>

<body>
    <div class="alert-container">
        <?php
            if (isset($_GET['message'])) {
                $message = urldecode($_GET['message']);
                echo "<div class='alert alert-danger' role='alert'>$message</div>";
            }
            if (isset($_GET['tb'])) {
                $message = urldecode($_GET['tb']);
                echo "<div class='alert alert-success' role='alert'>$message</div>";
            }
        ?>
    </div>

    <div class="container">
        <div class="left-side">
            <img src="views/assets/img/login.jpg" alt="Your Image">
        </div>
        <div class="right-side">
            <div class="login-container">
                <h2>Đăng Nhập</h2>
                <form method="post" action="?controller=nguoidung&action=login" class="login-form">
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Mật khẩu" required>
                    <button type="submit">Đăng Nhập</button>
                </form>
                <div class="social-login">
                    <p class="note">Bạn chưa có tài khoản? <a href="?controller=home&action=DangKy">ĐĂNG KÝ NGAY</a></p>
                    <p class="note"><a href="?controller=home&action=QuenMatKhau">Quên mật khẩu</a></p>
                    <p>Đăng nhập với</p>
                    <button> Facebook</button>
                    <button class="google"> Google</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
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
