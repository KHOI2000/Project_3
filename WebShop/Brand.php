<?php
    require('Widget/Menu.php');
    require('Widget/Sub_Menu.php');
    require('Widget/scroll.php');
?>

<?php	
    $brand = $_GET['TheLoai'];
    $page = $_GET['page'];

	$command = "SELECT * FROM `sanpham` as sp WHERE brand = '".$brand."'";
	
    unset($_SESSION['IDLoai']);

    $_SESSION['brand'] = $brand;

	$result = mysqli_query(Connect(),$command);
    $checkCount = mysqli_num_rows($result);
?>

<html>
    <head>
        <meta charset="utf8"></meta>
        <title>Shop Áo</title>
        <link rel="stylesheet" href="css/SanPham.css">
        <link rel="stylesheet" href="css/responsive.css">

    </head>

    <body>
        <div class="Main-Product" >
            <?php
                if($checkCount == 0)
                { ?>
                    <h2 style="text-align: center; margin: 180px 0;" id="Result">Không tìm thấy kết quả nào</h2>                 
                <?php } ?>

                <?php

                while($row = mysqli_fetch_array($result))
                { ?>
                    <div align="center" class="SubProduct">

                    <?php
                        $querySK = "SELECT * FROM sukien";
                        $resultSK = mysqli_query(Connect(),$querySK);

                    while($rowSK = mysqli_fetch_array($resultSK))
                    {
                        if($row['IDLoai'] == $rowSK['IDTL'])
                        { ?>
                            <span class="Discount">-<?php if(isset($rowSK['tienGiam']))  echo $rowSK['tienGiam']?>%</span>

                    <?php }
                    } ?>
                        
                        <?php
                            if($row['soLuong'] == 0)
                            { ?>
                                <span id="Sold_Out">Cháy hàng</span>
                      <?php }?>

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&brand=<?php echo $row['brand']; ?>&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>" id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $row['imageSP']?>"></a>
                                
                        <p><?php echo $row['tenSP']?></p>
                        <div style="display:flex; width:100%; justify-content:center">
                                <?php
                                    if($row['giaGiam'] > 0)
                                    {?>
                                        <p style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px"><?php echo format_money($row['giaSP'],0,'','.')?></p>
                                <?php }?>

                                <p><?php echo format_money($row['giaSP'] - $row['giaGiam'],0,'','.')?>
                        </div>                 
                    </div>
                <?php }?>
        </div>
    </body>
</html>

<?php
    require('Widget/Footer.php');
?>