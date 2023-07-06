<?php
        if(isset($_POST['submitEmail']))
        {
            require "PHPMailer-master/src/PHPMailer.php"; 
            require "PHPMailer-master/src/SMTP.php"; 
            require 'PHPMailer-master/src/Exception.php'; 

            //thời gian thực của việt nam
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $email = isset($_POST['sendEmail']) ? $_POST['sendEmail'] : null;
            $hoTen = isset($_SESSION['hoTen']) ? $_SESSION['hoTen'] : null;
            $date = date('d/m/Y H:i:s');
            $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:xử lý lỗi nếu có

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
                $mail->Subject = "Thông báo Đăng ký nhận tin từ Wibugangz"; //tiêu đề thư
                $noidungthu = "<div class='Main__Mailer'
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

                                    <h2 style='text-align: center'>Cảm ơn bạn đã đăng ký</h2>

                                    <div style='margin: 0 87px;'>
                                        <h3>Xin chào:$hoTen</h3>
                                        <p><b>Ngày:</b>$date</p>
                                        <p style='color: rgb(119,119,119)'>Chúc mừng bạn đăng ký nhận tin từ Wibugangz thành công!!!
                                        <hr> 
                                        <p style='color: rgb(119,119,119); line-height: 1.7;'>
                                            Bạn vui lòng để ý Mail để nhận được các sự kiện hấp dẫn từ Wibugangz. <br>
                                            Các thông tin đơn hàng sẽ được thông báo qua gmail của bạn.
                                        </p>
                                    </div>                   
                                </div>"; 
                $mail->Body = $noidungthu; //nội dung thư
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send(); //gủi mail
            } catch (Exception $e) {
            }
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Footer.css">
    <title>Document</title>
</head>

<body>

<div class="Main-bottom">
        <div class="Footer">
            <div class="Main-Infor">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                
                <div>
                    <img src="/Image/Icon/address_Bot.png"><a href="">108 Nguyễn Lân</a>
                </div>

                <div>
                    <img src="/Image/Icon/phone_Bot.png" alt=""><a href="">0923100282</a>
                </div>

                <div>
                    <img src="/Image/Icon/gmail_Bot.png" alt=""><a href="">tvkhoibk@gmail.com</a>
                </div>

                <div>
                    <img src="/Image/Icon/facebook_Bot.png" alt=""><a href="https://www.facebook.com/khoi2807">facebook.com/Wibugangz</a>
                </div>

                <div>
                    <img src="/Image/Icon/instagram_Bot.png" alt=""><a href="">khoitran</a>
                </div>
            </div>

            <div class="Main-Introduce">
                <h3>VỀ CHÚNG TÔI</h3>
                <div>
                    <img src="/Image/Icon/personal.png"><a href="TrangChu.php">Trang chủ</a>
                </div>

                <div>
                    <img src="/Image/Icon/personal.png"><a href="GioiThieu.php">Giới thiệu</a>
                </div>

                <div>
                    <img src="/Image/Icon/personal.png"><a href="DonMua.php">Mua hàng</a>
                </div>

                <div>
                    <img src="/Image/Icon/personal.png"><a href="">Hệ thống quản lý</a>
                </div>

                <div>
                    <img src="/Image/Icon/personal.png"><a href="">Tin tức</a>
                </div>

                <div>
                    <img src="/Image/Icon/personal.png"><a href="LienHe.php">Liên hệ</a>
                </div>
            </div>

            <div class="Main-Category">
                <h3>DANH MỤC SẢN PHẨM</h3>

                <div>
                    <img src="/Image/Icon/shirt.png" alt=""><a>Áo</a>
                </div>

                <div>            
                    <img src="/Image/Icon/pant.png" alt=""><a>Quần</a>
                </div>

                <div>
                    <img src="/Image/Icon/shoes.png" alt=""><a>Giày</a>
                </div>

                <div>
                    <img src="/Image/Icon/bag.png" alt=""><a>Ba Lô</a>
                </div>

                <div>
                    <img src="/Image/Icon/hat.png" alt=""><a>Mũ</a>
                </div>

                <div>
                    <img src="/Image/Icon/clothesman.png" alt=""><a>Đồ Nam</a>
                </div>

                <div>
                    <img src="/Image/Icon/clothesGirl.png" alt=""><a>Đồ Nữ</a>
                </div>
            </div>

            <div id="Main-Image">
                <h3>KẾT NỐI MẠNG XÃ HỘI</h3>
                <div class="img">
                    <img class="Icon-Contact" src="/Image/Icon/facebook.png" alt="">
                    <img class="Icon-Contact" src="/Image/Icon/instargam.png" alt="">
                    <img class="Icon-Contact" src="/Image/Icon/twitter.png" alt="">
                    <img class="Icon-Contact" src="/Image/Icon/gmail.png" alt="">
                </div>

                <div class="Main-Image__sendMail">
                    <form action="" method="POST">
                        <h4 style="margin-bottom:10px;">Đăng ký nhận tin</h4>
                        <input class="Main-Image__sendMail__enterMail" name="sendEmail" placeholder="Nhập email của bạn" type="Text" name="" value="">
                        <input name="submitEmail" class="Main-Image__sendMail__Submit" type="Submit">
                    </form>
                </div>
            </div>
        </div>
        
        <div class="Coppyright">
            <p>Website @ độc quyền bởi team <b>Wibugangz</b> </p>
        </div>
    </div>
</body>
</html>
