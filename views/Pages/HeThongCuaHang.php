<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Hệ Thống Cửa Hàng</title>
</head>
<style>
    body { 
        margin: 0; 
        font-family: Arial, sans-serif; 
        background-color: #f1f1f5; 
    }

    /* header */
    .header {
        height: 70px;
        display: flex;
        align-items: center;
        background-color: #fff;
    }

    #icon {
        max-height: 70%;
        float: left; 
    }

    .header p {
        margin-right: 40px;
    }

    .header a {
        width: 100px;
        text-decoration: none;
    }


    /* search */
    .search {
        background-image: url('https://hotro.hasaki.vn/css/images/graphics/bg_support.jpg');
        background-size: cover;
        opacity: 0.9;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
        height: 300px;
        width: 80%; 
        margin: auto;
        margin-bottom: 50px;
    }

    .search h1,
    .search form {
        display: block;
        margin-bottom: 20px; 
        display: flex;
        color: #fff;
    }

    .search form {
        text-align: center;
        display: flex;
        border-radius: 20px;
        overflow: hidden;
    }

    .search input {
        flex: 1;
        width: 500px;
        height: 28px;
        padding: 10px;
        border: none;
        border-radius: 10px 0 0 10px; 
    }

    .search button {
        background: #fff;
        border: none;
        cursor: pointer;
    }

    .information {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .information .box-kn {
        display: flex;
        flex-direction: column; 
        align-items: center;
        text-align: center; 
    }

    .information .box-kn span {
        display: flex;
        align-items: center;
        margin-right: 10px;
    }

    .information a {
        font-weight: bold;
        font-size: 24px;
        color: #fff;
        text-decoration: none; 
    }

    .information span {
        font-size: 14px;
        color: #fff;
        margin-left: 8px;
    }

    .information img {
        width: 30px; 
    }

    /* container */
    .container { 
        width: 80%; 
        margin: auto;
        background-color: white;
        margin-bottom: 40px;
    }

    .row { 
        display: flex; 
    }

    .left { 
        flex: 1; 
        padding: 10px; 
    }

    .right { 
        flex: 1; 
        padding: 10px; 
    }

    .title {
        font-weight: bold;
    }

    h4 {
        margin-bottom: -13px;
        font-size: 18px;
    }

    p { 
        margin: 0; 
    }

    a {
        font-size: 14px;
        color: #326e51;
        margin-left: 7px;
    }

    img {
        width: 100%;
    }

    

    .container-left {
        width: 30%;
    }

    .container-left ul {
        list-style-type: none;
        padding: 0;
    }

    .container-left li {
        margin-bottom: 10px; 
    }

    .container-left a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        font-size: 16px;
        transition: color 0.3s; 
    }

    .container-left a:hover {
        color: #007bff; 
    }

    .container-right {
        width: 50%;
        background-color: red; 
        padding: 20px; 
    }
    
    /* footer */
    .footer {
        height: auto;
        background-color: #fff;
        display: flex;
    }

    .footer ul {
        list-style: none;
        margin-left: 150px;
        flex-direction: column;
    }

    .footer .left,
    .footer .center,
    .footer .right {
        flex: 1;
    }

    .footer ul h4{
        margin-bottom: 10px;
        margin-left: 6px;
    }

    .footer ul li{
        margin-bottom: 6px;
        text-decoration: none;
    }

    .footer ul li a{
        text-decoration: none;
    }

