<?php
    session_start();
    $connect = mysqli_connect("db","root","example","quanlyshop");

    $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;
    $IDSP = isset($_SESSION['IDSP']) ? $_SESSION['IDSP'] : null;
    $SIZE = isset($_POST["rdSize"]) ? $_POST["rdSize"] : null;
    $AMOUT = isset($_POST['amout_Product']) ? $_POST['amout_Product'] : null;
    $now = new DateTime();

    if(isset($_SESSION['Logined']))
    {        
        //lấy ra thông tin sản phẩm
        $querySP = "select * from sanpham where ID = '".$IDSP."'";

        $resultSP = mysqli_query($connect,$querySP);

        $row = mysqli_fetch_array($resultSP);

        $total = ( $row['giaSP'] - $row['giaGiam']) * $AMOUT;

        //thêm thông tin đơn hàng
        $query = "INSERT INTO `donhang`(`IDSanPham`, `IDKhachHang`, `soLuongDat`, `size`,`ThoiGianDH`,`trangThai`,`nhanHang`,`tongTien`) 
                  VALUES ('".$IDSP."','".$IDKH."','".$AMOUT."','".$SIZE."','".$now->format('Y-m-d H:i:s')."' , 'Đang Duyệt','Chưa Nhận' , '".$total."')";
    
        mysqli_query($connect,$query);
    
        //cập nhật số lượng sản phẩm
        $updateSP = "UPDATE sanpham set soLuong = soLuong - '".$AMOUT."' WHERE ID = '".$IDSP."'";
        mysqli_query($connect,$updateSP);

        header("location: /DonMua.php");
    }
    else
    {
        header("location: /DangNhap.php");
    }

    mysqli_close($connect);
?>
