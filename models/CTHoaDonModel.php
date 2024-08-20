
<?php
class CTHoaDonModel
{
    public $maCTHoaDon;
    public $soLuongMua;
    public $maSanPham;
    public $maHoaDon;

    function __construct($maCTHoaDon, $soLuongMua, $maSanPham, $maHoaDon)
    {
        $this->MaChiTietHoaDon = $maCTHoaDon;
        $this->SoLuongMua = $soLuongMua;
        $this->MaSanPham = $maSanPham;
        $this->MaHoaDon = $maHoaDon;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM CT_HoaDon');

        foreach ($req->fetchAll() as $item) {
            $list[] = new CTHoaDonModel(
                $item['MaChiTietHoaDon'],
                $item['SoLuongMua'],
                $item['MaSanPham'],
                $item['MaHoaDon']
            );
        }
    
        return $list;
    }
    public static function getCTHoaDonByID($maHoaDon)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM CT_HoaDon WHERE MaHoaDon = ?');
        $stmt->execute([$maHoaDon]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cthoadons = [];
        foreach ($results as $result) {
            $cthoadons[] = new CTHoaDonModel(
                $result['MaChiTietHoaDon'],
                $result['SoLuongMua'],
                $result['MaSanPham'],
                $result['MaHoaDon']
            );
        }

        return $cthoadons;
    }

    public static function getLastCTHoaDonID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaChiTietHoaDon FROM CT_HoaDon ORDER BY MaChiTietHoaDon DESC LIMIT 1');
        $lastCTHoaDonID = $stmt->fetchColumn();
        return $lastCTHoaDonID;
    }
    public static function create($maCTHoaDon, $soLuongMua, $maSanPham, $maHoaDon)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO CT_HoaDon (MaChiTietHoaDon, SoLuongMua, MaSanPham, MaHoaDon) VALUES (?, ?, ?, ?)');
        $success = $stmt->execute([$maCTHoaDon, $soLuongMua, $maSanPham, $maHoaDon]);

        return $success;
    }

}
