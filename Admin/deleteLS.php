<?php
require('Config.php');
if (isset($_GET['id'])) {
 		$ID = $_GET['id'];
}
$sql = "DELETE from lichsumuahang where IDKH = '.$ID.'";
mysqli_query(connect(),$sql);
header("Location: quantri.php?page_layout=danhsachLichSu");
mysqli_query(connect(),$sql);
?>