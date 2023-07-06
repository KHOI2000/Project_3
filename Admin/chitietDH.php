<?php
    require('Config.php');
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 0;
    }
    //số bài trên một trang
    $baiTrenMotTrang = 15;

    $temp = $page*$baiTrenMotTrang;

    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
    }
    if (isset($_GET['ThoiGianDH'])) {
        $ThoiGianDH = $_GET['ThoiGianDH'];
    }
    // if (isset($_GET['ThoiGianDH'])) {
    //     $ThoiGianDH = $_GET['ThoiGianDH'];
    // }

    $command = "select  sp.tenSP,dh.ID,dh.IDSanPham, dh.IDKhachHang,dh.soLuongDat,dh.size,dh.ThoiGianDH,dh.trangThai,dh.nhanHang, sp.giaSP 
    from donhang as dh  
    join sanpham as sp on dh.IDSanPham = sp.ID  
    where IDKhachHang = '".$ID."' and ThoiGianDH = '".$ThoiGianDH."'
    limit $temp,$baiTrenMotTrang";
    $result = mysqli_query(connect(), $command);

    $querySoDong="select  sp.tenSP,dh.ID,dh.IDSanPham, dh.IDKhachHang,dh.soLuongDat,dh.size,dh.ThoiGianDH,dh.trangThai,dh.nhanHang, sp.giaSP 
    from donhang as dh  
    join sanpham as sp on dh.IDSanPham = sp.ID
    where IDKhachHang = '".$ID."' and ThoiGianDH = '".$ThoiGianDH."'";
    $resultRow= mysqli_query(connect(),$querySoDong);
    $soDong = mysqli_num_rows($resultRow);
    //số trang
    $soTrang = $soDong / $baiTrenMotTrang;
    $listPage="";
    for($i=0;$i<$soTrang;$i++)
    {
        if($page==$i)
        {
        $listPage.='<a class="active" href=quantri.php?page_layout=detail_DH&chitietDH.php&id='.$ID.'&ThoiGianDH='.$ThoiGianDH.'&page='.$i.'>'.$i.'</a>';
        }
        else
        {
        $listPage.='<a href=quantri.php?page_layout=detail_DH&chitietDH.php&id='.$ID.'&ThoiGianDH='.$ThoiGianDH.'&page='.$i.'>'.$i.'</a>';
        }   
    }

    mysqli_close(connect());
?>

<?php if(isset($_SESSION["admin"])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quanLy.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Chi Tiết Đơn Hàng</title>
</head>

<body>
    <h1>Chi Tiết Đơn Hàng</h1>
    <table id="keywords">
        <thead>
            <tr>
                <th><span>ID</span></th>
                <th><span>IDSanPham</span></th>
                <th><span>Sản Phẩm</span></th>
                <th><span>soLuongDat</span></th>
                <th><span>Size</span></th>
                <th><span>Thời Gian Đặt</span></th>
                <th><span>Trạng Thái</span></th>
                <th><span>Nhận Hàng</span></th>

            </tr>
        </thead>
        <?php
                    $sum=0;
            while ($row = mysqli_fetch_array($result)) {
                /*$sum=$sum+$row['giaSP'];  => Tổng tiền cần trả của từng đơn hàng*/
                ?>
        <tr>
            <td>
                <?php echo $row['ID'] ?>
            <td>
                <?php echo $row['IDSanPham'] ?>
            <td>
                <?php echo $row['tenSP']?>
            <td>
                <?php echo $row['soLuongDat'] ?>
            <td>
                <?php echo $row['size'] ?>
            <td>
                <?php echo $row['ThoiGianDH'] ?>
            <td>
                <?php echo $row['trangThai'] ?>
            <td>
                <?php echo $row['nhanHang'] ?>

        </tr>

     <?php }?>
    </table>
    <div class="Pagination">
                <?php
                    echo $listPage;
                ?>
</div>            
</body>
</html>

<?php  } else{ 
    echo"404 ERROR!!!";?>
<?php }?>