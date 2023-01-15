<?php
if(isset($_POST["submit"]))
{

 /*$filename=$_FILES['myfile']['name'];
 $temp=$_FILES['myfile']['tmp_name'];
 $error=$_FILES['myfile']['error'];
 $type=$_FILES['myfile']['type'];
 $size=$_FILES['myfile']['size'];
 if($error==0)
 {
	if($type=="application/pdf" &&size>1000000)*/
	move_uploaded_file($_FILES['Myfile']['tmp_name'],"Myfile/".$_GET['PID'].'.jpg');
	echo "file uploaded";
	
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<body>
<head>
</head>
<body>
<h3>Upload image</h3>
<form method="post" enctype="multipart/form-data">
<input type="file" name="Myfile"><br>
<input type="submit" name="submit">
<button style="background-color:gray;color:white"><a href="sell.php">cancel</a></button>
</form>
</body>
</html>