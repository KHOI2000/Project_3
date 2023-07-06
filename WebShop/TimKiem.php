<?php
    require('Widget/Menu.php');
    require('Widget/Sub_Menu.php');
    require('Widget/scroll.php');

    $tenTimkiem = isset($_POST["tenSPTK"]) ? $_POST["tenSPTK"] : null;
                    
    $query = "select * from sanpham as sp where sp.tenSP like '".'%'.$tenTimkiem.'%'."'";
            
    $result = mysqli_query(connect(),$query);
    $countCheck = mysqli_num_rows($result);

    mysqli_close(connect());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/SanPham.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://unpkg.com/scrollreveal"></script>

    <title>Document</title>
</head>
<body>
<div class="Main-Product"  style="Margin: 200px auto;">
            <?php
                 while($row = mysqli_fetch_array($result))
                 { ?>
                     <div align="center" class="SubProduct">
 
                     <?php
                         $querySK = "SELECT * FROM sukien";
                         $resultSK = mysqli_query(connect(),$querySK);
 
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
                 <?php
                 if($countCheck == 0)
                 {  ?>
                    <h2 style="text-align: center; margin: 180px 0;" id="Result">Không tìm thấy kết quả nào</h2>                 
                <?php } ?>
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