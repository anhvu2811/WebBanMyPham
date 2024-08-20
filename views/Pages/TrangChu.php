
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" type="text/css" href="views/assets/style/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php
        include ('views/assets/layout/header.php');
        include('views/assets/layout/loading.php');
    ?>
    <style>
        .product{
            width: 134;
            height: 176;
            color: aqua;
            display: block;
            float: left;
        }
        .col-md-2{
            
            border-radius: 20px;
        }
        .itemdm:hover{
            width: 300;
            height: 300;
        }
        .horizontal-images {
            list-style-type: none; /* Ẩn dấu hiệu li */
            margin: 0;
            padding: 0;
        }

        .horizontal-images li {
                    display: inline-block; /* Hiển thị các hình ảnh trên cùng một hàng */
                    margin-right: 10px; /* Khoảng cách giữa các hình ảnh */
                    list-style: none;
                    display: inline-block;
                    margin-right: 20px;
                }
                .carousel-control-next-icon {
        color: black;
        }


    .horizontal-images img {
        margin-top: 5px;
    width: 100px; /* Định kích thước của ảnh */
    height: 100px;
    border-radius: 14px;
    transition: transform 0.3s ease-in-out;
    }

    .horizontal-images img:hover {
    transform: scale(1.2); /* Khi di chuột vào, ảnh sẽ phóng to lên */
    }

    .horizontal-images a {
    color: black; /* Màu chữ mặc định */
    transition: color 0.3s ease-in-out;
    text-decoration: none;
    font-size: 14px;
    }

    .horizontal-images a:hover {
    color: green; /* Khi di chuột vào, màu chữ sẽ chuyển thành màu xanh lá cây */
    }
    .custom-carousel {
    width: 100%; /* Độ rộng của carousel */
    height: 420px; /* Độ cao của carousel */
    }
    .horizontal-images1 {
                list-style-type: none; /* Ẩn dấu hiệu li */
                margin: 0;
                padding: 0;
            }
    .horizontal-images1 img {
        margin-top: 5px;
        width: 130px; /* Định kích thước của ảnh */
    height: 200px;
    border-radius: 15px;
    transition: transform 0.3s ease-in-out;
    }
    .horizontal-images1 li {
                display: inline-block; /* Hiển thị các hình ảnh trên cùng một hàng */
                margin-right: 10px; /* Khoảng cách giữa các hình ảnh */
                list-style: none;
                display: inline-block;
                margin-right: 20px;
            }
            
            .horizontal-images1 img:hover {
    transform: scale(1.2); /* Khi di chuột vào, ảnh sẽ phóng to lên */
    }

    .horizontal-images1 a {
    color: black; /* Màu chữ mặc định */
    transition: color 0.3s ease-in-out;
    text-decoration: none;
    font-size: 14px;
    }

    .horizontal-images1 a:hover {
    color: green; /* Khi di chuột vào, màu chữ sẽ chuyển thành màu xanh lá cây */
    }

    .alert-container {
        position: fixed;
        top: 20px; 
        right: 20px; 
        z-index: 9999; 
    }

    .alert {
        width: 250px; 
        margin-bottom: 10px; 
        border-radius: 5px; 
    }

    .alert-success {
        color: #721c24; 
        background-color: #f8d7da; 
        border-color: #f5c6cb; 
    }    
    </style>

</head>



