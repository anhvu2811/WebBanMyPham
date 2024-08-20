
<?php
class SanPhamModel
{
    public $maSanPham;
    public $tenSanPham;
    public $hinhAnhChinh;
    public $moTa;
    public $gia;
    public $loaiDa;
    public $gioiTinh;
    public $vanDeVeDa;
    public $thanhPhanChinh;
    public $thanhPhanChiTiet;
    public $soLuongTon;
    public $maThuongHieu;
    public $maLoai;
    public $maKhuyenMai;
    public $created_at;
    public $tenThuongHieu;
    public $tenLoai;
    public $tenKhuyenMai;

    function __construct($maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at, $tenThuongHieu, $tenLoai, $tenKhuyenMai)
    {
        $this->MaSanPham = $maSanPham;
        $this->TenSanPham = $tenSanPham;
        $this->HinhAnhChinh = $hinhAnhChinh;
        $this->MoTa = $moTa;
        $this->Gia = $gia;
        $this->LoaiDa = $loaiDa;
        $this->GioiTinh = $gioiTinh;
        $this->VanDeVeDa = $vanDeVeDa;
        $this->ThanhPhanChinh = $thanhPhanChinh;
        $this->ThanhPhanChiTiet = $thanhPhanChiTiet;
        $this->SoLuongTon = $soLuongTon;
        $this->MaThuongHieu = $maThuongHieu;
        $this->MaLoai = $maLoai;
        $this->MaKhuyenMai = $maKhuyenMai;
        $this->Created_at = $created_at;
        $this->TenThuongHieu = $tenThuongHieu;
        $this->TenLoai = $tenLoai;
        $this->TenKhuyenMai = $tenKhuyenMai;
    }

    public static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                           FROM sanpham a
                           LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                           LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                           LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai');

