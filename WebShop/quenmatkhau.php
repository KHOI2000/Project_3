
<?php
    require('PHP/function.php');
    require('Config.php');

    if(isset($_POST['submitEmail']))
    {
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php'; 

        $taiKhoan = isset($_POST['taiKhoan']) ? $_POST['taiKhoan'] : null;
        $capCha = isset($_POST['capcha']) ? $_POST['capcha'] : null;
        $checkCapcha = isset($_POST['checkCapcha']) ? $_POST['checkCapcha'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $date = date('d/m/Y H:i:s');

        $query = "select * from khachhang as kh where kh.tenDangNhap = '" . $taiKhoan . "'";
        $result = mysqli_query(connect(),$query);

        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_array($result);

            $hoTen = $row['hoTen'];

            $checkMail = $row['email'];

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:xử lý lỗi nếu có
            if($checkCapcha === $capCha)
            {
                //strcmp so sanh 2 chuoi phân biệt hoa thường = 0 2 chuỗi bằng nhau > 0 chuỗi 1 lớn hơn < 0 chuỗi 1 nhỏ hơn chuỗi 2
                if(strcmp($email,$checkMail) == 0)
                {
                    try {
                        $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
                        $mail->isSMTP();  
                        $mail->CharSet  = "utf-8";
                        $mail->Host = 'smtp.gmail.com';  //địa chỉ mail sever gmail
                        $mail->SMTPAuth = true; // Enable authentication
                        $mail->Username = 'dockerwebshop@gmail.com'; //TK email gửi
                        $mail->Password = 'ipvjvcxsznalwxxy';   // pass email gửi
                        $mail->SMTPSecure = 'ssl';  // encryption SSL/Port = 465  TSL/Port = 587
                        $mail->Port = 465;  // port to connect to                
                        $mail->setFrom('dockerwebshop@gmail.com', 'Wibugangz' ); //địa chỉ email người gửi
                        $mail->addAddress($email, $hoTen); //mail và tên người nhận  
                        $mail->isHTML(true);  // Set email format to HTML
                        $mail->Subject = 'Quên mật khẩu'; //tiêu đề thư
                        
                        $newPassWord = "";
        
                        //tạo mật khẩu mới random
                        for($i = 0; $i < 5; $i++)
                        {
                            $newPassWord = $newPassWord .random_int(1,9);
                        }
        
                        //update mật khẩu trong database
                        $update = "update taikhoan set matKhau = '".$newPassWord."' where tenDangNhap = '".$taiKhoan."'";
                        mysqli_query(connect(),$update);
        
                        $mail->Body = 
                                    "<div class='Main__Mailer'
                                                style='
                                                    background: #f3f3f3;
                                                    width: 700px;
                                                    height: 500px;
                                                    border-radius: 10px;
                                                    color: #252a2b;                         
                                                '>
                                                <img style='
                                                        width: 150px; 
                                                        height: 150px; 
                                                        margin: 10px 40%;
                                                        border-radius: 50%;'  
                                                        src='https://adtimin.vn/wp-content/uploads/2017/09/Logo-1.jpg' >  

                                                <h2 style='text-align: center'>Quên mật khẩu</h2>

                                                <div style='margin: 0 87px;'>
                                                    <h3>Xin chào:$hoTen</h3>
                                                    <p><b>Ngày:</b>$date</p>
                                                    <p style='color: rgb(119,119,119)'>Chúc mừng bạn lấy mật khẩu mới thành công!!!
                                                    <hr> 
                                                    <p style='color: rgb(119,119,119); line-height: 1.7;'>
                                                        Mật khẩu mới:  <b style='font-weight: bold'>$newPassWord</b>
                                                        <br>
                                                        Bạn vui lòng đổi mật khẩu mạnh hơn
                                                        <br>
                                                        Hãy bảo quản thông tin kỹ lưỡng tránh tình trạng tổn thất về tiền bạc.
                                                        <br>
                                                        Nếu bạn có câu hỏi nào hãy liên hệ với shop để được giúp đỡ nhanh nhất!!!
                                                        <br>Wibugangz xin cảm ơn bạn.
                                                    </p>
                                                </div>                   
                                            </div>"; 
                        $mail->smtpConnect( array(
                            "ssl" => array(
                                "verify_peer" => false,
                                "verify_peer_name" => false,
                                "allow_self_signed" => true
                            )
                        ));
                        $mail->send(); //gủi mail
                        $error['capcha'] = "Lấy lại mật khẩu thành công! Mật khẩu mới đã được gửi vào Email.";
                    } catch (Exception $e) {
                    }
                }
                else
                    $error['capcha'] = "Email bạn nhập chưa được liên kết tài khoản";
            }
            else
                $error['capcha'] = "Nhập sai capcha vui lòng nhập lại";
        }
        else
            $error['capcha'] = "Tài khoản không tồn tại";
    }
     mysqli_close(connect());
?>
<!DOCTYPE html>
<html id="backGround" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/quenmatkhau.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    </style>
</head>

<body style="background: linear-gradient(to right, #bdc3c7,#2c3e50);">
    <div class="Container_Reget">
        <div>
            <h1>QUÊN MẬT KHẨU</h1>
        </div>
        <form action="" method="POST">
            <div class="Main__Foget" align="center">
                    <div>
                        <h4>Nhập tài khoản </h4>
                        <input type="text" name="taiKhoan" placeholder="Nhập tài khoản">
                    </div>

                    <div>
                        <h4>Nhập Email</h4>
                        <input type="text" name="email" placeholder="Nhập Email của bạn">
                    </div>

                    <div>
                        <h4>Nhập mã xác nhận</h4>
                        <input style="width:240px; height: 40px" name="checkCapcha" type="text" name="Capcha" >
                        <span class="Main__Foget__Capcha">
                            <input type="text" id="codeCapcha" readonly name="capcha" value="A1dT2"></input>
                            <i class="fa-solid fa-arrow-rotate-right" onclick="changedCapcha();"></i></input>
                        </div>
                    </div>

                    <div>
                        <p style="color: red; text-align:center; font-weight:bold;">
                        <?php 
                            if(!empty(showError('capcha')))
                            {        
                                echo showError('capcha');?>
                            <script> changedCapcha();</script>
                                
                        <?php } ?></p>
                    </div>

                    <input class="Main__Foget__subMit" type="Submit" name="submitEmail" value="Xác Nhận">
                    <h5 class="Main__Foget__backLogin">Trở về trang <a href="DangNhap.php">Đăng nhập</a></h5>

            </div>
        </form>

        <script>
            function changedCapcha()
            {
                //các số và từ
                var permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                var code = "";
                for(var i = 0; i < 5; i++)
                {
                    //tạo random
                    var randomCode = permitted_chars.charAt(Math.floor(Math.random() * permitted_chars.length));
                    
                    //nối chuỗi
                    code = code + randomCode;                  
                }
                console.log(code);
                var capcha = document.getElementById('codeCapcha').value = code;
            }
        </script>
    </div>
</body>
</html>