
<?php
class HDSDModel
{
    public $maHDSD;
    public $noiDung;
    public $maSanPham;
    public $created_at;

    function __construct($maHDSD, $noiDung, $maSanPham, $created_at)
    {
        $this->MaHDSD = $maHDSD;
        $this->NoiDung = $noiDung;
        $this->MaSanPham = $maSanPham;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM huongdansudung');

        foreach ($req->fetchAll() as $item) {
            $list[] = new HDSDModel(
                $item['MaHDSD'],
                $item['NoiDung'],
                $item['MaSanPham'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getHuongDanSuDungByID($maSanPham)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM huongdansudung WHERE MaSanPham = ?');
        $stmt->execute([$maSanPham]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new HDSDModel(
                $result['MaHDSD'],
                $result['NoiDung'],
                $result['MaSanPham'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getLastHuongDanSuDungID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaHDSD FROM HuongDanSuDung ORDER BY MaHDSD DESC LIMIT 1');
        $lastHuongDanSuDungID = $stmt->fetchColumn();
        return $lastHuongDanSuDungID;
    }
    public static function create($maHDSD, $noiDung, $maSanPham, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO HuongDanSuDung (MaHDSD, NoiDung, MaSanPham, Created_at) VALUES (?, ?, ?, ?)');
        $success = $stmt->execute([$maHDSD, $noiDung, $maSanPham, $created_at]);

        return $success;
    }
    public static function update($maHDSD, $noiDung, $maSanPham, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE HuongDanSuDung SET NoiDung=?, MaSanPham=?, Created_at=? WHERE MaHDSD=?');
        $success = $stmt->execute([$noiDung, $maSanPham, $created_at, $maHDSD]);

        return $success;
    }
    public static function delete($maHDSD)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM HuongDanSuDung WHERE MaHDSD=?');
        $success = $stmt->execute([$maHDSD]);
        return $success;
    }

}
