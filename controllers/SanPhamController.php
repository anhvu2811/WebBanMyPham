<?php
require_once('controllers/BaseController.php');
require_once('models/SanPhamModel.php');
require_once('models/ThuongHieuModel.php');
require_once('models/LoaiModel.php');
require_once('models/KhuyenMaiModel.php');
require_once('models/HDSDModel.php');
require_once('models/HinhAnhSPModel.php');
date_default_timezone_set('Asia/Bangkok');

class SanPhamController extends BaseController 
{
    public function index()
    {
        $sanpham = SanPhamModel::all();
        $data = array('sanpham' => $sanpham);
        $this->render('SanPham', 'index', $data);
    }

    public function showDanhSachSanPham()
    {
        $action = 'showDanhSachSanPham';
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $productsPerPage = 10; 
        $offset = ($currentPage - 1) * $productsPerPage;
        $sanpham = SanPhamModel::all_Pagination($productsPerPage, $offset);
        $totalProducts = SanPhamModel::countAll();
        $totalPages = ceil($totalProducts / $productsPerPage);
        
        $thuonghieu = ThuongHieuModel::all();
        $loai = LoaiModel::all();
        $data = array(
            'sanpham' => $sanpham,
            'thuonghieu' => $thuonghieu, 
            'loai' => $loai,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'productsPerPage' => $productsPerPage,
            'action' => $action
        );

        $this->render('Pages', 'DanhSachSanPham', $data);
    }

    public function showDanhSachSanPhamTheoLoai()
    {
        $action = 'showDanhSachSanPhamTheoLoai';
        $maLoai = $_GET['maLoai'];
        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $productsPerPage = 5; 
        $offset = ($currentPage - 1) * $productsPerPage;
        $sanpham = SanPhamModel::getSanPhamTheoLoai($productsPerPage, $offset, $maLoai);
        $totalProducts = SanPhamModel::countSanPhamTheoLoai($maLoai);
        $totalPages = ceil($totalProducts / $productsPerPage);
        
        $thuonghieu = ThuongHieuModel::all();
        $loai = LoaiModel::all();
        $data = array(
            'sanpham' => $sanpham,
            'thuonghieu' => $thuonghieu, 
            'loai' => $loai,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            'productsPerPage' => $productsPerPage,
            'action' => $action
        );

        $this->render('Pages', 'DanhSachSanPham', $data);
    }

    public function showDanhSachSanPhamTheoGia()
    {
        $action = 'showDanhSachSanPhamTheoGia';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $giaMin = $_POST['giaMin'];
            $giaMax = $_POST['giaMax'];

            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $productsPerPage = 30; 
            $offset = ($currentPage - 1) * $productsPerPage;
            $sanpham = SanPhamModel::getSanPhamTheoGia($productsPerPage, $offset, $giaMin, $giaMax);
            $totalProducts = SanPhamModel::countSanPhamTheoGia($giaMin, $giaMax);
            $totalPages = ceil($totalProducts / $productsPerPage);
            
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham,
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'productsPerPage' => $productsPerPage,
                'action' => $action,
                'giaMin' => $giaMin,
                'giaMax' => $giaMax
            );
    
