<?php
    require_once('models/DiaChiModel.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="alert-container">
        <?php
            if (isset($_GET['error'])) {
                $message = urldecode($_GET['error']);
                echo "<div class='alert alert-danger' role='alert'>$message</div>";
            }
            if (isset($_GET['tb'])) {
                $message = urldecode($_GET['tb']);
                echo "<div class='alert alert-success' role='alert'>$message</div>";
            }
        ?>
    </div>
    <div class="top-bar-wrap" style="background-color: #ac000c;height: 50px;background-repeat: no-repeat;background-position: center center;background-size: auto 50px;background-image: url(https://media.hcdn.vn/hsk/1706762632top-nghi-tet.jpg);"></div>
    <div class="menu">
        <div style="float: left;">
            <a href="?controller=home&action=index">
                <img src="https://hasaki.vn/v3/images/graphics/logo_site.svg" alt="">
            </a>
        </div>
        <div class="menutren">
            <a href="#">Kem chống nắng</a>
            <a href="#">Tẩy trang</a>
            <a href="#">Toner</a>
            <a href="#">Sửa rửa mặt</a>
            <a href="#">Tẩy tế bào chết</a>
            <a href="#">Retinol</a>
        </div>
        <div style="margin-left: 260px;">
            <form action="?controller=sanpham&action=showDanhSachSanPhamTheoTimKiem" method="post">
                <table style="width: 650px;">
                    <tr>
                        <td><input style="width: 100%; height: 30px;" type="text" class="form-control" id="search_text" name="search" placeholder="Nhập sản phẩm cần tìm..."></td>
                        <td><button type="submit" class="btn btn-primary" id="btn_search" value="submit">Tìm kiếm</button></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="dndk">
            <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }  
                if(isset($_SESSION['user'])) {
                    $user = $_SESSION['user'];
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>'; 
                        echo '<a class="btn dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                        echo $user['HoTen'];
                        echo '</a>';
                        echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
                        echo '<a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#informationModal">';
                        echo '<i class="fas fa-user-alt fa-sm fa-fw mr-2 text-red-400"></i>   Thông tin cá nhân';
                        echo '</a>';
                        echo '<div class="dropdown-divider"></div>';
                        echo '<a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#addressModal">';
                        echo '<i class="fas fa-wrench fa-sm fa-fw mr-2 text-red-400"></i>   Địa chỉ của bạn';
                        echo '</a>';
                        echo '<div class="dropdown-divider"></div>';
                        echo '<a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#changePasswordModal">';
                        echo '<i class="fas fa-lock fa-sm fa-fw mr-2 text-red-400"></i>   Đổi mật khẩu';
                        echo '</a>';
                        // echo '<div class="dropdown-divider"></div>';
                        // echo '<a class="dropdown-item text-dark" href="#" data-toggle="modal" data-target="#donHangModal">';
                        // echo '<i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-red-400"></i>   Đơn hàng';
                        // echo '</a>';
                        // echo '<div class="dropdown-divider"></div>';
                        // echo '<a class="dropdown-item text-dark" href="?controller=nguoidung&action=logout">';
                        // echo '<i class="fas fa-wrench fa-sm fa-fw mr-2 text-red-400"></i>   Trang quản lý';
                        // echo '</a>';
                        echo '<div class="dropdown-divider"></div>';
                        echo '<a class="dropdown-item text-dark" href="?controller=nguoidung&action=logout" style="color: red !important;" >';
                        echo '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>   Đăng xuất';
                        echo '</a>';
                        echo '</div>';

                } else {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>';
                    echo '&nbsp; <a href="?controller=home&action=DangNhap">Đăng nhập</a>';
                    echo '<a href="#"> / </a>';
                    echo '<a href="?controller=home&action=DangKy">Đăng ký</a>';
                }
            ?>
        </div>
        <div class="htch">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-shop-window" viewBox="0 0 16 16">
                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
            </svg>
            <a href="?controller=home&action=HeThongCuaHang">Hệ thống <br> cửa hàng</a>
        </div>
        <div class="htkh">
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
            </svg>
            <a href="#">Hỗ trợ <br> khách hàng</a>
        </div>
        <div class="giohang">
            <?php 
                if(isset($_SESSION['user'])) { ?>
                    <a href="?controller=giohang&action=view">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                        <span id="cart-count"><?php  if(isset($_SESSION['GioHang'])) echo count($_SESSION['GioHang'])?></span>
                    </a>            
            <?php
                } else { ?>
                    <a href="#" onclick="showLoginMessage()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                        </svg>
                        <span id="cart-count"><?php  if(isset($_SESSION['GioHang'])) echo count($_SESSION['GioHang'])?></span>
                    </a>
                    <script>
                        function showLoginMessage() {
                            alert("Vui lòng đăng nhập để xem giỏ hàng !");
                        }
                    </script>
      
            <?php
                }
            ?>

        </div>
    </div>
    <div class="nbv" style="background-color:darkseagreen">
        <nav style=" color: white; margin-left: 50px; margin-right: 30px">
            
            <div id="menu-toggle" style="display: inline-block;">
                <span>☰</span>
            </div>
            
            <ul id="menu" style="display: inline-block;">
                <li><a  href="?controller=sanpham&action=showDanhSachSanPham">DANH MỤC</a></li>
                <li><a  href="#">HASAKI DEALS</a></li>
                <li><a  href="#">HOT DEALS</a></li>
                <li><a  href="#">THƯƠNG HIỆU</a></li>
                <li><a  href="#">HÀNG MỚI VỀ</a></li>
                <li><a  href="#">BÁN CHẠY</a></li>
                <li><a  href="#">CLINIC & SPA</a></li>
            </ul>
            <div id="right-menu" style="float: right;">
                <a href="#">Tra cứu đơn hàng</a> |
                <a href="#">Tải ứng dụng</a> |
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                </svg>
                <a href="#">Chọn khu vực của bạn</a>
            </div>
        </nav>
    </div>


    <!-- Logout Modal-->
    <div class="modal fade" id="informationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">Họ tên:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= $user['HoTen'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">Ngày sinh:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= date("d/m/Y", strtotime($user['NgaySinh'])) ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">Giới tính:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= $user['GioiTinh'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">Địa chỉ:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= $user['DiaChi'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">SĐT:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= $user['SDT'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label class="p-2">Email:</label>
                        </div>
                        <div class="col-sm-9">
                            <label class="p-2"><?= $user['Email'] ?></label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-hidden="true">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Địa chỉ của bạn</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php 
                            $addresses = DiaChiModel::getDiaChiByMaNguoiDung($user['MaNguoiDung']);
                        ?>
                        <?php if (!empty($addresses)): ?>
                            <div class="row" style="font-weight: bold;">
                                <div class="col-sm-4">
                                    <label class="p-2">Mô tả</label>
                                </div>
                                <div class="col-sm-6">
                                    <label class="p-2">Địa chỉ</label>
                                </div>
                            </div>
                            <?php foreach ($addresses as $address): ?>
                                <div class="row" data-id="<?= $address->MaDiaChi ?>">
                                    <div class="col-sm-4">
                                        <label class="p-2"><?= $address->MoTa ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="p-2"><?= $address->DiaChi ?></label>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-danger btn-delete" data-id="<?= $address->MaDiaChi ?>">Xóa</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có địa chỉ nào</p>
                        <?php endif; ?>
                        <div class="row" id="newAddressRow" style="display:none;">
                            <div class="col-sm-4">
                                <input hidden type="text" class="form-control" id="maNguoiDung" value="<?= $user["MaNguoiDung"]?>">
                                <input type="text" class="form-control" id="newDescription" placeholder="Mô tả">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="newAddress" placeholder="Địa chỉ">
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-success" id="btn-save-new">Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <button class="btn btn-success" id="btn-add">Thêm mới</button>
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" aria-hidden="true">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade <?php if (isset($_GET['error'])) echo 'show'; ?>" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                </div>
                <form action="?controller=nguoidung&action=changePassword" method="post">
                    <div class="modal-body">
                        <div class="form-group m-1">
                            <label for="oldPassword" class="col-sm-5 col-form-label">Mật khẩu cũ:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                            </div>
                        </div>
                        <div class="form-group m-1">
                            <label for="newPassword" class="col-sm-5 col-form-label">Mật khẩu mới:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                            </div>
                        </div>
                        <div class="form-group m-1">
                            <label for="confirmPassword" class="col-sm-5 col-form-label">Nhập lại mật khẩu:</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="donHangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đơn hàng</h5>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <button class="btn btn-success">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var changePasswordModal = document.getElementById('changePasswordModal');
        if (changePasswordModal.classList.contains('show')) {
            $('#changePasswordModal').modal('show');
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var userMenu = document.getElementById('userMenu');
        var userOptions = document.querySelector('.user-options');

        userMenu.addEventListener('click', function(event) {
            event.stopPropagation(); 

            if (userOptions.style.display === 'none' || userOptions.style.display === '') {
                userOptions.style.display = 'block';
            } else {
                userOptions.style.display = 'none';
            }
        });
        document.addEventListener('click', function(event) {
            userOptions.style.display = 'none';
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Show input fields for adding a new address
        $('#btn-add').on('click', function() {
            $('#newAddressRow').show();
        });

        // Save new address
        $('#btn-save-new').on('click', function() {
            var description = $('#newDescription').val();
            var address = $('#newAddress').val();
            var maNguoiDung = $('#maNguoiDung').val();

            $.ajax({
                url: '?controller=diachi&action=createDiaChi',
                method: 'POST',
                data: {
                    description: description,
                    address: address,
                    maNguoiDung: maNguoiDung
                },
                success: function(response) {
                    location.reload();
                }
            });
        });
        // Delete address
        $('.btn-delete').on('click', function() {
            var description = $(this).closest('.row').find('.p-2:eq(0)').text();
            var address = $(this).closest('.row').find('.p-2:eq(1)').text();
            var maNguoiDung = $('#maNguoiDung').val();
            
            if (confirm('Bạn có chắc chắn muốn xóa địa chỉ này?')) {
                $.ajax({
                    url: '?controller=diachi&action=delete',
                    method: 'POST',
                    data: {
                        description: description,
                        address: address,
                        maNguoiDung: maNguoiDung
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            }
        });

    });
</script>
</html>
