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
	        if(isset($_GET['choice']))
        {
			if($_GET['choice']==11)
			{
            //for delete subscription
            
            include_once 'studentClass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
            $result=$u->deletesub();
            echo "Result=".$result;
            if ($result)
            {
				
                header('Location:index.php');
            }
            else
                echo "Error in Deleting";
        }
		}
		else{
			echo $_SESSION['id'];
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
            echo "Delete payment ".$_SESSION['user']."'subsribstiojn Details: <br><br>";
            $result=$u->checkpremium();
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="delsubscription.php?choice=11" method="POST" enctype="multipart/form-data">
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
			<td>ARE YOU SURE YOOU WANT TO DELETE THE SUBSCRIPTION</td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >YESS</button>  <button><a href="subsribed.php">CANCEL</a></button></td>	    
			</tr> 
				</form>				
				</table>
                <?php
            }	
        }
		}