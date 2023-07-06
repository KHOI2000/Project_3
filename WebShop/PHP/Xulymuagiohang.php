<?php
    session_start();
    $connect = mysqli_connect("db","root","example","quanlyshop");

    $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;
    $now = new DateTime();

    if(isset($_SESSION['Logined']))
    {
        $queryGioHang = "select * from giohang";
        
        $result = mysqli_query($connect,$queryGioHang);

        while($row = mysqli_fetch_array($result))
        {
            $querySP = "select * from sanpham where ID = '".$row['IDSP']."'";

            $resultSP = mysqli_query($connect,$querySP);

            $rowSP = mysqli_fetch_array($resultSP);

            $total = ($rowSP['giaSP'] - $rowSP['giaGiam']) * $row['soLuongDat'];

            $queryInsertDonMua = "INSERT INTO `donhang`(`IDSanPham`, `IDKhachHang`, `soLuongDat`, `size`,`ThoiGianDH`,`trangThai`,`nhanHang`,`tongTien`) 
                                  VALUES ('".$row['IDSP']."','".$IDKH."','".$row['soLuongDat']."','".$row['size']."','".$now->format('Y-m-d H:i:s')."' , 'Đang Duyệt','Chưa Nhận' , '".$row['tongTien']."')";
            mysqli_query($connect,$queryInsertDonMua);
            
            $queryDeleteGiohang = "delete from giohang where ID = '".$row['ID']."'";
            mysqli_query($connect,$queryDeleteGiohang);

        }

        header("Location: Refresh:0");
    }
    else
    {
        header("location: /DangNhap.php");
    }

    mysqli_close($connect);
?>
