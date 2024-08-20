
<?php
use PHPMailer\PHPMailer\PHPMailer;
class NguoiDungModel
{
    public $maNguoiDung;
    public $hoTen;
    public $ngaySinh;
    public $gioiTinh;
    public $diaChi;
    public $sdt;
    public $email;
    public $password;
    public $maVaiTro;
    public $trangThai;
    public $created_at;
    public $tenVaiTro;

    function __construct($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at, $tenVaiTro )
    {
        $this->MaNguoiDung = $maNguoiDung;
        $this->HoTen = $hoTen;
        $this->NgaySinh = $ngaySinh;
        $this->GioiTinh = $gioiTinh;
        $this->DiaChi = $diaChi;
        $this->SDT = $sdt;
        $this->Email = $email;
        $this->Password = $password;
        $this->MaVaiTro = $maVaiTro;
        $this->TrangThai = $trangThai;
        $this->Created_at = $created_at;
        $this->TenVaiTro = $tenVaiTro;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT a.*, b.TenVaiTro FROM nguoidung a, vaitro b WHERE a.MaVaiTro = b.MaVaiTro');

        foreach ($req->fetchAll() as $item) {
            $list[] = new NguoiDungModel(
                $item['MaNguoiDung'],
                $item['HoTen'],
                $item['NgaySinh'],
                $item['GioiTinh'],
                $item['DiaChi'],
                $item['SDT'],
                $item['Email'],
                $item['Password'],
                $item['MaVaiTro'],
                $item['TrangThai'],
                $item['Created_at'],
                $item['TenVaiTro']
            );
        }
    
        return $list;
    }
    public static function getUserByID($maNguoiDung)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT a.*, b.TenVaiTro FROM nguoidung a, vaitro b WHERE a.MaVaiTro = b.MaVaiTro AND MaNguoiDung = ?');
        $stmt->execute([$maNguoiDung]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new NguoiDungModel(
                $result['MaNguoiDung'],
                $result['HoTen'],
                $result['NgaySinh'],
                $result['GioiTinh'],
                $result['DiaChi'],
                $result['SDT'],
                $result['Email'],
                $result['Password'],
                $result['MaVaiTro'],
                $result['TrangThai'],
                $result['Created_at'],
                $result['TenVaiTro']
            );
        } else {
            return null; 
        }
    }
    public static function getLastUserID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaNguoiDung FROM nguoidung ORDER BY MaNguoiDung DESC LIMIT 1');
        $lastUserID = $stmt->fetchColumn();
        return $lastUserID;
    }
    public static function create($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at)
    {
        $hashPassword = md5($password);
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO nguoidung (MaNguoiDung, HoTen, NgaySinh, GioiTinh, DiaChi, SDT, Email, Password, MaVaiTro, TrangThai, Created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute([$maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $hashPassword, $maVaiTro, $trangThai, $created_at]);

        return $success;
    }
    public static function update($maNguoiDung, $hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $password, $maVaiTro, $trangThai, $created_at)
    {
        $hashPassword = md5($password);
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE nguoidung SET HoTen=?, NgaySinh=?, GioiTinh=?, DiaChi=?, SDT=?, Email=?, Password=?, MaVaiTro=?, TrangThai=?, Created_at=? WHERE MaNguoiDung=?');
        $success = $stmt->execute([$hoTen, $ngaySinh, $gioiTinh, $diaChi, $sdt, $email, $hashPassword, $maVaiTro, $trangThai, $created_at, $maNguoiDung]);

        return $success;
    }
    public static function delete($maNguoiDung)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM nguoidung WHERE MaNguoiDung=?');
        $success = $stmt->execute([$maNguoiDung]);
        return $success;
    }
    public static function getUserByEmailAndPassword($email, $password) {
        $db = DB::getInstance();
        $hashPassword = md5($password);
        $stmt = $db->prepare('SELECT * FROM nguoidung WHERE TrangThai = 1 AND Email=? AND Password = ?');
        $stmt->execute([$email, $hashPassword]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user; 
    }
    public static function getPassword($maNguoiDung) {
        $db = DB::getInstance();
        $query = "SELECT Password FROM nguoidung WHERE MaNguoiDung = :maNguoiDung";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['Password'];
        }
        return null; 
    }
    public static function changePassword($maNguoiDung, $password)
    {
        $hashPassword = md5($password);
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE nguoidung SET Password=? WHERE MaNguoiDung=?');
        $success = $stmt->execute([$hashPassword, $maNguoiDung]);

        return $success;
    }
    public static function getEmail($email) {
        $db = DB::getInstance();
        $query = "SELECT Email FROM nguoidung WHERE Email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['Email'];
        }
        return null; 
    }
    public static function checkEmail($maNguoiDung) {
        $db = DB::getInstance();
        $query = "SELECT Email FROM nguoidung WHERE MaNguoiDung = :maNguoiDung";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':maNguoiDung', $maNguoiDung);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['Email'];
        }
        return null; 
    }

    public static function getUserByEmail($email){
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM nguoidung where email = ?');
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    //Hàm này sẽ tạo ra một chuỗi ngẫu nhiên
    public static function generateRandomToken($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    }
    //nếu email tồn tại lưu mã xác nhận ngẫu nhiên vào table password_reset
    public static function saveVerificationCode($email, $verificationCode) {
        try{
            $expiryDateTime = new DateTime("now", new DateTimeZone('UTC'));
            $expiryDateTime->modify('+7 hours'); 
            $db = DB::getInstance();
            $stmt = $db->prepare('INSERT INTO password_reset (email, token, expiry) VALUES (?, ?, ?)');
            $success = $stmt->execute([$email, $verificationCode, $expiryDateTime->format('Y-m-d H:i:s')]);

            return $success ? true:false;
        } catch (PDOException $e) {
            return false;
        }
    }
    //hàm gửi mail
    public static function sendVerificationCodeByEmail($email, $verificationCode) {
        require "config/PHPMailer/src/PHPMailer.php"; 
        require "config/PHPMailer/src/SMTP.php"; 
        require 'config/PHPMailer/src/Exception.php'; 

        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 0; // 0,1,2: chế độ debug
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  // SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'miotapnai@gmail.com'; // SMTP username
            $mail->Password = 'uiuyszngfiridugj';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
            $mail->Port = 465;  // port to connect to                
            $mail->setFrom('hasaki.edu@gmail.com', 'HASAKI' ); 
            $mail->addAddress($email); 
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Mã xác nhận';
            $mail->Body = 'Mã xác nhận của bạn là: ' . $verificationCode;

            $mail->smtpConnect( array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public static function verifyVerificationCode($email, $verificationCode) {
        $db = DB::getInstance();
        $sql = 'SELECT * FROM password_reset WHERE email = ? AND token = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$email, $verificationCode]);
        $row = $stmt->fetch();
        if ($row) {
            $expiryDateTime = new DateTime($row['expiry']);
            // Thêm 5 phút vào thời gian hết hạn
            $expiryDateTime->modify('+5 minutes');
            
            // Lấy thời gian hiện tại
            $currentDateTime = new DateTime();
            if ($currentDateTime < $expiryDateTime) {
                $stmtDelete = $db->prepare('DELETE FROM password_reset WHERE Email = ?');
                $stmtDelete->execute([$email]);
                return true; 
            } else {
                return false; 
            }
    
            return true; 
        } 
    }
    public static function resetPassword($email, $newPassword) {
        $hashPassword = md5($newPassword);
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE nguoidung SET Password = ? WHERE Email = ?');
        $success = $stmt->execute([$hashPassword, $email]);
        return $success;
    }
}
