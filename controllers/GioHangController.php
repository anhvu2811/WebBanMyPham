<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('controllers/BaseController.php');
require_once('models/SanPhamModel.php');
require_once('models/HoaDonModel.php');
require_once('models/NguoiDungModel.php');
require_once('models/CTHoaDonModel.php');
require 'config/PHPMailer/src/Exception.php';
require 'config/PHPMailer/src/PHPMailer.php';
require 'config/PHPMailer/src/SMTP.php';
session_start();


class GioHangController extends BaseController {
    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSanPham = $_POST['maSanPham'] ?? null; 
            $soLuong = $_POST['soLuong'] ?? 1;  
            if (!isset($maSanPham) || !is_numeric($soLuong) || $soLuong <= 0) {
                header('Location: ?controller=SanPham&action=index');
                exit();
            }
            if (!isset($_SESSION['GioHang'])) {
                $_SESSION['GioHang'] = [];
            }
            if (isset($_SESSION['GioHang'][$maSanPham])) {
                $_SESSION['GioHang'][$maSanPham] += $soLuong;
            } else {
                $_SESSION['GioHang'][$maSanPham] = $soLuong;
            }
            $_SESSION['notification'] = 'Đã thêm vào Giỏ hàng';
            header('Location: ?controller=sanpham&action=showChiTietSanPham&masp=' . $maSanPham);
            exit();
        }
    }

    public function view() {
        if (isset($_SESSION['GioHang'])) {
            $GioHang = $_SESSION['GioHang'];
            $products = [];
            foreach ($GioHang as $maSanPham => $soLuong) {
                $product = SanPhamModel::getSanPhamByID($maSanPham);
                $products[] = [
                    'product' => $product,
                    'soLuong' => $soLuong,
                ];
            }
            $data = [
                'GioHang' => $GioHang, 
                'products' => $products,
            ];
            $this->render('GioHang', 'view', $data);
        } 
    }

    public function remove() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maSanPham = $_POST['maSanPham'];
            if (!isset($maSanPham)) {
                header('Location: ?controller=GioHang&action=view');
                exit();
            }
            if (isset($_SESSION['GioHang'][$maSanPham])) {
                unset($_SESSION['GioHang'][$maSanPham]);
            }
            header('Location: ?controller=GioHang&action=view');
            exit();
        }
    }

    public function purchaseInfo() {
        if (isset($_SESSION['GioHang'])) {
            $GioHang = $_SESSION['GioHang'];
            $products = [];
            foreach ($GioHang as $maSanPham => $soLuong) {
                $product = SanPhamModel::getSanPhamByID($maSanPham);
                $products[] = [
                    'product' => $product,
                    'soLuong' => $soLuong,
                ];
            }
            $data = [
                'GioHang' => $GioHang, 
                'products' => $products,
            ];
            $this->render('GioHang', 'purchaseInfo', $data);
        } 
    }

    public function createHoaDon() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastHoaDonID = HoaDonModel::getLastHoaDonID();
            if(empty($lastHoaDonID)) {
                $maHoaDon = "HD001";
            } else {
                $maHoaDon = "HD" . str_pad((intval(substr($lastHoaDonID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            }
            $ngayLap = date("Y-m-d H:i:s");
            $tongTien = $_POST["total"];
            $diaChiGiaoHang = $_POST["address"];
            $ghiChu = isset($_POST["note"]) ? $_POST["note"] : '';
            $hinhThucThanhToan = $_POST["paymentMethod"];
            $maNguoiDung = $_POST["maNguoiDung"];
            $tinhTrang = "Đang xử lý";

            $success = HoaDonModel::create($maHoaDon, $ngayLap, $tongTien, $diaChiGiaoHang, $ghiChu, $hinhThucThanhToan, $maNguoiDung, $tinhTrang);

            //create CT_HoaDon
            $maSanPhamArray = $_POST['maSanPham'];
            $soLuongArray = $_POST['soLuong'];
            for ($i = 0; $i < count($maSanPhamArray); $i++) {
                $lastCTHoaDonID = CTHoaDonModel::getLastCTHoaDonID();
                if(empty($lastCTHoaDonID)){
                    $maCTHoaDon = "CT001";
                } else {
                    $maCTHoaDon = "CT" . str_pad((intval(substr($lastCTHoaDonID, 2)) + 1), 3, "0", STR_PAD_LEFT);
                }
                $maSanPham = $maSanPhamArray[$i];
                $soLuong = $soLuongArray[$i];
                $mahoadon = $maHoaDon;
                $success2 = CTHoaDonModel::create($maCTHoaDon, $soLuong, $maSanPham, $mahoadon);
            }
            $email = NguoiDungModel::checkEmail($maNguoiDung);
            $this->sendMail($email);
            if ($success) {
                unset($_SESSION['GioHang']);
                $_SESSION['GioHang'] = [];
                header("Location: ?controller=home&action=index&message=" . urlencode("Đặt hàng thành công"));
                exit(); 
            } 
        }
    }
    public function sendMail($email){
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username= "miotapnai@gmail.com";
            $mail->Password = "uiuyszngfiridugj";
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet="utf-8";
            $mail->setFrom($email, "HASAKI"); 
            $mail->addAddress($email, "HASAKI");
            //Content
            $mail->isHTML(true);
            $mail->Subject = "Thông tin đặt hàng";
            $mail->MsgHTML("Đặt hàng thành công. Cảm ơn quý khách.");
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>
