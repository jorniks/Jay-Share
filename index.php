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
								<div class="message" id="message">
									<?
										$success = false;
										$failed = false;

										if (isset($_FILES['file']['name'])) {
											if (is_array($_FILES)) {
												foreach ($_FILES['file']['name'] as $file => $value) {
													//$file = explode(".", $_FILES['file']['name'][$file]);
													$tmp_name = $_FILES['file']['tmp_name'][$file];
													$location = '../../../../home/arjay/Desktop/Received/' . $value;

													if (move_uploaded_file($tmp_name, $location)) {
														$success = true;
													} else {
														$failed = true;
													}
												}
											}
										}

										if ($success == true) {
											echo "<div class=\"success-message\">File successfully transfered.</div>";
										} elseif ($failed == true) {
											echo "<div class=\"error-message\">Failed to transfer file.</div>";
										}
									?>
								</div>
								<div class="form-group">
									<button class="btn btn-info" id="select">Select Files</button>
									<input type="file" name="file[]" id="myFile" multiple required>
								</div>
								<div class="count">
									<label id="count"></label>
								</div>
								<!--<div>
									<progress id="progressBar" value="0" max="100" style="width: 300px;"></progress>
									<h3 id="status"></h3>
								</div>-->
								<div class="form-group button">
									<button class="btn btn-success" id="send" class="submit"><i class="fa fa-send"></i><i class="line"></i> Send</button>
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

	<script src="bootstrap/jquery.min.js"></script>

</html>

<script type="text/javascript">

	$("#select").click(function() {
		$("#myFile").val('');
		$("#myFile").click();
		$(this).prop("#myFile");
		//autoSubmit(false);
	});

	$('input#myFile').change(function(){
		var files = $(this)[0].files;
		if (files.length == 1) {
			$("#count").html(files.length + " file selected for sharing.");
		} else if (files.length > 1) {
			$("#count").html(files.length + " files selected for sharing.");
		}
		//alert(files.length);
	});
	
</script>

        <!--<script>
        	function _(el) {
        		return document.getElementById('el');
        	}

        	function uploadFile() {
        		var file = _("file").files[0];
        		var formdata = new FormData();
        		formdata.append("file", file);
        		var ajax = new XMLHttpRequest();
        		ajax.upload.addEventListener("progress", progressHandler, false);
        		ajax.upload.addEventListener("load", completeHandler, false);
        		ajax.upload.addEventListener("error", errorHandler, false);
        		ajax.upload.addEventListener("abort", abortHandler, false);
        		ajax.open("POST", "fileParser.php");
        		ajax.send(formdata);
        	}

        	function progressHandler(event) {
        		var percent = (event.loaded / event.total) * 100;
        		_("progressBar").value = Math.round(percent);
        		_("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
        	}

        	function completeHandler(event) {
        		_("status").innerHTML = event.target.responseText;
        		_("progressBar").value = 0;
        	}

        	function errorHandler(event) {
        		_("status").innerHTML = "Upload failed.";
        	}

        	function abortHandler(event) {
        		_("status").innerHTML = "Upload aborted.";
        	}
        </script>-->