<?php
require('Config.php');
if (isset($_GET['id'])) {
	$ID = $_GET['id'];
}

$sql1 = "select * from sukien where ID = ".$ID;
$result1 = mysqli_query(connect(),$sql1);
$row1 = mysqli_fetch_array($result1);

$sql2 = "update sanpham set giaGiam = 0 where IDLoai =".$row1['IDTL'];
mysqli_query(connect(),$sql2);


$sql = "delete from sukien where ID = ".$ID;
mysqli_query(connect(),$sql);


header("Location: quantri.php?page_layout=danhsachSuKien");
mysqli_close(connect());
?>