<body>
<div class="alert-container">
    <?php
        if (isset($_GET['message'])) {
            $message = urldecode($_GET['message']);
            echo "<div class='alert alert-success' role='alert'>$message</div>";
        }
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
                    
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="html.php"><img src="views/assets/img/crs1.jpg" class="d-block w-100" alt="..."></a>
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs9.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs10.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs3.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs5.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs6.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs7.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="views/assets/img/crs8.jpg" class="d-block w-100" alt="...">
                    </div>
                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <img src="views/assets/img/crs-r-1.jpg" alt="">
            </div>
            <div style="margin-top: 6px;" class="row">
                <img src="views/assets/img/crs-r-2.jpg" alt="">
            </div>
        </div>
    </div>
    <div style="margin-top: 20px; text-align: center;" class="row">
        <div class="col-md-1">
            <img class="iconimg" src="views/assets/img/hasaki-number-1.png" alt=""><br>
            Bán chạy
        </div>
        <div class="col-md-2">
            <img class="iconimg" src="views/assets/img/hasaki-nowfree.png" alt=""><br>
            Giao 2h
        </div>
        <div class="col-md-1">
            <img class="iconimg" src="views/assets/img/hsk-icon-10phantram.png" alt=""><br>
            Mua nhiều giảm xâu
        </div>
        <div  class="col-md-2">
            <img class="iconimg" src="views/assets/img/hasaki-clinic.png" alt=""><br>
            Clinic & S.P.A
        </div>
        <div class="col-md-1">
            <img class="iconimg" src="views/assets/img/hasaki-bang-gia.png" alt=""><br>
            Bảng giá
        </div>
        <div class="col-md-2">
            <img class="iconimg" src="views/assets/img/hasaki-dat-hen.png" alt=""><br>
            Đặt hẹn
        </div>
        <div class="col-md-1">
            <img class="iconimg" src="views/assets/img/hsk-icon-mua-la-co-qua.png" alt=""><br>
            Mua là có quà
        </div>
        <div class="col-md-2">
            <img class="iconimg" src="views/assets/img/hasaki-cam-nang.png" alt=""><br>
            Cẩm nang
        </div>
    </div>
    
