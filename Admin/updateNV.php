<?php
require('Config.php');
    $ID = $_GET['id'];
    $sql = 'select * from nhanvien where ID = '.$ID;
    $result = mysqli_query(connect(), $sql);
    
    if ($row = mysqli_fetch_array($result))
    {
        $chucVu = $row['chucVu'];
        $tenDangNhap = $row['tenDangNhap'];
        $matKhau = $row['matKhau'];
        $hoTen = $row['hoTen'];
        $gioiTinh = $row['gioiTinh'];
        $ngaySinh = $row['ngaySinh'];
        $SDT = $row['SDT'];
        $email = $row['email'];
        $diaChi = $row['diaChi'];
        $avatar = $row['avatar'];
    }

    if(isset($_FILES["file"]['name'])){ 
        if (empty($_FILES["file"]['name'])) {
        $error["file"] = "File ảnh trống";
    } else {
        $dir="/QuanLyShop/Image/NV/";
        $file = $dir . basename($_FILES["file"]["name"]);
        $filename = pathinfo($file, PATHINFO_EXTENSION);

        if (
            $filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif"
        ) {
            $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
        } else if (file_exists($file)) {
            $error["file"] = "File này đã tồn tại";
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
        if (isset($_POST['chucVu'])) {
            $chucVu = $_POST['chucVu'];
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

        $gioiTinh = isset($_POST['gender']) ? $_POST['gender'] : null;

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
    mysqli_query(connect(),"set names 'utf8'");
    // thực hiện lệnh truy vấn
    $sql = "UPDATE nhanvien SET
    hoTen='".$hoTen."',gioiTinh='".$gioiTinh."',ngaySinh='".$ngaySinh."',SDT='".$SDT."',email='".$email."',diaChi='".$diaChi."',avatar='".$avatar."', chucVu='".$chucVu."',tenDangNhap='".$tenDangNhap."',matKhau='".$matKhau."',
    avatar='".$avatar."' where ID ='".$ID."' ";    
    mysqli_query(connect(),$sql);

    if($chucVu == "nhanvien"){
    $sql1 = "UPDATE bangLuong SET IDNV='".$ID."', heSoLuong = '2' where IDNV =".$ID;
    mysqli_query(connect(),$sql1);
    }else{
    $sql1 = "UPDATE bangLuong SET IDNV='".$ID."', heSoLuong = '3' where IDNV =".$ID;
    mysqli_query(connect(),$sql1);
    }
    header("Location: quantri.php?page_layout=danhsachNV");
    mysqli_close(connect());
    }


?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Thông Tin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
    
        .gender-container{
            display: flex;
            align-items: center;
        }
        input[type="radio"] {
        width: 20px;
        box-shadow:unset;
        }
        .gender-container label {
            font-size: 16px;
            margin-right: 4px;
            padding-top: 10px;

        }
        .gender-container input {
        margin-right: 20px;
        }

        .flexGener
        {
            display: flex;
        }
        .gender
        {
            margin-top: 10px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm Thông Tin</h2>
            </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="tenDangNhap">Tài khoản:</label>
                        <input required="true" type="varchar" class="form-control" id="tenDangNhap" name="tenDangNhap"
                            value="<?=$tenDangNhap?>">
                    </div>
                    <div class="form-group">
                        <label for="matKhau">Mật khẩu:</label>
                        <input required="true" type="password" class="form-control" id="matKhau" name="matKhau"
                            value="<?=$matKhau?>">
                    </div>
                    <div class="form-group">
                        <label for="hoTen">Họ tên:</label>
                        <input required="true" type="varchar" class="form-control" id="hoTen" name="hoTen"
                            value="<?=$hoTen?>">
                    </div>
                    <div class="form-group flexGener">
                        <div for="gender" class="gender">Giới tính: </div>
                        <div class="gender-container">
                                        <label for="male">Nam</label>
                                        <input type="radio" name="gender" id="male" value="Nam" <?php if (isset($gioiTinh)) echo ($gioiTinh == "Nam") ? "checked" : "";  ?>>
                                        <label for="female">Nữ</label>
                                        <input type="radio" name="gender" id="female" value="Nữ" <?php if (isset($gioiTinh)) echo ($gioiTinh == "Nữ") ? "checked" : "";  ?>>
                                    </div>
                       </div>
                    <div class="form-group">
                        <label for="ngaySinh">Ngày Sinh:</label>
                        <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?=$ngaySinh?>">
                    </div>
                    <div class="form-group">
                        <label for="SDT">SĐT:</label>
                        <input type="varchar" class="form-control" id="SDT" name="SDT" value="<?=$SDT?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="varchar" class="form-control" id="email" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa Chỉ:</label>
                        <input type="varchar" class="form-control" id="diaChi" name="diaChi" value="<?=$diaChi?>">
                    </div>
                    <div class="form-group">
                    <label for="chucVu" >Chức vụ:</label>
                        <select id="chucVu" name="chucVu">
                            <option><?=$chucVu?></option>
                            <option value="admin">Admin</option>
                            <option value="nhanvien">Nhân Viên</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar:</label>
                        <input type="file" class="form-control" id="avatar" name="file" value="<?=$avatar?>">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>    
</body>

</html>

<?php } else{ 
    echo"404 ERROR!!!"?>
<?php }?>