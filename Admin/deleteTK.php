<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}
$sql1="delete from giohang where IDKH =" .$ID;
mysqli_query(connect(),$sql1);
$sql2="delete from lichsumuahang where IDKH =" .$ID;
mysqli_query(connect(),$sql2);
$sql3="delete from danhgiasanpham where IDKH = " .$ID;
mysqli_query(connect(),$sql3);
$sql4="delete from donhang where IDKhachHang = " .$ID;
mysqli_query(connect(),$sql4);
$sql5 = "delete from taikhoan where ID = " . $ID;
mysqli_query(connect(), $sql5);
$sql6 = "delete from khachhang where ID = " . $ID;
mysqli_query(connect(), $sql6);

header("Location:quantri.php?page_layout=danhsachKH");
mysqli_close(connect());
?>

