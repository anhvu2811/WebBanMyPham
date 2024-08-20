<?php
    include('views/assets/layout/loading.php');
    include("views/assets/layout/header.php"); 
    require_once('models/ThuongHieuModel.php');
    require_once('models/HDSDModel.php');
    require_once('models/KhuyenMaiModel.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm - Hasaki</title> 
    <link rel="stylesheet" href="views/assets/style/css/chitietsanpham.css">
    <link rel="stylesheet" href="views/assets/style/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="views/assets/style/js/scroll.js"></script>
    <style>
        .alert-container {
            position: fixed;
            top: 20px; 
            right: 20px; 
            z-index: 9999;
        }

        .alert {
            width: 200px; 
            margin-bottom: 10px; 
            border-radius: 5px; 
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
            
    </style>
</head>
<body>
    <div class="alert-container">
        <?php 
            if (isset($_SESSION['notification'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['notification'] . '</div>';
                unset($_SESSION['notification']);
            }  
            $khuyenMai = KhuyenMaiModel::getKhuyenMaiConHSDByID($sanpham->MaKhuyenMai);
            $hasDiscount = $khuyenMai !== null && isset($khuyenMai->TyLe) && $khuyenMai->TyLe !== null;
            $discountRate = $hasDiscount ? $khuyenMai->TyLe : 0;
            $newPrice = $hasDiscount ? $sanpham->Gia * (1 - $discountRate / 100) : $sanpham->Gia;   
        ?>
    </div>
    <div class="container_ChiTietSP">
        <div class="product-details">
            <div id="tom-tat-chinh" class="product-info">
                <div class="product-image">
                    <img src="views/assets/img/sanpham/<?= $sanpham->HinhAnhChinh ?>">
                </div>
                <div class="product-info">
                    <p id="title"><?= $sanpham->TenSanPham ?></p>
                    <p>
                        <?php if ($hasDiscount): ?>
                            <div id="discount-badge">
                                <del style="font-size: 14px;"> <?= number_format($sanpham->Gia, 0, ',', '.') ?> đ</del>
                            </div>
                            <p id="price"><strong><?= number_format($newPrice, 0, ',', '.') ?> đ</strong> (Đã bao gồm VAT)</p>
                        <?php else: ?>
                            <p id="price"><strong><?= number_format($sanpham->Gia, 0, ',', '.') ?> đ</strong> (Đã bao gồm VAT)</p>
                        <?php endif; ?>
                    </p>
                    <form action="?controller=giohang&action=add" method="post">
                        <p>Số lượng: <input type="number" name="soLuong" min="1" value="1"/></p>
                        <div id="icon-giao-hang">
                            <img src="https://hasaki.vn/icon/icon_nowfree.png"/>
                            <p>Giao Nhanh Miễn Phí 2H tại 174 Chi Nhánh:</p>
                        </div>
                        <p>Bạn muốn nhận hàng trước 10h ngày mai. Đặt hàng trước 24h và chọn giao hàng 2H ở bước thanh toán. Xem chi tiết</p>
                        <input type="hidden" name="maSanPham" value="<?= $_GET['masp'] ?>">
                        <?php 
                            if(isset($_SESSION["user"])) { ?>
                                <button id="gio-hang" title="Thêm vào giỏ hàng" value="submit"><i class="fas fa-shopping-cart"></i>Giỏ Hàng</button>
                        <?php
                            } else { ?>
                                <a onclick="showLoginMessage()"  id="gio-hang" title="Thêm vào giỏ hàng"><i class="fas fa-shopping-cart"></i>Giỏ Hàng</a>
                                <script>
                                    function showLoginMessage() {
                                        alert("Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng!");
                                    }
                                </script>
                        <?php
                            }
                        ?>
                        <button id="nowfree">Mua ngay NowFree 2H</button>
                    </form>
                </div>
            </div>
            <header>
                <nav id="nav">
                    <ul>
                        <li><a href="#thong-tin-san-pham">Thông tin sản phẩm</a></li>
                        <li><a href="#hinh-anh">Hình ảnh</a></li>
                        <li><a href="#thong-so-san-pham">Thông số sản phẩm</a></li>
                        <li><a href="#thanh-phan-san-pham">Thành phần sản phẩm</a></li>
                        <li><a href="#huong-dan-su-dung">Hướng dẫn sử dụng</a></li>
                    </ul>
                </nav>
            </header>
            <div id="thong-tin-san-pham" class="product-info">
                <p><?= $sanpham->MoTa ?></p>
            </div>
            <div id="hinh-anh" class="product-info">
                <h3>Hình ảnh</h3>
                <div class="card-image">
                    <?php 
                        if(!empty($hinhanh)) {
                            foreach($hinhanh as $img) { ?>
                        <img src="views/assets/img/sanpham/<?= $img->HinhAnhPhu; ?>"/>

                    <?php 
                        } 
                    } else {
                        echo '<p>Không tìm thấy hình ảnh.</p>';
                    } 
                    ?>
                </div>
            </div>
            <div id="thong-so-san-pham" class="product-info">
                <h3>Thông số sản phẩm</h3>
                <table>
                    <tr>
                        <td id="left">Mã sản phẩm</td>
                        <td><?= $sanpham->MaSanPham ?></td>
                    </tr>
                    <tr>
                        <td id="left">Thương Hiệu</td>
                        <td><?= $sanpham->TenThuongHieu ?></td>
                    </tr>
                    <tr>
                        <td id="left">Xuất xứ thương hiệu</td>
                        <td> 
                            <?php 
                                echo $xuatXu = ThuongHieuModel::getThuongHieuByID($sanpham->MaThuongHieu)->XuatXu;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td id="left">Vấn đề về da</td>
                        <td><?= $sanpham->VanDeVeDa ?></td>
                    </tr>
                    <tr>
                        <td id="left">Loại da</td>
                        <td><?= $sanpham->LoaiDa ?></td>
                    </tr>
                    <tr>
                        <td id="left">Giới tính</td>
                        <td><?= $sanpham->GioiTinh ?></td>
                    </tr>
                </table>
            </div>
            <div id="thanh-phan-san-pham" class="product-info">
                <h3>Thành phần sản phẩm</h3>
                <p id="title">Thành phần chính:</p>
                <p><?= $sanpham->ThanhPhanChinh ?></p>
                <p id="title">Thành phần chi tiết:</p>
                <p><?= $sanpham->ThanhPhanChiTiet ?></p>
            </div>
            <div id="huong-dan-su-dung" class="product-info">
                <h3>Hướng dẫn sử dụng</h3>
                <ul>
                    <li>
                        <?php 
                            echo $HDSD = HDSDModel::getHuongDanSuDungByID($sanpham->MaSanPham)->NoiDung;
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="thong-tin-doi-tra">
            <p><span>---</span> MIỄN PHÍ VẬN CHUYỂN <span>---</span></p>
            <div class="item-giaohang">
                <a href="#" alt="giao hàng 2H">
                    <img src="https://hasaki.vn/images/graphics/delivery-120-minutes.png" style="margin-right: 10px;" width="90" height="90"><br/>
                    <span>Giao Nhanh Miễn Phí 2H tại 174 Chi Nhánh. <strong>Trễ tặng 100K</strong></span>
                </a>
            </div>
            <div class="item-giaohang">
                <a href="#">
                    <img src="https://hasaki.vn/images/graphics/img_quality_3.png" style="margin-right: 10px;" width="90" height="90"><br/>
                    <span>Hasaki đền bù <strong>100%</strong> + hãng đền bù <strong>100%</strong> nếu phát hiện hàng giả </span>
                </a>
            </div>
            <div class="item-giaohang">
                <a href="#">
                    <img src="https://hasaki.vn/images/graphics/img_quality_2.png" style="margin-right: 10px;" width="90" height="90"><br/>
                    <span><strong>Giao Hàng Miễn Phí</strong> (từ 90K tại 50 Tỉnh Thành trừ huyện, toàn Quốc từ 249K) </span>
                </a>
            </div>
            <div class="item-giaohang">
                <a href="#">
                    <img src="https://hasaki.vn/images/graphics/img_quality_4.png" style="margin-right: 10px;" width="90" height="90"><br/>
                    <span>Đổi trả trong <strong>14 ngày.</strong></span>
                </a>
            </div>
            <hr>
            <div class="btn_xemthem_cungthuonghieu">
                <a href="#">Xem thêm</a>
            </div>
        </div>
    </div>
</body>
</html>


<div class="footer">
    <div class="row";; style="padding: 30px;">
        <div class="col-md-2">
            <img src="https://hasaki.vn/v3/images/icons/icon_footer_1.svg"/> <br>
            <a href="#">Thanh toán
            <br>khi nhận hàng</a>
        </div>
        <div class="col-md-2">
            <img src="https://hasaki.vn/v3/images/icons/icon_footer_2.svg"/> <br>
            <a href="#">Giao nhanh
            <br> miễn phí 2H</a>
            
        </div>
        <div class="col-md-2">
            <img src="https://hasaki.vn/v3/images/icons/icon_footer_3.svg" alt=""><br>
            <a href="#">14 ngày đổi trả<br> miễn phí</a>
        </div>
        <div class="col-md-2">
            <a href="#">Thương hiệu uy tín<br>toàn cầu</a>
        </div>
        <div class="col-md-2">
            <a href="#">Khiếu nại góp ý</a>
            <button type="button"><b style="color: #ffffff;">18006310</b></button>
        </div>
        <div class="col-md-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
        </svg>
            <a href="#">TƯ VẤN</a><br>
            <button type="button"><b style="color: #ffffff;">180063</b></24button>
        </div>     
    </div>
    <div class="row" style="background-color: #306E51 ;">
        <div class="col-md-3" style="color: #ffffff";>
            <h6>HỖ TRỢ KHÁCH HÀNG</h6>
            <ul>
                <li style="color: #ac000c";>Hotline: 18006324</li>
                <li>(miễn phí, 08-22h kể cả T7, CN)</li>
                <li><a href="#">Các câu hỏi thường gặp</a></li>
                <li><a href="#">Gửi yêu cầu hỗ trợ</a></li>
                <li><a href="#">Hướng dẫn đặt hàng</a></li>
                <li><a href="#">Phương thức vận chuyển</a></li>
                <li><a href="#">Chính sách đổi trả</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <h6  style="color: #ffffff">VỀ HASAKI.VN</h6>
            <ul>
                <li><a href="#">Giới thiệu Hasaki.vn</a></li>
                <li><a href="#">Tuyển dụng</a></li>
                <li><a href="#">Chính sách bảo mật</a></li>
                <li><a href="#">Điều khoảng sử dụng</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </div>
        <div class="col-md-2">
            <h6 style="color: #ffffff">HỢP TÁC & LIÊN KẾT</h6>
            <ul>
                <li><a href="https://hasaki.vn/clinic">https://hasaki.vn/clinic</a></li>
                <li><a href="#">Hasaki cẩm nang</a></li>
                <br>
                <br>
                <h5 style="color: #ffffff">THANH TOÁN</h5>
                <img width="50px" height="50px" src="https://hasaki.vn/v3/images/icons/mastercard.svg" alt="">
            </ul>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">
            <h6  style="color: #ffffff">CẬP NHẬT THÔNG TIN KHUYẾN MÃI</h6>
            <form action="#">
            <div class="input-container">
                <input type="text" placeholder="email của bạn" id="emailInput">
                <button id="submitButton" type="submit">Đăng ký</button>
            </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <h5>HASAKI.VN - CHẤT LƯỢNG THẬT - GIÁ TRỊ THẬT</h5>
                    <p><b>Hasaki.vn</b> là hệ thống cửa hàng mỹ phẩm chính hãng và dịch vụ chăm sóc sắc đẹp chuyên sâu với hệ thống cửa hàng trải dài trên toàn quốc; và hiện đang là đối tác phân phối chiến lược tại thị trường Việt Nam của hàng loạt thương hiệu lớn như: <b style="color: #326e51">La Roche-Posay, Eucerin, L'oreal, Bioderma, Klairs, Naris Cosmetics, Maybelline, Vichy, Skin1004, Cocoon, Australis, Cetaphil, Anessa, SVR, Paula's Choice, Some By Mi, B.O.M, Vaseline, Sunplay, Hada Labo, Selsun, Blossomy, Acnes, Rohto, Silky Girl, sữa rửa mặt cetaphil, Senka, Naruko, Angel's Liquid, DHC, Simple, Bio-essence, Tsubaki, 3CE, BNBG, Laneige, Vacosi, Lemonade, Hatomugi, Avène, Silcot, Neutrogena, Garnier, Mediheal, Timeless, Curél,...</b></p>
            </div>
            <div class="row">
                <p><b>Với phương châm "Chất lượng thật - Giá trị thật”, Hasaki.vn </b>luôn nỗ lực không ngừng nhằm nâng cao chất lượng sản phẩm & dịch vụ để khách hàng có được những trải nghiệm mua sắm tốt nhất. Toàn bộ sản phẩm có ở <b>Hasaki.vn </b>đều được cam kết 100% chính hãng, đảm bảo nguồn gốc xuất xứ, có đầy đủ hóa đơn mua hàng VAT và tem phụ Tiếng Việt, với mức giá luôn tốt hàng đầu thị trường trong mọi thời điểm. Ngoài ra, <b>Hasaki.vn</b> và nhãn hàng cam kết bảo vệ hai lớp với mức đền bù 200% nếu phát hiện hàng giả, trong đó 100% từ Hasaki và 100% từ nhà phân phối, văn phòng đại diện hãng tại Việt Nam.</p>
            </div>
            <div class="row">
                <p><b style="color: #326e51">Hasaki.vn</b> sở hữu đa dạng các mặt hàng từ cao cấp đến bình dân, đáp ứng mọi nhu cầu của khách hàng. Đặc biệt, tại Hasaki.vn luôn có đầy đủ mẫu thử của mỗi sản phẩm và nhân viên tư vấn, giúp khách hàng dễ dàng chọn lựa và tăng trải nghiệm mua sắm.</p>
            </div>
            <div class="row">
                <p>Đối với khách hàng online, <b>Hasaki.vn</b> áp dụng GIAO NHANH 2H MIỄN PHÍ cho <i><b>đơn hàng từ 90.000đ</b></i> tại các khu vực: Hồ Chí Minh - Hà Nội - Hải Phòng - Pleiku - Cà Mau - Tây Ninh - Long An - Vĩnh Long - Phan Thiết - Đà Lạt - Long Xuyên - Bạc Liêu - Cao Lãnh - Nha Trang - Trà Vinh - Huế - Bến Tre - Đăk Lắk - Đà Nẵng - Tiền Giang - Kiên Giang - Cần Thơ - Vũng Tàu - Bình Dương - Biên Hòa. <i><b>Đơn hàng từ 249.000đ</b></i>,<b> Hasaki.vn </b> MIỄN PHÍ TOÀN QUỐC. </p>
            </div>
            <div class="row">
                <p>Ngoài ra, <b>Hasaki.vn</b> còn có app Hasaki cung cấp cho khách hàng trải nghiệm mua sắm online nhanh chóng, tiện lợi cùng nhiều khuyến mãi hấp dẫn. Không chỉ vậy, khách hàng còn được giảm ngay 5% khi nhập mã HASAKIAPP cho đơn hàng đầu tiên trên ứng dụng. Tải ngay<b> APP Hasaki</b> cho hệ điều hành IOS <a href="#" style="text-decoration: none; color:#306E51"><b>tại đây</b></a>, phiên bản cho hệ điều hành Android <a href="#" style="text-decoration: none; color: #306E51"><b>tại đây</b></a></p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                <b>Được chứng nhận</b>
                <img style="width: 170px; height:60px" src="https://hasaki.vn/images/graphics/bocongthuong_small.png" alt="">
            </div>
            <div class="row">
                <b>Bản quyền © 2016 Hasaki.vn</b>
                <p>Công Ty cổ phần HASAKI BEAUTY & CLINIC</p>
            </div>
            <div class="row">
                <p>Giấy chứng nhận Đăng ký Kinh doanh số 0313612829 do Sở Kế hoạch và Đầu tư Thành phố Hồ Chí Minh cấp ngày 13/01/2016</p>
            </div>
            <div class="row">
                <div class="search-container">
                    <div class="search-item" id="k1"><a href="#">Kem Chống Nắng</a></div>
                    <div class="search-item" id="k2"><a href="#">Nước Tẩy Trang</a></div>
                    <div class="search-item"id="k3"><a href="#">Kem Dưỡng Ẩm</a></div>
                    <div class="search-item" id="k4"><a href="#">LA ROCHE POSAY</a></div>
                    <div class="search-item" id="k5"><a href="#">Son</a></div>
                    <div class="search-item" id="k6"><a href="#">Sữa rửa mặt</a></div>
                    <div class="search-item" id="k7"><a href="#">Bông Tẩy Trang</a></div>
                    <div class="search-item" id="k8"><a href="#">Mặt Nạ</a></div>
                    <div class="search-item" id="k9"><a href="#">  LOREAL</a></div>
                    <div class="search-item" id="k10"><a href="#">Sữa Rửa Mặt SVR</a></div>
                    <div class="search-item" id="k11"><a href="#">Kem Đánh Răng Median</a></div>
                    <div class="search-item" id="k12"><a href="#">Kem Đánh Răng Marvis</a></div>
                    <div class="search-item" id="k13"><a href="#">VASELINE</a></div>
                    <div class="search-item" id="k14"><a href="#">CETAPHIL</a></div>
                    <div class="search-item" id="k15"><a href="#">Sữa rử mặt cetaphil</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h5>DANH MỤC SẢN PHẨM</h5>
        <div class="row">
            <div class="col-md-3">
                <strong><a href="#">Mỹ Phẩm High-End</a></strong><br><br>
                <a href="#">Trang Điểm Cao Cấp </a>| <a href="#">Chăm Sóc Da Mặt Cao Cấp </a>| <a href="#">Chăm Sóc Tóc Cao Cấp </a>| <a href="#">Gội đầu</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Nước Hoa</a></strong><br><br>
                <a href="#">Nước Hoa Nữ </a>| <a href="#">Nước Hoa Nam </a>| <a href="#">Xịt Thơm Toàn Thân </a>| <a href="#">Nước Hoa Vùng Kín</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Chăm Sóc Răng Miệng</a></strong><br><br>
                <a href="#">Bàn Chải Đánh RĂng </a>| <a href="#">Kem Đánh răng </a>| <a href="#">Nước Súc Miệng </a>| <a href="#">Tăm Nước / Chỉ Nha Khoa</a> |<a href="#">Xịt thơm miệng</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Thực Phẩm Chức Năng</a></strong><br><br>
                <a href="#">Hỗ Trợ Tiêu Hóa </a>| <a href="#">Hỗ Trợ Tim Mạch </a>| <a href="#">Hỗ Trợ Sức Khỏe </a>| <a href="#">Bổ Gan / Giải Rượu</a> |<a href="#">Dầu Cá / Bổ Mắt</a> |<a href="#">Hoạt Huyết Dưỡng Não</a>                    </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3">
                <strong><a href="#">Chăm Sóc Cá Nhân</a></strong><br><br>
                <a href="#">Băng Vệ Sinh </a>| <a href="#">Khăn Giấy / Khăn Ướt </a>| <a href="#">Khử Mùi / Làm Thơm Phòng </a>| <a href="#">Dao Cạo Râu</a>|<a href="#">Bọt Cạo Râu</a>|<a href="#">Miếng Dán Nóng</a>|<a href="#">Mặt Nạ Xông Hơi</a>|<a href="#">Nước Rửa Tay / Diệt Khuẩn</a>|<a href="#">Chống Muỗi</a>|<a href="#">Dung Dịch Vệ Sinh</a>|<a href="#">Miếng Dán Ngực</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Chăm Sóc Da Mặt</a></strong><br><br>
                <a href="#">Tẩy Trang Mặt </a>| <a href="#">Sữa Rửa Mặt </a>| <a href="#">Tẩy Tế Bào Chết Da Mặt</a>| <a href="#">Toner / Nước Cân Bằng Da</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Trang Điểm</a></strong><br><br>
                <a href="#">Kem Lót </a>| <a href="#">Kem Nền </a>| <a href="#">Phấn Nền </a>| <a href="#">Phấn Nước Cushion</a> |<a href="#">Che Khuyết Điểm</a>
            </div>
            <div class="col-md-3">
            <strong><a href="#">Chăm Sóc Tóc Và Da Đầu</a></strong><br><br>
                <a href="#">Dầu Gội </a>| <a href="#">Dầu Xả </a>| <a href="#">Dầu Gội Khô </a>| <a href="#">Dầu Gội Xả 2in1</a> |<a href="#">Bộ Gội Xả</a> |<a href="#">Tẩy Tế Bào Chết Da Đầu</a>                    </div>
        </div>
    </div>
</div>
<!-- Bootstrap JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <!-- JavaScript để hiển thị và ẩn thông báo -->
    <script>
        function hideAlert() {
            var alertBox = document.querySelector('.alert');
            if (alertBox) {
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 3000); 
            }
        }
        window.onload = hideAlert;
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
