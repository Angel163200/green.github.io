<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
    	header('Location:Login.php');
    }
    if(!isset($_SESSION['id']))
    {
        header('Location:Login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome | <?php echo $_SESSION['user'] ?></title>
</head>
<body>
<h1> Hi <?php echo $_SESSION['user'] ?> <br><br></h1>
<?php
include_once 'studentclass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
            echo "View ".$_SESSION['user']."'s product Details: <br><br>";
            $result=$u->toview();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
				<?php echo "<img src='Myfile/".$row['PID'].".jpg' height=50 width=100>"; ?>
				<table>	    
<table>	    
<caption>PRODUCT DETAILS</caption>   
		<tr>	        
		<td>Product Id:</td>	        
		<td><input type="text" name="PID" readonly value=<?=$row['PID']?>></td>></td>	    
		</tr>    
		<tr>	        
		<td>Product Name:</td>	        
		<td><input type="text" name="pname" readonly value=<?=$row['PRODUCTNAME']?>></td>></td>	    
		</tr>  
		
				<tr>	        
				<td>Description:</td>	        
				<td><input type="text" name="desc" readonly value=<?=$row['DESCRIPTION']?>></td>></td>	    
				</tr>  
	
		<tr>
		<td>Product type:</td>
		<td><input type="text" name="ptype" readonly value=<?=$row['PTYPE']?>></td>></td>	    
		</tr>  
				
		<tr>	        
		<td>Weight:</td>	        
		<td><input type="text" name="weight"  readonly value=<?=$row['WEIGHT']?>></td>></td>	    
		</tr>  		
				<tr>
				<td>Price per kg:</td>	        
				<td><input type="Bigint" name="price" readonly value=<?=$row['PRICE']?>></td>></td>	    
				</tr>
				<tr>
		<tr>
		<td>Mobile:</td>	        
		<td><input type="Bigint" name="mobile" readonly value=<?=$row['MOBILE']?>></td>></td>	    
		</tr>
		<td>Address:</td>	        
		<td><input type="text" name="address" readonly value=<?=$row['ADDRESS']?>></td>></td>	    
		</tr>	
             <tr>	        
			<td></td>	        
			<td align="center"><button><a href="upload.php?PID=<?=$row['PID']?>">UPLOAD IMAGE</a></button>  </td>	    
			</tr>       
				</form>				
				</table>
				<?php
			}
			?>
</body>
</html>