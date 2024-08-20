<?php
class HinhAnhSPModel
{
    public $hinhAnhPhu;
    public $maSanPham;
    public $created_at;

    function __construct($hinhAnhPhu, $maSanPham, $created_at)
    {
        $this->HinhAnhPhu = $hinhAnhPhu;
        $this->MaSanPham = $maSanPham;
        $this->Created_at = $created_at;
    }

    public static function getHinhAnhSPByID($maSanPham)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM hinhanhsp WHERE MaSanPham = ?');
        $stmt->execute([$maSanPham]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $hinhanh = array();
        if ($results) {
            foreach ($results as $result) {
                $hinhanh[] = new HinhAnhSPModel(
                    $result['HinhAnhPhu'],
                    $result['MaSanPham'],
                    $result['Created_at']
                );
            }
        }
        return $hinhanh;
    }

    public static function create($hinhAnhPhu, $maSanPham, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO hinhanhsp (HinhAnhPhu, MaSanPham, Created_at) VALUES (?, ?, ?)');
        $success = $stmt->execute([$hinhAnhPhu, $maSanPham, $created_at]);

        return $success;
    }
    

}