</style>
<body>
    <div class="header">
        <img src="https://hotro.hasaki.vn/images/graphics/logo_180x40.svg" id="icon"/>
        <a href="#">Gửi yêu cầu </a> | <a href="?controller=home&action=DangNhap">Đăng nhập</a>
    </div>
    <div class="row search">
        <h1>Xin chào! Chúng tôi có thể giúp gì cho bạn?</h1>
        <div>
            <form>
                <input type="text" name="q" placeholder="Nhập từ khóa để tìm sản phẩm, thương hiệu bạn mong muốn. Ví dụ: Hasaki" fdprocessedid="crfrl2" />
                <button>
                    <img src="https://hotro.hasaki.vn/images/graphics/icon_search.svg"/>
                </button>
            </form>
        </div>
        <div class="information">
            <div class="box-kn">
                <span> 
                    <img src="https://hotro.hasaki.vn/images/graphics/icon_block_search_01.svg"/>
                    <a href="tel:1800 6310"> 1800 6310 </a> <span> (Khiếu nại, góp ý)</span>
                </span>
            </div>
            <div class="box-kn">
                <span> 
                    <img src="https://hotro.hasaki.vn/images/graphics/icon_block_search_02.svg"/>
                    <a href="tel:1800 6324"> 1800 6324 </a> <span>(Tư vấn)</span>
                </span>
            </div>
            <div class="box-kn">
                <span> 
                    <img src="https://hotro.hasaki.vn/images/graphics/icon_block_search_03.svg"/>
                    <a href="tel:1800 6310"> Chat </a>
                </span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <img src="https://hotro.hasaki.vn/files/banner/banner-he-thong-cua-hang-160-chi-nhanh-49-tinh-thanh.jpg"/>
        </div>   
        <div class="row">
            <div class="left">
                <h4>Hồ Chí Minh</h4>
            </div>
        </div>    
        <div class="row">
            <div class="left">
                <p class="title">Quận 1</p>
                <p>CN 13: 81 Hồ Tùng Mậu, P.Bến Nghé, Q.1, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7719844,106.7036582,17z/data=!3m1!4b1!4m6!3m5!1s0x31752f9a881ae94f:0xbe10500c7cd82ed9!8m2!3d10.7719844!4d106.7036582!16s%2Fg%2F11ll9lv80b?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 2</p>
                <p>CN 22: 109 Đường Nguyễn Duy Trinh, P.Bình Trưng Tây, Q.2, TP.HCM <a href="https://www.google.com/maps?cid=13516541562448144071&_ga=2.65507309.2100003373.1624335641-270774086.1618191582" target="_blank">Xem bản đồ</a></p> 
                <p>CN 79: 112 Trần Não, P.An Khánh, Q.2, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7934952,106.730601,17z/data=!3m1!4b1!4m6!3m5!1s0x31752747a09a62bb:0xc0ac1808ec24188a!8m2!3d10.7934952!4d106.730601!16s%2Fg%2F11tj6kr13k?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 136: 608A Nguyễn Duy Trinh, P.Bình Trưng Đông, Tp. Thủ Đức. TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7884763,106.7775255,15z/data=!4m6!3m5!1s0x317527499f378525:0xd08ba9caabc91c5b!8m2!3d10.7884763!4d106.7775255!16s%2Fg%2F11l5v7_3wt?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận 3</p>
                <p>CN 161: 432-434 Cách Mạng Tháng 8, P.11, Q.3, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.783868,106.6706279,15z/data=!4m2!3m1!1s0x0:0x86a44169773db64e?sa=X&ved=2ahUKEwjbjr6XkrmEAxWGV2wGHbbiDRYQ_BJ6BAhMEAA&hl=en" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 4</p>
                <p>CN 18: 223 Đường Khánh Hội, P.3, Q.4, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Spa/@10.758479,106.69913,15z/data=!4m5!3m4!1s0x0:0x30383703c9183110!8m2!3d10.758479!4d106.69913" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận 5</p>
                <p>CN 12: 141A-143 Nguyễn Trãi, P.2, Q.5, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Spa/@10.757581,106.679086,20z/data=!4m5!3m4!1s0x0:0x5d501e4181f5a65e!8m2!3d10.757493!4d106.6790758?hl=en-US" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 6</p>
                <p>CN 17: 94 Đường Hậu Giang, P.6, Q.6, TP.HCM <a href="https://www.google.com/maps?cid=3877039079769571103&_ga=2.163021567.2100003373.1624335641-270774086.1618191582" target="_blank">Xem bản đồ</a></p>
                <p>CN 128: 105A Bà Hom, P.13, Q.6, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7543989,106.631502,15z/data=!4m2!3m1!1s0x0:0x922a21024a5e1f63?sa=X&ved=2ahUKEwjyrp7m3LiBAxX3xTgGHW1sDfoQ_BJ6BAhBEAA&hl=en&ved=2ahUKEwjyrp7m3LiBAxX3xTgGHW1sDfoQ_BJ6BAhVEAk" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận 7</p>
                <p>CN 7: 468A Nguyễn Thị Thập, P.Tân Quy, Q.7, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@10.739702,106.706615,20z/data=!4m5!3m4!1s0x0:0x3f2c156ae0c6ad1e!8m2!3d10.7396172!4d106.7066023?hl=en-US" target="_blank">Xem bản đồ</a></p>
                <p>CN 29: 420 Huỳnh Tấn Phát, P.Bình Thuận, Q.7, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Spa/@10.7551744,106.7248231,20.75z/data=!4m5!3m4!1s0x0:0x2e0906b1dc2421c3!8m2!3d10.7550622!4d106.7250056" target="_blank">Xem bản đồ</a></p>
                <p>CN 82: 219 Nguyễn Thị Thập, P.Tân Phú, Q.7, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.738201,106.7179771,15z/data=!4m5!3m4!1s0x0:0x3e92400fd4fd511a!8m2!3d10.738201!4d106.7179771?hl=en" target="_blank">Xem bản đồ</a></p>
                <p>CN 99: 726 Huỳnh Tấn Phát, P.Tân Phú, Q.7, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7319538,106.7315715,15z/data=!4m6!3m5!1s0x3175255a62079f91:0xc0b59da5937914b2!8m2!3d10.7319538!4d106.7315715!16s%2Fg%2F11kj7kn_d5?hl=en" target="_blank">Xem bản đồ</a></p>
                <p>CN 163: 54 Phạm Hữu Lầu, P.Phú Mỹ, Q.7, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7049466,106.7350507,15z/data=!4m2!3m1!1s0x0:0xfaf8ccd69322af90?sa=X&ved=2ahUKEwjekfqtkrmEAxX8bGwGHbKNCysQ_BJ6BAhTEAA&hl=en" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 8</p>
                <p>CN 88: 246 Dương Bá Trạc, P.2, Q.8, TP.HCM <a href="https://www.google.com/maps/dir//Hasaki+Beauty+%26+Clinic/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x31752fb5ebe35e13:0xc6093f64d13a4d0e?sa=X&hl=en&ved=2ahUKEwjIpKXS8aL8AhWS-TgGHfeyCGwQ9Rd6BAheEAU" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận 9</p>
                <p>CN 4: 94 Lê Văn Việt, P.Hiệp Phú, Q.9, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@10.846777,106.777103,20z/data=!4m5!3m4!1s0x0:0xa5c21789643d463!8m2!3d10.8467687!4d106.7770982?hl=en-US" target="_blank">Xem bản đồ</a></p>
                <p>CN 28 : 256 Đỗ Xuân Hợp, Khu phố 4, P.Phước Long A, Q.9, TP.HCM <a href="https://www.google.com/maps?cid=6935151967500769812&_ga=2.253014539.307767971.1636336930-270774086.1618191582" target="_blank">Xem bản đồ</a></p>
                <p>CN 69: 224A Lê Văn Việt, P.Tăng Nhơn Phú B, Q.9, TP.HCM <a href="https://www.google.com/maps?cid=14403281856344787841&_ga=2.146497012.1197339554.1666927647-39254392.1649052862" target="_blank">Xem bản đồ</a></p>
                <p>CN 76: 39 Nguyễn Văn Tăng, P.Long Thạnh Mỹ, Q.9, TP.HCM <a href="https://www.google.com/maps/dir/10.780222,106.6645009/Hasaki+Beauty+%26+Clinic/@10.847587,106.8154934,20.75z/data=!4m9!4m8!1m1!4e1!1m5!1m1!1s0x3175212ff9eca8d5:0x98416a4b0da593c9!2m2!1d106.8155293!2d10.8476778?hl=en" target="_blank">Xem bản đồ</a></p>
                <p>CN 85: 1207 Nguyễn Duy Trinh, P.Long Trường, Q.9, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8027452,106.8128991,15z/data=!4m2!3m1!1s0x0:0x7604cacedd9f910?sa=X&hl=en&ved=2ahUKEwjiy9i3xeH7AhU5AbcAHeN6BAoQ_BJ6BAhYECE" target="_blank">Xem bản đồ</a></p>
                <p>CN 155: 225A Đình Phong Phú, P.Tăng Nhơn Phú B, Q.9, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8326895,106.7839402,15z/data=!4m2!3m1!1s0x0:0x3f39fff42038b53c?sa=X&ved=2ahUKEwiV2pid4cyDAxWg1zQHHSQiCSYQ_BJ6BAhBEAA&hl=en" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 10</p>
                <p>CN 2: 555 Đường 3 Tháng 2, P.8, Q.10, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@10.766922,106.666171,20z/data=!4m5!3m4!1s0x0:0x3f2a439c2f500be9!8m2!3d10.7669224!4d106.6661709?hl=en-US" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận 11</p>
                <p>CN 50: 296-298 Lãnh Binh Thăng, P.11, Q.11, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7644189,106.6461646,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2e291698ff3a863b!8m2!3d10.7644189!4d106.6483533" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận 12</p>
                <p>CN 9: 6M-6M1 Nguyễn Ảnh Thủ, P.Trung Mỹ Tây, Q.12, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@10.863532,106.612846,20z/data=!4m5!3m4!1s0x0:0x3809913e878c85f8!8m2!3d10.8635316!4d106.6128462?hl=en-US" target="_blank">Xem bản đồ</a></p>
                <p>CN 27: 36A/5 Nguyễn Ảnh Thủ, Khu phố 2, P.Hiệp Thành, Q.12, TP.HCM <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@10.88348,106.6273113,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xd79777642c9922c!8m2!3d10.88348!4d106.6295" target="_blank">Xem bản đồ</a></p>
                <p>CN 94: 392 Nguyễn Văn Quá, P.Đông Hưng Thuận, Q.12, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8371673,106.6293392,15z/data=!4m2!3m1!1s0x0:0x5c83c7bb790ed5b?sa=X&hl=en&ved=2ahUKEwjgguHN5df9AhUVb94KHdmtD-AQ_BJ6BAhREAY" target="_blank">Xem bản đồ</a></p>
                <p>CN 97: 953 (số cũ 91/4) Hà Huy Giáp, P.Thạnh Xuân, Q.12, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8963028,106.6888333,21z/data=!4m20!1m13!4m12!1m4!2m2!1d106.6645009!2d10.780222!4e1!1m6!1m2!1s0x3174d7cafcf04b7f:0x23b6c3547473eb2b!2sHasaki+Beauty+%26+Clinic!2m2!1d106.6889302!2d10.8962995!3m5" target="_blank">Xem bản đồ</a></p>
                <p>CN 145: 650 Nguyễn Ảnh Thủ, P.Tân Chánh Hiệp, Q.12, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8737149,106.6218681,15z/data=!4m2!3m1!1s0x0:0x83f841671908f157?sa=X&ved=2ahUKEwia4LHlsveCAxVbYfUHHdl_Bq8Q_BJ6BAg_EAA&hl=en" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Tân Bình</p>
                <p>CN 1: 71 Hoàng Hoa Thám, P.13, Q.Tân Bình, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/BEAUTY+%26+Co.+HASAKI+s.p.a/@10.80074,106.647149,20z/data=!4m5!3m4!1s0x0:0x1a8e6e3a1e84fae0!8m2!3d10.8007452!4d106.6471212?hl=en-US" target="_blank">Xem bản đồ</a></p>
                <p>CN 23: 28 Phan Huy Ích, P.15, Q.Tân Bình, TP.HCM <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+S.P.A/@10.8345703,106.6328454,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x9707a21441067d72!8m2!3d10.8345703!4d106.6350341" target="_blank">Xem bản đồ</a></p>
                <p>CN 32: 694 Âu Cơ, P.14, Q.Tân Bình, TP.HCM <a href="https://www.google.com/maps?cid=3402614864431965876&_ga=2.251699465.1827907521.1638149910-270774086.1618191582" target="_blank">Xem bản đồ</a></p>
                <p>CN 71: 31-33 Phổ Quang, P.2, Q.Tân Bình, TP.HCM <a href="https://www.google.com/maps?cid=16290289517185162599&_ga=2.146828468.2066361046.1661922053-39254392.1649052862" target="_blank">Xem bản đồ</a></p>
                <p>CN 73: 723 Cách Mạng Tháng Tám, P.6, Q.Tân Bình, TP.HCM <a href="https://www.google.com/maps?cid=4389610638819597014&_ga=2.212606484.1657105715.1663056230-534634167.1647826853" target="_blank">Xem bản đồ</a></p>
                <p>CN 147: 230-232 Âu Cơ, P.9, Q.Tân Bình, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7728587,106.6494467,15z/data=!4m2!3m1!1s0x0:0xbcd32a6dfe156f80?sa=X&ved=2ahUKEwj5qOrKqYaDAxVpa_UHHaNiBCEQ_BJ6BAhCEAA&hl=en" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Tân Phú</p>
                <p>CN 11: 104A Lê Trọng Tấn, P.Tây Thạnh, Q.Tân Phú, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8059266,106.6297267,17z/data=!3m1!4b1!4m6!3m5!1s0x317529231c73edb9:0x18476a8a2addfde1!8m2!3d10.8059266!4d106.6297267!16s%2Fg%2F11lg2yqz34?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 21: 220 Tân Hương, P.Tân Quý, Q.Tân Phú, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7901197,106.6220187,17z/data=!3m1!4b1!4m6!3m5!1s0x31752d452d14b34d:0x106d1caa1589be67!8m2!3d10.7901197!4d106.6220187!16s%2Fg%2F11rbclfxw7?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 40: 311 Tây Thạnh, P.Tây Thạnh, Q.Tân Phú, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8105676,106.6205535,17z/data=!3m1!4b1!4m6!3m5!1s0x31752ba9df965671:0x51d1439d0e201bcb!8m2!3d10.8105676!4d106.6205535!16s%2Fg%2F11rqgyh8dv?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 89: 350 Tân Sơn Nhì, P.Tân Sơn Nhì, Q.Tân Phú, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7960815,106.6296247,20z/data=!4m6!3m5!1s0x3175290ec7cd1c49:0xc9fbe4879b332e51!8m2!3d10.7961423!4d106.630013!16s%2Fg%2F11k4xntpxr?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 90: 588 Lũy Bán Bích, P.Hòa Thạnh, Q.Tân Phú, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7867506,106.6368755,15z/data=!4m6!3m5!1s0x31752fae4083fa59:0xa5a3a9555b3ce322!8m2!3d10.7867506!4d106.6368755!16s%2Fg%2F11ts391rl2?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 91: 182 Thạch Lam, P.Phú Thạnh, Q.Tân Phú, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7783303,106.627461,15z/data=!4m6!3m5!1s0x31752d249f5d6455:0xd55ee9d7656630ae!8m2!3d10.7781878!4d106.6274381!16s%2Fg%2F11sj9f2ssf?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p> 
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Phú Nhuận</p>
                <p>CN 3: 176 Phan Đăng Lưu, P.3, Q.Phú Nhuận, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/C%C3%B4ng+Ty+TNHH+HASAKI+BEAUTY+%26+S.P.A/@10.800759,106.681578,20z/data=!4m5!3m4!1s0x0:0x5a476dfc455b7857!8m2!3d10.800759!4d106.681578?hl=en-US" target="_blank">Xem bản đồ</a></p>
                <p>CN 14: 48 Lê Văn Sỹ, P.11, Q.Phú Nhuận, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.790783,106.6732854,17z/data=!3m1!4b1!4m6!3m5!1s0x317529c18c9c13df:0x7b6083cc2f87bd52!8m2!3d10.790783!4d106.6732854!16s%2Fg%2F11qqk423l2?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Gò Vấp</p>
                <p>CN 6: 657B Quang Trung, P.11, Q.Gò Vấp, TP.HCM (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8359,106.659887,20z/data=!4m6!3m5!1s0x3175290ea4e3cee1:0x4635b8ed79752c70!8m2!3d10.8358995!4d106.6598868!16s%2Fg%2F11fnxp022k?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 8: 447 Phan Văn Trị, P.5, Q.Gò Vấp, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.824289,106.691171,20z/data=!4m6!3m5!1s0x3175291e13d41ba7:0x4ed5ac09fd0f6e8b!8m2!3d10.8224697!4d106.693077!16s%2Fg%2F11fss0z58v?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 20: 50 Phạm Văn Chiêu, P.8, Q.Gò Vấp, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8458588,106.6434784,17z/data=!3m1!4b1!4m6!3m5!1s0x317529cbc249110f:0xc02f075cf7bd7e76!8m2!3d10.8458588!4d106.6434784!16s%2Fg%2F11ng23pbzl?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 35: 402 Lê Đức Thọ, P.6, Q.Gò Vấp, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8415904,106.6772684,15z/data=!4m6!3m5!1s0x31752977762c3719:0x39bc818cb370238!8m2!3d10.8415904!4d106.6772684!16s%2Fg%2F11pm2k4c76?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 100: 304 Thống Nhất, P.16, Q.Gò Vấp, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8412697,106.6649777,15z/data=!4m6!3m5!1s0x317529bc1b4191ff:0xe3a59f6db8e78b3c!8m2!3d10.8412697!4d106.6649777!16s%2Fg%2F11ssnnm1np?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 135: 477-477A Lê Văn Thọ, P.9, Q.Gò Vấp, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8496219,106.656322,15z/data=!4m6!3m5!1s0x317529f49a39384f:0x92c28494595742fd!8m2!3d10.8496219!4d106.656322!16s%2Fg%2F11l5l1nn_s?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Bình Thạnh</p>
                <p>CN 5: 119-121 Nguyễn Gia Trí (D2 cũ), P.25, Q.Bình Thạnh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.806598,106.716135,20z/data=!4m6!3m5!1s0x317529e0781441d7:0xd025a177a042b1a7!8m2!3d10.8045458!4d106.7157995!16s%2Fg%2F11h64nrdnb?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 47: 167 Nguyễn Xí, P.26, Q.Bình Thạnh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.814332,106.7083761,17z/data=!3m1!4b1!4m6!3m5!1s0x31752981ef20746b:0x883ef56b8df7a062!8m2!3d10.814332!4d106.7083761!16s%2Fg%2F11swzlpx51?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 52: 274 Xô Viết Nghệ Tĩnh, P.21, Q.Bình Thạnh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.799972,106.711357,17z/data=!3m1!4b1!4m6!3m5!1s0x31752988add78b65:0xb9d9ca4c4c5ea337!8m2!3d10.799972!4d106.711357!16s%2Fg%2F11qbc02bfw?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 66: 261 Lê Quang Định, P.7, Q.Bình Thạnh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.810029,106.692379,15z/data=!4m6!3m5!1s0x3175298a7c44f5f9:0xb65608ce370739c8!8m2!3d10.810029!4d106.692379!16s%2Fg%2F11t5bpbtp8?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Bình Tân</p>
                <p>CN 10: 304 Lê Văn Quới, P.Bình Hưng Hoà A, Q.Bình Tân, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.776473,106.607775,20z/data=!4m6!3m5!1s0x31752d951f5fac8b:0xe29830c63b13eb0a!8m2!3d10.7763328!4d106.6116671!16s%2Fg%2F11j79cqlgb?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 25: 56 Nguyễn Thị Tú, P.Bình Hưng Hoà B, Q.Bình Tân, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty/@10.8161299,106.5987501,17z/data=!3m1!4b1!4m6!3m5!1s0x31752b5e29babd93:0x585eedea0c779893!8m2!3d10.8161299!4d106.5987501!16s%2Fg%2F11rrnmvb_x?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 26: 631 Tỉnh Lộ 10, Khu Phố 2, P.Bình Trị Đông B, Q.Bình Tân, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty/@10.7575165,106.613931,17z/data=!3m1!4b1!4m6!3m5!1s0x31752d33b9dcfd4b:0x7600a4c5bf49e133!8m2!3d10.7575165!4d106.613931!16s%2Fg%2F11rdbrv3hz?entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Thủ Đức</p>
                <p>CN 15: 15 Võ Văn Ngân, P.Linh Chiểu, Q.Thủ Đức, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.85123,106.755947,17z/data=!3m1!4b1!4m6!3m5!1s0x317527cbbac768c1:0x4164ae20568e7b14!8m2!3d10.85123!4d106.755947!16s%2Fg%2F11lszwvp82?hl=en-US&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 31: 133 Hiệp Bình, KP 7, P.Hiệp Bình Chánh, Q.Thủ Đức, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8440704,106.7303037,17z/data=!3m1!4b1!4m6!3m5!1s0x317527af63c94109:0xdacd4f6499b34b71!8m2!3d10.8440704!4d106.7303037!16s%2Fg%2F11sgdv_gyc?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 81: 1134 Kha Vạn Cân, P.Linh Chiểu, Q.Thủ Đức, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8591287,106.7594764,15z/data=!4m6!3m5!1s0x317527ecffc86985:0x5db869ec4be98b29!8m2!3d10.8591287!4d106.7594764!16s%2Fg%2F11jzjftfv7?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 101: 363-365A Tô Ngọc Vân, P.Linh Đông, Q.Thủ Đức, TP.HCM <a href="https://hotro.hasaki.vn/he-thong-cua-hang.html" target="_blank">Xem bản đồ</a></p>
                <p>CN 123: 447 Kha Vạn Cân, P.Linh Đông, Q.Thủ Đức, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8413414,106.7462732,15z/data=!4m6!3m5!1s0x317527694e9a26c1:0xcba318a43634593!8m2!3d10.8413414!4d106.7462732!16s%2Fg%2F11vcl8p0y9?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 157: 127 Đặng Văn Bi, P.Trường Thọ, Q.Thủ Đức, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8434148,106.7625581,15z/data=!4m6!3m5!1s0x31752722350de16d:0xaafc69126ffa83e5!8m2!3d10.8434148!4d106.7625581!16s%2Fg%2F11vrtddl3z?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Huyện Củ Chi</p>
                <p>CN 127: 68 Tỉnh Lộ 8, Xã Tân Thạnh Tây, H.Củ Chi, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9839472,106.5740887,15z/data=!4m2!3m1!1s0x0:0x8631e1357fe10862?sa=X&ved=2ahUKEwj_tYX4yaGBAxWS62EKHcjYCd0Q_BJ6BAhEEAA&hl=en&ved=2ahUKEwj_tYX4yaGBAxWS62EKHcjYCd0Q_BJ6BAhPEAY" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Huyện Hóc Môn</p>
                <p>CN 30: 36/6 Phan Văn Hớn, Bà Điểm, Hóc Môn, Tp. Hồ Chí Minh, Xã Bà Điểm, H.Hóc Môn, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8416168,106.597308,20z/data=!4m6!3m5!1s0x31752b19b521468f:0xbe9371a147c96918!8m2!3d10.838823!4d106.6008169!16s%2Fg%2F11sfpm03t6?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 44: 59/1A-59/1B Quang Trung, Khu phố 8, Thị trấn Hóc Môn, H.Hóc Môn, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8878793,106.601387,17z/data=!3m1!4b1!4m6!3m5!1s0x3174d5f6620364dd:0xd5f87f72623f6a43!8m2!3d10.8878793!4d106.601387!16s%2Fg%2F11rtnj9lsc?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 151: 67 Đặng Thúc Vịnh, Xã Đông Thạnh, H.Hóc Môn, TP.HCM <a href="https://www.google.com/search?q=Hasaki+Beauty+%26+Clinic&stick=H4sIAAAAAAAA_-NgU1I1qDA2NDdJMTdLSUs2MTG3TDO0MqhISTFPSUo2NjAzNzIzNDQxXcQq5pFYnJidqeCUmlhaUqmgpuCck5mXmQwAJ4FFo0IAAAA&hl=en&mat=CbLrtCWimqagElcB7PxHsd1hoWZGGTWs5RJ5RKxthHal0seR508p-jApKoxMPZ6Rx_" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Huyện Bình Chánh</p>
                <p>CN 24: 441 Quốc Lộ 50, Xã Bình Hưng, H.Bình Chánh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7297559,106.6557883,21z/data=!4m6!3m5!1s0x31754b6798823323:0x451097df50a2001d!8m2!3d10.7317472!4d106.6563207!16s%2Fg%2F11nnvs1lms?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 36: 1261 Phạm Hùng, ấp 4A, Xã Bình Hưng, H.Bình Chánh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.732715,106.6744034,17z/data=!3m1!4b1!4m6!3m5!1s0x31752f9bd430c40f:0xabb19e9b07645d26!8m2!3d10.732715!4d106.6744034!16s%2Fg%2F11ptq636m3?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 156: C9/2A đường Võ Văn Vân, Xã Vĩnh Lộc B, H.Bình Chánh, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7950873,106.5766598,15z/data=!4m6!3m5!1s0x31752b23b67638b5:0x4df9c6a31f2a0867!8m2!3d10.7950873!4d106.5766598!16s%2Fg%2F11y2k5nvf1?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Huyện Nhà Bè</p>
                <p>CN 129: 1030 Lê Văn Lương, Xã Phước Kiển, H.Nhà Bè, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7096595,106.7022731,15z/data=!4m2!3m1!1s0x0:0x40409605da633c8b?sa=X&ved=2ahUKEwiX0_u-rMWBAxVPVd4KHaWXA2QQ_BJ6BAhKEAA&hl=en&ved=2ahUKEwiX0_u-rMWBAxVPVd4KHaWXA2QQ_BJ6BAhSEAY" target="_blank">Xem bản đồ</a></p>
                <p>CN 143: 1838 Huỳnh Tấn Phát, Thị trấn Nhà Bè, H.Nhà Bè, TP.HCM <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.696707,106.7393168,15z/data=!4m6!3m5!1s0x31753baaa74d6cef:0xa28c55619a5149ce!8m2!3d10.696707!4d106.7393168!16s%2Fg%2F11vjcjqnj_?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>
        
        <!-- Hà Nội -->
        <div class="row">
            <div class="left">
                <h4>Hà Nội</h4>
            </div>
        </div>    
        <div class="row">
            <div class="left">
                <p class="title">Quận Cầu Giấy</p>
                <p>CN 16: 182 Cầu Giấy, P.Quan Hoa, Q.Cầu Giấy, Hà Nội <a href="https://www.google.com/maps/place/HASAKI+BEAUTY+%26+SPA/@21.0337299,105.7954773,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab1b2cb37397:0x2ec1ba524e440a13!8m2!3d21.0337299!4d105.797666?hl=en-US" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Đống Đa</p>
                <p>CN PNT: 105C1 Phạm Ngọc Thạch, P.Trung Tự, Q.Đống Đa, Hà Nội <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@21.0078629,105.8329447,15z/data=!4m2!3m1!1s0x0:0xa1bb34c5d2e389db?sa=X&ved=2ahUKEwjYtsW_1IuCAxWzqFYBHbgHBQYQ_BJ6BAg_EAA&hl=en&ved=2ahUKEwjYtsW_1IuCAxWzqFYBHbgHBQYQ_BJ6BAhTEAg" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Hai Bà Trưng</p>
                <p>CN 84: 40 Bạch Mai, P.Cầu Dền, Q.Hai Bà Trưng, Hà Nội <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@21.0070258,105.8512445,15z/data=!4m2!3m1!1s0x0:0x4c3e0361f1bcbb25?sa=X&hl=en&ved=2ahUKEwjWg9ui7M_7AhWzzzgGHak1BQ0Q_BJ6BAhZECE" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Long Biên</p>
                <p>CN 83: 594 Nguyễn Văn Cừ, P.Gia Thụy, Q.Long Biên, Hà Nội <a href="https://www.google.com/maps/place/Hasaki+Beaty+%26+Clinic/@21.0510791,105.8856159,15z/data=!4m2!3m1!1s0x0:0x518ae51f014e13d2?sa=X&hl=en&ved=2ahUKEwib1_2i7M_7AhVExjgGHcOaD6QQ_BJ6BAhdECE" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>

        <!-- Đà Nẵng -->
        <div class="row">
            <div class="left">
                <h4>Đà Nẵng</h4>
            </div>
        </div>   
        <div class="row">
            <div class="left">
                <p class="title">Quận Hải Châu</p>
                <p>CN 108: 329 Hoàng Diệu, P.Bình Thuận, Q.Hải Châu, Đà Nẵng <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@16.0555554,108.2163317,19z/data=!4m6!3m5!1s0x314219fd859a2add:0xb484899a6914a9ad!8m2!3d16.0560769!4d108.2171231!16s%2Fg%2F11v0p5s04g?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Quận Liên Chiếu</p>
                <p>CN 131: 18 Âu Cơ, P.Hòa Khánh Bắc, Q.Liên Chiểu, Đà Nẵng <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@16.0717112,108.149885,15z/data=!4m6!3m5!1s0x3142197914326823:0xd7e8cbd70bf9c33f!8m2!3d16.0717112!4d108.149885!16s%2Fg%2F11l2np2_tn?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Quận Thanh Khuê</p>
                <p>CN 51: 393 Lê Duẩn, P.Tân Chính, Q.Thanh Khê, Đà Nẵng (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@16.0677378,108.2082391,18z/data=!4m5!3m4!1s0x0:0x5f2130f94c67c3d4!8m2!3d16.0680305!4d108.2086258" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Cần Thơ -->
        <div class="row">
            <div class="left">
                <h4>Cần Thơ</h4>
            </div>
        </div>   
        <div class="row">
            <div class="left">
                <p class="title">Quận Ninh Kiều</p>
                <p>CN 38: 189-197 đường 30 Tháng 4, P.Xuân Khánh, Q.Ninh Kiều, Cần Thơ (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0263633,105.7764175,17z/data=!3m1!4b1!4m6!3m5!1s0x31a08944f17307fd:0xf0f1ed5a5af037a0!8m2!3d10.0263633!4d105.7764175!16s%2Fg%2F11rnh97t2y?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 80: 25-25B Nguyễn Trãi, P.Tân An, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.038739,105.786812,15z/data=!4m6!3m5!1s0x31a0635586547651:0x9ffe001cdd7cb99b!8m2!3d10.0386446!4d105.7866654!16s%2Fg%2F11tjjmr00j?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 92: 182 Trần Hưng Đạo, P.An Nghiệp, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0357178,105.7754886,15z/data=!4m6!3m5!1s0x31a089eb478fd01b:0x574643a35d2584fb!8m2!3d10.0357178!4d105.7754886!16s%2Fg%2F11tt68c46q?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 93: 58 Hùng Vương, P.Thới Bình, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0437647,105.7784487,15z/data=!4m6!3m5!1s0x31a0894e7710e183:0xba6222a23ee65e83!8m2!3d10.0437647!4d105.7784487!16s%2Fg%2F11twhlmdyh?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 125: 89 Đường 3/2, P.Hưng Lợi, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0155783,105.7608011,15z/data=!4m6!3m5!1s0x31a089ea82c6f525:0xdd696bb97a07dcd!8m2!3d10.0155783!4d105.7608011!16s%2Fg%2F11v9y7_zx2?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 126: 49 Mậu Thân, P.An Hòa, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0423398,105.7660523,15z/data=!4m6!3m5!1s0x31a089d8d8cf7eff:0xbd20f2a3820641e9!8m2!3d10.0423398!4d105.7660523!16s%2Fg%2F11vb50zjwd?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 139: 141 Cách Mạng Tháng Tám, P.An Hòa, Q.Ninh Kiều, Cần Thơ <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.0513142,105.773941,15z/data=!4m6!3m5!1s0x31a089dd2cf78755:0x3cf129b44d052ed7!8m2!3d10.0514276!4d105.7740617!16s%2Fg%2F11vj289xv3?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>
        
        <!-- An Giang -->
        <div class="row">
            <div class="left">
                <h4>An Giang</h4>
            </div>
        </div>   
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Long Xuyên</p>
                <p>CN 60: 1395 Trần Hưng Đạo, P.Mỹ Long, Thành Phố Long Xuyên, An Giang <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.3766029,105.4411994,15z/data=!4m2!3m1!1s0x0:0xa97d40f51af997cf?sa=X&hl=en&ved=2ahUKEwj7n6vqwMr5AhXTpVYBHblkDl4Q_BJ6BAhNEB8" target="_blank">Xem bản đồ</a></p>
                <p>CN 142: 895 Trần Hưng Đạo, P.Bình Khánh, Thành Phố Long Xuyên, An Giang <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.3943778,105.4255519,15z/data=!4m6!3m5!1s0x310a737c5590cd55:0xe38c89631e537b69!8m2!3d10.3943778!4d105.4255519!16s%2Fg%2F11vljyn94k?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Thành phố Châu Đốc</p>
                <p>CN 114: 212-214 Lê Lợi, P.Châu Phú B, Thành Phố Châu Đốc, An Giang <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.7047057,105.1302735,15z/data=!4m2!3m1!1s0x0:0x20ad6a019bd2283e?sa=X&ved=2ahUKEwjGv_XD2JSAAxXGZ_UHHaXrAG4Q_BJ6BAg-EAA&hl=en&ved=2ahUKEwjGv_XD2JSAAxXGZ_UHHaXrAG4Q_BJ6BAhTEAY" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        
        <!-- Bà Rịa Vũng Tàu -->
        <div class="row">
            <div class="left">
                <h4>Bà Rịa Vũng Tàu</h4>
            </div>
        </div>   
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Vũng Tàu </p>
                <p>CN 37: 177 Ba Cu, P.4, Thành Phố Vũng Tàu, Bà Rịa Vũng Tàu (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.3524128,107.0807283,17z/data=!3m1!4b1!4m6!3m5!1s0x31756f47d98885a9:0xe02aad3dca8e7f01!8m2!3d10.3524128!4d107.0807283!16s%2Fg%2F11sml_0blx?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 152: 479 Đường 30 tháng 4, P.Rạch Dừa, Thành Phố Vũng Tàu, Bà Rịa Vũng Tàu <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.3981884,107.1120032,15z/data=!4m6!3m5!1s0x3175717c3c6d3ba7:0xa625ac2aa8f7802c!8m2!3d10.3981884!4d107.1120032!16s%2Fg%2F11vrf2y548?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Thành phố Bà Rịa </p>
                <p>CN 106: 132 Nguyễn Hữu Thọ, P.Phước Trung, Thành Phố Bà Rịa, Bà Rịa Vũng Tàu <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.4933652,107.1744607,14z/data=!4m6!3m5!1s0x3175739e77e973d7:0x1e76e477798fc9b0!8m2!3d10.4935989!4d107.1735523!16s%2Fg%2F11kpz4slgf?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>

        <!-- Bạc Liêu -->
        <div class="row">
            <div class="left">
                <h4>Bạc Liêu</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Bạc Liêu</p>
                <p>CN 59: 238 Trần Phú, P.7, Thành Phố Bạc Liêu, Bạc Liêu <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@9.2932607,105.7217897,15z/data=!4m2!3m1!1s0x0:0x542a8f359deb4ae2?sa=X&hl=en&ved=2ahUKEwi9o9jfwMr5AhWll1YBHTbKBl8Q_BJ6BAhEEB8" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Bắc Ninh -->
        <div class="row">
            <div class="left">
                <h4>Bắc Ninh</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Bắc Ninh</p>
                <p>CN 113: 122-124 Trần Hưng Đạo, P.Tiền An, Thành Phố Bắc Ninh, Bắc Ninh <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@21.1801396,106.0659016,15z/data=!4m6!3m5!1s0x31350d62dc20ad4f:0xaa6e47018bc93f33!8m2!3d21.1801396!4d106.0659016!16s%2Fg%2F11v5d_mwp3?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Bến Tre -->
        <div class="row">
            <div class="left">
                <h4>Bến Tre</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Bến Tre</p>
                <p>CN 54: 75C Đại lộ Đồng Khởi, P.Phú Khương, Thành Phố Bến Tre, Bến Tre <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.2499004,106.3730829,15z/data=!4m2!3m1!1s0x0:0x831fc912abd26716?sa=X&hl=en&ved=2ahUKEwi22Y2owMr5AhVlt1YBHb7-C14Q_BJ6BAhGEB8" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Bình Định -->
        <div class="row">
            <div class="left">
                <h4>Bình Định</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Quy Nhơn</p>
                <p>CN 77: 232A Phan Bội Châu, P.Trần Hưng Đạo, Thành Phố Quy Nhơn, Bình Định <a href="https://www.google.com/maps?cid=6562814254797954624&_ga=2.107007873.2001965223.1665365567-534634167.1647826853" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Bình Dương -->
        <div class="row">
            <div class="left">
                <h4>Bình Dương</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thị Xã Bến Cát</p>
                <p>CN 124: 166-168 Hùng Vương, P.Mỹ Phước, Thị Xã Bến Cát, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@11.1526027,106.589505,15z/data=!4m2!3m1!1s0x0:0x35c9ca3e8b051b64?sa=X&ved=2ahUKEwjeqZn8_4CBAxURa_UHHVexDEwQ_BJ6BAhEEAA&hl=en&ved=2ahUKEwjeqZn8_4CBAxURa_UHHVexDEwQ_BJ6BAhUEAk" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Thị Xã Dĩ An</p>
                <p>CN 34: 202-204 Nguyễn An Ninh, Khu phố Bình Minh 2, P.Dĩ An, Thị xã Dĩ An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9046601,106.768184,21z/data=!4m6!3m5!1s0x3174d9b835465077:0xb1d1bb8dafbe244d!8m2!3d10.9046464!4d106.7682842!16s%2Fg%2F11rkp7fb6h?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 46: 28-30 Lê Trọng Tấn, P.An Bình, Thị xã Dĩ An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.8716819,106.7579008,17z/data=!3m1!4b1!4m6!3m5!1s0x317527c01ee1dbb7:0xecf0db920628564a!8m2!3d10.8716819!4d106.7579008!16s%2Fg%2F11q438mxc4?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 107: 127 Nguyễn Trãi, P.Dĩ An, Thị xã Dĩ An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9039756,106.7561601,15z/data=!4m6!3m5!1s0x3174d9b7e256e143:0xa46255053a9d1a65!8m2!3d10.9039756!4d106.7561601!16s%2Fg%2F11kq40rjmn?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 115: 61 Nguyễn An Ninh, P.Dĩ An, Thị xã Dĩ An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9147281,106.7694603,15z/data=!4m6!3m5!1s0x3174d9b7b7fa2d0b:0x294e688304812588!8m2!3d10.9147123!4d106.769389!16s%2Fg%2F11v3gjmbwr?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 121: 521 Nguyễn Tri Phương, P.An Bình, Thị xã Dĩ An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+Nguy%E1%BB%85n+Tri+Ph%C6%B0%C6%A1ng/@10.8843699,106.7598917,15z/data=!4m6!3m5!1s0x3174d9e76c788789:0x3926ced2e54257c0!8m2!3d10.8843699!4d106.7598917!16s%2Fg%2F11v6kgwk6s?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thị Xã Tân Uyên</p>
                <p>CN 103: 34 ĐT746, P.Tân Phước Khánh, Thị xã Tân Uyên, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@11.0055482,106.720023,19.25z/data=!4m6!3m5!1s0x3174d1bc6960e0db:0xab7c6d37cd03bc4b!8m2!3d11.0058927!4d106.7201937!16s%2Fg%2F11tghmt8lk?hl=en" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right">
                <p class="title">Thị Xã Thuận An</p>
                <p>CN 42: 11A Cách Mạng Tháng Tám, Tổ 13, Khu phố Chợ, P.Lái Thiêu, Thị xã Thuận An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9031794,106.7009786,17z/data=!3m1!4b1!4m6!3m5!1s0x3174d7144d606fd3:0xde401ed73175f100!8m2!3d10.9031794!4d106.7009786!16s%2Fg%2F11rr6qphnt?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 68: 7A/2B Tỉnh lộ 43, P.Bình Hòa, Thị xã Thuận An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.892586,106.723404,15z/data=!4m6!3m5!1s0x3174d7a1d2101205:0x6b3132fd3664c79f!8m2!3d10.892797!4d106.7231823!16s%2Fg%2F11t7t_6_9s?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 110: 200A/2 Cách Mạng Tháng Tám, P.An Thạnh, Thị xã Thuận An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9505192,106.6818886,15z/data=!4m6!3m5!1s0x3174d7d42edf753b:0x3080eb8ff7338204!8m2!3d10.9505192!4d106.6818886!16s%2Fg%2F11v0vm76kv?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 116: 1/709 Đường 22/12, P.Thuận Giao, Thị xã Thuận An, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9477806,106.7259026,15z/data=!4m6!3m5!1s0x3174d982b3c816a9:0x3be77d506a3c2fbb!8m2!3d10.9479405!4d106.7260501!16s%2Fg%2F11krf6cmns?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Thủ Dầu Một</p>
                <p>CN 39: 219 Yersin, P.Phú Cường, Thành Phố Thủ Dầu Một, Bình Dương (Có SPA) <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9815742,106.6555229,17z/data=!3m1!4b1!4m6!3m5!1s0x3174d1f9a40b1883:0xe0bce50b59be4320!8m2!3d10.9815742!4d106.6555229!16s%2Fg%2F11pvfpgk1c?entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 86: 4 Đường 30/4, P.Phú Hòa, Thành Phố Thủ Dầu Một, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9811307,106.6718517,15z/data=!4m6!3m5!1s0x3174d192d6ce6f07:0x8335d82d8600d70a!8m2!3d10.9811307!4d106.6718517!16s%2Fg%2F11sczlc2k8?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 87: 517 Phú Lợi, P.Phú Lợi, Thành Phố Thủ Dầu Một, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9867734,106.6877228,15z/data=!4m6!3m5!1s0x3174d1a6e4f70cc7:0x3b8b4d5ef5125c56!8m2!3d10.9867958!4d106.6877165!16s%2Fg%2F11k43b8hrn?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
                <p>CN 134: 95 Cách Mạng Tháng Tám, P.Chánh Mỹ, Thành Phố Thủ Dầu Một, Bình Dương <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9928234,106.6507217,15z/data=!4m6!3m5!1s0x3174d1ff3d201aef:0xa9786b222b7e3737!8m2!3d10.9928234!4d106.6507217!16s%2Fg%2F11vb_91gn1?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>

        <!-- Bình Phước -->
        <div class="row">
            <div class="left">
                <h4>Bình Phước</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thị Xã Đồng Xoài</p>
                <p>CN 74: 513 Phú Riềng Đỏ, P.Tân Xuân, Thị Xã Đồng Xoài, Bình Phước <a href="https://www.google.com/maps?cid=6485567918844945845&_ga=2.223033817.337105638.1664512782-534634167.1647826853" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>
        
        <!-- Bình Thuận -->
        <div class="row">
            <div class="left">
                <h4>Bình Thuận</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Phan Thiết</p>
                <p>CN 62: 401 Trần Hưng Đạo, P.Bình Hưng, Thành Phố Phan Thiết, Bình Thuận <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@10.9275326,108.1038346,15z/data=!4m2!3m1!1s0x0:0x40d48e1583280543?sa=X&hl=en&ved=2ahUKEwjN5eP9wMr5AhXgklYBHYxbC14Q_BJ6BAhMEB8" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>  
 
        <!-- Cà Mau -->
        <div class="row"a>
            <div class="left">
                <h4>Cà Mau</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Cà Mau</p>
                <p>CN 67: 197-199 Trần Hưng Đạo, P.5, Thành Phố Cà Mau, Cà Mau <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@9.1838057,105.1615986,15z/data=!4m2!3m1!1s0x0:0xde928a6b68a69ab2?sa=X&hl=en&ved=2ahUKEwi5yarhwcr5AhWUzpQKHZdbA84Q_BJ6BAhEEB8" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>
        
        <!-- Đắk Lắk -->
        <div class="row">
            <div class="left">
                <h4>Đắk Lắk</h4>
            </div>
        </div>
        <div class="row">
            <div class="left">
                <p class="title">Thành phố Buôn Ma Thuột</p>
                <p>CN 53: 96-98-100 Yjút, P.Thống Nhất, Thành Phố Buôn Ma Thuột, Đắk Lắk <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@12.6809036,108.0429082,15z/data=!4m2!3m1!1s0x0:0x8303d151f9b1caad?sa=X&hl=en&ved=2ahUKEwjJqcucwMr5AhUIm1YBHdeOCl4Q_BJ6BAhIEB8" target="_blank">Xem bản đồ</a></p>
                <p>CN 150: 366 Lê Duẩn, P.Ea Tam, Thành Phố Buôn Ma Thuột, Đắk Lắk <a href="https://www.google.com/maps/uv?pb=!1s0x31721df4dede76cb%3A0xaba5dc7d2644fa18!5sHasaki%20Beauty%20%26%20Clinic!15sCgIgARICGAI" target="_blank">Xem bản đồ</a></p>
                <p>CN 153: 206 Nguyễn Tất Thành, P.Tân Lập, Thành Phố Buôn Ma Thuột, Đắk Lắk <a href="https://www.google.com/maps/place/Hasaki+Beauty+%26+Clinic/@12.6907355,108.0612404,15z/data=!4m6!3m5!1s0x3171f757aaaccda3:0x4dd91813c0238fef!8m2!3d12.6907355!4d108.0612404!16s%2Fg%2F11vk84mpsj?hl=en&entry=ttu" target="_blank">Xem bản đồ</a></p>
            </div>
            <div class="right"></div>
        </div>
    </div>
    <div class="footer">
        <div class="left">
            <ul class="footer links">
                <li>
                    <h4 class="tt_footer text-uppercase">Hỗ trợ khách hàng</h4>
                </li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Các câu hỏi thường gặp</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Gửi yêu cầu hỗ trợ</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Hướng dẫn đặt hàng</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Phương thức vận chuyển</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Chính sách đổi trả</a></li>
            </ul>
        </div>
        <div class="center">
            <ul class="footer links">
                <li>
                    <h4 class="tt_footer text-uppercase">Về hasaki.vn</h4>
                </li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Phiếu mua hàng</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Giới thiệu Hasaki.vn</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Tuyển dụng</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Chính sách bảo mật</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Điều khoản sử dụng</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Liên hệ</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Vị trí cửa hàng</a></li>
            </ul>
        </div>
        <div class="right">
            <ul class="footer links">
                <li>
                    <h4 class="tt_footer text-uppercase">Hợp tác &amp; Liên kết</h4>
                </li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Hasaki Clinic &amp; Spa</a></li>
                <li class="nav item"><a href="#" class="txt_link_hasaki">Hasaki cẩm nang</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
