<?php
require('Config.php');
    $ID = $IDSP = $IDSize = $soLuongSP = '';
    if (!empty($_POST)) {
        if (isset($_GET['id'])) {
            $ID = $_GET['id'];
        }
        if (isset($_POST['IDSP'])) {
            $IDSP = $_POST['IDSP'];
        }
        if (isset($_POST['IDSize'])) {
            $IDSize = $_POST['IDSize'];
        }
        if (isset($_POST['soLuongSP'])) {
            $soLuongSP = $_POST['soLuongSP'];
        }

    // chọn bảng mã cho kết nối
    mysqli_query(connect(),"set names 'utf8'");
    // thực hiện lệnh truy vấn
    $sql = "UPDATE khohang SET IDSP='".$IDSP."',IDSize='".$IDSize."',soLuongSP='".$soLuongSP."' where ID = ".$ID;
    mysqli_query(connect(),$sql);
    header("Location: quantri.php?page_layout=danhsachKhoHang");
    mysqli_close(connect());
    }

    if (isset($_GET['id'])) {
        $ID       = $_GET['id'];
        $sql      = 'select * from khohang where ID = '.$ID;
        $result = mysqli_query(connect(), $sql);
	    $row    = mysqli_fetch_array($result, 1);

        if ($row != null){
            $soLuongSP = $row['soLuongSP'];
        }
    }
?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html>

<head>
    <title>Sửa Thông Tin</title>
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
                <h2 class="text-center">Sửa hàng</h2>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="IDSP">Sản Phẩm:</label>
                        <select class="form-control" name="IDSP" id="IDSP">
                            <option>Lựa chọn Sản Phẩm</option>
                            <?php
                            $sql = 'select * from sanpham';
                            $result = mysqli_query(connect(),$sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<option value="'.$row['ID'].'">'.$row['tenSP'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IDSize">Chọn Size:</label>
                        <select class="form-control" name="IDSize" id="IDSize">
                            <option>Lựa chọn Size</option>
                            <?php
                        $sql1 = 'select * from size';
                        $result1 = mysqli_query(connect(),$sql1);
                        while ($row1 = mysqli_fetch_array($result1)) {
                            echo '<option value="'.$row1['ID'].'">'.$row1['Size'].'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="soLuongSP">Số Lượng:</label>
                        <input required="true" type="number" class="form-control" id="soLuongSP" name="soLuongSP"
                            value="<?=$soLuongSP?>">
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