        foreach ($req->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai'],
            );
        }
        return $list;
    }

    public static function countAll()
    {
        $db = DB::getInstance();
        $query = $db->query('SELECT COUNT(*) FROM sanpham');
        return $query->fetchColumn();
    }

    //Hiện thị tất cả sản phẩm có phân trang
    public static function all_Pagination($productsPerPage, $offset)
    {
        $list = [];
        $db = DB::getInstance();

        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              LIMIT :limit OFFSET :offset');

        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }
    //Hiện thị sản phẩm theo loại có phân trang
    public static function getSanPhamTheoLoai($productsPerPage, $offset, $maLoai)
    {
        $list = [];
        $db = DB::getInstance();

        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              Where a.MaLoai = :maLoai
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':maLoai', $maLoai);
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function getSanPhamTheoGia($productsPerPage, $offset, $giaMin, $giaMax)
    {
        $list = [];
        $db = DB::getInstance();

        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              Where a.Gia >= :giaMin AND a.Gia <= :giaMax
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':giaMin', $giaMin);
        $query->bindParam(':giaMax', $giaMax);
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function getSanPhamTheoTimKiem($productsPerPage, $offset, $search)
    {
        $list = [];
        $db = DB::getInstance();
        $search = '%' . $search . '%';
        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              Where a.TenSanPham LIKE :search
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':search', $search);
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function sort_ThapDenCao($productsPerPage, $offset)
    {
        $list = [];
        $db = DB::getInstance();
        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              ORDER BY a.Gia ASC;
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function sort_CaoDenThap($productsPerPage, $offset)
    {
        $list = [];
        $db = DB::getInstance();
        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              ORDER BY a.Gia DESC;
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function sort_MoiNhat($productsPerPage, $offset)
    {
        $list = [];
        $db = DB::getInstance();
        $query = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              ORDER BY a.Created_at DESC;
                              LIMIT :limit OFFSET :offset');
        $query->bindParam(':limit', $productsPerPage, PDO::PARAM_INT);
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        foreach ($query->fetchAll() as $item) {
            $list[] = new SanPhamModel(
                $item['MaSanPham'],
                $item['TenSanPham'],
                $item['HinhAnhChinh'],
                $item['MoTa'],
                $item['Gia'],
                $item['LoaiDa'],
                $item['GioiTinh'],
                $item['VanDeVeDa'],
                $item['ThanhPhanChinh'],
                $item['ThanhPhanChiTiet'],
                $item['SoLuongTon'],
                $item['MaThuongHieu'],
                $item['MaLoai'],
                $item['MaKhuyenMai'],
                $item['Created_at'],
                $item['TenThuongHieu'],
                $item['TenLoai'],
                $item['TenKhuyenMai']
            );
        }
        return $list;
    }

    public static function getSanPhamByID($maSanPham)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT a.*, b.TenThuongHieu, c.TenLoai, d.TenKhuyenMai
                              FROM sanpham a
                              LEFT JOIN thuonghieu b ON a.MaThuongHieu = b.MaThuongHieu
                              LEFT JOIN loai c ON a.MaLoai = c.MaLoai
                              LEFT JOIN khuyenmai d ON a.MaKhuyenMai = d.MaKhuyenMai
                              Where a.MaSanPham = ?');
        $stmt->execute([$maSanPham]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new SanPhamModel(
                $result['MaSanPham'],
                $result['TenSanPham'],
                $result['HinhAnhChinh'],
                $result['MoTa'],
                $result['Gia'],
                $result['LoaiDa'],
                $result['GioiTinh'],
                $result['VanDeVeDa'],
                $result['ThanhPhanChinh'],
                $result['ThanhPhanChiTiet'],
                $result['SoLuongTon'],
                $result['MaThuongHieu'],
                $result['MaLoai'],
                $result['MaKhuyenMai'],
                $result['Created_at'],
                $result['TenThuongHieu'],
                $result['TenLoai'],
                $result['TenKhuyenMai'],
            );
        } else {
            return null; 
        }
    }
    public static function getLastSanPhamID()
    {
        $db = DB::getInstance();
        $stmt = $db->query('SELECT MaSanPham FROM sanpham ORDER BY MaSanPham DESC LIMIT 1');
        $lastSanPhamID = $stmt->fetchColumn();
        return $lastSanPhamID;
    }
    public static function create($maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('INSERT INTO SanPham (MaSanPham, TenSanPham, HinhAnhChinh, MoTa, Gia, LoaiDa, GioiTinh, VanDeVeDa, ThanhPhanChinh, ThanhPhanChiTiet, SoLuongTon, MaThuongHieu, MaLoai, MaKhuyenMai, Created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $success = $stmt->execute([$maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at]);

        return $success;
    }
    public static function update($maSanPham, $tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('UPDATE sanpham SET TenSanPham=?, HinhAnhChinh = ?, MoTa=?, Gia=?, LoaiDa=?, GioiTinh=?, VanDeVeDa=?, ThanhPhanChinh=?, ThanhPhanChiTiet=?, SoLuongTon=?, MaThuongHieu=?, MaLoai=?, MaKhuyenMai=?, Created_at=? WHERE MaSanPham=?');
        $success = $stmt->execute([$tenSanPham, $hinhAnhChinh, $moTa, $gia, $loaiDa, $gioiTinh, $vanDeVeDa, $thanhPhanChinh, $thanhPhanChiTiet, $soLuongTon, $maThuongHieu, $maLoai, $maKhuyenMai, $created_at, $maSanPham]);

        return $success;
    }
    public static function delete($maSanPham)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('DELETE FROM sanpham WHERE MaSanPham=?');
        $success = $stmt->execute([$maSanPham]);
        return $success;
    }
    
    public static function checkTenSanPham($tenSanPham)
    {
        $db = DB::getInstance();
        $stmt = $db->prepare('SELECT COUNT(*) FROM sanpham WHERE TenSanPham=?');
        $stmt->execute([$tenSanPham]);
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function countSanPhamTheoLoai($maloai)
    {
        $db = DB::getInstance();
        $query = $db->prepare('SELECT COUNT(*) FROM sanpham WHERE MaLoai = :maloai');
        $query->bindParam(':maloai', $maloai, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchColumn();
    }

    public static function countSanPhamTheoGia($giaMin, $giaMax)
    {
        $db = DB::getInstance();
        $query = $db->prepare('SELECT COUNT(*) FROM sanpham WHERE Gia >= :giaMin AND Gia <= :giaMax');
        $query->bindParam(':giaMin', $giaMin);
        $query->bindParam(':giaMax', $giaMax, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchColumn();
    }

    public static function countSanPhamTheoTimKiem($search)
    {
        $db = DB::getInstance();
        $search = '%' . $search . '%';
        $query = $db->prepare('SELECT COUNT(*) FROM sanpham WHERE TenSanPham LIKE :search');
        $query->bindParam(':search', $search);
        $query->execute();
        return $query->fetchColumn();
    }
}
