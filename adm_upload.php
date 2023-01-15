<?php
if(isset($_POST["upload"]))
{

	
	move_uploaded_file($_FILES['Myfile']['tmp_name'],"Myfile/".$_GET['PID'].'.jpg');
	
	echo "file uploaded";
	
	
	header("Location:adm_pro.php");
}
?>
<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="Myfile">
  <input type="submit"  name="upload">
  <button style="background-color:gray;color:white"><a href="adm_pro.php">cancel</a></button>
</form>

</body>
</html>