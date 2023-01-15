<?php
$error="";
session_start();
?>
<html>
<head>
<title>Registration page</title>
<link rel ="stylesheet" type="text/css" href="styles.css"> 
<h1 align="center" style="background-color:blue;">REGISTER HERE</h1>
<script>  
function validate()
{
	var pass=document.f1.pw.value;
	var repass=document.f1.rpw.value;
	if(pass!=repass)
	{
		alert("password not match");
		return false;
	}
}
</script>
</head>

	<body>
	<?php
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	   include_once'studentclass1.php';
	   $obj=new studentClass();
	   $obj->name=$_POST['txtsname'];

	   $obj->pass=$_POST['pw'];

		$obj->repass=$_POST['rpw'];

		$obj->email=$_POST['mail'];

		$obj->mobile=$_POST['mobile'];

		$obj->address=$_POST['address'];

		$result=$obj->register();
		if($result)
			header("Location:Login.php");
		else
			$error="Error in inserting";
	}
?>	
	<form name="f1" action="" method="POST" enctype="multipart/form-data" onSubmit="return validate()"> 
	<div class="reg"> 
<table>	    
<caption>REGISTRATION</caption>
		<tr>	        
		<td><b>USERNAME:</b></td>	        
		<td><input type="text" name="txtsname" required></td>	    
		</tr>      
				<tr>	        
				<td><b>E-mail:</b></td>	        
				<td><input type="email" name="mail" required></td>	    
				</tr>  
		<tr>	        
		<td><b>PASSWORD:</b></td>	        
		<td><input type="password" name="pw" required></td>	    
		</tr>   	
				<tr>	        
				<td><b>CONFIRM PASSWORD:</b></td>	        
				<td><input type="password" name="rpw" required></td>	    
				</tr>
		<tr>	        
	    <td><b>MOBILE:<b></td>	        
		<td><input type="text" name="mobile" required></td>	    
		</tr>
                <tr>	        
				<td><b>ADDRESS:</b></td>	        
				<td><input type="text" name="address" required></td>	    
				</tr>  				
		<tr>	        
		<td></td>	        
		<td align="right"><button type="submit" >REGISTER</button></td>	    
		</tr>
                		
				<tr>	        
				<td></td>	        
				<td align="left">Already a member? <a href="Login.php">Login</a></td>	    
				</tr>
				
		</form>
        </table>	
		<?php
		echo $error;
		?>
		</div> 
</body>
</html>