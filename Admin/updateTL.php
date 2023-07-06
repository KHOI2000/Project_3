<?php
require('Config.php');

    if(isset($_POST['save']))
    {
    $ID = $tenTL = '';

    if (isset($_GET['id'])) {
        $ID = $_GET['id'];
    }
    if (isset($_POST['tenTL'])) {
         $tenTL = $_POST['tenTL'];
    }

    $sql = "UPDATE theloai SET tenTL= '".$tenTL."' where ID = '".$ID."'";
    mysqli_query(connect(),$sql);

    if(!headers_sent())
    {
        header("Location: quantri.php?page_layout=danhsachTheLoai");
    }
    else
    {
        echo '<script>window.location="quantri.php?page_layout=danhsachTheLoai"</script>';
    }
}
    mysqli_close(connect());

?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Thể Loại</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Thể Loại</h2>
			</div>
			<div class="panel-body">
				<form method="POST" action="">
                <div class="form-group">
					<label for="tenTL">Thể Loại:</label>
					<input type="text" class="form-control" id="tenTL" name="tenTL" value="<?=$tenTL?>">
					</div>
					<input type="submit" name="save" class="btn btn-success" value="Xám"></button>
				</form>
			</div>
		</div>
	</div>	
</body>
</html>

<?php } else{ 
    echo"404 ERROR!!!"?>
<?php }?>