<?php
require('Widget/Menu.php');
require('Widget/scroll.php');

//sản phẩm liên quan
$connect = mysqli_connect("db","root","example","quanlyshop");

$IDLoai = isset($_SESSION['IDLoai']) ? $_SESSION['IDLoai'] : null;

$query = "select * from sanpham as sp where sp.IDLoai = '" . $IDLoai . "'";

$result = mysqli_query($connect, $query);

//phân trang đánh giá sản phẩm
//số bài trên một trang
$baiTrenMotTrang = 5;

//nếu chưa chọn trang mặc định là trang 0
if (!$_GET['page']) {
    $page = 0;
} else {
    $page = $_GET['page'];
}

$IDSP = isset($_SESSION['IDSP']) ? $_SESSION['IDSP'] : null;

//trang hiện tại
$current_page = !empty($_GET['page']) ? $_GET['page'] : 0;

$querySoDong = "SELECT * from danhgiasanpham where IDSP = '" . $IDSP . "'";
$resultRow = mysqli_query($connect, $querySoDong);

//Tổng số dòng
$soDong = mysqli_num_rows($resultRow);

//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$temp = $page * $baiTrenMotTrang;

//Các đánh giá sản phẩm
$queryReview = "SELECT kh.avatar,kh.hoTen, dg.ngayBinhLuan, dg.binhLuan,dg.star from danhgiasanpham as dg join khachhang as kh on dg.IDKH = kh.ID where IDSP = '" . $IDSP . "' LIMIT $temp , $baiTrenMotTrang";

$resultReview = mysqli_query($connect, $queryReview);
$Sum = mysqli_num_rows($resultReview);


//Giảm giá
$querySuKien = "SELECT * FROM sukien WHERE IDTL = '" . $IDLoai . "'";

$resultSuKien = mysqli_query($connect, $querySuKien);

if ($rowSK = mysqli_fetch_array($resultSuKien)) {
    global $tienGiam;
    $tienGiam = $rowSK['tienGiam'];
}

