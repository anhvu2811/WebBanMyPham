<?php
    include('views/assets/layout/loading.php');
    require_once('models/KhuyenMaiModel.php');
    require_once('models/DiaChiModel.php');
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM5eTB4Y9WTz5jvOuYkmfn49ul5KHgYHtBk/oP6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="views/assets/style/css/style.css">
</head>
<?php 
    include("views/assets/layout/header.php");
?>
<style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 100vh !important;
        }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .bg-grey {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }

    .material-symbols-outlined {
        border: none;
        background-color: #fff;
    }

    form {
        display: flex;
    }
    session {
        margin-top: 30px;
        margin-bottom: 30px;
        display: block;
    }
</style>
<body>
    <section class="h-100 h-custom" style="background-color: #f2f1f6;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -50px;">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <form action="?controller=giohang&action=createHoaDon" method="POST">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Thông tin mua hàng</h1>
                                        </div>
                                        <hr class="my-4">
                                        <?php 
                                            $user = $_SESSION['user'];
                                        ?>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typeName">Họ tên</label>
                                            <input type="text" id="typeName" name="fullName" class="form-control form-control-lg" value="<?= $user['HoTen'] ?>" readonly/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typeEmail">Email</label>
                                            <input type="email" id="typeEmail" name="email" class="form-control form-control-lg" value="<?= $user['Email'] ?>" readonly/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typePhone">Số điện thoại</label>
                                            <input type="tel" id="typePhone" name="phone" class="form-control form-control-lg" value="<?= $user['SDT'] ?>" readonly/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typePhone">Địa chỉ giao hàng</label>
                                            <ul>
                                                <?php 
                                                    $addresses = DiaChiModel::getDiaChiByMaNguoiDung($user['MaNguoiDung']);
                                                ?>
                                                <?php if (!empty($addresses)): ?>
                                                    <?php foreach ($addresses as $address): ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="address" value="<?= $address->DiaChi ?>" required>
                                                            <label class="form-check-label">
                                                                 <?= $address->DiaChi ?> (<span style="font-style: italic; font-weight: bold;"><?= $address->MoTa ?></span>)
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <p>Không có địa chỉ nào</p>
                                                <?php endif; ?>
                                            </ul>
                                        </div>

                                        <!-- <div class="form-outline mb-4">
                                            <label class="form-label" for="typeAddress">Địa chỉ giao hàng</label>
                                            <input type="text" id="typeAddress" name="address" class="form-control form-control-lg" required/>
                                        </div> -->

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typeNote">Ghi chú</label>
                                            <input type="text" id="typeAddress" name="note" class="form-control form-control-lg"/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typeAddress">Hình thức thanh toán</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="cashOnDelivery" value="Thanh toán khi nhận hàng (COD)" required>
                                                <label class="form-check-label" for="cashOnDelivery">
                                                    Thanh toán khi nhận hàng (COD)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="bankTransfer" value="Chuyển khoản ngân hàng" required>
                                                <label class="form-check-label" for="bankTransfer">
                                                    Chuyển khoản ngân hàng
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="Thanh toán bằng thẻ tín dụng" required>
                                                <label class="form-check-label" for="creditCard">
                                                    Thanh toán bằng thẻ tín dụng
                                                </label>
                                            </div>
                                        </div>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="?controller=giohang&action=view" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Trở lại</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Tổng quan</h3>
                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Tổng tiền</h5>
                                            <h5>
                                                <?php
                                                    $tongTien = 0; 
                                                    if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['totalAmount'])) {
                                                        $tongTien = $_POST['totalAmount'];
                                                    }
                                                    echo number_format($tongTien, 0, ',', '.') . " đ"; 
                                                ?>
                                            </h5>
                                        </div>
                                        <input hidden type="text" name="maNguoiDung" value="<?= $user['MaNguoiDung'] ?>" />
                                        <input hidden type="text" name="total" value="<?= $tongTien ?>" />
                                        <button type="submit" class="btn btn-dark btn-block btn-lg">Đặt hàng</button>
                                    </div>
                                    <div class="p-4">
                                        <hr class="my-4">
                                        <h3 class="fw-bold mb-4">Các sản phẩm đã chọn</h3>
                                        <div class="row">
                                            <?php foreach ($products as $item): ?>
                                                <div class="col-md-12 mb-1">
                                                    <div class="card">
                                                        <div class="row card-body">
                                                            <div class="col-md-4">
                                                                <img src="views/assets/img/sanpham/<?= $item['product']->HinhAnhChinh ?>" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h5><?= $item['product']->TenSanPham ?></h5>
                                                                <p class="mb-0">Giá: <?= $item['product']->Gia ?></p>
                                                                <p>Số lượng: <?= $item['soLuong'] ?></p>
                                                                <input hidden type="text" name="maSanPham[]" value="<?= $item['product']->MaSanPham ?>"/>
                                                                <input hidden type="text" name="soLuong[]" value="<?= $item['soLuong'] ?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php 
    include("views/assets/layout/footer.php");
?>