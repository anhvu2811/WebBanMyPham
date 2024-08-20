<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thêm mới</title>

    <!-- Custom fonts for this template-->
    <link href="views/assets/layout/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->

    <link href="views/assets/layout/admin//style/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="views/assets/layout/admin//style/css/sb-admin-2.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        form {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .left-section {
            width: 48%; 
            float: left;
        }

        .right-section {
            width: 48%; 
            float: left;
            margin-left: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-top: 20px;
        }
        textarea,
        input[type="file"],
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        option {
            font-size: 16px; 
            padding: 10px;
        }

        .chooseGender {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
            margin-left: -10px;
        }
        .chooseGender input {
            margin-left: 20px;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?controller=nguoidung&action=index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang Admin </div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?controller=home&action=index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang Chủ</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Quản lý sản phẩm -->
            <div class="sidebar-heading">
                Sản phẩm
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLSanPham"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý sản phẩm</span>
                </a>
                <div id="collapseQLSanPham" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=sanpham&action=index">Xem sản phẩm</a>
                        <a class="collapse-item" href="?controller=sanpham&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý danh mục -->
            <div class="sidebar-heading">
                Danh mục
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLDanhMuc"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý danh mục</span>
                </a>
                <div id="collapseQLDanhMuc" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=loai&action=index">Xem danh mục</a>
                        <a class="collapse-item" href="?controller=loai&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý brand -->
            <div class="sidebar-heading">
                Brand
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLBrand"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý thương hiệu</span>
                </a>
                <div id="collapseQLBrand" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=thuonghieu&action=index">Xem thương hiệu</a>
                        <a class="collapse-item" href="?controller=thuonghieu&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Quản lý người dùng -->
            <div class="sidebar-heading">
                Người dùng
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLNguoiDung"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý người dùng</span>
                </a>
                <div id="collapseQLNguoiDung" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=nguoidung&action=index">Xem người dùng</a>
                        <a class="collapse-item" href="?controller=nguoidung&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Quản lý hóa đơn -->
            <div class="sidebar-heading">
                Hóa đơn
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLHoaDon"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý hóa đơn</span>
                </a>
                <div id="collapseQLHoaDon" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=hoadon&action=index">Xem hóa đơn</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Quản lý vai trò -->
            <div class="sidebar-heading">
                Vai trò
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLVaiTro"
                aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý vai trò</span>
                </a>
                <div id="collapseQLVaiTro" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=vaitro&action=index">Xem vai trò</a>
                        <a class="collapse-item" href="?controller=vaitro&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Quản lý khuyến mãi -->
            <div class="sidebar-heading">
                Khuyến mãi
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLKhuyenMai"
                aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý khuyến mãi</span>
                </a>
                <div id="collapseQLKhuyenMai" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?controller=khuyenmai&action=index">Xem khuyến mãi</a>
                        <a class="collapse-item" href="?controller=khuyenmai&action=create">Thêm mới</a>
                    </div>
                </div>
            </li>
            <!-- Heading -->
            <!--<div class="sidebar-heading">
                Doanh Thu
            </div>-->
            <!-- Nav Item - Charts -->
            <!--<li class="nav-item">
                <a class="nav-link" href="/Admin/Dashboard/BaoCaoNgay">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Doanh thu hằng ngày</span>
                </a>
            </li>-->
            <!-- Nav Item - Tables -->
            <!--<li class="nav-item">
                <a class="nav-link" href="/Admin/Dashboard/BaocaoThang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Doanh thu hằng tháng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Doanh thu hằng năm</span>
                </a>
            </li>-->

            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>




        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php
                                    session_start();
                                    if(isset($_SESSION['user'])) {
                                        $user = $_SESSION['user'];
                                        echo '<p style=\'color: #008080;\'>' . 'Xin chào, ' . '<span style=\'font-weight: bold\'>' . $user['HoTen'] . '</span>' . '</p>';
                                    } else {
                                        echo '<a href="?controller=home&action=DangNhap">Đăng nhập</a>';
                                    }
                                ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                 aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Trang cá nhân
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->

                <div id="main-content" style="padding: 40px; ">
                    <form method="post" action="?controller=sanpham&action=createSanPham" enctype="multipart/form-data">
                        <h1>Thêm mới sản phẩm</h1>
                        <div class="left-section">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="tenSanPham" required/> <br>
                            
                            <label>Hình ảnh chính</label>
                            <input type="file" name="hinhAnhChinh" required/> <br>

                            <label>Hình ảnh phụ</label>
                            <div id="hinhAnhPhuContainer">
                                <input type="file" name="hinhAnhPhu[]" multiple required/> <br>
                            </div>
                            <button type="button" class="btn btn-secondary mt-2" onclick="addMore()">Chọn thêm ảnh</button> <br>

                            <label>Mô tả</label>
                            <textarea name="moTa" required rows="5"></textarea> <br>

                            <label>Giá</label>
                            <input type="number" name="gia" required/> <br>
                            
                            <label>Loại da</label>
                            <input type="text" name="loaiDa" required/> <br>

                            <label>Giới tính</label>
                            <div class="chooseGender">
                                <input type="radio" name="gioiTinh" value="Nam"/> Nam
                                <input type="radio" name="gioiTinh" value="Nữ"/> Nữ
                                <input type="radio" name="gioiTinh" value="Unisex"/> Unisex
                            </div>

                            <label>Vấn đề về da</label>
                            <input type="text" name="vanDeVeDa" required/> <br>
                        </div>

                        
                        <div class="right-section">
                            <label>Thành phần chính</label>
                            <textarea name="thanhPhanChinh" required rows="5"></textarea> <br>
                            
                            <label>Thành phần chi tiết</label>
                            <textarea name="thanhPhanChiTiet" required rows="5"></textarea> <br>

                            <label>Hướng dẫn sử dụng</label>
                            <textarea name="noiDungHDSD" required rows="5"></textarea> <br>
                            
                            <label>Số lượng</label>
                            <input type="number" name="soLuongTon" required/> <br>

                            <label>Thương hiệu</label>
                            <select name="maThuongHieu" required>
                                <?php foreach ($thuonghieu as $thuonghieu): ?>
                                    <option hidden>Chọn</option>
                                    <option value="<?php echo $thuonghieu->MaThuongHieu; ?>"><?php echo $thuonghieu->TenThuongHieu; ?></option>
                                <?php endforeach; ?>
                            </select> <br>
                            
                            <label>Loại</label>
                            <select name="maLoai" required>
                                <?php foreach ($loai as $loai): ?>
                                    <option hidden>Chọn</option>
                                    <option value="<?php echo $loai->MaLoai; ?>"><?php echo $loai->TenLoai; ?></option>
                                <?php endforeach; ?>
                            </select> <br>

                            <label><input type="checkbox" name="cbKhuyenMai" onchange="toggleSelect()" /> Khuyến mãi</label> 
                            <select name="maKhuyenMai" required style="display: none;">
                                <?php foreach ($khuyenmai as $khuyenmai): ?>
                                    <option hidden>Chọn</option>
                                    <option value="<?php echo $khuyenmai->MaKhuyenMai; ?>"><?php echo $khuyenmai->TenKhuyenMai; ?></option>
                                <?php endforeach; ?>
                            </select> <br>

                            <?php if(isset($errorMessage)) { ?>
                                <div style="color: red;"><?php echo $errorMessage; ?></div>
                            <?php } ?>
                        </div>
                        <input type="submit" value="Thêm"/>
                    </form>
                </div>
                <script>
                    function toggleSelect() {
                        var checkbox = document.getElementsByName('cbKhuyenMai')[0];
                        var selectField = document.getElementsByName('maKhuyenMai')[0];
                        if(checkbox.checked) {
                            selectField.style.display = 'block';
                        } else {
                            selectField.style.display = 'none';
                        }
                    }
                </script>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn thoát?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Đăng xuất" bên dưới để thoát</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="?controller=nguoidung&action=logout">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="views/assets/layout/admin//vendor/jquery/jquery.min.js"></script>

    <script src="views/assets/layout/admin//vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <script src="views/assets/layout/admin//vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="views/assets/layout/admin//js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="views/assets/layout/admin//vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="views/assets/layout/admin//js/demo/chart-area-demo.js"></script>

    <script src="views/assets/layout/admin//js/demo/chart-pie-demo.js"></script>
    <script src="views/assets/layout/admin//Scripts/bootstrap.js"></script>
    <script>
        // function addMore() {
        //     var container = document.getElementById('hinhAnhPhuContainer');
        //     var input = document.createElement('input');
        //     input.type = 'file';
        //     input.name = 'hinhAnhPhu[]';
        //     input.multiple = true;

        //     var deleteButton = document.createElement('button');
        //     deleteButton.innerHTML = 'Xóa';
        //     deleteButton.onclick = function() {
        //         container.removeChild(input);
        //         container.removeChild(deleteButton);
        //     };

        //     container.appendChild(input);
        //     container.appendChild(deleteButton);
        // }

        function addMore() {
            var container = document.getElementById('hinhAnhPhuContainer');
            var fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.name = 'hinhAnhPhu[]';
            fileInput.multiple = true;

            var label = document.createElement('label');
            label.innerText = 'Hình ảnh phụ';
            label.appendChild(fileInput);

            var deleteButton = document.createElement('button');
            deleteButton.innerHTML = 'Xóa';
            deleteButton.classList.add('btn', 'btn-danger', 'btn-sm', 'p-3', 'm-2');
            deleteButton.onclick = function() {
                container.removeChild(label);
                container.removeChild(deleteButton);
            };

            container.appendChild(label);
            container.appendChild(deleteButton);
        }


    </script>
</body>

</html>