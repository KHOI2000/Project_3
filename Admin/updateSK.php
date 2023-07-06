<?php
require('Config.php');
if(isset($_FILES["file"]['name'])){ 
    if (empty($_FILES["file"]['name'])) {
    $error["file"] = "File ảnh trống";
} else {
    $dir="/QuanLyShop/Image/SuKien/";
    $file = $dir . basename($_FILES["file"]["name"]);
    $filename = pathinfo($file, PATHINFO_EXTENSION);
    if (
        $filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif"
    ) {
        $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
    } else if (file_exists($file)) {
        $error["file"] = "File này đã tồn tại";
    }
    //nếu chưa có folder tạo folder
    if(!file_exists($dir))
        mkdir($dir);
    
    //copy file    
    if(empty($error["file"]))
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
    }
    }
}

    $ID = $IDTL = $tienGiam = $tenSK = $image = $noiDungSK = $ngayBatDau = $ngayKetThuc ='';
    if (!empty($_POST)) {
        if (isset($_GET['id'])) {
            $ID = $_GET['id'];
        }
        if (isset($_POST['IDTL'])) {
            $IDTL = $_POST['IDTL'];
        }
        if (isset($_POST['tienGiam'])) {
            $tienGiam = $_POST['tienGiam'];
        }
        if (isset($_POST['tenSK'])) {
            $tenSK = $_POST['tenSK'];
        }
        if (isset($_POST['image'])) {
            $image = $_POST['image'];
        }
        if (isset($_POST['noiDungSK'])) {
            $noiDungSK = $_POST['noiDungSK'];
        }
        if (isset($_POST['ngayBatDau'])) {
            $ngayBatDau = $_POST['ngayBatDau'];
        }
        if (isset($_POST['ngayKetThuc'])) {
            $ngayKetThuc = $_POST['ngayKetThuc'];
        }
    mysqli_query(connect(),"set names 'utf8'");

    $sql2 = 'select * from sukien where ID = '.$ID;
    $result2 = mysqli_query(connect(), $sql2);
	$row2    = mysqli_fetch_array($result2); // ID Loại trước khi sửa

    $sql1 = 'Select * from theloai where ID = '.$IDTL;
    $result1 = mysqli_query(connect(),$sql1);
    $row1 = mysqli_fetch_array($result1); // ID Loại khi chọn trong form sửa

    $sql3 = 'Update sanpham set giaGiam = 0 where IDLoai ='.$row2['IDTL'];
    mysqli_query(connect(),$sql3);
    
    $sql = "UPDATE sukien SET IDTL='".$row1['ID']."',tienGiam='".$tienGiam."',tenSK='".$tenSK."',image='".$image."',noiDungSK='".$noiDungSK."',ngayBatDau='".$ngayBatDau."',ngayKetThuc='".$ngayKetThuc."',
    image='".$file."' WHERE ID = '".$ID."'";
    mysqli_query(connect(),$sql);
    
    header("Location: quantri.php?page_layout=danhsachSuKien");
    mysqli_close(connect());
    }

    if (isset($_GET['id'])) {
        $ID       = $_GET['id'];
        $sql      = 'select * from sukien where ID = '.$ID;
        $result = mysqli_query(connect(), $sql);
	    $row    = mysqli_fetch_array($result);

        if ($row != null){
            $tienGiam = $row['tienGiam'];
            $tenSK = $row['tenSK'];
            $image = $row['image'];
            $noiDungSK = $row['noiDungSK'];
            $ngayBatDau = $row['ngayBatDau'];
            $ngayKetThuc = $row['ngayKetThuc'];
        }
    }
?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Thông Tin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Sửa sự kiện</h2>
            </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="IDTL">Thể Loại:</label>
                        <select class="form-control" name="IDTL" id="IDTL">
                            <option>Lựa chọn Sản Phẩm</option>
                            <?php
                            $sql = 'select * from theloai';
                            $result = mysqli_query(connect(),$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['ID'].'">'.$row['tenTL'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ngayBatDau">Ngày Bắt Đầu:</label>
                        <input type="date" class="form-control" id="ngayBatDau" name="ngayBatDau"
                            value="<?=$ngayBatDau?>">
                    </div>
                    <div class="form-group">
                        <label for="ngayKetThuc">Ngày Kết Thúc:</label>
                        <input type="date" class="form-control" id="ngayKetThuc" name="ngayKetThuc"
                            value="<?=$ngayKetThuc?>">
                    </div>
                    <div class="form-group">
                        <label for="tienGiam">Tiền Giảm:</label>
                        <input type="number" class="form-control" id="tienGiam" name="tienGiam" value="<?=$tienGiam?>">
                    </div>
                    <div class="form-group">
                        <label for="tenSK">Tên SK:</label>
                        <input type="text" class="form-control" id="tenSK" name="tenSK" value="<?=$tenSK?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh:</label>
                        <input type="file" class="form-control" id="image" name="file" value="<?=$image?>">
                    </div>
                    <div class="form-group">
                        <label for="noiDungSK">Nội Dung:</label>
                        <input type="text" class="form-control" id="noiDungSK" name="noiDungSK" value="<?=$noiDungSK?>">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php } else{ 
    echo"404 ERROR!!!"?>
<?php }?>