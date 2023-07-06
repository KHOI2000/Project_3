<?php
    $connect = mysqli_connect("db","root","example","quanlyshop");

    $ID = $_GET['IDGH'];

    $delete = "delete FROM giohang where giohang.ID = '".$ID."'";

    $result = mysqli_query($connect,$delete);

    header("location: /GioHang.php");

    mysqli_close($connect);
?>