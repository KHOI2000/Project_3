<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}
$sql1="delete from lichsumuahang where IDSP =" .$ID;
mysqli_query(connect(), $sql1);
$sql2 = "delete from danhgiasanpham where IDSP =".$ID;
mysqli_query(connect(), $sql2);
$sql3 = "delete from giohang where IDSP =".$ID;
mysqli_query(connect(), $sql3);
$sql4 = "delete from khohang where IDSP =".$ID;
mysqli_query(connect(), $sql4);
$sql5 = "delete from sanpham where ID = " . $ID;
mysqli_query(connect(), $sql5);

header("Location: quantri.php?page_layout=danhsachSP");
mysqli_close(connect());
?>