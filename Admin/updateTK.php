<?php
require('Config.php');

    if (isset($_GET['id'])) {
        $ID       = $_GET['id'];
        $sql1     = "select * from khachhang where ID = ' . $ID.'";
        $sql2     = 'select matKhau from taikhoan ';
        $result = mysqli_query(connect(), $sql1);
        $result2 = mysqli_query(connect(), $sql2);
        $row    = mysqli_fetch_array($result, 1);
        $row2    = mysqli_fetch_array($result2, 1);
        if ($row != null) {
            $tenDangNhap = $row['tenDangNhap'];
            $matKhau = $row2['matKhau'];
            $hoTen = $row['hoTen'];
            $gioiTinh = $row['gioiTinh'];
            $ngaySinh = $row['ngaySinh'];
            $SDT = $row['SDT'];
            $email = $row['email'];
            $diaChi = $row['diaChi'];
            $avatar = $row['avatar'];
        }
    }
    if(isset($_FILES["file"]['name'])){ 
        if (empty($_FILES["file"]['name'])) {
        $error["file"] = "File ảnh trống";
    } else 
    {
            $dir="Image/KhachHang/";
            $file = $dir . basename($_FILES["file"]["name"]);
            $filename = pathinfo($file, PATHINFO_EXTENSION);
            if ($filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif") {
                $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
            }

            //nếu chưa có folder tạo folder
            if(!file_exists($dir))
                mkdir($dir);
            
            //copy file    
            if(empty($error["file"]))
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], $file);
                $avatar = $file;
            }
        }
    }

if (!empty($_POST)) {
    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
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

    // chọn bảng mã cho kết nối
    mysqli_query(connect(), "set names 'utf8'");
    // thực hiện lệnh truy vấn
    $updtk = "UPDATE taikhoan SET tenDangNhap='" . $tenDangNhap . "',matKhau='" . $matKhau . "' where ID = " . $ID;
    mysqli_query(connect(), $updtk);
    $updkh = "UPDATE khachhang SET
    tenDangNhap='" . $tenDangNhap . "',hoTen='" . $hoTen . "',gioiTinh='" . $gioiTinh . "',ngaySinh='" . $ngaySinh . "',SDT='" . $SDT . "',email='" . $email . "',diaChi='" . $diaChi . "',avatar='" . $avatar . "' 
     WHERE ID ='". $ID."'";
    mysqli_query(connect(), $updkh);
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2 class="text-center">Sửa Thông Tin Khách hàng</h2>
                    </div>
                    <div class="panel-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="tenDangNhap">Tài khoản:</label>
                                <input required="true" type="varchar" class="form-control" id="tenDangNhap" name="tenDangNhap" value="<?php echo $tenDangNhap?>">
                            </div>
                            <div class="form-group">
                                <label for="matKhau">Mật khẩu:</label>
                                <input required="true" type="password" class="form-control" id="matKhau" name="matKhau" value="<?php echo $matKhau?>">
                            </div>
                            <div class="form-group">
                                <label for="hoTen">Họ tên:</label>
                                <input required="true" type="varchar" class="form-control" id="hoTen" name="hoTen" value="<?php echo $hoTen?>">
                            </div>
                            <div class="form-group">
                                <label for="gioiTinh">Giới tính:</label>
                                <input type="varchar" class="form-control" id="gioiTinh" name="gioiTinh" value="<?php echo $gioiTinh?>">
                            </div>
                            <div class="form-group">
                                <label for="ngaySinh">Ngày Sinh:</label>
                                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo $ngaySinh?>">
                            </div>
                            <div class="form-group">
                                <label for="SDT">SĐT:</label>
                                <input type="varchar" class="form-control" id="SDT" name="SDT" value="<?php echo $SDT?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="varchar" class="form-control" id="email" name="email" value="<?php echo $email?>">
                            </div>
                            <div class="form-group">
                                <label for="diaChi">Địa Chỉ:</label>
                                <input type="varchar" class="form-control" id="diaChi" name="diaChi" value="<?php echo $diaChi?>">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar:</label>
                                <input type="file" class="form-control" id="avatar" name="file" value="<?php echo $avatar?>">
                            </div>
                            <button class="btn btn-success">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>