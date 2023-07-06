<?php
        if(session_id() === '')
            session_start();

        require_once("PHP/function.php");
        require("Config.php");

        $IDKH = isset($_SESSION['IDKH']) ? $_SESSION['IDKH'] : null;

        //giỏ hàng
        $query = "select sp.imageSP, sp.tenSP ,(gh.soLuongDat * sp.giaSP) as toTal from giohang as gh join sanpham as sp on gh.IDSP = sp.ID where IDKH = '".$IDKH."'";

        $result = mysqli_query(connect(),$query);

        //số lượng giỏ hàng
        $querySumCart = "select count(gh.ID) as sumCart from giohang as gh where gh.IDKH = '".$IDKH."'";

        $resultSumCart = mysqli_query(connect(),$querySumCart);

        $rowSumCart = mysqli_fetch_array($resultSumCart);
        global $sumCart;

        $sumCart = $rowSumCart['sumCart'];

        //sự kiện
        $querySK = "select * from sukien";

        $resultSK = mysqli_query(connect(),$querySK);

        //số lượng sự kiện
        $querySumSK = "select count(sukien.ID) as sumSK from sukien";

        $resultSumSK = mysqli_query(connect(),$querySumSK);

        $rowSumSK = mysqli_fetch_array($resultSumSK);

        global $sumSK;

        $sumSK = $rowSumSK['sumSK'];

    mysqli_close(connect());
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Menu.css">
    <link rel="stylesheet" href="/css/SanPham.css">
    <link rel="stylesheet" href="/css/DangNhap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>  
    <div id="wrapper">
        <div id="HeaderSearch" class="Header_Search">
            <div style="color:black;">
                <img class="Header_Logo" src="/Image/Menu/Logo.ico">
            </div>

            <div id="menu-search">
                <form action="TimKiem.php?page=Sản Phẩm&TheLoai=Tìm Kiếm" method="POST">
                    <div id="Contain_SearchProc">
                        <input type="text" value="" name="tenSPTK" id="IDTimKiem" placeholder="Tìm Kiếm">
                        <input type="submit" class="btTimKiem" value="">
                    </div>
                </form>
            </div>

            <!-- thông tin đăng nhập -->
        <div class="Header_Infor">
            <div class="Contain_HistoryCart">                  

                <ul id="main-menu">
                    <!-- php -->
                    <?php
                        if(isset($_SESSION['Logined']))
                        {?>
                            <div id="DivInfor">
                                <li id="menu-Infor">
                                    <a>
                                        <img src="<?php if(isset($_SESSION['image'])) echo $_SESSION['image'] ?>">
                                        <?php if(isset($_SESSION['hoTen'])) echo $_SESSION['hoTen'] ?></a>    
                                    <ul class="sub-menu_Infor">
                                        <li><a href="/taiKhoan.php">Tài Khoản</a></li>
                                        <li><a href="/DonMua.php">Đơn Mua</a></li>
                                        <li><a href="/PHP/Xulydangxuat.php">Đăng Xuất</a></li>                      
                                    </ul>
                                </li>
                            </div> 
                    <?php }else
                    {?>
                        <div id="DivDangNhap">
                            <li class="menu-DangNhap">
                                <a href="/DangNhap.php" name="btDangNhap">
                                    <img src="/Image/Menu/account.png">
                                </a></li>                
                    <?php }?>
                </ul>                      
            </div>

            <!-- thông tin sự kiện -->
            <div class="Contain_Event Contain_HistoryCart">                  
                <img src="/Image/Menu/notification.png" alt=""><span id="sumCart"><?php echo $sumSK?></span></img>

                    <div class="History_Cart">
                        <h3 align="center">Sự kiện gần đây</h3>
                                <?php
                                    while($rowSK = mysqli_fetch_array($resultSK))
                                    {
                                    ?>
                                        <div class="Container_History">                  
                                            <div style="margin-right: 20px;" class="Contain__Img">
                                                <img id="Container_History_Img" src="<?php echo $rowSK['image'];?>" alt="">
                                            </div>

                                            <div class="Contain__InforHistory">
                                                <a style="text-decoration: none; color:rebeccapurple;width:100%" href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nam&IDLoai=<?php echo $rowSK['IDTL'] ?>"><h1 style="font-size: 20px;"><u style="text-decoration: none;"><?php echo $rowSK['tenSK'] ?></h1></u></a>
                                                <h4 style="margin: -10px auto; color: gray; font-size: 12px"><?php echo $rowSK['ngayBatDau']?> - <span><?php echo $rowSK['ngayKetThuc']?></span></h4>
                                                <h5 ><?php echo $rowSK['noiDungSK'] ?></h5>
                                            </div>
                                        </div>     
                                <?php }?>                         
                            </div>
                </div>       

                <!-- Giỏ hàng-->
                <div class="Contain_HistoryCart">
                            <img onclick="Page_Cart();" src="/Image/Menu/Cart.jpg" alt=""><span id="sumCart"><?php echo $sumCart?></span></img>

                            <div class="History_Cart">
                                <h3 align="center">Lịch sử giỏ hàng</h3>

                                <?php
                                    $total = 0;
                                    while($row = mysqli_fetch_array($result))
                                    { 
                                        $total = $total + $row['toTal']; 
                                        global $sumTotal;
                                        $sumTotal = $total; 
                                    ?>
                                        <div class="Container_History">                  
                                            <div class="Contain__Img">
                                                <img id="Container_History_Img" src="<?php echo $row['imageSP'];?>" alt="">
                                            </div>


                                            <div class="Contain__InforHistory">
                                                <p><?php echo $row['tenSP'];?></p>
                                                <p><?php echo format_money($row['toTal'],0,'','.');?></p>
                                            </div>
                                        </div>     
                                <?php }?>
                                
                                <div class="History_Bottom">
                                    <h4 style="color:black">Tổng: <?php if(isset($sumTotal)) echo format_money($sumTotal,0,'','.') ?></h4>
                                    <a href="GioHang.php">Giỏ Hàng</a>
                                </div>

                            </div>
                        
                    <script>
                        function Page_Cart()
                        {
                            window.location.href = "GioHang.php";
                        }
                    </script>
                </div>       
            </div>
        </div>             
        
        <div id="header" class="header">
            <nav id="container" class="container">
                <ul id="main-menu">
                    <li><a href="TrangChu.php">Trang Chủ </a></li>
                    <li id="subProduct"><a href="SanPham.php?page=Sản Phẩm&TheLoai=Tất Cả&IDLoai=-1">Sản Phẩm</a>
                        <ul class="sub-menu_Product">
                                <li id="Title_SubMenu" class="Title_SubMenu" style="margin: auto 50px">ÁO
                                    <ul class="sub-menuItem">
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nam&IDLoai=1">Áo Nam</a></li>
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nữ&IDLoai=6">Áo Nữ</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Áo&IDLoai=16">Áo Sơ Mi</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Quần&IDLoai=17">Áo Ca Rô</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Ba Lô&IDLoai=18">Áo Tay Ngắn</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Giày&IDLoai=19">Áo Tay Dài</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Mũ&IDLoai=20">Áo Khoác</a></li>
                                    </ul>
                               
                                </li>

                                <li id="Title_SubMenu" class="Title_SubMenu" style="margin: auto 50px"> QUẦN
                                    <ul class="sub-menuItem">
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nam&IDLoai=2">Quần Nam</a></li>
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nữ&IDLoai=7">Quần Nữ</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Áo&IDLoai=23">Quần Jean</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Quần&IDLoai=24">Quần Jogger</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Ba Lô&IDLoai=25">Quần Kaki</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Giày&IDLoai=26">Quần Ngắn</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Mũ&IDLoai=27">Quần Dài</a></li>
                                    </ul>
                                </li>

                                <li id="Title_SubMenu" class="Title_SubMenu" style="margin: auto 50px"> GIÀY
                                    <ul class="sub-menuItem">
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nam&IDLoai=28">Giày Adidas</a></li>
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nữ&IDLoai=29">Giày Nike</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Áo&IDLoai=30">Giày Converse</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Quần&IDLoai=31">Giày Balenciaga</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Ba Lô&IDLoai=32">Giày new Balance</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Giày&IDLoai=33">Giày Puma</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Mũ&IDLoai=34">Giày Vans</a></li>
                                    </ul>
                                </li>

                                <li id="Title_SubMenu" class="Title_SubMenu" style="margin: auto 50px"> PHỤ KIỆN
                                    <ul class="sub-menuItem">
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nam&IDLoai=12">Mũ</a></li>
                                        <li><a href="SanPham.php?page=Quần Áo&TheLoai=Đồ Nữ&IDLoai=14">Balo</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Áo&IDLoai=34">Kính</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Quần&IDLoai=36">Ví da</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Ba Lô&IDLoai=37">Đồng hồ</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Giày&IDLoai=38">Dây chuyền</a></li>
                                        <li><a href="SanPham.php?page=Sản Phẩm&TheLoai=Mũ&IDLoai=39">Nhẫn</a></li>
                                    </ul>
                                </li>
                        </ul>
                    </li>
                    <li><a href="Sale.php?page=Sản phẩm&TheLoai=Sale">Sale</a></li>
                    <li><a href="GioiThieu.php">Giới Thiệu</a></li>
                    <li><a href="LienHe.php">Liên Hệ</a></li>
                </ul> 
            </nav>           
        </div>
        
        <!-- thẻ chứa bảng tìm kiếm -->
        <div id="SearchContain">

        </div>
    </div>
    
            <!-- Script thành header -->
            <script> 
            //lấy vị trí scroll window
                window.addEventListener("scroll", function(event) { 

                    //vị trí theo chiều dọc
                    var scroll_y = this.scrollY; 

                    //nếu scroll hơn 100 thì ẩn header tìm kiếm ngược lại hiển thị
                    if(scroll_y > 50)
                    {
                            document.getElementById('HeaderSearch').style.display = "none";

                            Create_Menu();
                            document.getElementById('Contain_NewInfor').style.display="flex";
                            document.getElementById('Header_Logo').style.display="block";
                    }
                    else
                    {
                        document.getElementById('HeaderSearch').style.display = "flex";
                        document.getElementById('header').style.display = "flex";
                        document.getElementById('Contain_NewInfor').style.display="none";
                        document.getElementById('Header_Logo').style.display="none";
                    }
                }); 

                //tạo bảng tìm kiếm
                function createSearch()
                {
                            document.getElementById('SearchContain').innerHTML = `
                                                <div id="MainSearch" class="MainSearch">
                                                    <div class="SearchItem">
                                                    <img src="/Image/Icon/close.png" onclick="closeSearch();" alt="">

                                                        <h1>Tìm Kiếm </h1>

                                                        <div id="menu-search">
                                                                <form action="TimKiem.php?page=Sản Phẩm&TheLoai=Tìm Kiếm" method="POST">
                                                                    <div id="Contain_SearchProc">
                                                                        <input type="text" value="" name="tenSPTK" id="IDTimKiem" placeholder="Tìm Kiếm">
                                                                        <input type="submit" class="btTimKiem" value="">
                                                                    </div>
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>`

                        console.log("tao thanh cong");
                }

                //đóng bản tìm kiếm 
                function closeSearch()
                {
                    document.getElementById('MainSearch').style.display = "none";
                }


                //tạo menu mới
                function Create_Menu()
                {
                    var checkDiv = document.getElementById('Contain_NewInfor');

                    if(checkDiv === null)
                    {
                        document.getElementById('container').innerHTML = `
                        <div id="containLogo">
                            <img id="Header_Logo" style="margin: auto 20px;" class="Header_Logo" src="/Image/Menu/Logo.ico" alt="">
                        </div>

                        <div id="Mobile-menu-btn" onclick="slide_DownMenu();">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        `

                         + document.getElementById('container').innerHTML +
                         
                        `<div id="Contain_NewInfor">
                            <div class="Contain_HistoryCart">                  
                                <ul id="main-menu">
                                <?php
                                if(isset($_SESSION['Logined']))
                                {?>
                                <div id="DivInfor">
                                    <li id="menu-Infor">
                                        <a>
                                            <img src="<?php if(isset($_SESSION['image'])) echo $_SESSION['image'] ?>" alt="">
                                            <?php if(isset($_SESSION['hoTen'])) echo $_SESSION['hoTen'] ?></a>    
                                        <ul class="sub-menu_Infor">
                                            <li><a href="/taiKhoan.php">Tài Khoản</a></li>
                                            <li><a href="/DonMua.php">Đơn Mua</a></li>
                                            <li><a href="/PHP/Xulydangxuat.php">Đăng Xuất</a></li>                      
                                        </ul>
                                    </li>
                                </div> 
                                <?php }else
                                {?>
                                <div id="DivDangNhap">
                                <li class="menu-DangNhap">
                                    <a href="/DangNhap.php" name="btDangNhap">
                                        <img src="/Image/Menu/account.png" alt="">
                                    </a></li>                
                                <?php }?>
                                </ul>                      
                        </div>

                        <img src="/Image/Menu/Find.png" onclick="createSearch();" class="btTimkiemNew" value="">

                        
                        </div>`;

                        function Page_Cart()
                        {
                            window.location.href = "GioHang.php";
                        }       
                    }          
                }

                //Click menu mobile
                function slide_DownMenu()
                {
                    var menu = document.getElementById('Mobile-menu-btn');
                    var header = document.getElementById('header');
                    var subProduct = document.getElementById('Title_SubMenu');

                    subProduct.style.marginRight = '0';

                    if(header.style.height == 'auto')
                        header.style.height = '43px';
                    else
                        header.style.height = 'auto';

                }
        </script>
</body>
</html>