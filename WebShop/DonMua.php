<?php
    require('Widget/Menu.php');
    require('Widget/scroll.php');
?>

<!-- Đơn mua -->
<?php
    $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;
         
    //số bài trên một trang
    $baiTrenMotTrang = 10;

    //nếu chưa chọn trang mặc định là trang 0
    if(!$_GET['page'])
    {
        $page = 0;
    }
    else
    {
        $page = $_GET['page'];
    }

    
    //trang hiện tại
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 0;

    //Tổng số dòng
    $querySoDong= "select * from donhang where IDKhachHang = '".$IDKH."'";  
    $resultRow= mysqli_query(Connect(),$querySoDong);
    $soDong = mysqli_num_rows($resultRow);

     //số trang
    $soTrang = $soDong / $baiTrenMotTrang;

    $temp = $page * $baiTrenMotTrang;

    $queryDonHang = "select dh.id, sp.imageSP,sp.tenSP, (sp.giaSP - sp.giaGiam) as giaSP, tl.tenTL, dh.soLuongDat, dh.size, dh.tongTien as soTien , dh.trangThai 
                     from donhang as dh 
                     join sanpham as sp on dh.IDSanpham = sp.ID 
                     join theloai as tl on sp.IDLoai = tl.ID 
                     where dh.IDKhachHang = '".$IDKH."' 
                     group by dh.id Limit $temp , $baiTrenMotTrang";  
        
    $result = mysqli_query(Connect(),$queryDonHang);

    mysqli_close(Connect());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/DonMua.css">
    <link rel="stylesheet" href="css/TrangChu.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Document</title>
</head>
<body>
            <div class="Main_Cart" style="Margin-top: 200px">
                <div class="TitleItem" style="margin-top:150px">
                    <b></b>
                        <span>Lịch Sử Mua Hàng Wibugangz</span>
                    <b></b>
                </div>
        
                <form action="" method="GET">
                    <div class="Infor_Cart">
                        <table>
                            <thead>
                                <th>Ảnh</th>
                                <th>Sản Phẩm</th>
                                <th>Loại</th>
                                <th>Đơn Giá</th>
                                <th>Size</th>
                                <th>Số Lượng</th>
                                <th>Số Tiền</th>
                                <th>Trạng Thái</th>
                                <th>Thao Tác</th>
                            </thead> 
        
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_array($result))
                                    { ?>    
                                        <tr>
                                            <td><img src="<?php echo $row['imageSP']?>"></img>
                                            <td><?php echo $row['tenSP']?>
                                            <td><?php echo $row['tenTL']?>
                                            <td><?php echo format_money($row['giaSP'],0,'','.')?>
                                            <td><?php echo $row['size']?>
                                            <td><?php echo $row['soLuongDat']?>
                                            <td><?php echo format_money($row['soTien'],0,'','.')?>
                                            <td><?php echo $row['trangThai']?>        
        
                                            <?php
                                                if($row['trangThai'] == "Đang Duyệt")
                                                { ?>
                                                    <td><a class="Del_Cancel" href="PHP/Xulyxoadonmua.php?page=Donmua&IDDH=<?php echo $row['id']?>">Xóa Hàng</a>
                                            <?php }
                                                else
                                                {?>
                                                    <td><a class="Del_Cancel" href="PHP/Xulyxoadonmua.php?page=Donmua&IDDH=<?php echo $row['id']?>">Hủy Hàng</a></td>                                              
                                            <?php }
                                            ?>
                                        </tr>     
                                   <?php }
                                ?>
         
                            </tbody>
                        </table>          
                    </div>
                </form>
        
            <div class="Pagination">
                <?php
                        //về trang đầu
                        if($current_page > 0)
                        {
                            $StartPage = 0;
                            echo "<a id='numberPage' href='DonMua.php?page={$StartPage}'>Đầu</a>";
                        }

                        //bắt đầu trang 1 hiện nút trước
                        if($current_page > 0)
                        {
                            $previous_page = $current_page - 1;
                                echo "<a id='previous_Number' href='DonMua.php?page={$previous_page}'>Trước</a>";
                        }

                        for($page = 0; $page < $soTrang; $page++)
                        {   
                            if($current_page == $page)
                                echo "<strong id='current_Page' href='DonMua.php?page={$page}'>{$page}</strong>";
                            else
                            {
                                //nằm từ khoản +-3
                                if($page > $current_page - 3 && $page < $current_page + 3)
                                    echo "<a id='numberPage' href='DonMua.php?page={$page}'>{$page}</a>";
                            }
                        }
                        
                        //trang đầu tiên và trang cuối thì hiện nút sau
                        if($current_page >= 0 && $current_page < $page - 1)
                        {
                            $after_page = $current_page + 1;
                                echo "<a id='affter_Number' href='DonMua.php?page={$after_page}'>Sau</a>";
                        }

                        //tới trang cuối
                        if($current_page >= 0 && $current_page < $page - 1)  
                        {
                            $EndPage = $page - 1;
                            echo "<a id='numberPage' href='DonMua.php?page={$EndPage}'>Cuối</a>";
                        }
                    ?>
            </div>           
        </div> 
</body>
</html>

<?php
    require('Widget/Footer.php');
?>