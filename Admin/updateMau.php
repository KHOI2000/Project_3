
<?php
require('Config.php');
    $ID = $tenMau = '';
    if (!empty($_POST)) {
        if (isset($_GET['id'])) {
            $ID = $_GET['id'];
        }
        if (isset($_POST['tenMau'])) {
            $tenMau = $_POST['tenMau'];
        }
    mysqli_query(connect(),"set names 'utf8'");
    $sql = "UPDATE mausac SET tenMau= '".$tenMau."' where ID = ".$ID;
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

    if (isset($_GET['id'])) {
        $ID       = $_GET['id'];
        $sql      = 'select * from mausac where ID = '.$ID;
        $result = mysqli_query(connect(), $sql);
	    $row    = mysqli_fetch_array($result);

        if ($row != null){
            $tenMau = $row['tenMau'];
        }
    }
    
?>
<?php if(isset($_SESSION["admin"])){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa màu</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Tên Màu</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                <div class="form-group">
					<label for="tenMau">Tên Màu:</label>
					<input type="text" class="form-control" id="tenMau" name="tenMau" value="<?=$tenMau?>">
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