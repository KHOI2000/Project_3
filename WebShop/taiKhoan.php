<?php
    if(session_id() === '')
        session_start();
  ob_start();

require 'PHP/function.php';



//thông tin thay đổi
$SDT = isset($_POST["SDT"]) ? $_POST["SDT"] : null;
$username = isset($_POST["username"]) ? $_POST["username"] : null;
$address = isset($_POST["address"]) ? $_POST["address"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;
$tenDangNhap = isset($_SESSION['tenDangNhap']) ? $_SESSION['tenDangNhap'] : null;
$ngaySinh = isset($_POST['birthday']) ? $_POST['birthday'] : null;
$gioiTinh = isset($_POST['gender']) ? $_POST['gender'] : null;


//mật khẩu thay đổi
$newPass = isset($_POST['new_password']) ? $_POST['new_password'] : null;
$confirmPass = isset($_POST['new_password_cf']) ? $_POST['new_password_cf'] : null;

//nhấn lưu thông tin
if (isset($_POST["btn_edit"])) {
    require('Config.php');

    $sql = "SELECT * FROM taikhoan where taikhoan.ID = '" . $IDKH . "'";
    $result = mysqli_query(connect(), $sql);

    if ($row = mysqli_fetch_array($result)) {
        $nowPassword = $row["matKhau"];

        if ($_POST['cur_password'] == $nowPassword) {
            $updateKH = "UPDATE `khachhang` SET `hoTen` = '" . $username . "' , `email` = '" . $email . "' , `diaChi` = '" . $address . "' , `gioiTinh` = '" . $gioiTinh . "' , ngaySinh = '" . $ngaySinh . "' , SDT = '" . $SDT . "' WHERE `khachhang`.`tenDangNhap` = '" . $tenDangNhap . "'";
            mysqli_query(connect(), $updateKH);

            //Cập nhật lại thông tin hiển thị
            $_SESSION['hoTen'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['diachi'] = $address;
            $_SESSION['SDT'] = $SDT;
            $_SESSION['ngaySinh'] = $ngaySinh;
            $_SESSION['gioiTinh'] = $gioiTinh;
        } else {
            $error["cur_password"] = "Mật khẩu hiện tại không chính xác";
        }
    }

    mysqli_close(connect());
}

if (isset($_POST['submit_img'])) {
    require('Config.php');
    if (isset($_FILES["file"])) {
        if (empty($_FILES["file"]['name'])) {
            $error["file"] = "File ảnh trống";
        } else {
            $dir = "Image/avatar/";
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


            //coppy file
            if (empty($error["file"])) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
                    $updateImg = "UPDATE `khachhang` SET `avatar` = '" . $file . "' WHERE `khachhang`.`tenDangNhap` = '" . $tenDangNhap . "'";
                    $_SESSION['image'] = "{$file}";
                    mysqli_query(connect(), $updateImg);
                    $dir = getcwd();
                    $img_dir = $dir . "/Image/avatar/";
                    chdir($img_dir);
                    $files = glob("*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);
                    chdir($dir);
                    foreach ($files as $item) {
                        $sqlImg = "SELECT `avatar` FROM `khachhang` WHERE `avatar` = 'Image/avatar/{$item}'";
                        $result = mysqli_query(connect(), $sqlImg);
                        if ($result) {
                            $row = mysqli_num_rows($result);
                            if ($row > 0) {
                                // echo "save : ".$file;
                            } else {
                                unlink("Image/avatar/{$item}");
                            }
                        }
                    }
                }
            }
        }
    }
}

//nhấn lưu mật khẩu
if (isset($_POST["btn_editPassWord"])) {
    require('Config.php');
    $sql = "SELECT * FROM taikhoan where taikhoan.ID = '" . $IDKH . "'";
    $result = mysqli_query(connect(), $sql);

    if ($row = mysqli_fetch_array($result)) {
        $nowPassword = $row["matKhau"];

        if ($_POST['cur_ChangedPassword'] == $nowPassword) {
            //mật khẩu mới và mật khẩu nhập trùng thì thay đổi mật khẩu
            if ($newPass == $confirmPass) {
                $updateKH = "UPDATE `taikhoan` SET `matKhau` = '" . $newPass . "' WHERE `taikhoan`.`ID` = '" . $IDKH . "'";
                mysqli_query(connect(), $updateKH);
            } else {
                $error["cf_password"] = "Mật khẩu nhập lại không khớp với mật khẩu mới";
            }
        } else {
            $error["cur_ChangedPassword"] = "Mật khẩu hiện tại không chính xác";
        }
    }
}

?>

<?php
require('Widget/Menu.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/taiKhoan.css">
</head>

<body>
    <section class="account-container">
        <div class="title">
            <h1>Tài khoản</h1>
        </div>

        <div class="edit-account">
            <form action="" method="POST" id="form-account" enctype="multipart/form-data">
                <div style="position:relative;" class="account__avatar">
                    <img src="<?php echo $_SESSION['image']; ?>" alt="">
                    <input style="width: 205px;" id="Changed_avatar" name="file" type="file">
                    <input id="submit_img" name="submit_img" type="submit" value="Cập nhật">
                    <p style="top: 199px;
    width: 204px;
    text-align: center;" class="input-error"><?php echo showError('file') ?></p>
                </div>

                <div class="account-left">
                    <div>
                        <h3>Thay đổi thông tin</h3>
                        <div class="col">
                            <div class="col-2">
                                <div class="row pd-r">
                                    <label>Tên hiển thị<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="username" value="<?php echo $_SESSION['hoTen']; ?>">
                                </div>
                                <div class="row pd-l">
                                    <label for="gender">Giới tính</label>
                                    <div class="gender-container">
                                        <label for="male">Nam</label>
                                        <input type="radio" name="gender" id="male" value="Nam" <?php if (isset($_SESSION['gioiTinh'])) echo ($_SESSION['gioiTinh'] == "Nam") ? "checked" : "";  ?>>
                                        <label for="female">Nữ</label>
                                        <input type="radio" name="gender" id="female" value="Nữ" <?php if (isset($_SESSION['gioiTinh'])) echo ($_SESSION['gioiTinh'] == "Nữ") ? "checked" : "";  ?>>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col">
                            <div class="col-2">
                                <div class="row pd-r">
                                    <label>Địa chỉ Email</label>
                                    <input type="text" class="input-text" name="email" value="<?php echo $_SESSION['email']; ?>" id="email">
                                </div>
                                <div class="row pd-l">
                                    <label>Địa chỉ giao hàng<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="address" value="<?php echo $_SESSION['diachi']; ?>" id="address">
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="row pd-r">
                                    <label>Số điện thoại<span class="required">*</span></label>
                                    <input type="text" class="input-text" name="SDT" value="<?php echo $_SESSION['SDT']; ?>" id="SDT">
                                </div>
                                <div class="row pd-l">
                                    <label for="birthday">Ngày sinh</label>
                                    <input type="date" name="birthday" id="birthday" value="<?php echo $_SESSION['ngaySinh'] ?>">
                                </div>
                            </div>

                            <div class="row">
                                <label>Mật khẩu hiện tại</label>
                                <input type="password" class="input-text" name="cur_password" value="">
                                <div class="input-error"><?php echo showError('cur_password') ?></div>
                            </div>
                        </div>
                        <input type="submit" name="btn_edit" value="Lưu thay đổi">
                    </div>
                </div>
            </form>

            <form action="" method="POST" id="form-password">
                <div class="account-right">
                    <h3>Thay đổi mật khẩu</h3>

                    <div class="row">
                        <label>Mật khẩu hiện tại</label>
                        <input type="password" class="input-text" name="cur_ChangedPassword" value="">
                        <div class="input-error"><?php echo showError('cur_ChangedPassword') ?></div>
                    </div>

                    <div class="row">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="input-text" name="new_password" value="">
                    </div>
                    <div class="row">
                        <label>Xác nhận mật khẩu mới</label>
                        <input type="password" class="input-text" name="new_password_cf" value="">
                        <div class="input-error"><?php echo showError('cf_password') ?></div>
                    </div>

                    <input type="submit" name="btn_editPassWord" value="Đổi mật khẩu">
                </div>
            </form>
        </div>
    </section>
</body>

</html>
<?php
require('Widget/Footer.php');
?>