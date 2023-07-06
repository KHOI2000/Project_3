
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

    if(isset($_GET['ngayBinhLuan'])){
        $ngayBinhLuan = $_GET['ngayBinhLuan'];
    } 
    $command = "select sp.tenSP, kh.hoTen,dgsp.IDKH,dgsp.ID,dgsp.binhLuan,dgsp.ngayBinhLuan
    from danhgiasanpham as dgsp 
    join sanpham as sp on dgsp.IDSP = sp.ID
    join khachhang as kh on dgsp.IDKH = kh.ID
    where dgsp.ngayBinhLuan = '".$ngayBinhLuan."'
    limit $temp,$baiTrenMotTrang";
    $result = mysqli_query(connect(), $command);

    $querySoDong="select sp.tenSP, kh.hoTen,dgsp.IDKH,dgsp.ID,dgsp.binhLuan,dgsp.ngayBinhLuan
    from danhgiasanpham as dgsp 
    join sanpham as sp on dgsp.IDSP = sp.ID
    join khachhang as kh on dgsp.IDKH = kh.ID
    where dgsp.ngayBinhLuan = '".$ngayBinhLuan."'";
    $resultRow= mysqli_query(connect(),$querySoDong);
    $soDong = mysqli_num_rows($resultRow);
    //số trang
    $soTrang = $soDong / $baiTrenMotTrang;
    $listPage="";
    for($i=0;$i<$soTrang;$i++)
    {
        if($page==$i)
        {
        $listPage.='<a class="active" href=quantri.php?page_layout=detail_BL&chitietBL.php&ngayBinhLuan='.$ngayBinhLuan.'&page='.$i.'>'.$i.'</a>';
        }
        else
        {
        $listPage.='<a href=quantri.php?page_layout=detail_BL&chitietBL.php&ngayBinhLuan='.$ngayBinhLuan.'&page='.$i.'>'.$i.'</a>';
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
            <link rel="stylesheet" href="css/global.css">
            <link rel="stylesheet" href="css/reset.css">
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <title>Chi Tiết Bình Luận</title>
        </head>

<body>
        <h1>Chi Tiết Bình Luận</h1>
        <table id="keywords">
                    <thead>
                        <tr>
                            <th><span>ID</span></th>
                            <th><span>IDKH</span></th>
                            <th><span>Tên Khách Hàng</span></th>
                            <th><span>Tên Sản Phẩm</span></th>
                            <th><span>Bình Luận</span></th>
                            <th><span>Ngày Bình Luận</span></th>
                            <th><span>Xóa</span></th>
                        </tr>
                    </thead>
                    <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                <td><?php echo $row['ID']?>
                <td><?php echo $row['IDKH'] ?>
                <td><?php echo $row['hoTen'] ?>
                <td><?php echo $row['tenSP'] ?>
                <td><?php echo $row['binhLuan'] ?>
                <td><?php echo $row['ngayBinhLuan'] ?> 
                <td>
                <a href="deleteBL.php?id=<?php echo $row['ID']?>">
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
    echo"404 ERROR!!!";?>
<?php }?>