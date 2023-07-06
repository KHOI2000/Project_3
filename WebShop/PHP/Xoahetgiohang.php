<?php
    $connect = mysqli_connect("db","root","example","quanlyshop");
    session_start();
    
    $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;

    $gioHang = "delete from giohang where IDKH = '".$IDKH."'";

    mysqli_query($connect,$gioHang);

    header("location: /GioHang.php");
    mysqli_close($connect);
?>
