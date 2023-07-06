<?php
    require_once("PHP/function.php");
    require('Config.php');

    session_start();

if (isset($_POST['btTaiKhoan']) && isset($_POST['btMatKhau'])) {
    $taiKhoan = $_POST['btTaiKhoan'];
    $matKhau = $_POST['btMatKhau'];
    $query = "select * from taikhoan as tk where tk.tenDangNhap = '" . $taiKhoan . "' and tk.matKhau = '" . $matKhau . "'";

    $result = mysqli_query(Connect(), $query);
    $numLogin = mysqli_num_rows($result);

    //nếu tồn tại cookie theo tên tài khoản đăng nhập sai quá 5 lần
    if(isset($_COOKIE["'".$taiKhoan."'"]))
    {
        $error["login"] = "Bạn đăng nhập sai quá 5 lần thử lại sau 30p!!!";
    }
    else
    {
        //nếu tài khoản và mật khẩu đúng thì cho đăng nhập
        if ($numLogin > 0) {
            $queryInfor = "select * from khachhang as kh where kh.tenDangNhap = '" . $taiKhoan . "'";
            $resultInfor = mysqli_query(Connect(), $queryInfor);
    
            $_SESSION['Logined'] = $taiKhoan;
    
            if ($rowInfor = mysqli_fetch_array($resultInfor)) {
                $_SESSION['tenDangNhap'] = $rowInfor['tenDangNhap'];
                $_SESSION['IDKH'] = $rowInfor['ID'];
                $_SESSION['hoTen'] = $rowInfor['hoTen'];
                $_SESSION['image'] = $rowInfor['avatar'];
                $_SESSION['gioiTinh'] = $rowInfor['gioiTinh'];
                $_SESSION['ngaySinh'] = $rowInfor['ngaySinh'];
                $_SESSION['SDT'] = $rowInfor['SDT'];
                $_SESSION['email'] = $rowInfor['email'];
                $_SESSION['diachi'] = $rowInfor['diaChi'];
            }
            
            if(isset($_POST['remember_me'])) {
                setcookie("btTaiKhoan",  $taiKhoan, time() + 3600);
                setcookie("btMatKhau", $matKhau, time() + 3600);
                setcookie("user_login", $_POST['remember_me'], time() + 3600);
            } else {
                setcookie("btTaiKhoan", $taiKhoan, time() - 3600);
                setcookie("btMatKhau", $matKhau, time() - 3600);
                setcookie("user_login",$_POST['remember_me'], time() - 3600);
            }
            header("location: /TrangChu.php");
        }
        else
        {
            //lấy số lần kiểm tra tài khoản
            $queryTK = "select * from taikhoan where tenDangNhap = '".$taiKhoan."'";
            $resultTK = mysqli_query(Connect(),$queryTK);
            $rowTK = mysqli_fetch_array($resultTK);
            if(mysqli_num_rows($resultTK) > 0)
            {
                //số lần đăng nhập sai + 1
                $loginFail = $rowTK['kiemTra'] + 1;
                    
                //cập nhật lại số lần đăng nhập sai vào bang taikhoan cột kiemtra
                $update = "UPDATE taikhoan set kiemTra = '".$loginFail."' WHERE tenDangNhap = '".$taiKhoan."'";
                mysqli_query(Connect(),$update);

                //nếu đăng nhập sai 5 lần
                if($loginFail >= 5)
                {
                    //tạo cookie hết hạn sau 30p mới cho phép đăng nhập
                    setcookie("'".$taiKhoan."'","đăng nhập sai quá 5 lần",time() + 1800, "/", "",  0);

                    //cập nhật lại kiemtra = 0
                    $updateFail = "UPDATE taikhoan set kiemTra = 0 Where tenDangNhap = '".$taiKhoan."'";
                    mysqli_query(Connect(),$updateFail);
                }   
                else
                    $error["login"] = "Tên đăng nhập hoặc mật khẩu không đúng";
            }   
        }
    }
    
}

mysqli_close(Connect());
?>

<!DOCTYPE html>
<html id="backGround" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/DangNhap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body style="background: linear-gradient(to right, #bdc3c7,#2c3e50);">
    <div class="Container_Login">
        <div>
            <h1>ĐĂNG NHẬP</h1>
        </div>

        <div class="Main-Login">
            <form action="" method="POST">
                <div class="Main_Input">
                <i class="fa-solid fa-user"></i>
                    <input value="<?php echo get_data_cookie("btTaiKhoan") ;?>" class="account" type="text" name="btTaiKhoan" placeholder="Tài Khoản" value="">
                </div>
                <div class="Main_Input">
                <i class="fa-solid fa-lock"></i>
                    <input value="<?php echo get_data_cookie("btMatKhau"); ?>" class="account" type="password" name="btMatKhau" placeholder="Mật Khẩu" value="">
                    <div class="input-error"><?php echo  showError('login') ?></div>
                </div>
                <div class="Remember_Forgot_PassWord">
                    <label class="remember">
                        <input name="remember_me"type="checkbox" <?php if (!empty($_COOKIE['user_login'])) echo "checked";?> >
                        <p>Nhớ mật khẩu</p>
                    </label>

                    <div class="forgot">
                        <a href="quenmatkhau.php">Quên mật khẩu</a>
                    </div>
                </div>

                <input class="btLogin" type="submit" value="Đăng Nhập">
            </form>
        </div>


        <div class="Loing_MXH">
            <div class="Loing_MXH Facebook">
                <img src="Image\DangNhap\fac.png" alt="">
                <a href="#">Facebook</a>
            </div>

            <div class="Loing_MXH Twitter">
                <img src="Image\DangNhap\twitter.png" alt="">
                <a href="#">Twitter</a>
            </div>
        </div>

        <div id="Register">
            <h4>Bạn mới biết đến Wibugangz?</h4>
            <a href="./dangky.php">Đăng Ký</a>
        </div>
    </div>

    <script>
        ScrollReveal({
            reset: true,
            duaration: 1500,
            delay: 25,
            distance: '150px',
        });

        ScrollReveal().reveal('.Container_Login',{delay: 200, origin: 'top'});
        ScrollReveal().reveal('.Container_Login h1',{delay: 300, origin: 'left'});
        ScrollReveal().reveal('.Main_Input',{delay: 300, origin: 'left'});
        ScrollReveal().reveal('.remember',{delay: 200, origin: 'left'});
        ScrollReveal().reveal('.forgot',{delay: 200, origin: 'left'});
        ScrollReveal().reveal('.btLogin',{delay: 200, origin: 'left'});
    </script>
</body>

</html>