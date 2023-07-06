<?php
require('Config.php');
if (isset($_GET['id'])) {
 	$ID = $_GET['id'];
}
$sql = "delete from khohang where ID = ".$ID;
mysqli_query(connect(),$sql);
header("location: quantri.php?page_layout=danhsachKhoHang");
mysqli_close(connect());
?>