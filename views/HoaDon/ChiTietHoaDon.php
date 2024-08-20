<?php 
    require_once('models/HoaDonModel.php');
    require_once('models/CTHoaDonModel.php');
    require_once('models/SanPhamModel.php');
?>
<?php if (!empty($cthoadon)): ?>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Ảnh</th></th>
                <th>Số Lượng Mua</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cthoadon as $idx => $ct): ?>
                <tr>
                    <td><?php echo $idx + 1; ?></td>
                    <td><?php echo $ct->MaSanPham; ?></td>
                    <td>
                        <?php 
                            $sanPham = SanPhamModel::getSanPhamByID($ct->MaSanPham);
                            echo $sanPham->TenSanPham;
                        ?>
                    </td>
                    <td>
                        <?php 
                            $sanPham = SanPhamModel::getSanPhamByID($ct->MaSanPham);
                            echo '<img src="views/assets/img/sanpham/' . $sanPham->HinhAnhChinh . '" height="80" width="80">';
                        ?>
                    </td>
                    <td style="font-weight: bold;"><?php echo $ct->SoLuongMua; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không có chi tiết hóa đơn được tìm thấy.</p>
<?php endif; ?>