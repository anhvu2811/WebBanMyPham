<?php
require_once('controllers/BaseController.php');
require_once('models/VaiTroModel.php');
date_default_timezone_set('Asia/Bangkok');

class VaiTroController extends BaseController 
{
    public function index()
    {
        $vaitro = VaiTroModel::all();
        $data = array('vaitro' => $vaitro);
        $this->render('VaiTro', 'index', $data);
    }
    public function create() 
    {
        $this->render('VaiTro', 'create');
    }
    
    public function createVaiTro() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastVaiTroID = VaiTroModel::getLastVaiTroID();
            if(empty($lastVaiTroID)) {
                $maVaiTro = "VT001";
            } else {
                $maVaiTro = "VT" . str_pad((intval(substr($lastVaiTroID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $tenVaiTro = $_POST["tenVaiTro"];
            $moTa = $_POST["moTa"];
            $created_at = date("Y-m-d H:i:s"); 

            
            if(VaiTroModel::checkTenVaiTro($tenVaiTro)) {
                $data['errorMessage'] = "Tên vai trò đã tồn tại.";
                $this->render('VaiTro', 'create', $data);
                return; 
            }

            if (strlen($moTa) < 6) {
                $data['errorMessage'] = "Mô tả phải có ít nhất 6 ký tự.";
                $this->render('VaiTro', 'create', $data);
                return;
            }
            
            $success = VaiTroModel::create($maVaiTro, $tenVaiTro, $moTa, $created_at);
            if ($success) {
                header("Location: ?controller=VaiTro&action=index");
                exit(); 
            } 
        }
    }

    public function update() 
    {
        $maVaiTro = $_GET['id'];
        $vaitro = VaiTroModel::getVaiTroByID($maVaiTro);
        if($vaitro) {
            $this->render('VaiTro', 'update', ['vaitro' => $vaitro]);
        }
    }

    public function updateVaiTro() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maVaiTro = $_GET['id'];
            $tenVaiTro = $_POST["tenVaiTro"];
            $moTa = $_POST["moTa"];
            $created_at = date("Y-m-d H:i:s"); 

            $success = VaiTroModel::update($maVaiTro, $tenVaiTro, $moTa, $created_at);
            if ($success) {
                header("Location: ?controller=vaitro&action=index");
                exit(); 
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maVaiTro = $_GET["id"];
            $success = VaiTroModel::delete($maVaiTro);
            if ($success) {
                header("Location: ?controller=vaitro&action=index");
                exit(); 
            }
        } 
    }
}
?>