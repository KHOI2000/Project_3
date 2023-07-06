<?php
    session_start();

    //hủy session Logined
    unset($_SESSION['Logined']);
    unset($_SESSION['IDKH']);
    
    //trở về trang chủ
    header("location: http://localhost:3000/TrangChu.php");
?>