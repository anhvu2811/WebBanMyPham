
<?php
class KhuyenMaiModel
{
    public $maKhuyenMai;
    public $tenKhuyenMai;
    public $ngayBatDau;
    public $ngayKetThuc;
    public $tyLe;
    public $trangThai;
    public $created_at;

    function __construct($maKhuyenMai, $tenKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $trangThai, $created_at)
    {
        $this->MaKhuyenMai = $maKhuyenMai;
        $this->TenKhuyenMai = $tenKhuyenMai;
        $this->NgayBatDau = $ngayBatDau;
        $this->NgayKetThuc = $ngayKetThuc;
        $this->TyLe = $tyLe;
        $this->TrangThai = $trangThai;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM khuyenmai');

        foreach ($req->fetchAll() as $item) {
            $list[] = new KhuyenMaiModel(
                $item['MaKhuyenMai'],
                $item['TenKhuyenMai'],
                $item['NgayBatDau'],
                $item['NgayKetThuc'],
                $item['TyLe'],
                $item['TrangThai'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function allCoDieuKien()
    {
        $list = [];
        $db = DB::getInstance();

        $currentDate = date('Y-m-d');
        $req = $db->query("SELECT * FROM khuyenmai WHERE TrangThai = 1");

        foreach ($req->fetchAll() as $item) {
            $list[] = new KhuyenMaiModel(
                $item['MaKhuyenMai'],
                $item['TenKhuyenMai'],
                $item['NgayBatDau'],
                $item['NgayKetThuc'],
                $item['TyLe'],
                $item['TrangThai'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getKhuyenMaiByID($maKhuyenMai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM khuyenmai WHERE MaKhuyenMai = ?');
        $stmt->execute([$maKhuyenMai]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new KhuyenMaiModel(
                $result['MaKhuyenMai'],
                $result['TenKhuyenMai'],
                $result['NgayBatDau'],
                $result['NgayKetThuc'],
                $result['TyLe'],
                $result['TrangThai'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getKhuyenMaiConHSDByID($maKhuyenMai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM khuyenmai WHERE TrangThai = 1 AND MaKhuyenMai = ?');
        $stmt->execute([$maKhuyenMai]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new KhuyenMaiModel(
                $result['MaKhuyenMai'],
                $result['TenKhuyenMai'],
                $result['NgayBatDau'],
                $result['NgayKetThuc'],
                $result['TyLe'],
                $result['TrangThai'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getLastKhuyenMaiID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaKhuyenMai FROM khuyenmai ORDER BY MaKhuyenMai DESC LIMIT 1');
        $lastKhuyenMaiID = $stmt->fetchColumn();
        return $lastKhuyenMaiID;
    }
    public static function create($tenKhuyenMai, $maKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO khuyenmai (MaKhuyenMai, TenKhuyenMai, NgayBatDau, NgayKetThuc, TyLe, Created_at) VALUES (?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute([$maKhuyenMai, $tenKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at]);

        return $success;
    }
    public static function update($maKhuyenMai, $tenKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE khuyenmai SET TenKhuyenMai=?, NgayBatDau=?, NgayKetThuc=?, TyLe=?, Created_at=? WHERE MaKhuyenMai=?');
        $success = $stmt->execute([$tenKhuyenMai, $ngayBatDau, $ngayKetThuc, $tyLe, $created_at, $maKhuyenMai]);

        return $success;
    }
    public static function delete($maKhuyenMai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM khuyenmai WHERE MaKhuyenMai=?');
        $success = $stmt->execute([$maKhuyenMai]);
        return $success;
    }
    public static function checkTenKhuyenMai($tenKhuyenMai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT COUNT(*) FROM khuyenmai WHERE TenKhuyenMai=?');
        $stmt->execute([$tenKhuyenMai]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

}
