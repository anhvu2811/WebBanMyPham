
<?php
class DiaChiModel
{
    public $maDiaChi;
    public $diaChi;
    public $moTa;
    public $maNguoiDung;
    public $created_at;

    function __construct($maDiaChi, $diaChi, $moTa, $maNguoiDung, $created_at)
    {
        $this->MaDiaChi = $maDiaChi;
        $this->DiaChi = $diaChi;
        $this->MoTa = $moTa;
        $this->MaNguoiDung = $maNguoiDung;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM DiaChi');

        foreach ($req->fetchAll() as $item) {
            $list[] = new DiaChiModel(
                $item['MaDiaChi'],
                $item['DiaChi'],
                $item['MoTa'],
                $item['MaNguoiDung'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getDiaChiByMaNguoiDung($maNguoiDung)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM DiaChi WHERE MaNguoiDung = ?');
        $stmt->execute([$maNguoiDung]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $addresses = [];
        foreach ($results as $result) {
            $addresses[] = new DiaChiModel(
                $result['MaDiaChi'],
                $result['DiaChi'],
                $result['MoTa'],
                $result['MaNguoiDung'],
                $result['Created_at']
            );
        }
        return $addresses;
    }
    
    public static function getLastDiaChiID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaDiaChi FROM DiaChi ORDER BY MaDiaChi DESC LIMIT 1');
        $lastDiaChiID = $stmt->fetchColumn();
        return $lastDiaChiID;
    }
    public static function create($maDiaChi, $diaChi, $moTa, $maNguoiDung, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO DiaChi (MaDiaChi, DiaChi, MoTa, MaNguoiDung, Created_at) VALUES (?, ?, ?, ?, ?)');
        $success = $stmt->execute([$maDiaChi, $diaChi, $moTa, $maNguoiDung, $created_at]);

        return $success;
    }
    public static function update($maDiaChi, $diaChi, $moTa, $maNguoiDung, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE DiaChi SET DiaChi=?, MoTa=?, MaNguoiDung=?, Created_at=? WHERE MaDiaChi=?');
        $success = $stmt->execute([$diaChi, $moTa, $maNguoiDung, $created_at, $maDiaChi]);

        return $success;
    }
    public static function delete($diaChi, $moTa, $maNguoiDung)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM DiaChi WHERE DiaChi=? AND MoTa=? AND MaNguoiDung=?');
        $success = $stmt->execute([$diaChi, $moTa, $maNguoiDung]);
        return $success;
    }

}
