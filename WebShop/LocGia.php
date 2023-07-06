<?php
    require('Widget/Menu.php');
    require('Widget/Sub_Menu.php');
    require('Widget/scroll.php');
?>
<?php	
    $IDLoai = isset($_SESSION['IDLoai']) ? $_SESSION['IDLoai'] : null;
    $fromPrice = isset($_GET['fromPrice']) ? $_GET['fromPrice'] : null;
    $toPrice = isset($_GET['toPrice']) ? $_GET['toPrice'] : null;
    $brand = isset($_SESSION['brand']) ? $_SESSION['brand'] : null;

    //brand != null thì load giá brand
    if($brand != null)
    {
        $command = "SELECT * FROM `sanpham` WhERE brand = '".$brand."' and giaSP BETWEEN '".$fromPrice."' and '".$toPrice."'";
    }
    else
    {
        if($IDLoai != -1)
	        $command = "SELECT * FROM `sanpham` WhERE IDLoai = '".$IDLoai."' and giaSP BETWEEN '".$fromPrice."' and '".$toPrice."'";
        else                                                
            $command = "SELECT * FROM `sanpham` WhERE giaSP BETWEEN '".$fromPrice."' and '".$toPrice."'";

    }

	$result = mysqli_query(Connect(),$command);
    $checkCount = mysqli_num_rows($result);

    //Giảm giá
    $querySuKien = "SELECT * FROM sukien WHERE IDTL = '".$IDLoai."'";

    $resultSuKien = mysqli_query(Connect(),$querySuKien);
     
    if($rowSK = mysqli_fetch_array($resultSuKien))
    {
        global $tienGiam;
        $tienGiam = $rowSK['tienGiam'];
    }
?>

<html>
    <head>
        <meta charset="utf8"></meta>
        <title>Shop Áo</title>
        <link rel="stylesheet" href="css/SanPham.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="https://unpkg.com/scrollreveal"></script>

    </head>

    <body>
        <div class="Main-Product" >
            <?php
                if($checkCount == 0)
                {?>
                    <h2 style="text-align: center; margin: 180px 0;" id="Result">Không tìm thấy kết quả nào</h2>                 

            <?php }?>

            <?php
                while($row = mysqli_fetch_array($result))
                {?>
                <div align="center" class="SubProduct">
                    <?php
                        //nếu IDLoai == -1 là trang tất cả sản phẩm
                        if($IDLoai == -1)
                        {
                            //truy vấn sự kiện
                            $querySuKien = "SELECT * FROM sukien";

                            $resultSuKien = mysqli_query(Connect(),$querySuKien);
                        
                            while($rowSK = mysqli_fetch_array($resultSuKien))
                            {
                                //nếu IDTL bên sự kiện == IDLoai của sản phẩm thì tạo thẻ giảm giá
                                if($rowSK['IDTL'] == $row['IDLoai'])
                                {?>
                                    <span class="Discount">-<?php if(isset($rowSK['tienGiam']))  echo $rowSK['tienGiam']?>%</span>
                            <?php  } }?> 
                          
                            <?php
                            if($row['soLuong'] == 0)
                            { ?>
                                <span id="Sold_Out">Cháy hàng</span>
                      <?php }?>
                          
                            <a href="PHP/Xulychitietsanpham.php?page=danhsach&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>" id="buyProduct">
                                <img type="image" id="ImgShirt" src="<?php echo $row['imageSP']?>">
                            </a>

                            <p><?php echo $row['tenSP']?>
                            <div style="display:flex; width:100%; justify-content:center">
                                <?php
                                    if($row['giaGiam'] > 0)
                                    {?>
                                        <p style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px"><?php echo format_money($row['giaSP'],0,'','.')?></p>
                                <?php }?>

                                <p><?php echo format_money($row['giaSP'] - $row['giaGiam'],0,'','.')?>
                        </div>       
                        
                    <?php }
                    else
                    {
                        if(isset($tienGiam))
                        {?>
                            <span class="Discount"><?php  echo $tienGiam?>%</span>
                    <?php } ?>

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>" id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $row['imageSP']?>">
                        </a>
                        
                        <?php
                            if($row['soLuong'] == 0)
                            { ?>
                                <span id="Sold_Out">Cháy hàng</span>
                      <?php }?>
                        
                        <p><?php echo $row['tenSP']?>
                        <div style="display:flex; width:100%; justify-content:center">
                                <?php
                                    if($row['giaGiam'] > 0)
                                    {?>
                                        <p style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px"><?php echo format_money($row['giaSP'],0,'','.')?></p>
                                <?php }?>

                                <p><?php echo format_money($row['giaSP'] - $row['giaGiam'],0,'','.')?>
                        </div>       
                <?php  } ?>
                </div>
            <?php }?>
        </div>

        
        <script>
            //event scroll animation
            ScrollReveal({ 
                reset: true, //reset animation
                distance: '150px', //khoảng cách animation
                duration: 500, //thời gian chạy
                delay: 25 //delay
            });
            
            //set aniamtion cho thẻ
            ScrollReveal().reveal('.SubProduct', { delay: 10, origin: 'top', interval: 50 });
        </script>
    </body>
</html>

<?php
    require('Widget/Footer.php');
?>
