<?php
    $connect = mysqli_connect("db","root","example","quanlyshop");

    $ID = $_GET['IDDH'];

    //lấy thông tin đơn hàng
    $checkTrangThai = "select * from donhang where donhang.ID = '".$ID."'";
    $resultQuery = mysqli_query($connect,$checkTrangThai);

    if($row = mysqli_fetch_array($resultQuery))
    {
        //xóa đơn hàng
        $delete = "delete FROM donhang where donhang.ID = '".$ID."'";
        mysqli_query($connect,$delete);

        //update lại số lượng sản phẩm hủy
        $updateSP = "UPDATE sanpham SET soLuong = soLuong + '".$row['soLuongDat']."' WHERE ID = '".$row['IDSanPham']."'";
        mysqli_query($connect,$updateSP);
    }
    
    header("location: /DonMua.php");   

    mysqli_close($connect);
?>