            $this->render('Pages', 'DanhSachSanPham', $data);
        }
    }

    public function showDanhSachSanPhamTheoTimKiem()
    {
        $action = 'showDanhSachSanPhamTheoTimKiem';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = isset($_POST['search']) ? $_POST['search'] : '';

            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $productsPerPage = 30; 
            $offset = ($currentPage - 1) * $productsPerPage;
            $sanpham = SanPhamModel::getSanPhamTheoTimKiem($productsPerPage, $offset, $search);
            $totalProducts = SanPhamModel::countSanPhamTheoTimKiem($search);
            $totalPages = ceil($totalProducts / $productsPerPage);
            
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham,
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'productsPerPage' => $productsPerPage,
                'action' => $action,
                'search' => $search,
            );
    
            $this->render('Pages', 'DanhSachSanPham', $data);
        }
    }

    public function showDanhSachSanPhamSortThapDenCao()
    {
        $action = 'showDanhSachSanPhamSortThapDenCao';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $productsPerPage = 30; 
            $offset = ($currentPage - 1) * $productsPerPage;
            $sanpham = SanPhamModel::sort_ThapDenCao($productsPerPage, $offset);
            $totalProducts = SanPhamModel::countAll();
            $totalPages = ceil($totalProducts / $productsPerPage);
            
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham,
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'productsPerPage' => $productsPerPage,
                'action' => $action,
            );
    
            $this->render('Pages', 'DanhSachSanPham', $data);
        }
    }

    public function showDanhSachSanPhamSortCaoDenThap()
    {
        $action = 'showDanhSachSanPhamSortCaoDenThap';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $productsPerPage = 30; 
            $offset = ($currentPage - 1) * $productsPerPage;
            $sanpham = SanPhamModel::sort_CaoDenThap($productsPerPage, $offset);
            $totalProducts = SanPhamModel::countAll();
            $totalPages = ceil($totalProducts / $productsPerPage);
            
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham,
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'productsPerPage' => $productsPerPage,
                'action' => $action,
            );
    
            $this->render('Pages', 'DanhSachSanPham', $data);
        }
    }

    public function showDanhSachSanPhamSortMoiNhat()
    {
        $action = 'showDanhSachSanPhamSortMoiNhat';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
            $productsPerPage = 30; 
            $offset = ($currentPage - 1) * $productsPerPage;
            $sanpham = SanPhamModel::sort_MoiNhat($productsPerPage, $offset);
            $totalProducts = SanPhamModel::countAll();
            $totalPages = ceil($totalProducts / $productsPerPage);
            
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham,
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'productsPerPage' => $productsPerPage,
                'action' => $action,
            );
    
            $this->render('Pages', 'DanhSachSanPham', $data);
        }
    }

    public function showChiTietSanPham()
    {
        if(isset($_GET['masp'])) {
            $maSanPham = $_GET['masp'];
            $sanpham = SanPhamModel::getSanPhamByID($maSanPham);
            $hinhanh = HinhAnhSPModel::getHinhAnhSPByID($maSanPham);
            $thuonghieu = ThuongHieuModel::all();
            $loai = LoaiModel::all();
            $data = array(
                'sanpham' => $sanpham, 
                'thuonghieu' => $thuonghieu, 
                'loai' => $loai,
                'hinhanh' => $hinhanh
            );
            $this->render('Pages', 'ChiTietSanPham', $data);
        }
    }

    public function create() 
    {
        $thuonghieu = ThuongHieuModel::all(); 
        $loai = LoaiModel::all(); 
        $khuyenmai = KhuyenMaiModel::allCoDieuKien(); 
        $data = array(
            'thuonghieu' => $thuonghieu, 
            'loai' => $loai, 
            'khuyenmai' => $khuyenmai
        );
        $this->render('SanPham', 'create', $data);
    }

    public function createSanPham() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastSanPhamID = SanPhamModel::getLastSanPhamID();
            if(empty($lastSanPhamID)) {
                $maSanPham = "SP001";
            } else {
                $maSanPham = "SP" . str_pad((intval(substr($lastSanPhamID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $lastHDSDID = HDSDModel::getLastHuongDanSuDungID();
            if(empty($lastHDSDID)) {
                $maHDSD = "HDSD001";
            } else {
                $maHDSD = "HDSD" . str_pad((intval(substr($lastHDSDID, 4)) + 1), 3, "0", STR_PAD_LEFT);
            }
            if (isset($_FILES['hinhAnhChinh']) && $_FILES['hinhAnhChinh']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "views/assets/img/sanpham/";
                $targetFile = $targetDirectory . basename($_FILES["hinhAnhChinh"]["name"]);
                $filename = basename($_FILES["hinhAnhChinh"]["name"]);

                if (move_uploaded_file($_FILES["hinhAnhChinh"]["tmp_name"], $targetFile)) {
                    $tenSanPham = $_POST["tenSanPham"];
                    $hinhAnhChinh = $filename;
                    $moTa = $_POST["moTa"];
                    $gia = $_POST["gia"];
                    $loaiDa = $_POST["loaiDa"];
                    $gioiTinh = $_POST["gioiTinh"];
                    $vanDeVeDa = $_POST["vanDeVeDa"];
                    $thanhPhanChinh = $_POST["thanhPhanChinh"];
                    $thanhPhanChiTiet = $_POST["thanhPhanChiTiet"];
                    $soLuongTon = $_POST["soLuongTon"];
                    $maThuongHieu = $_POST["maThuongHieu"];
                    $maLoai = $_POST["maLoai"];

                    //Thong tin bang HDSD
                    $noiDung = $_POST["noiDungHDSD"];

                    if(isset($_POST["cbKhuyenMai"])){
                        $maKhuyenMai = $_POST["maKhuyenMai"];
                    } else {
                        $maKhuyenMai = null;
                    }
                    $created_at = date("Y-m-d H:i:s"); 

                    if(SanPhamModel::checkTenSanPham($tenSanPham)) {
                        $data['errorMessage'] = "Tên sản phẩm đã tồn tại.";
                        $this->render('SanPham', 'create', $data);
                        return; 
                    }

                    $success = SanPhamModel::create($maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at);
                    $success_1 = HDSDModel::create($maHDSD, $noiDung, $maSanPham, $created_at);

                    if (!empty($_FILES['hinhAnhPhu'])) {
						foreach ($_FILES['hinhAnhPhu']['tmp_name'] as $key => $tmp_name) {
							$file_name = $_FILES['hinhAnhPhu']['name'][$key];
							$file_tmp = $_FILES['hinhAnhPhu']['tmp_name'][$key];
		
							$targetDirectory = "views/assets/img/sanpham/";
							$targetFile = $targetDirectory . basename($file_name);

                            $fileName = basename($file_name);
		
							if (!move_uploaded_file($file_tmp, $targetFile)) {
								throw new Exception("Fail: Error moving uploaded additional image file");
							}
                            $success_2 = HinhAnhSPModel::create($fileName, $maSanPham, $created_at);
						}
					}

                    if ($success AND $success_1) {
                        header("Location: ?controller=SanPham&action=index");
                        exit(); 
                    } 
                } else {
                    $alertMessage = "Fail: Error moving uploaded file";
                }
            } else {
                $alertMessage = "Fail: File upload error";
            }
        }
    }

    public function update() 
    {
        $maSanPham = $_GET['id'];
        $sanpham = SanPhamModel::getSanPhamByID($maSanPham);
        $thuonghieu = ThuongHieuModel::all(); 
        $loai = LoaiModel::all(); 
        $khuyenmai = KhuyenMaiModel::allCoDieuKien(); 
        $data = array(
            'sanpham' => $sanpham,
            'thuonghieu' => $thuonghieu, 
            'loai' => $loai, 
            'khuyenmai' => $khuyenmai
        );
        $this->render('SanPham', 'update', $data);
    }

    public function updateSanPham() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maSanPham = $_GET['id'];
            $tenSanPham = $_POST["tenSanPham"];
            $moTa = $_POST["moTa"];
            $gia = $_POST["gia"];
            $loaiDa = $_POST["loaiDa"];
            $gioiTinh = $_POST["gioiTinh"];
            $vanDeVeDa = $_POST["vanDeVeDa"];
            $thanhPhanChinh = $_POST["thanhPhanChinh"];
            $thanhPhanChiTiet = $_POST["thanhPhanChiTiet"];
            $soLuongTon = $_POST["soLuongTon"];
            $maThuongHieu = $_POST["maThuongHieu"];
            $maLoai = $_POST["maLoai"];

            if (isset($_POST["cbKhuyenMai"])) {
                $maKhuyenMai = $_POST["maKhuyenMai"];
            } else {
                $maKhuyenMai = null;
            }
            $created_at = date("Y-m-d H:i:s"); 
            
            if (isset($_FILES['newHinhAnhChinh']) && $_FILES['newHinhAnhChinh']['error'] === UPLOAD_ERR_OK) {
                $targetDirectory = "views/assets/img/sanpham/";
                $filename = basename($_FILES["newHinhAnhChinh"]["name"]);
                $targetFile = $targetDirectory . $filename;
                if (move_uploaded_file($_FILES["newHinhAnhChinh"]["tmp_name"], $targetFile)) {
                    $hinhAnhChinh = $filename;
                } 
            } else {
                $sanpham = SanPhamModel::getSanPhamByID($maSanPham);
                $hinhAnhChinh = $sanpham->HinhAnhChinh;
            }

            $success = SanPhamModel::update($maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at);

            if ($success) {
                header("Location: ?controller=SanPham&action=index");
                exit();
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maSanPham = $_GET["id"];
            $success = SanPhamModel::delete($maSanPham);
            if ($success) {
                header("Location: ?controller=SanPham&action=index");
                exit(); 
            }
        } 
    }
}
?>