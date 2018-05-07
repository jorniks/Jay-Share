<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
        <title>Jay Share | Home</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="filewords">
        <meta content="" name="description">

        <link rel="icon" href="img/ESoft.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="style.css" rel="stylesheet">
	</head>

	<body>
		<?
			if (isset($_GET['path'])) {
				$path = $_GET['path'];
		?>
		<div class="page-wrapper" style="max-height: 600px; overflow: auto; margin-top: 20px;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover">
								<tbody>
									<?
										$images = array("jpg","png","jpeg","gif");
										$documents = array("doc","docx","pdf","odt","txt");
										$videos = array("mp4","avi","mkv","flv");
										$music = array("mp3","ogg","wma","m4a");
										$code = array("html","css","js","php");
										$zip = array("gzip","rar","7z","zip","tar","xz");

										//Declare system path as a variable for easier manipulation
										$rootPath = '../../../../../home/arjay/';

										//Scan the root directory selected by user and save it as an array
										if ($root = scandir($rootPath.$path)) {

											//Browse through the array
											foreach ($root as $file) {
												//Chech if the file is a file or a folder
												//If the file is not a folder and is not a system created file this will execute
												if (!(glob($rootPath.$path."/$file",GLOB_ONLYDIR)) && $file != '.' && $file != '..') {

														$extension = strtolower(substr($file, strrpos($file, '.')+1));

														if (in_array($extension, $images)) {
															$icon = '<i class="fa fa-photo"></i>';
														} elseif (in_array($extension, $documents)) {
															$icon = '<i class="fa fa-file-o"></i>';
														} elseif (in_array($extension, $videos)) {
															$icon = '<i class="fa fa-film"></i>';
														} elseif (in_array($extension, $music)) {
															$icon = '<i class="fa fa-music"></i>';
														} elseif (in_array($extension, $code)) {
															$icon = '<i class="fa fa-code"></i>';
														} elseif (in_array($extension, $zip)) {
															$icon = '<i class="fa fa-file-zip-o"></i>';
														}

														//Print out files that are in the root(user specified) directory

														$item = $rootPath.$path.'/'.$file;

														echo "<tr>
															<td>
																<label>$icon</label> $file
															</td>
															<td>
																<a href=\"download.php?file=$item&name=$file\" class=\"btn btn-inverse\"><i class=\"fa fa-download\"></i></a>
															</td>
															</tr>";
												}
											}
										}
									?>
								</tbody>
							</table>
							<div class="alert alert-danger">
                                <article>Folders with space(s) in their name will not expand when clicked; use a hyphen(-) or an underscore( _ ) to eliminate all space(s) then refresh this page to make them expand when clicked.</article>
                            </div>
								<?
									foreach ($root as $file) {
										if ($folders = glob($rootPath.$path."/$file",GLOB_ONLYDIR)) {
											foreach ($folders as $rootSubFolder) {
												if ($file != '.' && $file != '..') {
								?>
								<div class="panel panel-info pull-right" style="width: 100%;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#<?=$file?>" class="collapsed"><?echo "<i class=\"fa fa-folder\"></i> <label>$file</label><br>";?></a>
                                        </h4>
                                    </div>

                                    <div id="<?=$file?>" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body" style="font-size: 0.9em;">
                                        	<div class="table-responsive">
                                        	<table class="table table-striped table-bordered table-hover">
                                        		<tbody>
                                        			<?
                                        				if ($subFolder = scandir($rootSubFolder)) {
                                        					foreach ($subFolder as $subFile) {
                                        						if (!(glob($rootPath.$path."/$file/".$subFile,GLOB_ONLYDIR)) && $subFile != '.' && $subFile != '..') {

                                        							//This will execute for all the subfiles inside the subfolder in the user specified directory
																	$extension = strtolower(substr($subFile, strrpos($subFile, '.')+1));

																	if (in_array($extension, $images)) {
																		$icon = '<i class="fa fa-photo"></i>';
																	} elseif (in_array($extension, $documents)) {
																		$icon = '<i class="fa fa-file-o"></i>';
																	} elseif (in_array($extension, $videos)) {
																		$icon = '<i class="fa fa-film"></i>';
																	} elseif (in_array($extension, $music)) {
																		$icon = '<i class="fa fa-music"></i>';
																	} elseif (in_array($extension, $code)) {
																		$icon = '<i class="fa fa-code"></i>';
																	} elseif (in_array($extension, $zip)) {
																		$icon = '<i class="fa fa-file-zip-o"></i>';
																	}

																	//Print out files that are in the subfolder of the user specified directory

																	$item = $rootPath.$path. "/$file/".$subFile;

																	echo "<tr>
																		<td>
																			<label>$icon</label> $subFile
																		</td>
																		<td>
																			<a href=\"download.php?file=$item&name=$subFile\" class=\"btn btn-inverse\"><i class=\"fa fa-download\"></i></a>
																		</td>
																		</tr>";
                                        						}
                                        					}
                                        				}
                                        			?>
                                        		</tbody>
											</table>
										</div>
								<?
									foreach ($subFolder as $subFile) {

										//Check if there is a folder inside the subfolder
										if ($subSubFolder = glob($rootPath.$path."/$file/".$subFile,GLOB_ONLYDIR)) {

											//If there is a folder inside the subfolder this will execute for all the subfolders inside the subfolder
											foreach ($subSubFolder as $subSubFile) {
												if ($subFile != '.' && $subFile != '..') {
								?>
								
								<div class="panel panel-success pull-right" style="width: 100%;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#<?=$subFile?>" class="collapsed"><?echo "<i class=\"fa fa-folder\"></i> <label>$subFile</label><br>";?></a>
                                        </h4>
                                    </div>

                                    <div id="<?=$subFile?>" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body" style="font-size: 0.9em;">
                                        	<div class="table-responsive">
                                        	<table class="table table-striped table-bordered table-hover">
                                        		<tbody>
                                        			<?
                                        				if ($innerSubFolder = scandir($subSubFile)) {
                                        					foreach ($innerSubFolder as $innerSubFile) {
                                        						if (!(glob($rootPath.$path."/$file/$subFile/".$innerSubFile,GLOB_ONLYDIR)) && $innerSubFile != '.' && $innerSubFile != '..') {

                                        							//This will execute for all the subfiles inside the subfolder in the user specified directory
																	$extension = strtolower(substr($innerSubFile, strrpos($innerSubFile, '.')+1));

																	if (in_array($extension, $images)) {
																		$icon = '<i class="fa fa-photo"></i>';
																	} elseif (in_array($extension, $documents)) {
																		$icon = '<i class="fa fa-file-o"></i>';
																	} elseif (in_array($extension, $videos)) {
																		$icon = '<i class="fa fa-film"></i>';
																	} elseif (in_array($extension, $music)) {
																		$icon = '<i class="fa fa-music"></i>';
																	} elseif (in_array($extension, $code)) {
																		$icon = '<i class="fa fa-code"></i>';
																	} elseif (in_array($extension, $zip)) {
																		$icon = '<i class="fa fa-file-zip-o"></i>';
																	}

																	//Print out files that are in the subfolder of the user specified directory

																	$item = $rootPath.$path. "/$file/$subFile/".$innerSubFile;

																	echo "<tr>
																		<td>
																			<label>$icon</label> $innerSubFile
																		</td>
																		<td>
																			<a href=\"download.php?file=$item&name=$innerSubFile\" class=\"btn btn-inverse\"><i class=\"fa fa-download\"></i></a>
																		</td>
																		</tr>";
                                        						}
                                        					}
                                        				}
                                        			?>
                                        		</tbody>
											</table>
										</div>
                                        </div>
                                    </div>
                                </div>
								<?
												}
											}
										}
									}
								?>
                                        </div>
                                    </div>
                                </div>
								<?
												}
											}
										}
									}
								?>
						</div>
                            	<script type="text/javascript">
                            		//alert("Folders with spaces in their names will not expand.");
                            	</script>
					</div>
				</div>
			</div>
		</div>
		<?
			} else {
		?>
		<div class="page-wrapper">
			<div class="container-fluid">
				<div class="col-md-12 col-sm-12">
					<div class="panell panel-success wow fadeInUp">
						<div class="panell-heading">
							<strong>Jay Share</strong>
						</div>
						<div class="panel-body">
							<form action="index.php" role="form" method="POST" enctype="multipart/form-data">
								<div class="message" id="message">
									<?
										$success = false;
										$failed = false;

										//Declare system path for saving files as a variable for easier manipulation
										$savePath = '../../../../../home/arjay/Received/';

										if (isset($_FILES['file']['name'])) {
											if (is_array($_FILES)) {
												foreach ($_FILES['file']['name'] as $file => $value) {
													$tmp_name = $_FILES['file']['tmp_name'][$file];

													$images = array("jpg","png","jpeg","gif","bmp");
													$documents = array("doc","docx","pdf","odt");
													$videos = array("mp4","avi","mkv","flv");
													$music = array("mp3","ogg","wma","m4a");

													$extension = strtolower(substr($value, strrpos($value, '.')+1));

													if (in_array($extension, $images)) {
														$location = $savePath . 'Pictures/' . $value;
													} elseif (in_array($extension, $documents)) {
														$location = $savePath . 'Documents/' . $value;
													} elseif (in_array($extension, $videos)) {
														$location = $savePath . 'Videos/' . $value;
													} elseif (in_array($extension, $music)) {
														$location = $savePath . 'Music/' . $value;
													} else {
														$location = $savePath . 'Others/' . $value;
													}

													

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
									<button class="btn btn-info" id="select">Send Files</button>
									<input type="file" name="file[]" id="myFile" multiple required>
									
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Receive <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php?path=Documents">Documents</a></li>
                                            <li class="divider"></li>
                                            <li><a href="index.php?path=Music">Music</a></li>
                                            <li class="divider"></li>
                                            <li><a href="index.php?path=Pictures">Pictures</a></li>
                                            <li class="divider"></li>
                                            <li><a href="index.php?path=Videos">Videos</a></li>
                                        </ul>
                                    </div>
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

		<?
			}
		?>
		<footer>
			
		</footer>

	</body>

	<script src="bootstrap/js/jquery-1.10.2.js"></script>
	<script src="bootstrap/js/jquery.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="bootstrap/js/bootstrap.js"></script>

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
        		var file = _("myFile").files[0];
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