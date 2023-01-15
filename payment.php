<?php
$error="";
session_start();
?>
<html>
<head>
<title>
Payment
</title>
<link rel ="stylesheet" type="text/css" href="style2.css"> 
<script>
function sucess()
	{
			alert("Transaction is sucessfull");
			return true;
	}
</script>
</head>

	<body>
	<?php
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		include_once 'studentClass1.php';
	$obj=new studentClass();
    $obj->ID=$_SESSION['id'];	
	$obj->name=$_POST['name'];
	$obj->amt=$_POST['amount'];
	$obj->cno=$_POST['cardno'];
	$obj->cv=$_POST['cvv'];
	$obj->pin=$_POST['pin'];
	date_default_timezone_set("Asia/Kolkata");
    $obj->dat=date('y-m-d H:i:s');
	$result=$obj->pay();
	if($result)
		header("Location:sell.php");
	else
		$error=$result;
	}
		?>
		<form action="" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return sucess()">
	<div class="reg"> 
<table>	    
<caption>PAYMENT DETAILS</caption>
		<tr>	        
		<td>CARD USERNAME:</td>	        
		<td><input type="text" name="name" required></td>	    
		</tr>      
				<tr>	        
				<td>AMOUNT:</td>	        
				<td><input type="int" name="amount" required readonly value="2000"></td>	    
				</tr>  
		<tr>	        
		<td>CARDNUMBER</td>	        
		<td><input type="int" name="cardno" required pattern="[0-9]{16}" title="invAlid"></td>	    
		</tr> 
				
		<tr>	        
		<td>CVV:</td>	        
		<td><input type="password" name="cvv" required pattern="[0-9]{3}" title="invAlid"></td>	    
		</tr>  
				<tr>	        
				<td>PIN NO:</td>	        
				<td><input type="password" name="pin" required></td>	    
				</tr> 
 
		<tr>	        
		<td></td>	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >SAVE</button>  
		<button><a href="index.php">CANCEL</a></button></td>	    
		</tr> 
</form>				
</table>
<?php                     
echo $error;

?>
</div> 	
</body>
</html>