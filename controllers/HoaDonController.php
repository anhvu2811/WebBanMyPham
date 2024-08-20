<?php
require_once('controllers/BaseController.php');
require_once('models/HoaDonModel.php');
require_once('models/CTHoaDonModel.php');
date_default_timezone_set('Asia/Bangkok');


class HoaDonController extends BaseController 
{
    public function index()
    {
        $hoadon = HoaDonModel::all();
        $data = array(
            'hoadon' => $hoadon
        );
        $this->render('HoaDon', 'index', $data);
    }
    public function chiTietHoaDon()
    {
        $mahoadon = $_GET['maHoaDon'];
        $_SESSION['maHoaDon'] = $mahoadon;
        $cthoadon = CTHoaDonModel::getCTHoaDonByID($mahoadon);
        $data = array(
            'cthoadon' => $cthoadon
        );
        $this->render('HoaDon', 'ChiTietHoaDon', $data);
    }

    public function updateTrangThai() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mahoadon = $_POST['mahoadon'];
            $tinhTrang = "Đang giao hàng";

            $success = HoaDonModel::updateTrangThai($tinhTrang, $mahoadon);
            if ($success) {
                header("Location: ?controller=HoaDon&action=index");
                exit(); 
            } else {
                die();
            }
        }
    }
}
?>