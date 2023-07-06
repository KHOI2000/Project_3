<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}
if (isset($_GET['ThoiGianDH'])) {
    $ThoiGianDH = $_GET['ThoiGianDH'];
}
$sql = "delete from donhang where IDKhachHang = '".$ID."' and ThoiGianDH = '".$ThoiGianDH."'";
mysqli_query(connect(),$sql);
header("Location: quantri.php?page_layout=danhsachDH");
mysqli_close(connect());
?>