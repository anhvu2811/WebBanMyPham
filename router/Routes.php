<?php
  $controllers = array (
    'NguoiDung' => ['index', 'create', 'createUser', 'update', 'updateUser', 'delete'],
    'Home' => ['index', 'DangNhap', 'DangKy', 'HeThongCuaHang'],
    'SanPham' => ['ShowDanhSachSanPham', 'ShowDanhSachSanPhamTheoLoai', 'ShowDanhSachSanPhamTheoGia', 'showDanhSachSanPhamTheoTimKiem', 'showChiTietSanPham', 'index', 'create', 'createSanPham', 'update', 'updateSanPham'],
    'VaiTro' => ['index', 'create', 'createVaiTro', 'update', 'updateVaiTro', 'delete'],
    'Loai' => ['index', 'create', 'createLoai', 'update', 'updateLoai', 'delete'],
    'ThuongHieu' => ['index', 'create', 'createThuongHieu', 'update', 'updateThuongHieu', 'delete'],
    'KhuyenMai' => ['index', 'create', 'createKhuyenMai', 'update', 'updateKhuyenMai', 'delete'],
    'GioHang' => ['createHoaDon'],
    
  ); 

  if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $defaultController = 'Home';
    $defaultAction = 'index';
  }

  include_once('controllers/' . $controller . 'Controller.php');
  $klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
  $controllerInstance = new $klass;

  if (method_exists($controllerInstance, $action)) {
      if (isset($id)) {
          $controllerInstance->$action($id);
      } else {
          $controllerInstance->$action();
      }
  } else {
      if (class_exists($defaultController . 'Controller')) {
          $defaultControllerInstance = new $defaultController . 'Controller';
          $defaultControllerInstance->$defaultAction();
      } else {
          die('Lớp Controller mặc định không tồn tại');
      }
  }

?>

