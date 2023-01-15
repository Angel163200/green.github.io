<?php
$error="";
session_start();
?>
<html>
<head>
<title>Sell your product</title>
<link rel ="stylesheet" type="text/css" href="style2.css"> 
</head>

	<body>
	<?php
	include_once 'studentclass1.php';
	$obj=new studentClass();
	$obj->ID=$_SESSION['id'];
	$result1=$obj->checkpremium();
	$row_cnt=$result1->num_rows;
    if($row_cnt!=0)
	{
	if($_SERVER["REQUEST_METHOD"]=="POST"){
	$obj=new studentClass();
	$obj->ID=$_SESSION['id'];
	$obj->pname=$_POST['pname'];
	$obj->des=$_POST['desc'];
	$obj->ptype=$_POST['ptype'];
	$obj->weight=$_POST['weight'];
	$obj->price=$_POST['price'];
	$obj->mobile=$_POST['mobile'];
	$obj->address=$_POST['address'];
	$result=$obj->proregister();
	if($result)
		header("Location:itemupload.php");
	else
		$error=$result;
	}
	?>
		<form action="" autocomplete="off" method="POST" enctype="multipart/form-data">
	<div class="new"> 
<table>	    
<caption>PRODUCT DETAILS</caption>      
				<tr>	        
				<td>Product Name:</td>	        
				<td><input type="text" name="pname" required></td>	    
				</tr>  
		
				<tr>	        
				<td>Description:</td>	        
				<td><input type="text" name="desc" required></td>	    
				</tr>  
		<tr>	        
		<td colspan="2">Product type:</td>
		</tr>	
		<tr>
		<td>vegetable</td>
		<td><input type="radio" name="ptype" value="vegetable" ></td>	    
		</tr>  
				<tr>
				<td>Fruits</td>
				<td><input type="radio" name="ptype" value="fruits" ></td>	    
				</tr>
		<tr>	        
		<td>Weight:</td>	        
		<td><input type="text" name="weight"  required></td>	    
		</tr>  		
				<tr>
				<td>Price per kg:</td>	        
				<td><input type="Bigint" name="price" required></td>	    
				</tr>
		<tr>	        
	    <td>Mobile:</td>	        
		<td><input type="text" name="mobile" required></td>	    
		</tr>
                <tr>	        
				<td>Address:</td>	        
				<td><input type="text" name="address" required></td>	    
				</tr> 		 
				<tr>	        
				<td></td>	        
				<td align="center"><button style="background-color:gray;color:white" type="submit" >SAVE</button> 
				<button><a href="index.php">CANCEL</a></button></td>	    
				</tr> 
</form>				
</table>
<?php 
	}                    
	else
	{
		echo '<h2 align="center">To sell your Product, You need to upgrade your account to premium </h2>';
		echo '<h1 align="center"><a href="payment.php">Upgrade to Premium</a></h2>';
	}

?>
</div> 	
</body>
</html>