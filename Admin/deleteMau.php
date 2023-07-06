<?php
require('Config.php');
if (isset($_GET['id'])) {
 		$ID = $_GET['id'];
}
$sql1 = "DELETE from sanpham where IDMau = ".$ID;
$result1 = mysqli_query(connect(),$sql1);
$sql = "DELETE from mausac where ID = ".$ID;
$result = mysqli_query(connect(),$sql);
header("Location: quantri.php?page_layout=danhsachMau");
mysqli_close(connect());
?>