<?php
    require('Config.php');
    $ID = $IDSP = $IDSize = $soLuongSP = '';
    if (!empty($_POST)) {
        if (isset($_POST['ID'])) {
            $ID = $_POST['ID'];
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

    mysqli_query(connect(),"set names 'utf8'");
    $sql = 'INSERT INTO khohang(IDSP,IDSize,soLuongSP) VALUES ("'.$IDSP.'","'.$IDSize.'","'.$soLuongSP.'")';
    mysqli_query(connect(),$sql);
    header("Location: quantri.php?page_layout=danhsachKhoHang");
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
				<h2 class="text-center">Thêm Hàng</h2>
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
					  <input required="true"type="number" class="form-control" id="soLuongSP" name="soLuongSP">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>