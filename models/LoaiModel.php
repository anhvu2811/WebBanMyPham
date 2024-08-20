
<?php
class LoaiModel
{
    public $maLoai;
    public $tenLoai;
    public $created_at;

    function __construct($maLoai, $tenLoai, $created_at)
    {
        $this->MaLoai = $maLoai;
        $this->TenLoai = $tenLoai;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM loai');

        foreach ($req->fetchAll() as $item) {
            $list[] = new LoaiModel(
                $item['MaLoai'],
                $item['TenLoai'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getLoaiByID($maLoai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM loai WHERE MaLoai = ?');
        $stmt->execute([$maLoai]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new LoaiModel(
                $result['MaLoai'],
                $result['TenLoai'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getLastLoaiID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaLoai FROM loai ORDER BY MaLoai DESC LIMIT 1');
        $lastLoaiID = $stmt->fetchColumn();
        return $lastLoaiID;
    }
    public static function create($maLoai, $tenLoai, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO Loai (MaLoai, TenLoai, Created_at) VALUES (?, ?, ?)');
        $success = $stmt->execute([$maLoai, $tenLoai, $created_at]);

        return $success;
    }
    public static function update($maLoai, $tenLoai, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE loai SET TenLoai=?, Created_at=? WHERE MaLoai=?');
        $success = $stmt->execute([$tenLoai, $created_at, $maLoai]);

        return $success;
    }
    public static function delete($maLoai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM loai WHERE MaLoai=?');
        $success = $stmt->execute([$maLoai]);
        return $success;
    }
    public static function checkTenLoai($tenLoai)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT COUNT(*) FROM loai WHERE TenLoai=?');
        $stmt->execute([$tenLoai]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

}
