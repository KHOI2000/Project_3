<?php
require('Config.php');

if(isset($_POST['file'])){ 
    $dir="Image/SuKien/";
    $file = $dir.$_POST['file'];
    $filename = pathinfo($file, PATHINFO_EXTENSION);

    if (
        $filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif"
    ) {
        $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
    } else if (file_exists($file)) {
        $error["file"] = "File này đã tồn tại";
    }
}
$ID = $IDTL = $tienGiam = $ngayBatDau = $ngayKetThuc = '';
if (!empty($_POST)) {
    if (isset($_POST['ID'])) {
        $ID = $_POST['ID'];
    }
    if (isset($_POST['IDTL'])) {
        $IDTL = $_POST['IDTL'];
    }
    if (isset($_POST['tienGiam'])) {
        $tienGiam = $_POST['tienGiam'];
    }
    if (isset($_POST['ngayBatDau'])) {
        $ngayBatDau = $_POST['ngayBatDau'];
    }
    if (isset($_POST['tenSK'])) {
        $tenSK = $_POST['tenSK'];
    }
    if (isset($_POST['ngayKetThuc'])) {
        $ngayKetThuc = $_POST['ngayKetThuc'];
    }
    if (isset($_POST['ndSK'])) {
        $noiDung = $_POST['ndSK'];
    }

    mysqli_query(connect(), "set names 'utf8'");
    $sql1 = 'Select ID from theloai where ID = ' . $IDTL;
    $result1 = mysqli_query(connect(), $sql1);
    $row1 = mysqli_fetch_array($result1);
    $sql = 'INSERT INTO sukien(IDTL,tenSK,tienGiam,ngayBatDau,ngayKetThuc,image,noiDungSK) VALUES ("' . $IDTL . '","' . $tenSK . '","' . $tienGiam . '","' . $ngayBatDau . '","' . $ngayKetThuc . '","' . $file . '","'.$noiDung.'")';
    $result = mysqli_query(connect(), $sql);    

    if(!headers_sent())
    {
        header("Location:quantri.php?page_layout=danhsachSuKien");
    }
    else
    {
        echo '<script>window.location="quantri.php?page_layout=danhsachSuKien"</script>';
    }
    mysqli_close(connect());
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm Thông Tin</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm sự kiện</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="IDTL">Thể Loại:</label>
                        <select class="form-control" name="IDTL" id="IDTL">
                            <option>Lựa chọn Sản Phẩm</option>
                            <?php
                            $sql = 'select * from theloai';
                            $result = mysqli_query(connect(), $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="' . $row['ID'] . '">' . $row['tenTL'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tenSK">Tên SK:</label>
                        <input type="text" class="form-control" id="tenSK" name="tenSK">
                    </div>
                    <div class="form-group">
                        <label for="ngayBatDau">Ngày Bắt Đầu:</label>
                        <input type="date" class="form-control" id="ngayBatDau" name="ngayBatDau">
                    </div>
                    <div class="form-group">
                        <label for="ngayKetThuc">Ngày Kết Thúc:</label>
                        <input type="date" class="form-control" id="ngayKetThuc" name="ngayKetThuc">
                    </div>
                    <div class="form-group">
                        <label for="imageSP">Ảnh SP:</label>
                        <input type="file" class="form-control" id="imageSP" name="file">
                    </div>
                    <div class="form-group">
                        <label for="ndSK">Nội dung:</label>
                        <input type="text" class="form-control" id="ndSK" name="ndSK">
                    </div>
                    <div class="form-group">
                        <label for="tienGiam">Tiền Giảm:</label>
                        <input type="number" class="form-control" id="tienGiam" name="tienGiam">
                    </div>
                    <button class="btn btn-success">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>