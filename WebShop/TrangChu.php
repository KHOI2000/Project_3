<?php
require_once('Widget/Menu.php');
require('Widget/scroll.php');

//session thể loại đồ load tất cả
$_SESSION['IDLoai'] = -1;


$queryProductHot = "SELECT sp.soLuong,sp.giaGiam,sp.brand,sp.IDLoai,sp.ID,ls.IDSP,ls.soLuongDat,ls.size,sp.ImageSP,sp.tenSP,sp.giaSP,sum(ls.soLuongDat) 
                    FROM sanpham as sp 
                    join lichsumuahang as ls 
                    on sp.ID = ls.IDSP 
                    GROUP BY ls.IDSP,ls.soLuongDat,ls.size,sp.ImageSP,sp.tenSP,sp.giaSP
                    HAVING sum(ls.soLuongDat) >= 10
                    ORDER BY sum(ls.soLuongDat)
                    LIMIT 4";

$result = mysqli_query(connect(), $queryProductHot);

mysqli_close(connect());
?>

<html>

<head>
    <meta charset="utf8">
    <title> Trang Chủ</title>
    <link rel="stylesheet" href="css/TrangChu.css">
    <link rel="stylesheet" href="css/Footer.css">
    <link rel="stylesheet" href="css/SanPham.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    #Top_Product {
        max-width: 1120px;
        margin: 0 auto;
        overflow: hidden;
    }

    .Main-Product {
        margin: 10px auto;
        flex-wrap: nowrap;
        height: 420px;
        justify-content: left;
        transition: transform 0.3s linear;
    }

    .SubProduct {
        overflow: unset;
        height: 330px;
        margin: auto 30px;
    }

    #ImgShirt {
        width: 220px;
        height: 200px;
        padding: 10px 10px;
    }
    </style>
</head>
<style>
.custom-bottom h2,
.custom-bottom .h2 {
    font-size: 50px;
}
</style>

