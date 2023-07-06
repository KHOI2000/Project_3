<?php
require('Config.php');
if(isset($_GET['page'])){
  $page = $_GET['page'];
}
else{
  $page = 0;
}
//số bài trên một trang
$baiTrenMotTrang = 10;

$temp = $page*$baiTrenMotTrang;
if (isset($_GET['id'])) {
  $ID = $_GET['id'];
}
$command = "select lsmh.ID,lsmh.IDSP, lsmh.IDKH,lsmh.soLuongDat,lsmh.size,lsmh.thoiGianNhanHang, sp.giaSP,sp.tenSP from lichsumuahang lsmh  join sanpham sp on lsmh.IDSP = sp.ID 
where IDKH = '".$ID."'
limit $temp,$baiTrenMotTrang";
$result = mysqli_query(connect(), $command);
$querySoDong="select lsmh.ID,lsmh.IDSP, lsmh.IDKH,lsmh.soLuongDat,lsmh.size,lsmh.thoiGianNhanHang, sp.giaSP,sp.tenSP from lichsumuahang lsmh  join sanpham sp on lsmh.IDSP = sp.ID 
where IDKH = '".$ID."'";
$resultRow= mysqli_query(connect(),$querySoDong);
    $soDong = mysqli_num_rows($resultRow);
    //số trang
    $soTrang = $soDong / $baiTrenMotTrang;
    $listPage="";
    for($i=0;$i<$soTrang;$i++)
    {
        if($page==$i)
        {
        $listPage.='<a class="active" href=quantri.php?page_layout=detail_LS&chitietLS.php&id='.$ID.'&page='.$i.'>'.$i.'</a>';
        }
        else
        {
        $listPage.='<a href=quantri.php?page_layout=detail_LS&chitietLS.php&id='.$ID.'&page='.$i.'>'.$i.'</a>';
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
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Lịch Sử Mua Hàng</title>
</head>

<body>
  <h1>Quản Lý Lịch Sử Mua</h1>
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>ID</span></th>
        <th><span>IDSP</span></th>
        <th><span>Sản Phẩm</span></th>
        <th><span>Số Lượng Đặt</span></th>
        <th><span>Size</span></th>
        <th><span>Thời Gian Nhận Hàng</span></th>
        <th><span>Xóa</span></th>
      </tr>
    </thead>
    <?php
      while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
      <td>
        <?php echo $row['ID']?>
      <td>
        <?php echo $row['IDSP']?>
      <td>
        <?php echo $row['tenSP'] ?>
      <td>
        <?php echo $row['soLuongDat'] ?>
      <td>
        <?php echo $row['size'] ?>
      <td>
        <?php echo $row['thoiGianNhanHang'] ?>
      <td>
        <a href="deleteLS.php?id=<?php echo $row['ID']?>">
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
