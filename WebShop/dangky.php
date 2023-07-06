<?php
require "PHP/function.php";
require('Config.php');

if (!empty($_POST)) {
    $error = array();
    if (isset($_POST['tenDangNhap'])) {
        $tenDangNhap = $_POST['tenDangNhap'];
    }
    if (isset($_POST['matKhau'])) {
        $matKhau = $_POST['matKhau'];
    }
    if (isset($_POST['nhapLaiMatKhau'])) {
        $nhapLaiMatKhau = $_POST['nhapLaiMatKhau'];
    }
    if (isset($_POST['hoTen'])) {
        $hoTen = $_POST['hoTen'];
    }
    if (isset($_POST['SDT'])) {
        $SDT = $_POST['SDT'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }

    
    if($tenDangNhap == null)
        $error["TK"] = "Tài Khoản Không Được Để Trống";
    else
    {
        if ($nhapLaiMatKhau == $matKhau) {
            $sql = "SELECT * FROM khachhang WHERE email = '$email'";
            $result = mysqli_query(Connect(), $sql);
            if (!$result->num_rows > 0) {
                $sql1 = "insert into taikhoan(tenDangNhap,matKhau,kiemTra) values ('" . $tenDangNhap . "','" . $matKhau . "',0)";
                $sql2 = "INSERT INTO khachhang(tenDangNhap, SDT, hoTen,email)
    
                VALUES ('" . $tenDangNhap . "','" . $SDT . "','" . $hoTen . "','" . $email . "')";
                if (mysqli_query(Connect(), $sql1) && mysqli_query(Connect(), $sql2)) {
                    setcookie("btTaiKhoan", $taiKhoan, time() - 3600);
                    setcookie("btMatKhau", $matKhau, time() - 3600);
                    setcookie("user_login", $_POST['remember_me'], time() - 3600);
                    header("location: DangNhap.php");
                }
            } 
            else 
            {
                $error["email"] = "Email đã tồn tại";
            }
        } 
        else 
        {
            $error["rePas"] = " Mật khẩu không chính xác";
        }
    }  
}
    mysqli_close(Connect());
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dangky.css">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/scrollreveal"></script>

    <style>
        form {
            padding: 10px 20px;
        }

        h4 {
            margin: 0;
        }

        #login {
            display: flex;
            margin: 10px 0 0 16%;
        }

        .input-group {
            position: relative;
        }

        .input-error {
            color: red;
            position: absolute;
            bottom: -8px;
            left: 34px;
            font-size: 12px;
        }

        .container {
            background: white;
            box-shadow: 1px 1px 30px rgb(120 127 129);
            border: 0;
        }

        .box input[type="text"],
        .box input[type="password"],
        .box input[type="repass"],
        .box input[type="email"] {
            background: #fff;
            border: 1px solid gray;
            color: #352f2f;
            padding-left: 40px;
            margin: 0;
        }

        .btn1 {
            margin-top: 10px;
        }

        .box h4 {
            margin: 0;
            color: #000;
        }

        .box input:focus {
            border: 1.2px solid #000;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
            height: 68px;
            margin-left: 20px;
        }

        i {
            position: absolute;
            left: 14px;
        }

        html {
            background-color: linear-gradient(to right, #bdc3c7, #2c3e50);
        }
    </style>
</head>

<body>
    <div class="container">
        <span class="error animated tada" id="msg"></span>
        <form name="form1" class="box" onsubmit="" action="" method="POST">
            <h4 style="margin: 0">Đăng ký<span style="color: #000;"> tài khoản</span></h4>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="tenDangNhap" value="<?php echo get_data("tenDangNhap") ?>" placeholder="Tên đăng nhập">
                <div class="input-error"><?php echo  showError('TK') ?></div>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-user"></i>

                <input type="text" name="hoTen" value="<?php echo get_data("hoTen") ?>" placeholder="Họ Và Tên" id="hoTen">
            </div>


            <div class="input-group">
                <i class="fa-solid fa-phone"></i>
                <input type="text" name="SDT" value="<?php echo get_data("SDT") ?>" placeholder="Số Điện Thoại" id="sdt">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" name="email" value="<?php echo get_data("email") ?>" placeholder="Email" id="email">
                <div class="input-error"><?php echo  showError('email') ?></div>
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="matKhau" placeholder="Mật khẩu" id="pwd">
            </div>
            <div class="input-group">
                <i class="fa-solid fa-lock"></i>

                <input type="password" name="nhapLaiMatKhau" placeholder="Nhập lại mật khẩu" id="repwd">
                <div class="input-error"><?php echo  showError('rePas') ?></div>
            </div>
            <input type="submit" name="btnRegister" value="Đăng Ký" class="btn1">
            <div class="login" id="login">
                <h4 style="margin-right: 10px;">Bạn đã có tài khoản?</h4>
                <a href="./DangNhap.php">Đăng nhập</a>
            </div>
        </form>
    </div>

    <script>
        ScrollReveal({
            reset: true,
            duaration: 1500,
            delay: 25,
            distance: '150px',
        });

        ScrollReveal().reveal('.container',{delay: 200, origin: 'top'});
        ScrollReveal().reveal('.input-group',{delay: 300, origin: 'left', interval: 5});
        ScrollReveal().reveal('.btn1',{delay: 400, origin: 'left'});
        ScrollReveal().reveal('.login',{delay: 400, origin: 'left'});

    </script>
</body>

</html>