//thông tin số lượng sản phẩm size còn bao nhieu
$queryAmoutSize = "SELECT soLuongSP FROM khohang as kh WHERE IDSP = '".$IDSP."'";
$resultAmoutSize = mysqli_query($connect,$queryAmoutSize);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/SanPham.css">
    <link rel="stylesheet" href="css/ChiTietSP.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="css/DonMua.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/LienHe.css">
    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>
    <div id="MainBuy">
        <div id="imgSP">
            <img src="<?php if (isset($_SESSION['imgSPBuy'])) echo $_SESSION['imgSPBuy'] ?>" alt="">
        </div>

        <form id="form" action="" method="POST">
            <div id="inforSP">
                <h1><?php if (isset($_SESSION['tenSPBuy'])) echo $_SESSION['tenSPBuy'] ?></h1>

                <div id="total" style="display: flex; margin: 10px 0px" align="center">
                    <?php
                    if ($_SESSION['giaSPGiam'] > 0) { ?>
                        <h4 style="margin: auto 0px; text-decoration: line-through; color: gray"><?php if (isset($_SESSION['giaSPBuy'])) echo format_money($_SESSION['giaSPBuy'], 0, '', '.') ?></h4>
                    <?php }
                    ?>
                    <h2 style="margin: auto 10px; color: red; border-top:0;"><?php if (isset($_SESSION['giaSPGiam'])) echo format_money($_SESSION['giaSPGiam'], 0, '', '.') ?></h2>

                    <?php
                    if ($_SESSION['giaSPGiam'] > 0) { ?>
                        <h4 style="margin: auto 0px; color: white; background: red; width: 50px">-<?php if (isset($_SESSION['tienGiamSK'])) echo $_SESSION['tienGiamSK'] ?>%</h4>
                    <?php } ?>

                </div>


                <div id="Main_Size">
                    <h3>Size</h3>

                    <div>
                        <input type="radio" name="rdSize" checked="true" id="cbSizeS" value="S">S
                        <input type="radio" name="rdSize" id="cbSizeM" value="M">M
                        <input type="radio" name="rdSize" id="cbSizeL" value="L">L
                        <input type="radio" name="rdSize" id="cbSizeXL" value="XL">XL
                    </div>
                </div>

                <div id="TableInfoProduct">
                    <table>      
                        <thead>
                            <tr>
                                <td >S</td>
                                <td >M</td>
                                <td >L</td>
                                <td >XL</td>
                            </tr>                   
                        </thead>
               
                        <tbody>
                            <?php
                                while($rowAmoutSize = mysqli_fetch_array($resultAmoutSize))
                                {?>
                                    <td><?php echo $rowAmoutSize[0]; ?></td>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="Main_Amount">
                    <span>Số Lượng</span>

                    <div class="increase_reduction">
                        <input type="button" name="Reduction" onclick="btReduction();" value="-">
                        <input type="text" name="amout_Product" id="amount" value="1" placeholder="1">
                        <input type="button" name="Increase" onclick="btIncrease();" value="+">
                    </div>

                    <script>
                        function btIncrease() {
                            $value = document.getElementById('amount').value;
                            $value++;
                            document.getElementById('amount').value = $value;
                        }

                        function btReduction() {
                            $value = document.getElementById('amount').value;
                            $value--;
                            document.getElementById('amount').value = $value;
                        }
                    </script>
                </div>

                <div id="Container_Notifi">

                </div>

                <div class="incCrart_buyProduct">

                    <?php
                    //nếu sản phẩm cháy hàng thì không cho mua và thêm giỏ hàng
                    if(isset($_SESSION['soLuong']))
                    {?>
                        <input readonly style="opacity: 0.7; cursor: default" type="button" id="btIncreaCart" value="Thêm Vào Giỏ Hàng"></input>
                        <input readonly style="opacity: 0.7; cursor: default" type="button" id="btBuyProduct" value="Mua Hàng"></input>
                 <?php }
                    else //ngược lại cho phép mua và thêm giỏ hàng
                 {?>
                        <input type="button" onclick="IncreaProduct();" id="btIncreaCart" value="Thêm Vào Giỏ Hàng"></input>
                        <input type="button" onclick="BuyProduct();" id="btBuyProduct" value="Mua Hàng"></input> 
               <?php  }?>


                    <script>
                        function BuyProduct() {
                            this.form.action = 'PHP/XulyclickMuaHang.php';
                            this.form.submit();
                        }

                        function IncreaProduct() {
                            const check = document.getElementById('Container_Notifi');
                            if (check) {

                                const toast = document.createElement('div');

                                toast.classList.add('toast');
                                toast.innerHTML = `
                                                <div id="Notification">
                                                        <h4>Thêm giỏ hàng thành công</h4>
                                                </div>
                                                `;
                                check.appendChild(toast);

                                this.form.action = 'PHP/Xulygiohang.php';
                                this.form.submit();
                            }
                        }
                    </script>
                </div>
            </div>
        </form>

        <div id="describeSP">
            <div>
                <h1>Mô Tả Sản Phẩm</h1>
                <h4><?php if (isset($_SESSION['mieuTaSPBuy'])) echo $_SESSION['mieuTaSPBuy'] ?></h4>
            </div>

            <div>
                <h1>Điều Khoản Dịch Vụ</h1>
                <h3>Lưu ý khi đặt hàng</h3>
                <ul>
                    <li>
                        <p>Các bạn check lại thông tin , kiểm tra lại thông tin đơn hàng trong Email
                    </li>
                    <li>
                        <p>Các đơn hàng sẽ được gọi xác nhận trong 48h kể từ lúc đặt
                    </li>
                    <li>
                        <p>Thời gian nhận hàng tầm 2-3 ngày (nội thành),3 - 4 ngày (ngoại thành)
                    </li>
                    <li>
                        <p>Khi các bạn nhận được hàng bạn nhớ lưu ý KIỂM TRA HÀNG VỚI SHIPPER
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="ImageSize">
        <div class="Nav__Staff--Contact" style="margin-top: -50px">
                <b></b>
                <h2>Hướng Dẫn Chọn Size</h2>
                <b></b>
        </div>

        <div style="margin: 30px 50px">
            <img class="ImageSize__1" style="width:600px; height: 420px" src="/Image/Nen/SizeAo.png" alt="">
            <img class="ImageSize__2" style="width:600px; height: 420px" src="/Image/Nen/SizeQuan.png" alt="">
        </div>
        <img class="ImageSize__3" id="imgSizeShoes" style="margin: 10px 50%; transform:translateX(-50%); Width: 750px; Height: 450px;" src="/Image/Nen/SizeGiay.jpg" alt="">

    </div>

    <!-- những sản phẩm liên quan -->
    <div class="Main_ProductRelation">
        <div class="Nav__Staff--Contact" style="margin-top: -20px">
            <b></b>
            <h2>Sản Phẩm Liên Quan</h2>
            <b></b>
        </div>

        <div class="List_ProductRelation">
            <?php
            while ($row = mysqli_fetch_array($result)) { ?>
                <div align="center" class="SubProduct">
                    <?php
                    //nếu IDLoai == -1 là trang tất cả sản phẩm
                    if ($IDLoai == -1) {
                        //truy vấn sự kiện
                        $querySuKien = "SELECT * FROM sukien";

                        $resultSuKien = mysqli_query($connect, $querySuKien);

                        while ($rowSK = mysqli_fetch_array($resultSuKien)) {
                            //nếu IDTL bên sự kiện == IDLoai của sản phẩm thì tạo thẻ giảm giá
                            if ($rowSK['IDTL'] == $row['IDLoai']) { ?>
                                <span class="Discount">-<?php if (isset($rowSK['tienGiam']))  echo $rowSK['tienGiam'] ?>%</span>
                        <?php  }
                        } ?>

                        <?php
                        if ($row['soLuong'] == 0) { ?>
                            <span id="Sold_Out">Cháy hàng</span>
                        <?php } ?>

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>" id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $row['imageSP'] ?>">
                        </a>

                        <p><?php echo $row['tenSP'] ?>
                        <div style="display:flex; width:100%; justify-content:center">
                            <?php
                            if ($row['giaGiam'] > 0) { ?>
                                <p style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px"><?php echo format_money($row['giaSP'], 0, '', '.') ?></p>
                            <?php } ?>

                            <p><?php echo format_money($row['giaSP'] - $row['giaGiam'], 0, '', '.') ?>
                        </div>
                        <?php } else {
                        if (isset($tienGiam)) { ?>
                            <span class="Discount"><?php echo $tienGiam ?>%</span>
                        <?php  } ?>

                        <?php
                        if ($row['soLuong'] == 0) { ?>
                            <span id="Sold_Out">Cháy hàng</span>
                        <?php } ?>

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>" id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $row['imageSP'] ?>">
                        </a>

                        <p><?php echo $row['tenSP'] ?>
                        <div style="display:flex; width:100%; justify-content:center">
                            <?php
                            if ($row['giaGiam'] > 0) { ?>
                                <p style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px"><?php echo format_money($row['giaSP'], 0, '', '.') ?></p>
                            <?php } ?>

                            <p><?php echo format_money($row['giaSP'] - $row['giaGiam'], 0, '', '.') ?>
                        </div>
                    <?php  } ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- đánh giá sản phẩm -->
    <div class="reviewProduct">
        <div class="Nav__Staff--Contact" style="margin-top: -20px">
            <b></b>
            <h2>Sản Phẩm Liên Quan</h2>
            <b></b>
        </div>
        
        <h5 align="center" style="margin: 10px"><?php echo $Sum; ?> Bình luận</h5>

        <form id="formReview" action="" method="POST" onsubmit="return false;">
            <div class="comment">
                <style>
                    #comment {
                        margin-bottom: 60px;
                    }

                    .Content input {
                        margin-top: 10px;
                        width: 92%;
                    }

                    .comment img {

                        margin-top: 22px;
                    }

                    #submit_Content {
                        outline: none;
                        height: 30px;
                        width: 81px;
                    }

                    .Content {
                        margin-left: 10px;
                    }

                    .star-container {
                        position: relative;
                        height: 20px;
                        width: 150px;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                    }

                    .star-container i.default {
                        color: #ccc;
                    }

                    .star-container i.active {
                        color: #e39b24;

                    }
                    .star-container ~ i {
                        margin: 0 40px;
                    }
                </style>

                <!-- đánh giá sản phẩm -->
                <div id="comment" class="Nav_Comment">
                    <img src="<?php if (isset($_SESSION['image'])) echo $_SESSION['image']; ?>" alt="">
                    <div class="Content">
                        <h4 style="margin-left: 18px;">Đánh giá dịch vụ</h4>
                        <div class="rateyo" id="rating" data-rateyo-full-star="true" data-rateyo-num-stars="5">
                        </div>
                        <input type="hidden" name="rating">
                        <input style="border: none; border-bottom: 1px solid gray; padding-left: 15px;" name="review" type="textarea" value="">
                        <input style="border: 1px solid gray; cursor: grab;" onclick="InsertReview();" id="submit_Content" type="button" value="Đăng">
                    </div>
                </div>
            </div>

            <script>
                function InsertReview() {
                    this.formReview.action = 'PHP/Xulybinhluansanpham.php';
                    this.formReview.submit();
                }
            </script>
        </form>

        <!-- load các đánh giá sản phẩm -->
        <div class="Contain_Comment">
            <?php
            while ($row = mysqli_fetch_array($resultReview)) { ?>
                <div style="border-top: 1px solid gray" class="comment">
                    <div class="Nav_Comment">
                        <img src="<?php echo $row['avatar']; ?>" alt="">
                        <div class="Content">
                            <?php if (!empty($row['star'])) { ?>
                                <div class="star-container">
                                    <?php
                                    //tạo ra 5 ngôi sao
                                    for ($i = 1; $i <= 5; $i++) {

                                        //mặc định màu trắng
                                        $star = "default";

                                        //nếu $star nhỏ hơn số lượng star trong database thì đổi màu
                                        if ($i <= $row['star']) {
                                            //đổi màu ngôi sao
                                            $star = "active";
                                        }
                                        //hiển thị sao lên
                                        echo "<i class='fa-solid fa-star {$star}'></i>";
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                            <p style="font-size: 15px; font-weight: bold"><?php echo $row['hoTen'] ?></p>
                            <p style="color: gray; font-size: 12px; font-weight: bold"><?php echo $row['ngayBinhLuan'] ?></p>
                            <p><?php echo $row['binhLuan']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- phân trang -->
        <div class="Pagination" style="margin: 20px 0">
            <?php
            //về trang đầu
            if ($current_page > 0) {
                $StartPage = 0;
                echo "<a id='numberPage' href='ChiTietSP.php?page={$StartPage}'>Đầu</a>";
            }

            //bắt đầu trang 1 hiện nút trước
            if ($current_page > 0) {
                $previous_page = $current_page - 1;
                echo "<a id='previous_Number' href='ChiTietSP.php?page={$previous_page}'>Trước</a>";
            }

            for ($page = 0; $page < $soTrang; $page++) {
                if ($current_page == $page)
                    echo "<strong id='current_Page' href='ChiTietSP.php?page={$page}'>{$page}</strong>";
                else {
                    //nằm từ khoản +-3
                    if ($page > $current_page - 3 && $page < $current_page + 3)
                        echo "<a id='numberPage' href='ChiTietSP.php?page={$page}'>{$page}</a>";
                }
            }

            //trang đầu tiên và trang cuối thì hiện nút sau
            if ($current_page >= 0 && $current_page < $page - 1) {
                $after_page = $current_page + 1;
                echo "<a id='affter_Number' href='ChiTietSP.php?page={$after_page}'>Sau</a>";
            }

            //tới trang cuối
            if ($current_page >= 0 && $current_page < $page - 1) {
                $EndPage = $page - 1;
                echo "<a id='numberPage' href='ChiTietSP.php?page={$EndPage}'>Cuối</a>";
            }
            ?>
        </div>
    </div>

</body>

<script src="./js/jquery.js"></script>
<script src="./js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });
</script>

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
            ScrollReveal().reveal('.ImageSize__1', { delay: 10, origin: 'left'});
            ScrollReveal().reveal('.ImageSize__2', { delay: 10, origin: 'right'});
            ScrollReveal().reveal('.ImageSize__3', { delay: 10, origin: 'bottom'});

        </script>
</html>

<?php
require('Widget/Footer.php');
?>