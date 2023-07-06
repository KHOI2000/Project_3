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

$command = "select tl.tenTL,sk.ID,sk.IDTL,sk.tienGiam,sk.ngayBatDau,sk.ngayKetThuc,sk.tenSK,sk.image,sk.noiDungSK from sukien as sk join theloai as tl
on sk.IDTL = tl.ID
limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
$querySoDong= "select * from sukien";
$resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($resultRow);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachSuKien&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachSuKien&page='.$i.'>'.$i.'</a>';
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
    <title>QL Sự Kiện</title>
</head>

</html>

<h1>Quản Lí Sự Kiện</h1>
<a href="quantri.php?page_layout=themSK">
    <button class="btn-add">Thêm</button>
</a>
<table id="keywords">
    <thead>
        <tr>
            <th><span>ID</span></th>
            <th><span>Loại Đồ</span></th>
            <th><span>Thời Gian Bắt Đầu</span></th>
            <th><span>Thời Gian Kết Thúc</span></th>
            <th><span>Tiền Giảm(%)</span></th>
            <th><span>Tên Sự Kiện</span></th>
            <th><span>Ảnh</span></th>
            <th><span>Nội dung sự kiện</span></th>
            <th><span>Giảm</span></th>
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
            <?php echo $row['tenTL'] ?>
        <td>
            <?php echo $row['ngayBatDau'] ?>
        <td>
            <?php echo $row['ngayKetThuc'] ?>
        <td>
            <?php echo $row['tienGiam'] ?>
        <td>
            <?php echo $row['tenSK'] ?>
        <td>
            <img Style="height: 150px; width 150px" src="<?php echo $row['image'] ?>"></image>
        <td>
            <?php echo $row['noiDungSK'] ?>
        <td>
            <a href="giam.php?id=<?php echo $row['ID']?>">
                <button class="btn btn-dec">
                    <i class="fa-solid fa-arrow-trend-down"></i>
                </button>
            </a>
        <td>
            <a href="quantri.php?page_layout=suaSK&updateSK.php&id=<?php echo $row['ID']?>">
                <button class="btn btn-update">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            </a>
        <td>
            <a href="deleteSK.php?id=<?php echo $row['ID']?>">
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
<?php } else{ 
    echo"404 ERROR!!!"?>
<?php }?>