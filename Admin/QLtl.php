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

$command = "select * from theloai Limit $temp , $baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
$querySoDong= "SELECT * FROM `theloai`";
$resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($resultRow);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachTheLoai&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachTheLoai&page='.$i.'>'.$i.'</a>';
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
    <title>QL Thể Loại</title>
</head>

<body>
    <h1>Quản Lí Thể Loại</h1>
    <a href="quantri.php?page_layout=themTL">
        <button class="btn btn-add">Thêm</button>
    </a>
    <table id="keywords">
        <thead>
            <tr>
                <th><span>ID</span></th>
                <th><span>Thể Loại</span></th>
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
                <a href="quantri.php?page_layout=suaTL&updateTL.php&id=<?php echo $row['ID']?>">
                    <button class="btn btn-update">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
            <td>
                <a href="deleteTL.php?id=<?php echo $row['ID']?>">
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