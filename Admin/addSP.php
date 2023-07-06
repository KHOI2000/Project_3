<?php
require('Config.php');
if (!empty($_POST)) {

    $str = explode('_',basename($_FILES["file"]["name"]));
    $nameFile = $str[0];

    $dir = "";
    if($nameFile === "AoKhoac")
       $dir="Image/AoKhoac/    ";
   else if($nameFile === "Nike")
       $dir="Image/Nike/";
   else if($nameFile === "Adidas")
       $dir="Image/Adidas/";
   else if($nameFile === "AoNam")
       $dir="Image/AoNam/";
   else if($nameFile === "AoVest")
       $dir="Image/AoVest/";
   else if($nameFile === "BoNam")
       $dir="Image/BoNam/";
   else if($nameFile === "BoNu")
       $dir="Image/BoNu/";
   else if($nameFile === "DayNit")
       $dir="Image/DayNit/";
   else if($nameFile === "AoNu")
       $dir="Image/AoNu/";
   else if($nameFile === "AoSoMi")
       $dir="Image/AoSoMi/";
   else if($nameFile === "Aocaro")
       $dir="Image/Aocaro/";
   else if($nameFile === "Balo")
       $dir="Image/Balo/";
   else if($nameFile === "Kinh")
       $dir="Image/Kinh/";
   else if($nameFile === "Mu")
       $dir="Image/Mu/";
   else if($nameFile === "QuanKaki")
       $dir="Image/QuanKaki/";
   else if($nameFile === "QuanNam")
       $dir="Image/QuanNam/";
   else if($nameFile === "Quanngan")
       $dir="Image/Quanngan/";
   else if($nameFile === "QuanDai")
       $dir="Image/QuanDai/";
        
    $file = $dir.basename($_FILES["file"]["name"]);

    $filename = pathinfo($file, PATHINFO_EXTENSION);
    if (
        $filename != "jpg" && $filename != "png" && $filename != "jpeg" && $filename != "gif"
    ) {
        $error["file"] = "Chỉ cho phép file ảnh dạng: jpg,png,jpeg,gif";
    }

    //nếu chưa có folder tạo folder
    if(!file_exists($dir))
        mkdir($dir);

        //copy file    
    if(empty($error["file"]))
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], $file);
        $imageSP = $file;
    }

    $imageSP = $file;

    if (isset($_POST['IDLoai'])) {
        $IDLoai = $_POST['IDLoai'];
    }
    if (isset($_POST['tenSP'])) {
        $tenSP = $_POST['tenSP'];
    }
    if (isset($_POST['giaSP'])) {
        $giaSP = $_POST['giaSP'];
    }
    if (isset($_POST['soLuong'])) {
        $soLuong = $_POST['soLuong'];
    }
    if (isset($_POST['mieuTaSP'])) {
        $mieuTaSP = $_POST['mieuTaSP'];
    }

    // chọn bảng mã cho kết nối
    mysqli_query(connect(), "set names 'utf8'");
    // thực hiện lệnh truy vấn
    $sql ="INSERT sanpham(IDLoai, tenSP,giaSP,soLuong,imageSP,mieuTaSP,giaGiam,brand,IDMau)
    values ('".$IDLoai ."','". $tenSP . "','" . $giaSP . "','" . $soLuong . "','" . $imageSP . "','" . $mieuTaSP . "',0,0,0)";
    
    // Thêm dữ liệu vào db
    mysqli_query(connect(), $sql);
    if(!headers_sent())
    {
        header('location:quantri.php?page_layout=danhsachSP');
    }
    else
    {
        echo '<script>window.location="quantri.php?page_layout=danhsachSP"</script>';
    }
}
mysqli_close(connect());

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm/Sửa Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm/Sửa Sản Phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="idloai">IDLoai:</label>
					<select class="form-control" name="IDLoai" id="IDLoai">
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
                        <label for="tenSP">Tên SP:</label>
                        <input required="true" type="text" class="form-control" id="tenSP" name="tenSP">
                    </div>
                    <div class="form-group">
                        <label for="giaSP">Giá SP:</label>
                        <input required="true" type="number" class="form-control" id="giaSP" name="giaSP">
                    </div>
                    <div class="form-group">
                        <label for="soLuong">Số Lượng SP:</label>
                        <input type="number" class="form-control" id="soLuong" name="soLuong">
                    </div>
                    <div class="form-group">
                        <label for="imageSP">Ảnh SP:</label>
                        <input type="file" class="form-control" id="imageSP" name="file">
                    </div>
                    <div class="form-group">
                        <label for="mieuTaSP">Mô Tả SP:</label>
                        <input type="text" class="form-control" id="mieuTaSP" name="mieuTaSP">
                    </div>
                    <input type="submit" class="btn btn-success" value="Lưu"></input>
                </form>
            </div>
        </div>
    </div>
</body>

</html>