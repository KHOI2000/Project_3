<?php
    require_once('Widget/Menu.php');
    require('Widget/scroll.php');    
?>

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
    $querySoDong= "SELECT * FROM `giohang` WHERE IDKH = '".$IDKH."'";  
    $resultRow= mysqli_query(Connect(),$querySoDong);
    $soDong = mysqli_num_rows($resultRow);

     //số trang
    $soTrang = $soDong / $baiTrenMotTrang;

    $temp = $page * $baiTrenMotTrang;


    $queryDonHang = "select dh.IDSP,dh.ID, sp.imageSP,sp.tenSP, (sp.giaSP - sp.giaGiam) as giaSP, tl.tenTL, dh.soLuongDat, 
                            dh.size, dh.tongTien as soTien 
                    from giohang as dh 
                    join sanpham as sp on dh.IDSP = sp.ID
                    join theloai as tl on sp.IDLoai = tl.ID 
                    where dh.IDKH = '".$IDKH."' 
                    group by dh.ID, sp.imageSP,sp.tenSP, sp.giaSP, tl.tenTL, dh.soLuongDat, dh.size
                    Limit $temp , $baiTrenMotTrang";  

    $result = mysqli_query(Connect(),$queryDonHang);
    
    //lấy ra số lượng sản phẩm trong giỏ hàng
    $_SESSION['sumProduct'] = mysqli_num_rows($result);

    mysqli_close(Connect());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/DonMua.css">
    <link rel="stylesheet" href="css/GioHang.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/TrangChu.css">
    <title>Document</title>
</head>
<body>
    <div class="Main_Cart" style="Margin-top: 200px">
        <div id="Contain_Notify">

        </div>

        <div class="TitleItem" style="margin-top:150px">
            <b></b>
                <span>Giỏ Hàng Wibugangz</span>
            <b></b>
        </div>

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
                        <th>Thao Tác</th>
                    </thead>

                    <tbody>
                        <?php
                            $total = 0;
                            while($row = mysqli_fetch_array($result))
                            { 
                                $total = $total + $row['soTien']; 
                            ?>    
                                <tr>
									<td><img style="Margin: 0 auto;" src="<?php echo $row['imageSP']?>"></img>
									<td><?php echo $row['tenSP']?>
									<td><?php echo $row['tenTL']?>
									<td><?php echo format_money($row['soTien'],0,'','.')?>
                                    <td><?php echo $row['size']?>
									<td><?php echo $row['soLuongDat']?>
                                    <td><?php echo format_money($row['soTien'],0,'','.')?>
									<td><a class="Del_Cancel" href="PHP/Xulyxoagiohang.php?page=GioHang&IDGH=<?php echo $row['ID']?>">Xóa</a>                              
                                </tr>                  
                           <?php }?>
                    </tbody>
                </table>          
        </div>

        <form id="FormDetail" action="" method="POST">
            <div class="Main_PayProduct">
                <input type="button" class="DeleteAllCart" onclick="Delete();" value="Xóa Hết">
                        <script>
                            function Delete()
                            {
                                window.location.href = "PHP/Xoahetgiohang.php";
                            }
                        </script>
                </input>

                <!-- hiện thông báo múa hàng -->
                <div class="Detail_Paypal">
                    <h4 id="TotalPaypal">Tổng thanh toán (<?php if(isset($_SESSION['sumProduct'])) echo $_SESSION['sumProduct']; ?> sản phẩm): 
                        <span> 
                            <?php 
                                if(!is_array($total)) 
                                    echo format_money($total,0,'','.');?>
                        </span> </h4>
                    <input type="button" value="Mua hàng" onclick="CreateNotify_BuyProduct();">

                    <script>
                        var checkNumerPro = <?php echo $_SESSION['sumProduct']?>

                        function CreateNotify_BuyProduct()
                        {
                            document.getElementById('FormDetail').action = 'PHP/Xulymuagiohang.php';
                            document.getElementById('FormDetail').submit();

                            const check = document.getElementById('Contain_Notify');
                            
                            if(checkNumerPro > 0)
                            {

                                const toast = document.createElement('div');

                                toast.classList.add('toast');
                                toast.innerHTML = `
                                                    <div id="Notification">
                                                        <h4>Mua hàng thành công</h4>
                                                    </div>
                                                    `;
                                check.appendChild(toast);
                            }
                            else
                            {
                                const toast = document.createElement('div');

                                toast.classList.add('toast');
                                toast.innerHTML = `
                                                    <div id="Notification_Error">
                                                        <h4>Giỏ hàng trống</h4>
                                                    </div>
                                                    `;
                                check.appendChild(toast);
                            }
                        }
                    </script>
                </div>
            </div>
        </form>
    </div> 

    <div class="Pagination">
                <?php
                        //bắt đầu trang 1 hiện nút trước
                        if($current_page > 0)
                        {
                            $StartPage = 0;
                            echo "<a id='numberPage' href='GioHang.php?page={$StartPage}'>Đầu</a>";
                        }
                        
                        if($current_page > 0)
                        {
                            $previous_page = $current_page - 1;
                                echo "<a id='numberPage' href='GioHang.php?page={$previous_page}'>Trước</a>";
                        }

                        for($page = 0; $page < $soTrang; $page++)
                        {   
                            if($current_page == $page)
                                echo "<strong id='current_Page' href='GioHang.php?page={$page}'>{$page}</strong>";
                            else
                            {
                                //nằm từ khoản +-3
                                if($page > $current_page - 3 && $page < $current_page + 3)
                                    echo "<a id='numberPage' href='GioHang.php?page={$page}'>{$page}</a>";
                            }
                        }
                        
                        //trang đầu tiên và trang cuối thì hiện nút sau
                        if($current_page >= 0 && $current_page < $page - 1)
                        {
                            $after_page = $current_page + 1;
                                echo "<a id='numberPage' href='GioHang.php?page={$after_page}'>Sau</a>";
                        }

                        if($current_page >= 0 && $current_page < $page - 1)  
                        {
                            $EndPage = $page - 1;
                            echo "<a id='numberPage' href='GioHang.php?page={$EndPage}'>Cuối</a>";
                        }
                    ?>
            </div>           
    </body>
</html>

<?php
    require('Widget/Footer.php');
?>