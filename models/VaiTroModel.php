
<?php
class VaiTroModel
{
    public $maVaiTro;
    public $tenVaiTro;
    public $moTa;
    public $created_at;

    function __construct($maVaiTro, $tenVaiTro, $moTa, $created_at)
    {
        $this->MaVaiTro = $maVaiTro;
        $this->TenVaiTro = $tenVaiTro;
        $this->MoTa = $moTa;
        $this->Created_at = $created_at;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM vaitro');

        foreach ($req->fetchAll() as $item) {
            $list[] = new VaiTroModel(
                $item['MaVaiTro'],
                $item['TenVaiTro'],
                $item['MoTa'],
                $item['Created_at'],
            );
        }
    
        return $list;
    }
    public static function getVaiTroByID($maVaiTro)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT * FROM vaitro WHERE MaVaiTro = ?');
        $stmt->execute([$maVaiTro]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new VaiTroModel(
                $result['MaVaiTro'],
                $result['TenVaiTro'],
                $result['MoTa'],
                $result['Created_at']
            );
        } else {
            return null; 
        }
    }
    public static function getLastVaiTroID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaVaiTro FROM vaitro ORDER BY MaVaiTro DESC LIMIT 1');
        $lastVaiTroID = $stmt->fetchColumn();
        return $lastVaiTroID;
    }
    public static function create($maVaiTro, $tenVaiTro, $moTa, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO vaitro (MaVaiTro, TenVaiTro, MoTa, Created_at) VALUES (?, ?, ?, ?)');
        $success = $stmt->execute([$maVaiTro, $tenVaiTro, $moTa, $created_at]);

        return $success;
    }
    public static function update($maVaiTro, $tenVaiTro, $moTa, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE vaitro SET TenVaiTro=?, MoTa=?, Created_at=? WHERE MaVaiTro=?');
        $success = $stmt->execute([$tenVaiTro, $moTa, $created_at, $maVaiTro]);

        return $success;
    }
    public static function delete($maVaiTro)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM vaitro WHERE MaVaiTro=?');
        $success = $stmt->execute([$maVaiTro]);
        return $success;
    }
    public static function checkTenVaiTro($tenVaiTro)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT COUNT(*) FROM vaitro WHERE TenVaiTro=?');
        $stmt->execute([$tenVaiTro]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

}
