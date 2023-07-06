<?php
require('Config.php');

$ID = $tenTL = '';
if (!empty($_POST)) {
    if (isset($_GET['ID'])) {
        $ID = $_GET['ID'];
    }
    if (isset($_POST['tenTL'])) {
        $tenTL = $_POST['tenTL'];
    }


    // thực hiện lệnh truy vấn
    $sql = 'INSERT INTO theloai(tenTL) 
    VALUES ("' . $tenTL . '")';
    mysqli_query(connect(), $sql);

	if(!headers_sent())
    {
		header("Location: quantri.php?page_layout=danhsachTheLoai");
    }
    else
    {
        echo '<script>window.location="quantri.php?page_layout=danhsachTheLoai"</script>';
    }
    mysqli_close(connect());
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Thể Loại</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Thể Loại</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                <div class="form-group">
					<label for="tenTL">Thể Loại:</label>
					<input type="text" class="form-control" id="tenTL" name="tenTL">
                </div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>