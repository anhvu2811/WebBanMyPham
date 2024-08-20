
<?php
class HoaDonModel
{
    public $maHoaDon;
    public $ngayLap;
    public $tongTien;
    public $diaChiGiaoHang;
    public $ghiChu;
    public $hinhThucThanhToan;
    public $maNguoiDung;
    public $tinhTrang;

    function __construct($maHoaDon, $ngayLap, $tongTien, $diaChiGiaoHang, $ghiChu, $hinhThucThanhToan, $maNguoiDung, $tinhTrang)
    {
        $this->MaHoaDon = $maHoaDon;
        $this->NgayLap = $ngayLap;
        $this->TongTien = $tongTien;
        $this->DiaChiGiaoHang = $diaChiGiaoHang;
        $this->GhiChu = $ghiChu;
        $this->HinhThucThanhToan = $hinhThucThanhToan;
        $this->MaNguoiDung = $maNguoiDung;
        $this->TinhTrang = $tinhTrang;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM HoaDon ORDER BY ngaylap DESC');

        foreach ($req->fetchAll() as $item) {
            $list[] = new HoaDonModel(
                $item['MaHoaDon'],
                $item['NgayLap'],
                $item['TongTien'],
                $item['DiaChiGiaoHang'],
                $item['GhiChu'],
                $item['HinhThucThanhToan'],
                $item['MaNguoiDung'],
                $item['TinhTrang'],
            );
        }
    
        return $list;
    }
    public static function getHoaDonByID($maHoaDon)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM HoaDon WHERE MaHoaDon = ?');
        $stmt->execute([$maHoaDon]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new HoaDonModel(
                $result['MaHoaDon'],
                $result['NgayLap'],
                $result['TongTien']
            );
        } else {
            return null; 
        }
    }
    public static function getLastHoaDonID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaHoaDon FROM HoaDon ORDER BY MaHoaDon DESC LIMIT 1');
        $lastHoaDonID = $stmt->fetchColumn();
        return $lastHoaDonID;
    }
    public static function create($maHoaDon, $ngayLap, $tongTien, $diaChiGiaoHang, $ghiChu, $hinhThucThanhToan, $maNguoiDung, $tinhTrang)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO HoaDon (MaHoaDon, NgayLap, TongTien, DiaChiGiaoHang, GhiChu, HinhThucThanhToan, MaNguoiDung, TinhTrang) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute([$maHoaDon, $ngayLap, $tongTien, $diaChiGiaoHang, $ghiChu, $hinhThucThanhToan, $maNguoiDung, $tinhTrang]);

        return $success;
    }
    public static function getTenNguoiDung($maNguoiDung)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT HoTen FROM NguoiDung WHERE MaNguoiDung = ?');
        $stmt->execute([$maNguoiDung]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['HoTen'];
        } else {
            return null;
        }
    }
    public static function updateTrangThai($maHoaDon, $tinhTrang)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE HoaDon SET TinhTrang=? WHERE MaHoaDon=?');
        $success = $stmt->execute([$tinhTrang, $maHoaDon]);

        return $success;
    }

}
