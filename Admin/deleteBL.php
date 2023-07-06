<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}
$sql = "delete from danhgiasanpham where ID = ".$ID;
mysqli_query(connect(),$sql);
header("Location: quantri.php?page_layout=danhsachBinhLuan");
mysqli_close(connect());
?>