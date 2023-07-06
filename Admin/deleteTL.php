<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}
$sql1 = "DELETE from sukien where IDTL = ".$ID;
mysqli_query(connect(),$sql1);

$sql2 = "DELETE from sanpham where IDLoai = ".$ID;
mysqli_query(connect(),$sql2);

$sql3 = "DELETE from theloai where ID = ".$ID;
mysqli_query(connect(),$sql3);

header("Location: quantri.php?page_layout=danhsachTheLoai");
mysqli_close(connect());
?>
