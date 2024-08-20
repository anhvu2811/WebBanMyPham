<?php
    include('views/assets/layout/loading.php');
    require_once('models/KhuyenMaiModel.php');
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

</style>
<section class="h-100 h-custom" style="background-color: #f2f1f6;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: -50px;">
        <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>
                                    <h6 class="mb-0 text-muted"><?php if(isset($_SESSION['GioHang'])) echo count($_SESSION['GioHang']) ?> sản phẩm</h6>
                                </div>
                                <hr class="my-4">

                                <?php
                                    $tongTien = 0; 
                                    if (empty($products)):
                                ?>
                                    <p>Giỏ hàng của bạn trống.</p>
                                <?php else: ?>
                                        <?php foreach ($products as $item): ?>
                                            <?php
                                                $khuyenMai = KhuyenMaiModel::getKhuyenMaiConHSDByID($item['product']->MaKhuyenMai);
                                                $hasDiscount = $khuyenMai !== null && isset($khuyenMai->TyLe) && $khuyenMai->TyLe !== null;
                                                $discountRate = $hasDiscount ? $khuyenMai->TyLe : 0;
                                                $newPrice = $hasDiscount ? $item['product']->Gia * (1 - $discountRate / 100) : $item['product']->Gia;
                                                $tongTien += $item['soLuong'] * $newPrice;
                                            ?>
                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img
                                        src="views/assets/img/sanpham/<?= $item['product']->HinhAnhChinh ?>"
                                        class="img-fluid rounded-3">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <h6 class="text-muted"><?= $item['product']->TenSanPham ?></h6>
                                        <h6 class="text-black mb-0"><?= $item['product']->MaSanPham ?></h6>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <input id="form1" min="0" name="quantity" value="<?= $item['soLuong'] ?>" type="number"
                                        class="form-control form-control-sm" style="width: 50px; margin-left: 30px; text-align: center;"/>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h6 class="mb-0" style="color: black;"><?= number_format($newPrice, 0, ',', '.') ?> đ</h6>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <form action="?controller=giohang&action=remove" method="post" style="margin-top: 20px;">
                                            <input type="hidden" name="maSanPham" value="<?= $item['product']->MaSanPham ?>">
                                            <button class="material-symbols-outlined">close</button>
                                        </form>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <hr class="my-4">

                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="?controller=home&action=index" class="text-body"><i
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
                                    <h5><?= number_format($tongTien, 0, ',', '.') . " đ" ?></h5>
                                </div>

                                <form action="?controller=giohang&action=purchaseInfo" method="post">
                                    <!-- Truyền giá trị của $tongTien vào input hidden -->
                                    <input type="hidden" id="totalAmountInput" name="totalAmount" value="<?= $tongTien ?>">
                                    <?php if (!empty($products)): ?>
                                        <button type="submit" class="btn btn-dark btn-block btn-lg">Tiếp tục</button>
                                    <?php endif; ?>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript để hiển thị và ẩn thông báo -->
    <script>
        $('.quantity-input').on('change', function() {
            // Auto-submit form on quantity change
            $('#updateCartForm').submit();
        });

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