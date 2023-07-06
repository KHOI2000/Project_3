
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SubMenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>Document</title>
</head>

<body>  
    <div id="wrapper_SubMenu">
        <ul id="main_menu_SubMenu">
            <div id="Title_Submenu">
                <li><h4 id="AffterName"><?php if(isset($_GET['page'])) echo $_GET['page']; ?> <span style="Color:Gray; padding-right: 3px;">/</span></h4></li>
                <li><h4><?php if(isset( $_GET['TheLoai'])) echo $_GET['TheLoai']; ?></h4></li>
            </div>

            <div>
                <li><a href="">Lọc Màu</a>
                    <ul id="Classify" class="sub_menu" style="display:flex; flex-wrap:wrap; justify-content: center">
                            <li><a style="background-color: white; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=1&page=Sản Phẩm&TheLoai=Màu trắng"></a>
                            <li><a style="background-color: aliceblue; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=2&page=Sản Phẩm&TheLoai=Màu Xanh trời"></a>
                            <li><a style="background-color: black; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=3&page=Sản Phẩm&TheLoai=Màu đen"></a>
                            <li><a style="background-color: bisque ; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=4&page=Sản Phẩm&TheLoai=Màu da"></a>
                            <li><a style="background-color: burlywood; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=5&page=Sản Phẩm&TheLoai=Màu đất"></a>
                            <li><a style="background-color: lightblue; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=6&page=Sản Phẩm&TheLoai=Màu xanh dương"></a>
                            <li><a style="background-color: cadetblue; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=7&page=Sản Phẩm&TheLoai=Màu xanh lá nhạt"></a>
                            <li><a style="background-color: cornflowerblue; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=8&page=Sản Phẩm&TheLoai=Màu xanh dương đậm"></a>
                            <li><a style="background-color: darkturquoise; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=9&page=Sản Phẩm&TheLoai=Màu xanh lá đậm"></a>
                            <li><a style="background-color: aqua; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=10&page=Sản Phẩm&TheLoai=Màu xanh dương sáng"></a>
                            <li><a style="background-color: blue; width:25px; height:25px; border: 1px solid #eaeaea; margin: 5px 5px" href="LocMau.php?IDMau=11&page=Sản Phẩm&TheLoai=Màu xanh nước biển đậm"></a>
                            <li><a style="background-color: darkcyan; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=12&page=Sản Phẩm&TheLoai=Màu xanh lá vừa"></a>
                            <li><a style="background-color: green; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=13&page=Sản Phẩm&TheLoai=Màu xanh lá cây"></a>
                            <li><a style="background-color: darkslateblue; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=14&page=Sản Phẩm&TheLoai=Màu tím nhạt"></a>
                            <li><a style="background-color: blueviolet; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=15&page=Sản Phẩm&TheLoai=Màu tím đậm"></a>
                            <li><a style="background-color: hotpink; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=16&page=Sản Phẩm&TheLoai=Màu hồng"></a>
                            <li><a style="background-color: darkorange; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=17&page=Sản Phẩm&TheLoai=Màu vàng cam"></a>
                            <li><a style="background-color: coral; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=18&page=Sản Phẩm&TheLoai=Màu cam"></a>
                            <li><a style="background-color: gold; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=19&page=Sản Phẩm&TheLoai=Màu vàng"></a>
                            <li><a style="background-color: red; width:25px; height:25px; margin: 5px 5px" href="LocMau.php?IDMau=20&page=Sản Phẩm&TheLoai=Màu đỏ"></a>
                    </ul>
                </li>
                <li><a href="">Lọc Giá</a>
                    <ul id="Classify" class="sub_menu">
                        <li><a href="LocGia.php?fromPrice=0&toPrice=150000&page=Sản Phẩm&TheLoai=Dưới 150,000đ">Dưới 150.000VNĐ</a></li>
                        <li><a href="LocGia.php?fromPrice=150000&toPrice=250000&page=Sản Phẩm&TheLoai=Từ 150,000đ - 250,000đ">150.000đ - 250.000đ</a></li>
                        <li><a href="LocGia.php?fromPrice=250000&toPrice=350000&page=Sản Phẩm&TheLoai=Từ 250,000đ - 350,000đ">250.000đ - 350.000đ</a></li>
                        <li><a href="LocGia.php?fromPrice=350000&toPrice=500000&page=Sản Phẩm&TheLoai=Từ 350,000đ - 500,000đ">350.000đ - 500.000đ</a></li>
                        <li><a href="LocGia.php?fromPrice=500000&toPrice=99999999999&page=Sản Phẩm&TheLoai=Trên 500,000đ">Trên 500.000đ</a></li>
                    </ul>
                </li>

                <li><a href="MacDinh.php?page=Sản phẩm&TheLoai=Mặc Định">Xắp xếp</a>
                    <ul class="sub_menu" style="right: 0;">
                        <li><a href="MacDinh.php?page=Sản phẩm&TheLoai=Mặc Định">Mặc định</a></li>
                        <li><a href="TangDan.php?page=Sản phẩm&TheLoai=Tăng Dần">Giá thấp đến cao</a></li>
                        <li><a href="GiamDan.php?page=Sản phẩm&TheLoai=Giảm Dần">Giá cao đến thấp</a></li>
                    </ul>
                </li>   
            </div>   
            

        </ul>                    
    </div>
</body>
</html>


