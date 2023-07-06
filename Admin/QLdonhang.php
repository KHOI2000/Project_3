<?php
require('Config.php');
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 0;
    }
  //số bài trên một trang
  $baiTrenMotTrang = 5;
  
  $temp = $page*$baiTrenMotTrang;

$command = "SELECT dh.ID, dh.IDKhachHang, SUM(dh.soLuongDat) as sumSL,dh.ThoiGianDH, kh.hoTen, sp.giaSP 
from donhang dh 
join khachhang kh on dh.IDKhachHang = kh.ID
join sanpham sp on dh.IDSanPham=sp.ID 
Group By dh.ThoiGianDH,dh.ID
limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
// $querySoDong= "select dh.ID, dh.IDKhachHang, SUM(dh.soLuongDat) as sumSL,dh.ThoiGianDH, kh.hoTen, sp.giaSP 
// from donhang dh 
// join khachhang kh on dh.IDKhachHang = kh.ID
// join sanpham sp on dh.IDSanPham=sp.ID 
// Group By dh.ThoiGianDH";
// $resultRow= mysqli_query(connect(),$querySoDong);

$soDong = mysqli_num_rows($result);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachDH&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachDH&page='.$i.'>'.$i.'</a>';
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
    <title>Quản Lí Đơn Hàng</title>
</head>

<body>
    <h1>Quản Lí Đơn Hàng</h1>
    <table id="keywords">
        <thead>
            <tr>
                <th><span>Stt</span></th>
                <th><span>IDKhachHang</span></th>
                <th><span>Tên Khách Hàng</span></th>
                <th><span>Tổng Số Lượng</span></th>
                <th><span>Thời Gian Đặt Gần Nhất</span></th>
                <th><span>Chi Tiết NM</span></th>
                <th><span>Xóa</span></th>
            </tr>
        </thead>
        <?php
                    $count = 1;
            while ($row = mysqli_fetch_array($result)) {
                ?>
        <tr>
            <td>
                <?php echo $count++?>
            <td>
                <?php echo $row['IDKhachHang'] ?>
            <td>
                <?php echo $row['hoTen'] ?>

            <td>
                <?php echo $row['sumSL']?>
            <td>
                <?php echo $row['ThoiGianDH'] ?>
            <td>
                <a href="quantri.php?page_layout=detail_NM&chitietNM.php&id=<?php echo $row['IDKhachHang']?>">  
                    <button class="btn btn-deal">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </a>
            <td>
            <a href="deleteDH.php?id=<?php echo $row['IDKhachHang'] ?>">
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </a>
        </tr>
        <?php } ?>
        </div>
    </table>
    <div class="Pagination">
                <?php
                    echo $listPage;
                ?>
</div>
</body>
</html>
<?php } else{ 
    echo"404 ERROR!!!"?>
<?php }?>