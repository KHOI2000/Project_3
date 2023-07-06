<?php
require('Config.php');


    $ID = $tenMau = '';
    if (!empty($_POST)) {
        if (isset($_GET['ID'])) {
            $ID = $_GET['ID'];
        }
        if (isset($_POST['tenMau'])) {
            $tenMau = $_POST['tenMau'];
        }
    // thực hiện lệnh truy vấn
    $sql = 'INSERT INTO mausac(tenMau) 
    VALUES ("'.$tenMau.'")';
    mysqli_query(connect(),$sql);


    if(!headers_sent())
    {
        header("Location: quantri.php?page_layout=danhsachMau");
    }
    else
    {
        echo '<script>window.location="quantri.php?page_layout=danhsachMau"</script>';
    }
    mysqli_close(connect());
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Màu</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Màu</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                <div class="form-group">
					  <label for="tenMau">Chọn Màu:</label>
					  <input type="text" class="form-control" id="tenMau" name="tenMau">
                </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>