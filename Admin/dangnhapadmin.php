<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dangnhapadmin.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="animated bounceInDown">
        <form name="form1" class="box" method="POST" action="quantri.php">

            <div class="container">
                <h4>Ad<span>min</span></h4>
                <h5>Đăng nhập tài khoản của bạn.</h5>
                <input type="text" name="tenDangNhap" placeholder="Username">
                <input type="password" name="matKhau" placeholder="Passsword">
                <div class="input-error" style="color: red">
                    <a href="#" class="forgetpass"></a>
                </div>
                <input type="submit" value="Đăng Nhập" class="btn1">
                <a href="#" class="dnthave"></a>
            </div>
        </form>

    </div>
</body>

</html>