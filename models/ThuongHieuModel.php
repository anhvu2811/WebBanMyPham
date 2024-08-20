
<?php
class ThuongHieuModel
{
    public $maThuongHieu;
    public $tenThuongHieu;
    public $xuatXu;
    public $created_at;

    function __construct($maThuongHieu, $tenThuongHieu, $xuatXu, $created_at)
    {
        $this->MaThuongHieu = $maThuongHieu;
        $this->TenThuongHieu = $tenThuongHieu;
        $this->XuatXu = $xuatXu;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM thuonghieu');

        foreach ($req->fetchAll() as $item) {
            $list[] = new ThuongHieuModel(
                $item['MaThuongHieu'],
                $item['TenThuongHieu'],
                $item['XuatXu'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getThuongHieuByID($maThuongHieu)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM thuonghieu WHERE MaThuongHieu = ?');
        $stmt->execute([$maThuongHieu]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new ThuongHieuModel(
                $result['MaThuongHieu'],
                $result['TenThuongHieu'],
                $result['XuatXu'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getLastThuongHieuID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaThuongHieu FROM thuonghieu ORDER BY MaThuongHieu DESC LIMIT 1');
        $lastThuongHieuID = $stmt->fetchColumn();
        return $lastThuongHieuID;
    }
    public static function create($maThuongHieu, $tenThuongHieu, $xuatXu, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO thuonghieu (MaThuongHieu, TenThuongHieu, XuatXu, Created_at) VALUES (?, ?, ?, ?)');
        $success = $stmt->execute([$maThuongHieu, $tenThuongHieu, $xuatXu, $created_at]);

        return $success;
    }
    public static function update($maThuongHieu, $tenThuongHieu, $xuatXu, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE thuonghieu SET TenThuongHieu=?, XuatXu=?, Created_at=? WHERE MaThuongHieu=?');
        $success = $stmt->execute([$tenThuongHieu, $xuatXu, $created_at, $maThuongHieu]);

        return $success;
    }
    public static function delete($maThuongHieu)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM thuonghieu WHERE MaThuongHieu=?');
        $success = $stmt->execute([$maThuongHieu]);
        return $success;
    }
    public static function checkTenThuongHieu($tenThuongHieu)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT COUNT(*) FROM thuonghieu WHERE TenThuongHieu=?');
        $stmt->execute([$tenThuongHieu]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

}