<!-- danh mục-->
    <div style="background-color:blanchedalmond;" class="row">
        <div style="text-decoration: none; color: darkgreen;">
            <a style="text-decoration: none; color:darkgreen" href="#"><h5>Danh mục</h5></a>
        </div>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div style="text-align: center;" class="carousel-item active">
        <ul class="horizontal-images">
          <li><a href="#"><img src="views/assets/img/danhmuc/1857_1_img_120x120_17b03c_fit_center.jpg" alt="Image 1"><br>Toner/Nước</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/c24-trang-diem-moi_img_120x120_17b03c_fit_center.jpg" alt="Image 2"><br>Trang điểm môi</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c156_img_120x120_17b03c_fit_center.jpg" alt="Image 3"><br>Thực phẩm chức năng</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c323-cham-soc-rang-mieng_img_120x120_17b03c_fit_center.jpg" alt="Image 4"><br>Chăm sóc răng miệng</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c1899-khu-mui_img_120x120_17b03c_fit_center.jpg" alt="Image 5"><br>Khử mùi</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/chamsocphunu.jpg" alt="Image 6"><br>Chăm sóc phụ nữ</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/chongnangdamat.jpg" alt="Image 7"><br>Chống nắng da mặt</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/dauduongtoc.jpg" alt="Image 8"><br>Dầu dưỡng tóc</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/daugoivadauxa.jpg" alt="Image 9"><br>Dầu gội và dầu xả</a></li>
            
        </ul>
      </div>
      <div class="carousel-item">
        <ul class="horizontal-images">
        <li><a href="#"><img src="views/assets/img/danhmuc/duongthe.jpg" alt="Image 10"><br>Dưỡng thể</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/c24-trang-diem-moi_img_120x120_17b03c_fit_center.jpg" alt="Image 11"><br>Trang điểm môi</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/hasaki-cate-nuoc-hoa-c103_img_120x120_17b03c_fit_center.jpg" alt="Image 12"><br>Nước hoa</a></li>
        <li><a href="#"><img src="views/assets/img/danhmuc/hotromun.jpg" alt="Image 13"><br>Hỗ trợ mụn</a></li>
        </ul>
      </div>
      <!-- Thêm các carousel-item khác vào đây -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button style="color: black;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    </div>
    <div style="background-color:blanchedalmond;" class="row">
    <div>
        <br>
    </div>
    <!--Thương hiện-->
    <div style="text-decoration: none; color: darkgreen; background-color: #fff">
            <a style="text-decoration: none; color:darkgreen" href="#"><h5>Thương hiệu</h5></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">

            
    <div id="carouselExampleIndicators1" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide-to="2" aria-label="Slide 3"></button>
            
            
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="views/assets/img/crs-thuong-hieu-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="views/assets/img/crs-thuonghieu-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="views/assets/img/crs-thuonghieu-3.jpg" class="d-block w-100" alt="...">
            </div>
            
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators1" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <div class="col-md-8">
  <div id="carouselExampleControls1" class="carousel slide custom-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div style="text-align: center;" class="carousel-item active">
        <ul id="first-row" class="horizontal-images1">
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu-1.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu2.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu3.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu4.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu9.jpg" alt=""></a></li>
          
        </ul>
        <ul id="first-row" class="horizontal-images1">
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu5.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu6.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu7.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu8.jpg" alt=""></a></li>
          <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu11.jpg" alt=""></a></li>
        </ul>
      </div>
      <div class="carousel-item">
        <ul id="second-row" class="horizontal-images1">
            
            
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu10.jpg" alt=""></a></li>
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu11.jpg" alt=""></a></li>
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu12.jpg" alt=""></a></li>
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu13.jpg" alt=""></a></li>
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu14.jpg" alt=""></a></li>
            <li><a href="#"><img src="views/assets/img/thuonghieu/thuonghieu15.jpg" alt=""></a></li>
        </ul>
      </div>
      <!-- Thêm các carousel-item khác vào đây -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
    </div>
    <!-- Bán chạy-->
    <div style="background-color:blanchedalmond;" class="row">
        <div style="text-decoration: none; color: darkgreen;">
            <a style="text-decoration: none; color:darkgreen" href="#"><h5>Bán chạy</h5></a>
        </div>
  <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div style="text-align: center;" class="carousel-item active">
        <ul class="horizontal-images">
          <li><a href="#"><img src="views/assets/img/danhmuc/1857_1_img_120x120_17b03c_fit_center.jpg" alt="Image 1"><br>Toner/Nước</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/c24-trang-diem-moi_img_120x120_17b03c_fit_center.jpg" alt="Image 2"><br>Trang điểm môi</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c156_img_120x120_17b03c_fit_center.jpg" alt="Image 3"><br>Thực phẩm chức năng</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c323-cham-soc-rang-mieng_img_120x120_17b03c_fit_center.jpg" alt="Image 4"><br>Chăm sóc răng miệng</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/c1899-khu-mui_img_120x120_17b03c_fit_center.jpg" alt="Image 5"><br>Khử mùi</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/chamsocphunu.jpg" alt="Image 6"><br>Chăm sóc phụ nữ</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/chongnangdamat.jpg" alt="Image 7"><br>Chống nắng da mặt</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/dauduongtoc.jpg" alt="Image 8"><br>Dầu dưỡng tóc</a></li>
            <li><a href="#"><img src="views/assets/img/danhmuc/daugoivadauxa.jpg" alt="Image 9"><br>Dầu gội và dầu xả</a></li>
            
        </ul>
      </div>
      <div class="carousel-item">
        <ul class="horizontal-images">
        <li><a href="#"><img src="views/assets/img/danhmuc/duongthe.jpg" alt="Image 10"><br>Dưỡng thể</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/c24-trang-diem-moi_img_120x120_17b03c_fit_center.jpg" alt="Image 11"><br>Trang điểm môi</a></li>
          <li><a href="#"><img src="views/assets/img/danhmuc/hasaki-cate-nuoc-hoa-c103_img_120x120_17b03c_fit_center.jpg" alt="Image 12"><br>Nước hoa</a></li>
        <li><a href="#"><img src="views/assets/img/danhmuc/hotromun.jpg" alt="Image 13"><br>Hỗ trợ mụn</a></li>
        </ul>
      </div>
      <!-- Thêm các carousel-item khác vào đây -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button style="color: black;" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    </div>
    <!--Top tìm kiếm-->
    <div style="text-decoration: none; color: darkgreen;">
            <a style="text-decoration: none; color:darkgreen; padding-top: 10px;" href="#"><h5>Top tìm kiếm</h5></a>
        </div>
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="#"><img src="views/assets/img/toptimkiem/cate-chong-nang-da-mat.webp" alt=""></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr1.jpg" alt=""></a>
                    </div>
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div></div>
            </div>
           
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="#"><img src="views/assets/img/toptimkiem/cate-chong-nang-da-mat.webp" alt=""></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr1.jpg" alt=""></a>
                    </div>
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div></div>
            </div>
           
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="#"><img src="views/assets/img/toptimkiem/cate-son-duong-moi.webp" alt=""></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr1.jpg" alt=""></a>
                    </div>
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div></div>
            </div>
           
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-8">
                    <a href="#"><img src="views/assets/img/toptimkiem/cate-kem-duong.webp" alt=""></a>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr1.jpg" alt=""></a>
                    </div>
                    <div class="row">
                        <a href="#"><img src="views/assets/img/toptimkiem/kcnr2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div></div>
            </div>
           
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
</html>

<?php
     include ('views/assets/layout/footer.php');
?>