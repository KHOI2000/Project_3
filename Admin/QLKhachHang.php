<?php
require('Config.php');

if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 0;
}
//số bài trên một trang
$baiTrenMotTrang = 5;

$temp = $page*$baiTrenMotTrang;

$command = "SELECT kh.ID,kh.tenDangNhap,tk.matKhau,kh.hoTen,kh.gioiTinh,kh.ngaySinh,kh.SDT,kh.email,kh.diaChi,kh.avatar
          from khachhang as kh 
          join taikhoan as tk on kh.ID= tk.ID 
          LIMIT $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);

//Tổng số dòng
$querySoDong= "SELECT * FROM khachhang";
$resultRow= mysqli_query(connect(),$querySoDong);
$soDong = mysqli_num_rows($resultRow);
//số trang
$soTrang = $soDong / $baiTrenMotTrang;

$listPage="";
for($i=0;$i<$soTrang;$i++)
{
    if($page==$i)
    {
    $listPage.='<a class="active" href=quantri.php?page_layout=danhsachKH&page='.$i.'>'.$i.'</a>';
    }
    else
    {
    $listPage.='<a href=quantri.php?page_layout=danhsachKH&page='.$i.'>'.$i.'</a>';
    }
}
mysqli_close(connect());

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/quanLy.css">
    <title>QLTK</title>
</head>

</html>

<body>
    <h1>Quản Lí Tài Khoản Khách Hàng</h1>
    <a href="quantri.php?page_layout=themTK">
        <button class="btn btn-add">Thêm</button>
    </a>
    <table id="keywords">
        <thead>
            <tr>
                <th> <span>ID</span></th>
                <th><span>Tài khoản</span></th>
                <th><span>Mật khẩu</span></th>
                <th><span>Họ tên</span></th>
                <th><span>Giới tính</span></th>
                <th><span>Ngày Sinh</span></th>
                <th><span>SĐT</span></th>
                <th><span>Email</span></th>
                <th><span>Địa Chỉ</span></th>
                <th><span>Avatar</span></th>
                <th><span>Sửa</span></th>
                <th><span>Xóa</span></th>
            </tr>
        </thead>
        <?php
            while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
            <td><?php echo $row['ID']?>
            <td><?php echo $row['tenDangNhap'] ?>
            <td><?php echo $row['matKhau'] ?>
            <td><?php echo $row['hoTen'] ?>
            <td><?php echo $row['gioiTinh'] ?>
            <td><?php echo $row['ngaySinh'] ?>
            <td><?php echo $row['SDT'] ?>
            <td><?php echo $row['email'] ?>
            <td><?php echo $row['diaChi'] ?>
            <td><img Style="height: 150px; width: 150px;  border-radius: 50%;" src="<?php echo $row['avatar'] ?>">
                </image>
            <td>
                <a href="quantri.php?page_layout=suaTK&updateTK.php&id=<?php echo $row['ID']?>">
                    <button class="btn btn-update">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </a>
            <td>
                <a href="deleteTK.php?id=<?php echo $row['ID']?>">
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </a>
        </tr>
        <?php } ?>
    </table>

    <div class="Pagination">
        <?php
                    echo $listPage;
                ?>
    </div>
</body>

</html>