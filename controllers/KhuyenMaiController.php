<?php
require_once('controllers/BaseController.php');
require_once('models/KhuyenMaiModel.php');
date_default_timezone_set('Asia/Bangkok');

class KhuyenMaiController extends BaseController 
{
    public function index()
    {
        $khuyenmai = KhuyenMaiModel::all();
        $data = array('khuyenmai' => $khuyenmai);
        $this->render('KhuyenMai', 'index', $data);
    }
    public function create() 
    {
        $this->render('KhuyenMai', 'create');
    }
    
    public function createKhuyenMai() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastKhuyenMaiID = KhuyenMaiModel::getLastKhuyenMaiID();
            if(empty($lastKhuyenMaiID)) {
                $maKhuyenMai = "KM001";
            } else {
                $maKhuyenMai = "KM" . str_pad((intval(substr($lastKhuyenMaiID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $tenKhuyenMai = $_POST['tenKhuyenMai'];
            $ngayBatDau = $_POST["ngayBatDau"];
            $ngayKetThuc = $_POST["ngayKetThuc"];
            $tyLe = $_POST["tyLe"];
            $created_at = date("Y-m-d H:i:s"); 

            if(KhuyenMaiModel::checkTenKhuyenMai($tenKhuyenMai)) {
                $data['errorMessage'] = "Tên khuyến mãi đã tồn tại.";
                $this->render('KhuyenMai', 'create', $data);
                return; 
            }
            if($ngayBatDau > $ngayKetThuc) {
                $data['errorMessage'] = "Ngày bắt đầu phải nhỏ hơn ngày kết thúc.";
                $this->render('KhuyenMai', 'create', $data);
                return; 
            }
            if($tyLe <= 0) {
                $data['errorMessage'] = "Tỷ lệ phải lớn hơn 0.";
                $this->render('KhuyenMai', 'create', $data);
                return; 
            }

            $success = KhuyenMaiModel::create($tenKhuyenMai, $maKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at);
            if ($success) {
                header("Location: ?controller=KhuyenMai&action=index");
                exit(); 
            } 
        }
    }

    public function update() 
    {
        $maKhuyenMai = $_GET['id'];
        $khuyenmai = KhuyenMaiModel::getKhuyenMaiByID($maKhuyenMai);
        if($khuyenmai) {
            $this->render('KhuyenMai', 'update', ['khuyenmai' => $khuyenmai]);
        }
    }

    public function updateKhuyenMai() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maKhuyenMai = $_GET['id'];
            $tenKhuyenMai = $_POST['tenKhuyenMai'];
            $ngayBatDau = $_POST["ngayBatDau"];
            $ngayKetThuc = $_POST["ngayKetThuc"];
            $tyLe = $_POST["tyLe"];
            $created_at = date("Y-m-d H:i:s"); 

            if($ngayBatDau > $ngayKetThuc) {
                $data['errorMessage'] = "Ngày bắt đầu phải nhỏ hơn ngày kết thúc.";
                $this->render('KhuyenMai', 'create', $data);
                return; 
            }
            if($tyLe <= 0) {
                $data['errorMessage'] = "Tỷ lệ phải lớn hơn 0.";
                $this->render('KhuyenMai', 'create', $data);
                return; 
            }
            
            $success = KhuyenMaiModel::update($maKhuyenMai, $tenKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at);
            if ($success) {
                header("Location: ?controller=KhuyenMai&action=index");
                exit(); 
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maKhuyenMai = $_GET["id"];
            $success = KhuyenMaiModel::delete($maKhuyenMai);
            if ($success) {
                header("Location: ?controller=KhuyenMai&action=index");
                exit(); 
            }
        } 
    }
}
?>