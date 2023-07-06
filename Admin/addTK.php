<?php
require('Config.php');
if(isset($_POST['file'])){ 
    $dir="/QuanLyShop/Image/KhachHang/";
    $file = $dir.$_POST['file'];
    $filename = pathinfo($file, PATHINFO_EXTENSION);
    if (
        $filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif"
    ) {
        $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
    } else if (file_exists($file)) {
        $error["file"] = "File này đã tồn tại";
    }
}

$ID = $IDSP = $IDSize = $hoTen = $soLuongSP = $ngaySinh = $SDT = $email = $diaChi = $avatar = '';
if (!empty($_POST)) {
    if (isset($_POST['ID'])) {
        $ID = $_POST['ID'];
    }
    if (isset($_POST['tenDangNhap'])) {
        $tenDangNhap = $_POST['tenDangNhap'];
    }
    if (isset($_POST['matKhau'])) {
        $matKhau = $_POST['matKhau'];
    }
    if (isset($_POST['hoTen'])) {
        $hoTen = $_POST['hoTen'];
    }
    if (isset($_POST['gioiTinh'])) {
        $gioiTinh = $_POST['gioiTinh'];
    }
    if (isset($_POST['ngaySinh'])) {
        $ngaySinh = $_POST['ngaySinh'];
    }
    if (isset($_POST['SDT'])) {
        $SDT = $_POST['SDT'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['diaChi'])) {
        $diaChi = $_POST['diaChi'];
    }
    if (isset($_POST['avatar'])) {
        $avatar = $_POST['avatar'];
    }
    // chọn bảng mã cho kết nối
    mysqli_query(connect(), "set names 'utf8'");
    // thực hiện lệnh truy vấn
    $istk = 'INSERT INTO taikhoan(ID, tenDangNhap,matKhau) VALUES ("' . $ID . '","' . $tenDangNhap . '","' . $matKhau . '")';
    $result1 = mysqli_query(connect(), $istk);
    $iskh = 'INSERT INTO khachhang(ID,tenDangNhap, hoTen, gioiTinh, ngaySinh, SDT, email, diaChi, avatar)
    VALUES ("' . $ID . '","' . $tenDangNhap . '","' . $hoTen . '","' . $gioiTinh . '","' . $ngaySinh . '","' . $SDT . '","' . $email . '","' . $diaChi . '","' . $file . '")';
    mysqli_query(connect(), $iskh);
    header("Location:quantri.php?page_layout=danhsachKH");
    mysqli_close(connect());
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Thông Tin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm Thông Tin</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="tenDangNhap">Tài khoản:</label>
                        <input required="true" type="varchar" class="form-control" id="tenDangNhap" name="tenDangNhap">
                    </div>
                    <div class="form-group">
                        <label for="matKhau">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="matKhau" name="matKhau">
                    </div>
                    <div class="form-group">
                        <label for="hoTen">Họ tên:</label>
                        <input required="true" type="varchar" class="form-control" id="hoTen" name="hoTen">
                    </div>
                    <div class="form-group">
                        <label for="gioiTinh">Giới tính:</label>
                        <input type="varchar" class="form-control" id="gioiTinh" name="gioiTinh">
                    </div>
                    <div class="form-group">
                        <label for="ngaySinh">Ngày Sinh:</label>
                        <input type="date" class="form-control" id="ngaySinh" name="ngaySinh">
                    </div>
                    <div class="form-group">
                        <label for="SDT">SĐT:</label>
                        <input type="varchar" class="form-control" id="SDT" name="SDT">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="varchar" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa Chỉ:</label>
                        <input type="varchar" class="form-control" id="diaChi" name="diaChi">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Ảnh KH:</label>
                        <input type="file" class="form-control" id="avatar" name="file">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>