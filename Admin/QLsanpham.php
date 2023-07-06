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

$command = "select sp.giaGiam,sp.brand,tl.tenTL,sp.ID,sp.IDLoai,sp.tenSP,sp.giaSP,sp.soLuong,sp.mieuTaSP,sp.imageSP,sp.giaGiam,sp.brand from sanpham as sp join theloai as tl
on sp.IDLoai = tl.ID
Limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
$querySoDong= "SELECT * FROM `sanpham`";
$resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($resultRow);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachSP&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachSP&page='.$i.'>'.$i.'</a>';
    }
}
mysqli_close(connect());

?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quanLy.css">
    <title>Admin</title>
</head>

<body>
</body>
<h1>Quản Lý Sản Phẩm</h1>
<a href="quantri.php?page_layout=themSP">
    <button class="btn btn-add">Thêm</button>
</a>
<table id="keywords">
    <thead>
        <tr>
            <th><span>ID</span></th>
            <th><span>IDLoại</span></th>
            <th><span>Loại đồ</span></th>
            <th><span>Tên SP</span></th>
            <th><span>Giá SP</span></th>
            <th><span>Số Lượng</span></th>
            <th><span>Mô Tả SP</span></th>
            <th><span>Giá Giảm</span></th>
            <th><span>Ảnh</span></th>
            <th><span>Sửa</span></th>
            <th><span>Xóa</span></th>
        </tr>
    </thead>
    <?php
      while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $row['ID']?>
        <td><?php echo $row['IDLoai']?>
        <td><?php echo $row['tenTL'] ?>
        <td><?php echo $row['tenSP'] ?>
        <td><?php echo $row['giaSP'] ?>
        <td><?php echo $row['soLuong'] ?>
        <td><?php echo $row['mieuTaSP'] ?>
        <td><?php echo $row['giaGiam'] ?>
        <td><img Style="height: 100px; width 100px" src="<?php echo $row['imageSP'] ?>"></image>
        <td>
            <a href="quantri.php?page_layout=suaSP&updateSP.php&id=<?php echo $row['ID']?>">
                <button class="btn btn-update">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </a>
        <td>
            <a href="deleteSP.php?id=<?php echo $row['ID']?>">
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
<?php }?>