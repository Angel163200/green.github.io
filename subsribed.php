<?php
$error="";
session_start();
?>
<html>
<head>
<title></title>
</head>

	<body>
	<?php
	include_once 'studentClass1.php';
	$obj=new studentClass();
	$obj->ID=$_SESSION['id'];
	$result1=$obj->checkpremium();
	$row_cnt=$result1->num_rows;
    if($row_cnt!=0)
        {
            
            include_once 'studentClass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
            echo "View Details ".$_SESSION['user']."'subsribstion Details: <br><br>";
            $result=$u->checkpremium();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
				
				<table>	    
<caption>subscribtion DETAILS</caption>
		<tr>	        
		<td>PAY_id:</td>	        
		<td><input type="int" name="PAY_id" required readonly value=<?=$row['PAY_ID']?>></td>
		</tr>
		<tr>	        
		<td>NAME:</td>	        
		<td><input type="text" name="name" required readonly value=<?=$row['USERNAME']?>></td>	    
		</tr>      
				<tr>	        
				<td>AMOUNT:</td>	        
				<td><input type="int" name="amount" required readonly value=<?=$row['AMOUNT']?>></td>	    
				</tr>  
		<tr>	        
		<td>CARDNUMBER</td>	        
		<td><input type="int" name="cardno" required readonly value=<?=$row['CARDNO']?>></td>  
		</tr> 
				
		<tr>	        
		<td>CVV:</td>	        
		<td><input type="int" name="cvv" required readonly value=<?=$row['CVV']?>></td>
		</tr> 
				<tr>	        
				<td>PIN NO:</td>	        
				<td><input type="password" name="pin" required readonly value=<?=$row['PIN']?>></td>	    
				</tr>

			<tr>	        
			<td></td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button>
			<button><a href="delsubscription.php">DELETE SUBSCRIPTION</a></button></td>  
			</tr> 
				</form>						
</table>
<?php 
	}
		}
		
		
		
else{
	echo '<h2 align="center">To sell your Product, You need to upgrade your account to premium </h2>';
		echo '<h1 align="center"><a href="payment.php">Upgrade to Premium</a></h2>';
}

?>
</div> 	
</body>
</html>