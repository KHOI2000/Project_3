<?php
session_start();
$connect = mysqli_connect("db","root","example","quanlyshop");

//thêm bình luận

if (isset($_SESSION['Logined'])) {
    $IDSP = isset($_SESSION['IDSP']) ? $_SESSION['IDSP'] : null;
    $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;
    $date = new DateTime();
    $binhLuan = isset($_POST["review"]) ? $_POST["review"] : null;
    $rating = ceil($_POST["rating"]);

    $insertReview = "INSERT INTO `danhgiasanpham`(`IDKH`, `IDSP`, `binhLuan`, `ngayBinhLuan`, `star`) VALUES ('" . $IDKH . "' , '" . $IDSP . "' , '" . $binhLuan . "' , '" . $date->format('Y-m-d') . "','$rating')";
    
    mysqli_query($connect, $insertReview);

    header("location: /ChiTietSP.php");
} else
    header("location: /DangNhap.php");

mysqli_close($connect);
