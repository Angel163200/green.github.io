<?php

$error="";

session_start();

?>

<html>
    
<head>
        
<meta charset="UTF-8">
        
<title>Login</title>

<link rel="stylesheet" type="text/css" href="styles.css">

<h1 align="center" style="background-color:powderblue;">LOGIN</h1>
    
</head>
    
<body>

<?php
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{

		include_once 'studentclass1.php';

		$obj=new studentClass();

		$obj->name=$_POST['txtsname'];

		$obj->pass=$_POST['pw'];

		$result=$obj->login();
		
		$r=$obj->type();
		
		$t=0;
		
		while ($row = $r -> fetch_row()) {
    $t=$row[0];
  }
$count=mysqli_num_rows($result);
if(($count!=0)&&($t==1))
	{
    $row_cnt=$result->num_rows;
    if($row_cnt!=0)
    {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user']=$row['USERNAME'];
      $_SESSION['id']=$row['ID'];
		header('Location:index.php');
	}
}
	elseif($t==2)
   	{
		header('Location:adm_verify.php');
	}
		else
	    {
			$error="ERROR";
		}
	
	}
?>
<form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
            
<div class="login">
                
<table>
	    
<tr>
	        
<td>Username:</td>
	        
<td><input type="text" name="txtsname" required></td>
	    
</tr>       
	    
<tr>
	        
<td>Password:</td>
	        
<td><input type="password" name="pw" required></td>
	    
</tr>
	    
<tr>
	        
<td></td>
	        
<td ><button type="submit" >Submit</button></td>
	    
</tr>
            
<tr>
<td></td>
<td align="left"> <b>Not yet registered? </b> <a href="registration.php"><b>Create an account</b></a></td>
<tr>
<td></td>
<td></td>
</tr>
</tr>
</tr>

<tr>
                
<td>                    
<?php
                     
echo $error;

?>
                
</td>
            
</tr>
	    
</table>
	
</div>
        
</form>

    
</body>
</html>