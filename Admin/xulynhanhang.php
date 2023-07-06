<?php
require('Config.php');
    $now = new DateTime();
    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
    }
    mysqli_query(connect(),"set names 'utf8'");
    $sql = "UPDATE donhang SET nhanHang = 'Đã Nhận' where IDKhachHang = ".$ID;
    mysqli_query(connect(),$sql);
    $sql2 = "select * from donhang where IDKhachHang = ".$ID ;
    $result=mysqli_query(connect(),$sql2);
    
    while($row=mysqli_fetch_array($result)){
        $sql3 = 'insert into lichsumuahang(IDKH,IDSP,soLuongDat,size,thoiGianNhanHang)
        values ("'.$row['IDKhachHang'].'","'.$row['IDSanPham'].'","'.$row['soLuongDat'].'","'.$row['size'].'","'.$now->format('Y-m-d H:i:s').'")';
        mysqli_query(connect(),$sql3);
    }
   
    header('location:quantri.php?page_layout=danhsachDH');
    mysqli_close(connect());

?>