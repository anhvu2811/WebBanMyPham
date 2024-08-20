<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập mã xác nhận</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://tapchivietduc.vn/uploads/images/blog/MaiXuanBac/2022/12/20/272883030-1760853544247689-7824971492450286651-n-1671508568.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.8;
            z-index: -1;
        }
        form {
            width: 700px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        h2 {
            margin-bottom: 30px;
            color: cornflowerblue;
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        #btn {
            text-align: center;
        }
        #countdown {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="background-container"></div>
    <form class="form-group" method="post" action="?controller=nguoidung&action=KiemTraMaXacNhan">
        <h2>Xác Thực</h2>
        <label for="exampleInputMaXN1">Nhập mã xác nhận</label>
        <input class="form-control" type="text" name="verification_code" id="exampleInputMaXN1" placeholder="Mã xác nhận" required>
        <br>
        <div id="countdown"></div>
        <div id="btn">
            <button class="btn btn-success" type="submit">Xác nhận</button>
        </div>
    </form>

    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        function startCountdown(duration, display) {
            var endTime = Date.now() + duration * 1000;
            localStorage.setItem('countdownEndTime', endTime);

            var countdownInterval = setInterval(function () {
                var now = Date.now();
                var timeLeft = Math.floor((endTime - now) / 1000);

                if (timeLeft <= 0) {
                    clearInterval(countdownInterval);
                    display.textContent = "Hết hạn!";
                    document.querySelector('button[type="submit"]').disabled = true;
                } else {
                    var minutes = Math.floor(timeLeft / 60);
                    var seconds = timeLeft % 60;

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;
                }
            }, 1000);
        }

        window.onload = function () {
            var display = document.querySelector('#countdown');
            var countdownEndTime = localStorage.getItem('countdownEndTime');
            var now = Date.now();

            if (countdownEndTime && now < countdownEndTime) {
                var timeLeft = Math.floor((countdownEndTime - now) / 1000);
                startCountdown(timeLeft, display);
            } else {
                var oneMinute = 60 * 5;
                startCountdown(oneMinute, display);
            }
        };
    </script>
</body>
</html>
