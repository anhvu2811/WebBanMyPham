<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom styles for this template-->

    <link href="./style/css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="./style/css/sb-admin-2.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Admin/DashBoard/index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-bookmark"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang Admin </div>
            </a>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Admin/Dashboard/index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span>
                </a>
            </li>
            <!-- Divider -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Quản lý trang -->
            <div class="sidebar-heading">
                Trang
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLTrang"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý trang</span>
                </a>
                <div id="collapseQLTrang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-gradient-success py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/Home/Index">Trang người dùng</a>
                    </div>
                </div>
            </li>
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
                        <a class="collapse-item" href="#">Xem sản phẩm</a>
                        <a class="collapse-item" href="#">Thêm mới</a>
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
                        <a class="collapse-item" href="#">Xem hóa đơn</a>
                        <a class="collapse-item" href="#">Thêm mới</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Quản lý vai trò -->
            <div class="sidebar-heading">
                Vai trò
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQLHoaDon"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Quản lý vai trò</span>
                </a>
                <div id="collapseQLHoaDon" class="collapse" aria-labelledby="headingUtilities"
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
                    <?php
                        if (isset($content) && !empty($content)) {
                            include $content;
                        } else {
                            echo "Không có nội dung để hiển thị.";
                        }
                    ?>

                </div>
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
    <script src="./vendor/jquery/jquery.min.js"></script>

    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="./js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <script src="./vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->

    <script src="./js/demo/chart-area-demo.js"></script>

    <script src="./js/demo/chart-pie-demo.js"></script>
    <script src="./Scripts/bootstrap.js"></script>
</body>

</html>