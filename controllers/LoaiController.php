<?php
require_once('controllers/BaseController.php');
require_once('models/LoaiModel.php');
date_default_timezone_set('Asia/Bangkok');


class LoaiController extends BaseController 
{
    public function index()
    {
        $loai = LoaiModel::all();
        $data = array('loai' => $loai);
        $this->render('Loai', 'index', $data);
    }
    public function create() 
    {
        $this->render('Loai', 'create');
    }
    
    public function createLoai() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastLoaiID = LoaiModel::getLastLoaiID();
            if(empty($lastLoaiID)) {
                $maLoai = "L001";
            } else {
                $maLoai = "L" . str_pad((intval(substr($lastLoaiID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $tenLoai = $_POST["tenLoai"];
            $created_at = date("Y-m-d H:i:s"); 

            if(LoaiModel::checkTenLoai($tenLoai)) {
                $data['errorMessage'] = "Tên loại đã tồn tại.";
                $this->render('Loai', 'create', $data);
                return; 
            }

            $success = LoaiModel::create($maLoai, $tenLoai, $created_at);
            if ($success) {
                header("Location: ?controller=Loai&action=index");
                exit(); 
            } 
        }
    }

    public function update() 
    {
        $maLoai = $_GET['id'];
        $loai = LoaiModel::getLoaiByID($maLoai);
        if($loai) {
            $this->render('Loai', 'update', ['loai' => $loai]);
        }
    }

    public function updateLoai() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maLoai = $_GET['id'];
            $tenLoai = $_POST["tenLoai"];
            $created_at = date("Y-m-d H:i:s"); 

            $success = LoaiModel::update($maLoai, $tenLoai, $created_at);
            if ($success) {
                header("Location: ?controller=Loai&action=index");
                exit(); 
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maLoai = $_GET["id"];
            $success = LoaiModel::delete($maLoai);
            if ($success) {
                header("Location: ?controller=Loai&action=index");
                exit(); 
            }
        } 
    }
}
?>