<!DOCTYPE html>
<html>
<head>
  <title>Verify Admin</title>
  <style>
  body {
  background-image: url('admin.jpg');background-repeat:no-repeat;background-size: 1550px 780px;
 }
 </style>
 </head>
 <script>  
	function check()
	{
		var pass=document.regi.code.value;
		if(pass!='admin')
		{
			alert("password not match");
			return false;
		}
	}
</script>

  <!--<link rel ="stylesheet" type="text/css" href="style.css" >"-->

<body>
  <form name="regi" action="adm_code.php" method="POST" onsubmit="return check()">
    CODE:<input type="password" name="code">
    <input type="submit" value="ENTER">
  </form>
</body>
</html>