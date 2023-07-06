<?php
require('Config.php');
    if(empty($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 0;
    }
//số bài trên một trang
$baiTrenMotTrang = 5;

$temp = $page*$baiTrenMotTrang;
$command = "SELECT dg.ID, dg.IDKH, dg.IDSP, COUNT(dg.ngayBinhLuan), dg.binhLuan, dg.ngayBinhLuan from danhgiasanpham as dg
Group By dg.ngayBinhLuan,dg.ID,dg.IDKH
LIMIT $temp,$baiTrenMotTrang";

$result = mysqli_query(connect(), $command);

//  $querySoDong="select ID,IDKH, IDSP, COUNT(ngayBinhLuan), binhLuan, ngayBinhLuan from danhgiasanpham
//  Group By ngayBinhLuan DESC";
//  $resultRow= mysqli_query(connect(),$querySoDong);
// mysqli_num_rows($resultRow);


$soDong = mysqli_num_rows($result);
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachBinhLuan&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachBinhLuan&page='.$i.'>'.$i.'</a>';
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
    <title>Quản Lí Đánh Giá SP</title>
</head>

<body>

    <h1>QL Bình Luận</h1>
    <table id="keywords" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th><span>Stt</span></th>
                <th><span>Số Lượng Bình Luận</span></th>
                <th><span>Ngày Bình Luận</span></th>
                <th><span>Chi Tiết</span></th>
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
                <?php echo $row['COUNT(dg.ngayBinhLuan)']?>
            <td>
                <?php echo $row['ngayBinhLuan']?>
            <td>
                <a
                    href="quantri.php?page_layout=detail_BL&chitietBL.php&ngayBinhLuan=<?php echo $row['ngayBinhLuan']?>">
                    <button class="btn btn-deal">
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                </a>
        </tr>
        <?php } ?>
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