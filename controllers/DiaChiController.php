<?php
require_once('controllers/BaseController.php');
require_once('models/DiaChiModel.php');
date_default_timezone_set('Asia/Bangkok');


class DiaChiController extends BaseController 
{
    public function index()
    {
        $diachi = DiaChiModel::all();
        $data = array('diaCci' => $diachi);
        $this->render('DiaChi', 'index', $data);
    }
    public function create() 
    {
        $this->render('DiaChi', 'create');
    }
    
    public function createDiaChi() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastDiaChiID = DiaChiModel::getLastDiaChiID();
            if(empty($lastDiaChiID)) {
                $maDiaChi = "DT001";
            } else {
                $maDiaChi = "DT" . str_pad((intval(substr($lastDiaChiID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $diaChi = $_POST["address"];
            $moTa = $_POST["description"];
            $maNguoiDung = $_POST["maNguoiDung"];
            $created_at = date("Y-m-d H:i:s"); 

            $success = DiaChiModel::create($maDiaChi, $diaChi, $moTa, $maNguoiDung, $created_at);
            if ($success) {
                header("Location: ?controller=home&action=index");
                exit(); 
            } 
        }
    }

    public function delete() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $diaChi = $_POST["address"];
            $moTa = $_POST["description"];
            $maNguoiDung = $_POST["maNguoiDung"];

            $success = DiaChiModel::delete($diaChi, $moTa, $maNguoiDung);
            if ($success) {
                header("Location: ?controller=home&action=index");
                exit(); 
            } 
        }
    }
}
?>