<body>
    <div class="formMain" align="center">
        <div class="formMain-Image-container">

            <i class="fa-solid fa-angle-left left"></i>

            <div class="formMain-Image">
                <div class="image-item">
                    <img class="formMain Image-Introduce" src="/Image/Nen/2.jpg" alt="">
                </div>
                <div class="image-item">
                    <img class="formMain Image-Introduce" src="/Image/TrangChu/4.jpg" alt="">
                </div>
                <div class="image-item">
                    <img class="formMain Image-Introduce"
                        src="https://theme.hstatic.net/1000388594/1000727279/14/slideshow_1.jpg?v=623" alt="">
                </div>
                <div class="image-item">
                    <img class="formMain Image-Introduce"
                        src="https://theme.hstatic.net/1000388594/1000727279/14/slideshow_5.jpg?v=623" alt="">
                </div>
            </div>

            <i class="fa-solid fa-angle-right right"></i>

            <script>
            const sliderMain = document.querySelector(".formMain-Image");
            const sliderItems = document.querySelectorAll(".image-item");
            const prevSlide = document.querySelector(".left");
            const nextSlide = document.querySelector(".right");
            let currentIndex = 0;
            nextSlide.addEventListener("click", () => handleChangeSlider("next"));
            prevSlide.addEventListener("click", () => handleChangeSlider("prev"));

            function handleChangeSlider(direction) {
                if (direction == "next") {
                    currentIndex++;
                    console.log(currentIndex)
                    if (currentIndex >= sliderItems.length) {
                        currentIndex = 0;
                    }
                    updateSlider();
                } else if (direction == "prev") {
                    currentIndex--;
                    if (currentIndex < 0) {
                        currentIndex = sliderItems.length - 1;
                    }
                    updateSlider();
                }

                function updateSlider() {
                    sliderMain.style.transform = `translateX(-${currentIndex * 100}%)`;
                }
            }
            setInterval(() => {
                nextSlide.click();
            }, 3000);
            </script>
        </div>

        <div class="formMain-Introduce">
            <div class="Introduce">
                <img class="formMain-icon" src="/Image/Icon/1.png" alt="">
                <h1>FREESHIP</h1>
                <p>Miễn phí vận chuyển giao hàng siêu nhanh.
            </div>

            <div class="Introduce">
                <img class="formMain-icon" src="/Image/Icon/3.png" alt="">
                <h1>HOÀN TIỀN 100%</h1>
                <p>Sản phẩm lỗi khi giao hàng được hoàn tiền 100%. Có thể trả sản phẩm trong khoảng thời gian 1-2H sau
                    khi nhận hàng</p>
            </div>

            <div class="Introduce">
                <img class="formMain-icon" src="/Image/Icon/2.png" alt="">
                <h1>HỖ TRỢ 24/7</h1>
                <p>Hỗ trợ khách hàng về mặt hàng hoặc mọi thắc mắc xuyên suốt 24 giờ</p>
            </div>
        </div>
    </div>

    <div class="Instruction">
        <section>
            <div class="sesstion__1">
                <div class="TitleItem" style="margin:50px 0;">
                    <b></b>
                    <span>PHONG CÁCH - THỜI TRANG - HIỆN ĐẠI</span>
                    <b></b>
                </div>
                <div class="Clothes">
                    <img class=""
                        src="https://img3.thuthuatphanmem.vn/uploads/2019/10/14/banner-thoi-trang-nam-nu_113857303.jpg"
                        alt="">
                    <img class=""
                        src="https://img6.thuthuatphanmem.vn/uploads/2022/03/04/background-quang-cao-thoi-trang-quan-ao_025656570.jpg"
                        alt="">
                    <img class=""
                        src="https://dep.com.vn/wp-content/uploads/2018/08/louisvuitton_newwave_chaubui_deponline_banner_20180808.jpg"
                        alt="">
                </div>

                <div class="Contain_Brand">
                    <div class="BrandItem">
                        <a href="Brand.php?page=Sản Phẩm&TheLoai=Nike">
                            <img class="" src="/Image/TrangChu/nike.png" alt="">
                        </a>
                    </div>

                    <div class="BrandItem">
                        <a href="Brand.php?page=Sản Phẩm&TheLoai=Gucci">
                            <img class="" src="/Image/TrangChu/gucci.png" alt="">
                        </a>
                    </div>

                    <div class="BrandItem">
                        <a href="Brand.php?page=Sản Phẩm&TheLoai=Puma">
                            <img class="" src="/Image/TrangChu/puma.png" alt="">
                        </a>
                    </div>

                    <div class="BrandItem">
                        <a href="Brand.php?page=Sản Phẩm&TheLoai=Lv">
                            <img class="" src="/Image/TrangChu/Lv.png" alt="">
                        </a>
                    </div>

                    <div class="BrandItem">
                        <a href="Brand.php?page=Sản Phẩm&TheLoai=Adidas">
                            <img class="" src="/Image/TrangChu/adidas.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="Top_Product">
            <div class="TitleItem">
                <b></b>
                <span>SẢN PHẨM BÁN CHẠY</span>
                <b></b>
            </div>
            <form action="" method="GET">
                <div class="Main-Product">
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

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&brand=<?php echo $row['brand']; ?>&id=<?php echo $row['ID']; ?>&IDLoai=<?php echo $row['IDLoai']; ?>"
                            id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $row['ImageSP']?>"></a>

                        <?php
                            if($row['soLuong'] == 0)
                            { ?>
                        <span id="Sold_Out">Cháy hàng</span>
                        <?php }?>

                        <p><?php echo $row['tenSP']?></p>
                        <div style="display:flex; width:100%; justify-content:center">
                            <?php
                                    if($row['giaGiam'] > 0)
                                    {?>
                            <p
                                style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px">
                                <?php echo format_money($row['giaSP'],0,'','.')?></p>
                            <?php }?>

                            <p><?php echo format_money($row['giaSP'] - $row['giaGiam'],0,'','.')?>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </form>
        </section>

        <section id="Top_Product">
            <div class="TitleItem">
                <b></b>
                <span>SALE OFF</span>
                <b></b>
            </div>
            <form action="" method="GET">
                <div class="Main-Product">
                    <?php                    
                $querySale = "SELECT sp.ID, sp.IDLoai, sp.tenSP, sp.giaSP, sp.giaGiam, sp.brand, sp.imageSP, sk.tienGiam 
                              from sanpham as sp join sukien as sk on sp.IDLoai = sk.IDTL 
                              WHERE giagiam > 0 LIMIT 4";

                $resultSale = mysqli_query(connect(),$querySale);
 
                while($rowSKSale = mysqli_fetch_array($resultSale))
                {?>
                    <div class="SubProduct">
                        <span
                            class="Discount">-<?php if(isset($rowSKSale['tienGiam']))  echo $rowSKSale['tienGiam']?>%</span>

                        <a href="PHP/Xulychitietsanpham.php?page=danhsach&brand=<?php echo $rowSKSale['brand']; ?>&id=<?php echo $rowSKSale['ID']; ?>&IDLoai=<?php echo $rowSKSale['IDLoai']; ?>"
                            id="buyProduct">
                            <img type="image" id="ImgShirt" src="<?php echo $rowSKSale['imageSP']?>"></a>

                        <p><?php echo $rowSKSale['tenSP']?></p>

                        <div style="display:flex; width:100%; justify-content:center">
                            <p
                                style="text-decoration:line-through; color:gray; font-weight:500; font-size: 15px; margin: auto 10px">
                                <?php echo format_money($rowSKSale['giaSP'],0,'','.')?></p>

                            <p><?php echo format_money($rowSKSale['giaSP'] - $rowSKSale['giaGiam'],0,'','.')?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </form>
        </section>

        <section class="Instruction__section1">
            <div class="Instruction__section1__Contain">
                <h3>Giới thiệu cửa hàng</h3>
                <hr>
                <p>CHÚNG TÔI CUNG CẤP BẠN CÁC HÀNG HÓA UNIQUE VỀ SẢN PHẨM CỦA CHÚNG TÔI LÀ BẢO QUẢN REAL.</p>
                <p>Với kinh nghiệm 100 năm sản xuất trang sức thủ công, chúng tôi tin rằng bạn sẽ hài lòng với sản phẩm
                    của chúng tôi. Giá cả phải chăng, mẫu mã đẹp mắt, màu sắc đa dạng, chúng tôi cam kết sẽ làm bạn hài
                    lòng.</p>
            </div>
        </section>

        <section class="newPage">
            <div class="newPage__Container">
                <div class="TitleItem">
                    <b></b>
                    <span>TIN TỨC</span>
                    <b></b>
                </div>
                <div class="newPage__mainContainer">
                    <div class="newPage_sub">
                        <img src="//bizweb.dktcdn.net/100/332/764/articles/deo-kinh-hang-hieu-sao-viet-nao-sanh-dieu-nhat-b016f6.jpg?v=1540197035383"
                            alt="">

                        <div class="newPage_sub__Date"><span>19-5-2022</span></div>

                        <div class="newPage__Container__Content">
                            <h3>
                                <a href="">Ưu đãi ngập mừng tưng bừng cơ sở</a>
                            </h3>
                            <p>
                                Kính râm và các vấn đề sức khỏe
                                Mọi người đều biết tới những nguy hiểm của ánh nắng mặt trời đối với làn da của chúng
                                ta. Nhưng nhiều người khôn...

                            </p>
                        </div>
                    </div>

                    <div class="newPage_sub">
                        <div class="newPage_sub__Date newDate__Bottom"><span>9-6-2022</span></div>

                        <div class="newPage__Container__Content">
                            <h3>
                                <a href="">Cùng Wibugangz chào hè với bộ sưu tập áo Polo cho chàng trai công sở</a>
                            </h3>
                            <p>
                                Chắc hẳn trong tủ đồ của những chàng trai tinh tế,
                                gout thời trang tinh tế không thể thiếu được...
                            </p>
                        </div>

                        <img class="newPage__Img__Middle" style="margin-top: 0; height:250px"
                            src="//bizweb.dktcdn.net/100/332/764/articles/kinh-ram-can-rayban-club-master-3.jpg?v=1544064669880"
                            alt="">
                    </div>

                    <div class="newPage_sub">
                        <img src="//bizweb.dktcdn.net/100/332/764/articles/ddd.jpg?v=1544065261837" alt="">
                        <div class="newPage_sub__Date "><span>2-7-2022</span></div>

                        <div class="newPage__Container__Content">
                            <h3>
                                <a href="">Ngày hội sale toàn chi nhánh Wibugang</a>
                            </h3>
                            <p>
                                Nhanh chân lên nào các khách hàng thân yêu của Wibugang ơi! Chúng tôi đang tưng bừng
                                khai trương cửa hàng...
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="Contain_ReviewUser">
            <div class="TitleItem">
                <b></b>
                <span>KHÁCH HÀNG NÓI GÌ VỀ Wibugang</span>
                <b></b>
            </div>

            <div class="Nav_Review__Body">
                <div class="Nav_Review">
                    <div class="Nav_ReviewUser">
                        <div class="Image_ReviewUser">
                            <img src="/Image/KhachHang/meo4.jfif" alt="">
                        </div>

                        <div class="ReviewUser">
                            <h4>Kuro</h4>
                            <h5>11-03-1993</h5>
                            <p>
                                Điều đầu tiên tôi muốn nói là đội ngũ nhân viên tư vấn rất nhiệt tình, <br>
                                mặt dù hỏi rất nhiều nhưng các bạn nhân viên cũng chịu khó trả lời chi tiết. <br><br>
                                Quy trình bán hàng bài bản, có vài trường hợp đột xuất xảy ra thì các bạn vẫn giải quyết
                                hết sức bình tĩnh, biết cách trấn an khách hàng.<br><br>
                                Tốt hay không tốt cũng phải tùy thuộc vào giá trị trải nghiệm của khách hàng, nhưng đối
                                với tôi Wibugangz là một cửa hàng có những sản phẩm đẹp, chất lượng, giá cả hợp lí,…
                                <br>
                                và một điều đặc biệt là luôn luôn rất chiều khách.<br><br>
                                Chúc Wibugangz phát triển hơn nữa và ngày càng vững mạnh nhé!”<br>
                            </p>
                        </div>
                    </div>

                    <div class="Nav_ReviewUser">
                        <div class="Image_ReviewUser">
                            <img src="/Image/KhachHang/meo1.jpg" alt="">
                        </div>

                        <div class="ReviewUser">
                            <h4>Oggy</h4>
                            <h5>11-03-2002</h5>
                            <p>
                                Mặc dù là cửa hàng thời trang mới ra mắt, nhưng tôi cảm thấy Wibugang <br>
                                có một đội ngũ nhân viên vô cùng chuyên nghiệp, các bạn tư vấn, hỗ trợ cho khách hàng
                                rất nhiệt tình và vui vẻ.<br><br>
                                Tại Wibugangz tôi có được nhiều sự lựa chọn về phong cách thời trang, từ quần áo,<br>
                                phụ kiện, từ mẫu mã, kiểu dáng đến màu sắc đều rất đa dạng. <br><br>
                                Lần đầu mua hàng tại Wibugangz tôi thấy chất lượng các sản phẩm rất tốt, khiến tôi muốn
                                trở thành khách hàng trung thành của cửa hàng.<br><br>
                                Chúc cho Wibugangz ngày càng thành công và phát triển hơn nhé!
                            </p>
                        </div>
                    </div>

                    <div class="Nav_ReviewUser">
                        <div class="Image_ReviewUser">
                            <img src="/Image/KhachHang/meo2.jpg" alt="">
                        </div>

                        <div class="ReviewUser">
                            <h4>Tom</h4>
                            <h5>11-03-2002</h5>
                            <p>
                                Tôi cảm thấy rất hài lòng với những bài viết tư vấn về cách phối đồ cũng như về màu sắc
                                trang phục mà Wibugangz mang lại. <br><br>
                                Một cửa hàng thời trang không chỉ mang lại cho khách hàng nhiều sản phẩm để lựa chọn mà
                                cửa hàng đó phải giúp khách hàng giải quyết những vấn đề đang gặp phải,<br>
                                giúp tôi có những bộ trang phục trên sức tuyệt vời. Không những vậy, đội ngũ nhân viên ở
                                đây còn hỗ trợ, tư vấn, <br>
                                báo giá hết sức nhiệt tình và minh bạch. <br><br>
                                Cảm ơn Wibugangz rất nhiều.”
                            </p>
                        </div>
                    </div>

                    <div class="Nav_ReviewUser">
                        <div class="Image_ReviewUser">
                            <img src="/Image/KhachHang/meo3.jpg" alt="">
                        </div>

                        <div class="ReviewUser">
                            <h4>Jack</h4>
                            <h5>11-03-2002</h5>
                            <p>
                                Lúc đầu khi tôi còn lo lắng không biết nên sắm cho mình những bộ quần áo ở đâu, <br>
                                sau khi tìm hiểu và biết đến Wibugangz, tôi đã mua thử các sản phẩm ở đây. <br><br>
                                Tôi rất yên tâm về sự tỉ mỉ và hỗ trợ rất nhanh các thủ tục mua bán và thanh toán tại
                                Wibugangz.<br>
                                Sau đó, tôi đã trở thành khách hàng trung thành của Wibugangz <br>
                                và khi có bạn bè hay người quen cần tôi tư vấn nên mặc gì mà mua hàng ở đâu tôi vẫn giới
                                thiệu Wibugangz của các bạn.”<br>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="radioReview">
                    <input type="radio" name="radioReview" checked="true">
                    <input type="radio" name="radioReview">
                    <input type="radio" name="radioReview">
                    <input type="radio" name="radioReview">
                </div>
            </div>
            <script>
            const sliderReview = document.querySelector(".Nav_Review");
            const sliderItemsReview = document.querySelectorAll(".Nav_ReviewUser");
            const prevSlideReview = document.querySelector(".left");
            const nextSlideReview = document.querySelector(".right");

            let currentIndexReview = 0;

            nextSlideReview.addEventListener("click", () => handleChangeSliderReview("next"));
            prevSlideReview.addEventListener("click", () => handleChangeSliderReview("prev"));

            var radio = document.getElementsByName('radioReview');

            var i = 0;

            //click chọn theo review
            radio[0].onclick = function() {
                i = 0;
                currentIndexReview = 0;
                updateSliderReview();
            };

            radio[1].onclick = function() {
                i = 1;
                currentIndexReview = 1;
                updateSliderReview();
            };

            radio[2].onclick = function() {
                i = 2;
                currentIndexReview = 2;
                updateSliderReview();
            };

            radio[3].onclick = function() {
                i = 3;
                currentIndexReview = 3;
                updateSliderReview();
            };

            function handleChangeSliderReview(direction) {
                if (direction == "next") {
                    currentIndexReview++;

                    //radio checked theo vị trí tăng dần
                    i++;

                    //vị trí == 4 trở về 0 radio[0].checked = true
                    if (i == 4) {
                        i = 0;
                        currentIndexReview = 0;
                        updateSliderReview();
                    }

                    radio[i].checked = true;

                    if (currentIndexReview >= sliderItemsReview.length) {
                        currentIndexReview = 0;
                    }
                    updateSliderReview();

                } else if (direction == "prev") {
                    currentIndexReview--;

                    if (currentIndexReview < 0) {
                        currentIndexReview = sliderItemsReview.length - 1;
                    }
                    updateSliderReview();
                }
            }

            function updateSliderReview() {
                sliderReview.style.transform = `translateX(-${currentIndexReview * 100}%)`;
            }
            </script>
    </div>
    </div>

    <div class="parallax"
        style="background-image: url(https://bizweb.dktcdn.net/100/113/556/themes/161811/assets/cb-bg-img.jpg?1638784216916);">
        <div class="custom-bottom">
            <h3>BỘ SƯU TẬP 2022</h3>
            <h2>MIỄN PHÍ VẬN CHUYỂN</h2>
            <div class="des-1">CHO ĐƠN HÀNG TRÊN 500K</div>
            <div class="des-2">CHƯƠNG TRÌNH NÀY ĐƯỢC ÁP DỤNG TRÊN MỌI MẶT HÀNG CỦA CHÚNG TÔI</div>
        </div>
    </div>

    <script>
    //event scroll animation
    ScrollReveal({
        reset: true, //reset animation
        distance: '150px', //khoảng cách animation
        duration: 1500, //thời gian chạy
        delay: 25 //delay
    });

    //set aniamtion cho thẻ
    ScrollReveal().reveal('.Introduce', {
        delay: 10,
        origin: 'top',
        interval: 100
    });
    ScrollReveal().reveal('.Clothes img', {
        delay: 30,
        origin: 'top',
        interval: 200
    });
    ScrollReveal().reveal('.BrandItem', {
        delay: 40,
        origin: 'top',
        interval: 50
    });
    ScrollReveal().reveal('.TitleItem', {
        delay: 200,
        origin: 'left'
    });
    ScrollReveal().reveal('.Instruction__section1__Contain h3', {
        delay: 200,
        origin: 'top'
    });
    ScrollReveal().reveal('.Instruction__section1__Contain hr', {
        delay: 30,
        origin: 'left'
    });
    ScrollReveal().reveal('.Instruction__section1__Contain p', {
        delay: 200,
        origin: 'left'
    });
    ScrollReveal().reveal('.newPage_sub img', {
        delay: 5,
        origin: 'top'
    });
    ScrollReveal().reveal('.newPage__Img__Middle', {
        delay: 5,
        origin: 'bottom'
    });
    ScrollReveal().reveal('.newPage__Container__Content p', {
        delay: 100,
        origin: 'left'
    });
    ScrollReveal().reveal('.Nav_Review', {
        delay: 5,
        origin: 'top'
    });
    ScrollReveal().reveal('.custom-bottom h3', {
        delay: 5,
        origin: 'top'
    });
    ScrollReveal().reveal('.custom-bottom h2', {
        delay: 5,
        origin: 'right'
    });
    ScrollReveal().reveal('.des-1', {
        delay: 5,
        origin: 'bottom'
    });
    ScrollReveal().reveal('.des-2', {
        delay: 5,
        origin: 'left'
    });
    </script>
</body>

</html>

<?php
require('Widget/Footer.php');

?>