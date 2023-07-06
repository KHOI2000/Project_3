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
    // if (isset($_GET['ThoiGianDH'])) {
    //     $ThoiGianDH = $_GET['ThoiGianDH'];
    // }

    $command = "SELECT dh.ID,dh.IDKhachHang,SUM(dh.soLuongDat) as sumSL,dh.ThoiGianDH,dh.trangThai
    from donhang as dh  
    join sanpham as sp on dh.IDSanPham = sp.ID
    where IDKhachHang = '".$ID."' 
    GROUP BY dh.ThoiGianDH,dh.ID
    limit $temp,$baiTrenMotTrang";
    $result = mysqli_query(connect(), $command);

    // $querySoDong="select dh.ID,dh.IDKhachHang,SUM(dh.soLuongDat) as sumSL,dh.ThoiGianDH,dh.trangThai
    // from donhang as dh  
    // join sanpham as sp on dh.IDSanPham = sp.ID 
    // where IDKhachHang = '".$ID."' group by dh.ThoiGianDH";
    // $resultRow= mysqli_query(connect(),$querySoDong);
    $soDong = mysqli_num_rows($result);
    //số trang
    $soTrang = $soDong / $baiTrenMotTrang;
    $listPage="";
    for($i=0;$i<$soTrang;$i++)
    {
        if($page==$i)
        {
        $listPage.='<a class="active" href=quantri.php?page_layout=detail_DH&chitietNM.php&id='.$ID.'&page='.$i.'>'.$i.'</a>';
        }
        else
        {
        $listPage.='<a href=quantri.php?page_layout=detail_DH&chitietNM.php&id='.$ID.'&page='.$i.'>'.$i.'</a>';
        }
    }

    mysqli_close(connect());
?>

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
    <title>Chi tiết Ngày Mua</title>
</head>

<body>
    <h1>Chi Tiết Ngày Mua</h1>
    <table id="keywords">
        <thead>
            <tr>
                <th><span>ID</span></th>
                <th><span>IDKhachHang</span></th>
                <th><span>Số Lượng</span></th>          
                <th><span>Thời Gian Đặt</span></th>
                <th><span>Trạng Thái</span></th>
                <th><span>Chi Tiết</span></th>
                <th><span>Duyệt đơn</span></th>
                <th><span>Xác nhận đơn</span></th>
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
                <?php echo $row['IDKhachHang'] ?>
            <td>
                <?php echo $row['sumSL'] ?>    
            <td>
                <?php echo $row['ThoiGianDH'] ?>
            <td>
                <?php echo $row['trangThai'] ?>
            <td>
                <a href="quantri.php?page_layout=detail_DH&chitietDH.php&id=<?php echo $row['IDKhachHang']?>&ThoiGianDH=<?php echo $row['ThoiGianDH']?>">
                    <button class="btn btn-deal">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </a>
            <td>
                <a href="xacnhandon.php?id=<?php echo $row['IDKhachHang'] ?>">
                    <button class="btn btn-check">
                        <i class="fa-solid fa-clock"></i>
                    </button>
                </a>    
            <td>
                <a href="xulynhanhang.php?id=<?php echo $row['IDKhachHang'] ?>">
                    <button class="btn btn-success">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </a>
            
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

