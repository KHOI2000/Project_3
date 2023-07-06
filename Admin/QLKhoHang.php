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

$command = "select s.Size,sp.tenSP,kh.ID,kh.IDSP,kh.soLuongSP from khohang as kh
join  size as s on kh.IDSize = s.ID
join sanpham as sp on kh.IDSP = sp.ID
limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
$querySoDong= "SELECT * FROM khohang";
$resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($resultRow);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachKhoHang&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachKhoHang&page='.$i.'>'.$i.'</a>';
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
    <title>QL Kho Hàng</title>
</head>

<body>
    <h1>Quản Lí Kho Hàng</h1>
    <a href="quantri.php?page_layout=themKH">
        <button class="btn btn-add">Thêm</button>
    </a>
    <table id="keywords">
        <thead>
            <tr>
                <th><span>ID</span></th>
                <th><span>IDSP</span></th>
                <th><span>Sản Phẩm</span></th>
                <th><span>Size</span></th>
                <th><span>Số Lượng SP</span></th>
                <th><span>Sửa</span></th>
                <th><span>Xóa</span></th>
            </tr>
        </thead>
        <?php
            while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td>
                <?php echo $row['ID']?>
            <td>
                <?php echo $row['IDSP'] ?>
            <td>
                <?php echo $row['tenSP'] ?>
            <td>
                <?php echo $row['Size'] ?>
            <td>
                <?php echo $row['soLuongSP'] ?>
            <td>
                <a href="quantri.php?page_layout=suaKH&updateKH.php&id=<?php echo $row['ID']?>">
                    <button class="btn btn-update">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
            <td>
                <a href="deleteKH.php?id=<?php echo $row['ID']?>">
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
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