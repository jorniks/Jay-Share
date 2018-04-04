<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
        <title>File Share | Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <link rel="icon" href="img/ESoft.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="style.css" rel="stylesheet">
	</head>

	<body>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="col-md-12 col-sm-12">
					<div class="panel panel-info wow fadeInUp">
						<div class="panel-heading">
							<strong>File Share</strong>
						</div>
						<div class="panel-body">
							<form action="index.php" role="form" method="POST" enctype="multipart/form-data">
								<?
									if (isset($_FILES['file']['name'])) {
										$file = $_FILES['file']['name'];
										$tmp_name = $_FILES['file']['tmp_name'];

										$location = '../../../../home/arjay/Desktop/Received/' . $file;

										if (move_uploaded_file($tmp_name, $location)) {
											echo "<div class=\"success-message\">File successfully transfered.</div>";
										} else {
											echo "<div class=\"error-message\">Failed to transfer file.</div>";
										}
									}
								?>
								<div class="form-group">
									<input type="file" name="file" required>
								</div>
								<div class="form-group button">
									<button class="btn btn-success" type="submit"><i class="fa fa-send"></i><i class="line"></i> Send</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer>
			
		</footer>

	</body>

</html>