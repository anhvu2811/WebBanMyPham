<?php
require_once('controllers/BaseController.php');
require_once('models/NguoiDungModel.php');
require_once('models/VaiTroModel.php');
date_default_timezone_set('Asia/Bangkok');

class NguoiDungController extends BaseController 
{
    public function index()
    {
        $nguoidungs = NguoiDungModel::all();
        $data = array('nguoidung' => $nguoidungs);
        $this->render('NguoiDung', 'index', $data);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = NguoiDungModel::getUserByEmailAndPassword($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['GioHang'] = [];
                if ($user['MaVaiTro'] == "VT001") {
                    header("Location: ?controller=nguoidung&action=index&message=" . urlencode("Đăng nhập thành công với vai trò quản trị viên"));
                    exit();
                } else {
                    header("Location: ?controller=home&action=index&message=" . urlencode("Đăng nhập thành công"));
                    exit();
                }
            } else {
                header("Location: ?controller=home&action=DangNhap&message=" . "Email/Password không chính xác");
                exit(); 
            }
        } 
    }
    
    public function logout() {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location: ?controller=home&action=index");
        exit();
    }
    

    public function create() 
    {
        $vaitro = VaiTroModel::all(); 
        $data = array('vaitro' => $vaitro);
        $this->render('NguoiDung', 'create', $data);
    }
    
    public function createUser() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastUserID = NguoiDungModel::getLastUserID();
            $vaitro = VaiTroModel::all(); 
            $data = array('vaitro' => $vaitro);
            
            $maNguoiDung = "ND" . str_pad((intval(substr($lastUserID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            $hoTen = $_POST["hoTen"];
            $ngaySinh = $_POST["ngaySinh"];
            $gioiTinh = $_POST["gioiTinh"];
            $diaChi = $_POST["diaChi"];
            $sdt = $_POST["sdt"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            $maVaiTro = $_POST["maVaiTro"];
            $trangThai = 1;
            $created_at = date("Y-m-d H:i:s"); 

            $pattern = '/^[^0-9]+$/';
            $ngaySinhDateTime = new DateTime($ngaySinh);
            $currentDateTime = new DateTime("today");

            // Kiểm tra SĐT
            $vtmobi = array("086", "096", "097", "098", "032", "033", "034", "035", "036", "037", "038", "039");
            $vina = array("088", "091", "094", "083", "084", "085", "081", "082");
            $vnmobile = array("089", "090", "093", "070", "079", "077", "076", "078");
            $gmobile = array("059", "056", "058");
    
            $phone_prefix = substr($sdt, 0, 3);

            if (!preg_match($pattern, $hoTen)) {
                $data['errorMessage'] = "Họ tên không được chứa ký tự số.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }
            if ($ngaySinhDateTime >= $currentDateTime) {
                $data['errorMessage'] = "Ngày sinh phải nhỏ hơn ngày hiện tại.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }
            if (strlen($diaChi) < 10) {
                $data['errorMessage'] = "Mô tả phải có ít nhất 10 ký tự.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['errorMessage'] = "Email không hợp lệ.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }
            if (!in_array($phone_prefix, array_merge($vtmobi, $vina, $vnmobile, $gmobile))) {
                $data['errorMessage'] = "Số điện thoại không hợp lệ.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                $data['errorMessage'] = "Mật khẩu phải có ít nhất 8 ký tự, 1 ký tự viết hoa, 1 ký tự số và 1 ký tự đặc biệt.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if ($password !== $confirmPassword) {
                $data['errorMessage'] = "Mật khẩu và xác nhận mật khẩu không chính xác.";
                $this->render('NguoiDung', 'create', $data);
                return;
            }

            $success = NguoiDungModel::create($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at);
            if ($success) {
                header("Location: ?controller=NguoiDung&action=index");
                exit(); 
            } 
        }
    }

    public function update() 
    {
        $maNguoiDung = $_GET['id'];
        $nguoidung = NguoiDungModel::getUserByID($maNguoiDung);
        $vaitro = VaiTroModel::all(); 
        $data = array('vaitro' => $vaitro, 'nguoidung' => $nguoidung);
        $this->render('NguoiDung', 'update', $data);
    }

    public function updateUser() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"])) {
            $maNguoiDung = $_GET['id'];
            $hoTen = $_POST["hoTen"];
            $ngaySinh = $_POST["ngaySinh"];
            $gioiTinh = $_POST["gioiTinh"];
            $diaChi = $_POST["diaChi"];
            $sdt = $_POST["sdt"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $maVaiTro = $_POST["maVaiTro"];
            $trangThai = 1;
            $created_at = date("Y-m-d H:i:s"); 

            $success = NguoiDungModel::update($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at);
            if ($success) {
                header("Location: ?controller=nguoidung&action=index");
                exit(); 
            }
        }
    }

    public function delete() 
    {
        if (isset($_GET["id"])) {
            $maNguoiDung = $_GET["id"];
            $success = NguoiDungModel::delete($maNguoiDung);
            if ($success) {
                header("Location: ?controller=nguoidung&action=index");
                exit(); 
            }
        } 
    }

    public function createUser_Khach() 
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastUserID = NguoiDungModel::getLastUserID();
            $vaitro = VaiTroModel::all(); 
            $data = array(
                'vaitro' => $vaitro,
                'hoTen' => $_POST['hoTen'],
                'ngaySinh' => $_POST['ngaySinh'],
                'gioiTinh' => $_POST['gioiTinh'],
                'diaChi' => $_POST['diaChi'],
                'sdt' => $_POST['sdt'],
                'email' => $_POST['email'],
            );
            
            $maNguoiDung = "ND" . str_pad((intval(substr($lastUserID, 2)) + 1), 3, "0", STR_PAD_LEFT);
            $hoTen = $_POST["hoTen"];
            $ngaySinh = $_POST["ngaySinh"];
            $gioiTinh = $_POST["gioiTinh"];
            $diaChi = $_POST["diaChi"];
            $sdt = $_POST["sdt"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];
            $maVaiTro = "VT003";
            $trangThai = 1;
            $created_at = date("Y-m-d H:i:s"); 

            $pattern = '/^[^0-9]+$/';
            $ngaySinhDateTime = new DateTime($ngaySinh);
            $currentDateTime = new DateTime("today");

            // Kiểm tra SĐT
            $vtmobi = array("086", "096", "097", "098", "032", "033", "034", "035", "036", "037", "038", "039");
            $vina = array("088", "091", "094", "083", "084", "085", "081", "082");
            $vnmobile = array("089", "090", "093", "070", "079", "077", "076", "078");
            $gmobile = array("059", "056", "058");
    
            $phone_prefix = substr($sdt, 0, 3);

            if (!preg_match($pattern, $hoTen)) {
                $data['errorMessage'] = "Họ tên không được chứa ký tự số.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if ($ngaySinhDateTime >= $currentDateTime) {
                $data['errorMessage'] = "Ngày sinh phải nhỏ hơn ngày hiện tại.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if (strlen($diaChi) < 10) {
                $data['errorMessage'] = "Địa chỉ phải có ít nhất 10 ký tự.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data['errorMessage'] = "Email không hợp lệ.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if (NguoiDungModel::getEmail($email)) {
                $data['errorMessage'] = "Email đã tồn tại.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if (!in_array($phone_prefix, array_merge($vtmobi, $vina, $vnmobile, $gmobile))) {
                $data['errorMessage'] = "Số điện thoại không hợp lệ.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^A-Za-z0-9]/', $password)) {
                $data['errorMessage'] = "Mật khẩu phải có ít nhất 8 ký tự, 1 ký tự viết hoa, 1 ký tự số và 1 ký tự đặc biệt.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }
            if ($password !== $confirmPassword) {
                $data['errorMessage'] = "Mật khẩu và xác nhận mật khẩu không chính xác.";
                $this->render('Pages', 'DangKy', $data);
                return;
            }

            $success = NguoiDungModel::create($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at);
            if ($success) {
                header("Location: ?controller=home&action=DangNhap&tb=" . urlencode("Đăng ký thành công"));
                exit(); 
            } 
        }
    }

    public function changePassword() {
        $messageError = '';
        $tb = '';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }  
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $maNguoiDung = $user['MaNguoiDung'];
            $oldPassword = md5($_POST["oldPassword"]); 
            $newPassword = $_POST["newPassword"];
            $confirmPassword = $_POST["confirmPassword"];
            if (strlen($newPassword) < 8 || !preg_match('/[A-Z]/', $newPassword) || !preg_match('/[0-9]/', $newPassword) || !preg_match('/[^A-Za-z0-9]/', $newPassword)) {
                $messageError = "Mật khẩu phải có ít nhất <br> 8 ký tự trở lên<br> 1 ký tự viết hoa <br> 1 ký tự số <br> 1 ký tự đặc biệt.";
                header("Location: ?controller=home&action=index&error=" . $messageError);
                return;
            } else {
                if ($newPassword == $confirmPassword) {
                    $csdlPassword = NguoiDungModel::getPassword($maNguoiDung);
                    if ($oldPassword == $csdlPassword) {
                        $success = NguoiDungModel::changePassword($maNguoiDung, $newPassword);
                        if ($success) {
                            $tb = "Thay đổi thành công";
                            header("Location: ?controller=home&action=index&tb=" . $tb);
                            exit(); 
                        } else {
                            $messageError = "Đã xảy ra lỗi khi thay đổi mật khẩu. Vui lòng thử lại sau.";
                        }
                    } else {
                        $messageError =  "Mật khẩu cũ không chính xác.";
                    }
                } else {
                    $messageError = "Mật khẩu mới và mật khẩu xác nhận không khớp.";
                }
            }
        }
        if (!empty($messageError)) {
            header("Location: ?controller=home&action=index&error=" . $messageError);
            exit();
        }
    } 
    public function QuenMatKhau(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            session_start();
            $_SESSION["email"]=$email;
            // Kiểm tra xem email có tồn tại trong cơ sở dữ liệu không
            $user = NguoiDungModel::getUserByEmail($email);
            
            if ($user) {
                // Người dùng tồn tại trong cơ sở dữ liệu
                // Tạo và lưu mã xác nhận ngẫu nhiên vào cơ sở dữ liệu
                $verificationCode = NguoiDungModel::generateRandomToken(6); // Tạo mã xác nhận ngẫu nhiên
                
                // Lưu mã xác nhận và email vào cơ sở dữ liệu
                $success = NguoiDungModel::saveVerificationCode($email, $verificationCode);
                if($success){
                    $sent = NguoiDungModel::sendVerificationCodeByEmail($email, $verificationCode);
                    if($sent){
                        echo "Đã gửi mã xác nhận về emai của bạn. Vui lòng kiểm tra Email";
                        header("Location: ?controller=home&action=NhapMaXacNhan&email=".urlencode($email));
                        exit();
                    }
                    else{
                        echo "Có lỗi xảy ra khi gửi mail";
                    }
                }else{
                    echo "Có lỗi xảy ra khi lưu mã xác nhận. ";
                }
            }else{
                echo '<script>alert("Email chưa được đăng ký")</script>';
                echo '<meta http-equiv="refresh" content="0.5; url=?controller=home&action=DangNhap">';
            }     
        } 
    }
    //hàm kiểm tra mã xác nhận
    public function KiemTraMaXacNhan() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            $email = $_SESSION["email"];
            //$email = $_POST["email"];
            $verification_code = $_POST["verification_code"];
            $ktxt=0;
            // Kiểm tra xem mã xác nhận có đúng không
            $is_verified = NguoiDungModel::verifyVerificationCode($email, $verification_code);
            if ($is_verified) {
                $ktxt=1;
                echo '<script>alert("Mã xác nhận đúng");</script>';
                echo '<meta http-equiv="refresh" content="0.5; url=?controller=home&action=DatLaiMatKhau&email='.urlencode($email) . '">';
                //header("Location: ?controller=home&action=DatLaiMatKhau&email=".urlencode($email));
            } else {
                echo '<script>alert("Mã xác nhận không đúng. Vui lòng kiểm tra lại.");</script>';
                echo '<meta http-equiv="refresh" content="0.5; url=?controller=home&action=NhapMaXacNhan&email='.urlencode($email) . '">';
                //header("Location: ?controller=home&action=NhapMaXacNhan&email=".urlencode($email));
            }
    
        }
        
    }
    //hàm đặt lại mk
    public function XuLyDatLaiMatKhau() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //$email = $_POST["email"];
            session_start();
            $email = $_SESSION["email"];
            $newPassword = $_POST["password"];
            $confirmPassword = $_POST["confirm_password"];
    
            // Kiểm tra xác nhận mật khẩu mới
            if ($newPassword !== $confirmPassword) {
                echo '<script>alert("Mật khẩu không khớp!");</script>';
                echo '<meta http-equiv="refresh" content="0.5; url=?controller=home&action=DatLaiMatKhau&email='.urlencode($email) . '">';
                return;
            }
            // Hash mật khẩu mới trước khi lưu vào cơ sở dữ liệu
            $success = NguoiDungModel::resetPassword($email, $newPassword);
            if ($success) {
                echo '<script>alert("Đặt lại mật khẩu thành công!");</script>';
                echo '<meta http-equiv="refresh" content="0.2; url=?controller=home&action=DangNhap">';
                return;
            } else {           
                echo '<script>alert("Đặt lại mật khẩu thất bại!");</script>';
                echo '<meta http-equiv="refresh" content="0.2; url=?controller=home&action=QuenMatKhau">';
            }
            
        }
    }       

}
?>