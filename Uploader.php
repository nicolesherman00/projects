<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File Upload</title>
<h3>FILES MUST BE IN ZIP FOLDERS FOR DOWNLOAD</h3>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    Select a file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit">
</form>
<?php
error_reporting(E_PARSE);
$currentdir = getcwd();
//echo $t . basename( $_FILES['fileToUpload']['name']);
$target = $currentdir.'/Upload/'.basename($_FILES['fileToUpload']['name']);

$ok=1; if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target))

	
	echo "  The file  ".basename($_FILES['fileToUpload']['name']). "  has been uploaded";

?>
</body>
</html>