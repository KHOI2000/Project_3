<?php
    session_start();

    //hủy session Logined
    unset($_SESSION['admin']);
    
    //trở về trang chủ
    header("location: dangnhapadmin.php");
?>