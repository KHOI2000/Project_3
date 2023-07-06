<?php
session_start();
require('Config.php');
    if(isset($_POST["tenDangNhap"]) && isset($_POST["matKhau"])){
        $tenDangNhap = $_POST["tenDangNhap"];
        $matKhau = $_POST["matKhau"];
        
        $sql="SELECT * from nhanvien WHERE tenDangNhap = '".$tenDangNhap."' and matKhau = '".$matKhau."'";
        $result=mysqli_query(connect(),$sql);
        $_SESSION["admin"] = $tenDangNhap;
        $row=mysqli_fetch_array($result);
        $_SESSION["hoTenadmin"] = $row["hoTen"];
        $_SESSION["IDadmin"] = $row["ID"];
        header("location: quantri.php");
    }   

    mysqli_close(connect());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin page</title>
</head>

<body style="padding:0;">
    <!--------------------------------------------- start header -------------------------------------->

    <div id="header" class="dis-flex">
        <div class="head-body dis-flex">
            <ul class="navbar dis-flex">
                <li><a href="quantri.php"><i class="fa-solid fa-house"></i> Home</a></li>
            </ul>
        </div>
    </div>
    <!--------------------------------------- end header ---------------------------->
    <!------------------------------------- start content --------------------------->
    <div id="wp-content" class="dis-flex">
        <div class="content">
            <?php 
            if(isset($_GET["page_layout"])){
                switch ($_GET["page_layout"]) {
                    case 'danhsachSP': include_once 'QLsanpham.php';
                        break;
                    case 'danhsachKH': include_once 'QLKhachHang.php';
                        break;
                    case 'danhsachDH': include_once 'QLdonhang.php';
                        break;
                    case 'danhsachKhoHang': include_once 'QLKhoHang.php';
                        break; 
                    case 'danhsachSuKien': include_once 'QLsk.php';
                        break;
                    case 'danhsachLichSu': include_once 'QLls.php';
                        break;
                    case 'danhsachBinhLuan': include_once 'QLbl.php';
                        break;
                    case 'danhsachTheLoai': include_once 'QLtl.php';
                        break;
                    case 'danhsachMau': include_once 'QLMau.php';
                        break;
                    case 'danhsachTV': include_once 'member_listing.php';
                        break;     
                        //các phần thêm 
                    case 'themSP':include_once 'addSP.php';
                        break;
                    case 'themTK':include_once 'addTK.php';
                        break;
                    case 'themVC':include_once 'addVC.php';
                        break;
                    case 'themSK':include_once 'addSK.php';
                        break;
                    case 'themKH':include_once 'addKH.php';
                        break;
                    case 'themTL':include_once 'addTL.php';
                        break;
                    case 'themMau':include_once 'addMau.php';
                        break;
                    case 'themTV':include_once 'add_member.php';
                        break;        
                    //cac phan sua
                    case 'suaSP':include_once 'updateSP.php';
                        break;
                    case 'suaTK':include_once 'updateTK.php';
                        break;
                    case 'suaSK':include_once 'updateSK.php';
                        break;
                    case 'suaKH':include_once 'updateKH.php';
                        break;
                    case 'suaTL':include_once 'updateTL.php';
                        break;
                    case 'suaMau':include_once 'updateMau.php';
                        break;        
                    //cac phan chi tiet  
                    case 'detail_BL':include_once 'chitietBL.php';
                        break;
                    case 'detail_DH':include_once 'chitietDH.php';
                        break;
                    case 'detail_LS':include_once 'chitietLS.php';
                        break;
                    case 'detail_NM':include_once 'chitietNM.php';
                        break;
                    default:
                        break;                                                                                                                                 
                }
            }
            else
            {
                include_once 'QLsanpham.php';
                
            }
            ?>
        </div>
        <div class="sidebar">
            <ul class="menu-page">
                <li class="head-logo__Container">
                    <div class="head-logo">
                        <a href="" class="logo"><i class="fa-brands fa-adn"></i>ADMIN</a>
                    </div>
                </li>

                <div class="name-sb">
                    <li></a><?php echo $_SESSION["hoTenadmin"]?></li>
                </div>

                <li><a href="quantri.php?page_layout=danhsachSP"><i class="fa-solid fa-shirt"
                            style="font-size:20px"></i> Sản Phẩm</a></li>
                <li><a href="quantri.php?page_layout=danhsachKH"><i class="fa-solid fa-person"
                            style="font-size:20px"></i> Khách Hàng</a></li>
                <li><a href="quantri.php?page_layout=danhsachDH"><i class="fa-solid fa-book" style="font-size:20px"></i>
                        Đơn Hàng</a></li>
                <li><a href="quantri.php?page_layout=danhsachKhoHang"><i class="fa-solid fa-warehouse"
                            style="font-size:20px"></i> Kho Hàng</a></li>
                <li><a href="quantri.php?page_layout=danhsachSuKien"><i class="fa-solid fa-calendar-check"
                            style="font-size:20px"></i> Sự Kiện</a></li>
                <li><a href="quantri.php?page_layout=danhsachTheLoai"><i class="fa-solid fa-ring"
                            style="font-size:20px"></i> Loại Đồ</a></li>
                <li><a href="quantri.php?page_layout=danhsachLichSu"><i class="fa-solid fa-clock-rotate-left"
                            style="font-size:20px"></i> Lịch Sử Mua</a></li>
                <li><a href="quantri.php?page_layout=danhsachBinhLuan"><i class="fa-solid fa-comment"
                            style="font-size:20px"></i> Bình Luận</a></li>
                <li><a href="quantri.php?page_layout=danhsachMau"><i class="fa-solid fa-paintbrush"
                            style="font-size:20px"></i> Màu</a></li>
                <li><a href="quantri.php?page_layout=danhsachTV"><i class="fa-solid fa-people-roof"
                            style="font-size:20px"></i>
                        Quản Lý TV</a></li>
                <li><a href="xulydangxuat.php"><i class="fa-solid fa-arrow-right-to-bracket" style="font-size:20px"></i>
                        Logout</a></li>
            </ul>
        </div>
    </div>
    <!----------------------------------------- end content ----------------------------------------->
    <footer class="main-footer dis-flex">
        <p>Copyright &copy; 2023 <a href="#">WibuGangZ .</a>All rights reserved</p>
    </footer>
</body>

</html>