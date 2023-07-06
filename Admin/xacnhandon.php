<?php
ob_start();
    require('Config.php');

    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
    }

    mysqli_query(connect(),"set names 'utf8'");
    $sql1 = "UPDATE donhang SET trangThai = 'Đã Duyệt' where IDKhachHang = '".$ID."'";
    mysqli_query(connect(),$sql1);
    $sql2 = "SELECT * from khachhang where ID = '".$ID."'";
    $result2=mysqli_query(connect(),$sql2);
    $row2=mysqli_fetch_array($result2);

    if(isset($row2['email']))
        {
            require "PHPMailer-master/src/PHPMailer.php"; 
            require "PHPMailer-master/src/SMTP.php"; 
            require 'PHPMailer-master/src/Exception.php'; 

            //thời gian thực của việt nam
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $email = isset($row2['email']) ? $row2['email'] : null;
            $hoTen = isset($row2['hoTen']) ? $row2['hoTen'] : null;
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
                $mail->Subject = "[WibugangZ] - Xác Nhận Đơn Hàng"; //tiêu đề thư
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

                                    <h2 style='text-align: center'>Cảm ơn bạn đã đặt hàng</h2>

                                    <div style='margin: 0 87px;'>
                                        <h3>Xin chào:$hoTen</h3>
                                        <p><b>Ngày:</b>$date</p>
                                        <p style='color: rgb(119,119,119)'>Đơn Hàng Của Bạn Đã Được Xác Nhận!!!
                                        <hr> 
                                        <p style='color: rgb(119,119,119); line-height: 1.7;'>
                                            Bạn vui lòng để ý Mail để nhận được thông tin chi tiết đơn hàng. <br>
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
        header('location:quantri.php?page_layout=danhsachDH');

        mysqli_close(connect());
        ob_end_flush();
?>
