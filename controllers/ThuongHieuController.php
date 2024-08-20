<?php
require_once('controllers/BaseController.php');
require_once('models/ThuongHieuModel.php');
date_default_timezone_set('Asia/Bangkok');

class ThuongHieuController extends BaseController 
{
    public function index()
    {
        $thuonghieu = ThuongHieuModel::all();
        $data = array('thuonghieu' => $thuonghieu);
        $this->render('ThuongHieu', 'index', $data);
    }
    public function create() 
    {
        $this->render('ThuongHieu', 'create');
    }
    
    public function createThuongHieu() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastThuongHieuID = ThuongHieuModel::getLastThuongHieuID();
            if(empty($lastThuongHieuID)) {
                $maThuongHieu = "TH001";
            } else {
                $maThuongHieu = "TH" . str_pad((intval(substr($lastThuongHieuID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $tenThuongHieu = $_POST["tenThuongHieu"];
            $xuatXu = $_POST["xuatXu"];
            $created_at = date("Y-m-d H:i:s"); 

            if(ThuongHieuModel::checkTenThuongHieu($tenThuongHieu)) {
                $data['errorMessage'] = "Tên thương hiệu đã tồn tại.";
                $this->render('ThuongHieu', 'create', $data);
                return; 
            }

            $success = ThuongHieuModel::create($maThuongHieu, $tenThuongHieu, $xuatXu, $created_at);
            if ($success) {
                header("Location: ?controller=ThuongHieu&action=index");
                exit(); 
            } 
        }
    }

    public function update() 
    {
        $maThuongHieu = $_GET['id'];
        $thuonghieu = ThuongHieuModel::getThuongHieuByID($maThuongHieu);
        if($thuonghieu) {
            $this->render('ThuongHieu', 'update', ['thuonghieu' => $thuonghieu]);
        }
    }

    public function updateThuongHieu() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maThuongHieu = $_GET['id'];
            $tenThuongHieu = $_POST["tenThuongHieu"];
            $xuatXu = $_POST["xuatXu"];
            $created_at = date("Y-m-d H:i:s"); 

            $success = ThuongHieuModel::update($maThuongHieu, $tenThuongHieu, $xuatXu, $created_at);
            if ($success) {
                header("Location: ?controller=thuonghieu&action=index");
                exit(); 
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maThuongHieu = $_GET["id"];
            $success = ThuongHieuModel::delete($maThuongHieu);
            if ($success) {
                header("Location: ?controller=thuonghieu&action=index");
                exit(); 
            }
        } 
    }
}
?>