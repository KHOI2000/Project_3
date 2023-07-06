<?php
    require('Config.php');
    mysqli_query(connect(),"set names 'utf8'");

    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
    }

    $sql4 = 'select * from sukien where ID = '.$ID ;
    $result4 = mysqli_query(connect(),$sql4);
    $row4 = mysqli_fetch_array($result4);

    $sql3 = 'select * from sanpham where IDLoai = '.$row4['IDTL'];
    $result3 = mysqli_query(connect(),$sql3);

    while($row3 = mysqli_fetch_array($result3)){
    $giadaGiam = ($row3['giaSP']*($row4['tienGiam']/100));
    $sql2 = "UPDATE sanpham set giaGiam = $giadaGiam where IDLoai = '".$row4['IDTL']."' and ID = '".$row3['ID']."'";
    $result2 = mysqli_query(connect(),$sql2);
    }
    header("Location: quantri.php?page_layout=danhsachSuKien");
    mysqli_close(connect());
    ?>