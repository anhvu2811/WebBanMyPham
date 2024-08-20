<?php
require_once('controllers/BaseController.php');

class HomeController extends BaseController 
{
    public function index()
    {
        $this->render('Pages', 'TrangChu');
    }

    public function DangNhap()
    {
        $this->render('Pages', 'DangNhap');
    }

    public function DangKy()
    {
        $this->render('Pages', 'DangKy');
    }

    public function HeThongCuaHang()
    {
        $this->render('Pages', 'HeThongCuaHang');
    }

    public function ShowSanPham()
    {
        $this->render('Pages', 'ChiTietSanPham');
    }

    public function QuenMatKhau(){
        $this->render('Pages', 'QuenMatKhau');
    }

    public function NhapMaXacNhan(){
        $this->render('Pages', 'NhapMaXacNhan');
    }

    public function DatLaiMatKhau(){
        $this->render('Pages', 'DatLaiMatKhau');
    }
}

?>
