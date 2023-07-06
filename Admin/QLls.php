
<?php
require('Config.php');
if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 0;
}
//số bài trên một trang
$baiTrenMotTrang = 10;

$temp = $page*$baiTrenMotTrang;
$command = "SELECT lsmh.ID, lsmh.IDKH, SUM(lsmh.soLuongDat) as sumsl,lsmh.thoiGianNhanHang, kh.hoTen, sp.giaSP from lichsumuahang lsmh 
join khachhang kh on lsmh.IDKH = kh.ID
join sanpham sp on lsmh.IDSP=sp.ID Group By lsmh.IDKH,lsmh.ID limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

// //Tổng số dòng
// $querySoDong= "select lsmh.ID, lsmh.IDKH, SUM(lsmh.soLuongDat) as sumsl,lsmh.thoiGianNhanHang, kh.hoTen, sp.giaSP from lichsumuahang lsmh 
// join khachhang kh on lsmh.IDKH = kh.ID
// join sanpham sp on lsmh.IDSP=sp.ID Group By lsmh.IDKH";
// $resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($result);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachLichSu&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachLichSu&page='.$i.'>'.$i.'</a>';
    }
}
mysqli_close(connect());

?>
<?php if(isset($_SESSION["admin"])) { ?>
<!DOCTYPE html>
<html lang="en" >

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/quanLy.css">
            <title>Lịch Sử Đặt Hàng</title>
        </head>

        <body>

                <h1>Lịch Sử Đặt Hàng</h1>
    <table id="keywords">
                    <thead>
                        <tr>
                            <th><span>ID</span></th>
                            <th><span>IDKhachHang</span></th>
                            <th><span>Tên Khách Hàng</span></th>
                            <th><span>Tổng Số Lượng</span></th>
                            <th><span>Thời Gian Nhận Hàng</span></th>
                            <th><span>Chi Tiết</span></th>
                            <th><span>Xóa</span></th>
                        </tr>
                    </thead>
                    <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                  <td><?php echo $row['ID']?>
                  <td><?php echo $row['IDKH'] ?>
                  <td><?php echo $row['hoTen'] ?>
                  <td><?php echo $row['sumsl'] ?>
                  <td><?php echo $row['thoiGianNhanHang'] ?>
                  <td>
                  <a href="quantri.php?page_layout=detail_LS&chitietLS.php&id=<?php echo $row['IDKH']?>">
                  <button class="btn btn-deal">
                      <i class="fa-solid fa-circle-info"></i>
                      </button>
                    </a>
                    <td>
                  <a href="deleteLS.php?id=<?php echo $row['IDKH']?>">
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