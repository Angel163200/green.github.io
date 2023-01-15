<?php
	$error="";
    session_start();
    if(!isset($_SESSION['id']))
    {
    	header('Location:adm_verify.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
                                       <!--<link rel="stylesheet" type="text/css" href="disp.css">-->

</head>
<body bgcolor="#b3ffff">
<h1> ADMIN</h1>

<?php

    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
    	if($_GET['choice']==1)
    	{
    		// for insert choice=1
    		//  echo " choice=1 for post insert<br>";
    				include_once 'studentclass1.php';
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
		header("Location:itemupload2.php");
	else
		$error=$result;
		}
	}
    	if($_GET['choice']==22)
    		{
    		//for update
    		// echo " choice=22 and for post proupdate";
    		include_once 'studentClass1.php';
					$obj=new studentClass();
					$obj->ID=$_SESSION['id'];	
					$obj->PID=$_POST['PID'];
					$obj->pname=$_POST['pname'];
					$obj->des=$_POST['desc'];
					$obj->ptype=$_POST['ptype'];
					$obj->weight=$_POST['weight'];
					$obj->price=$_POST['price'];
					$obj->mobile=$_POST['mobile'];
					$obj->address=$_POST['address'];
					$result=$obj->updateprodetails();
    	
    		echo "Result=".$result;
    		if ($result)
    		{
    			header("Location:adm_pro.php");
    		}
    		else
    			echo "Error in Updating";
    	}
		
        if($_GET['choice']==33)
         {
            //for delete
            // echo " choice=22 and for post prodelete";
            include_once 'studentClass1.php';
            $u=new studentClass();
            $u->PID=$_POST['PID'];
            $result=$u->deletepro();
            echo "Result=".$result;
            if ($result)
            {
                header("Location:adm_pro.php");
            }
            else
                echo "Error in Deleting";
         } 
    else
    {
    	//echo "Not in Post operation";
    	if($_GET['choice']==2)
    	{
    		//CHOICE5 - EDIT product details
    		include_once 'studentClass1.php';
    		$u=new studentClass();
    		//$u->ID=$_SESSION['id'];
			$u->PID=$_GET['PID'];
    		//echo "Edit ".$_SESSION['user']."'s Details: <br><br>";
    		$result=$u->proview();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
    		{
    			?>
    			<form action="admpro_ins.php?choice=22" method="POST" enctype="multipart/form-data">
				<?php echo "<img src='Myfile/".$row['PID'].".jpg' height=50 width=100>"; ?>
				<table>	    
<caption>PRODUCT DETAILS</caption>
			<tr>	        
		<td>Product Id:</td>	        
		<td><input type="text" name="PID" readonly value=<?=$row['PID']?>></td>></td>	    
		</tr>    
		<tr>	        
		<td>Product Name:</td>	        
		<td><input type="text" name="pname" required value=<?=$row['PRODUCTNAME']?>></td>></td>	    
		</tr>  
		
				<tr>	        
				<td>Description:</td>	        
				<td><input type="text" name="desc" required value=<?=$row['DESCRIPTION']?>></td>></td>	    
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
		<td><input type="text" name="weight"  required value=<?=$row['WEIGHT']?>></td>></td>	    
		</tr>  		
				<tr>
				<td>Price per kg:</td>	        
				<td><input type="Bigint" name="price" required value=<?=$row['PRICE']?>></td>></td>	    
				</tr>
		<tr>
		<td>Mobile:</td>	        
		<td><input type="Bigint" name="mobile" required value=<?=$row['MOBILE']?>></td>></td>	    
		</tr>
		<td>Address:</td>	        
		<td><input type="text" name="address" required value=<?=$row['ADDRESS']?>></td>></td>	    
		</tr>
			<tr>	        
			<td></td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button>  
			<button><a href="adm_pro.php">cancel</a></button>     
			<button><a href="adm_upload.php?PID=<?=$row['PID']?>">EDIT IMAGE</a></button> 		
			</td>	
			</tr> 
					</form>				
					</table>
					<?php
            }	
        }
    	if($_GET['choice']==11)
    	{

    			?>
    			<form action="admpro_ins.php?choice=1" method="POST" enctype="multipart/form-data">
				
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
		<td><input type="Bigint" name="mobile" required></td>    
		</tr>
		<td>Address:</td>	        
		<td><input type="text" name="address" required></td>	    
		</tr>
			<tr>	        
			<td></td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button>  
			<button><a href="adm_pro.php">cancel</a></button> </td>	  	
			</tr> 
					</form>				
					</table>
					<?php
            }	
        if($_GET['choice']==3)
        {
            //echo "choice=3 and to delete";
            include_once 'studentclass1.php';
            $u=new studentClass();
            //$u->ID=$_SESSION['id'];
			$u->PID=$_GET['PID'];
            //echo "Delete ".$_SESSION['user']."'s account: <br><br>";
            $result=$u->proview();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="admpro_ins.php?choice=33" method="POST" enctype="multipart/form-data">
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
		<td>Mobile:</td>	        
		<td><input type="Bigint" name="mobile" readonly value=<?=$row['MOBILE']?>></td>></td>	    
		</tr>
		<td>Address:</td>	        
		<td><input type="text" name="address" readonly value=<?=$row['ADDRESS']?>></td>></td>	    
		</tr>
			<tr>	        
			<td>ARE YOU SURE YOOU WANT TO DELETE THE PRODUCT</td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >YESS</button>  <button><a href="adm_pro.php">CANCEL</a></button></td>	    
			</tr> 
				</form>				
				</table>
                <?php
            }	
        }
		if($_GET['choice']==4)
        {
            //echo "choice=4" homepage view;
            include_once 'studentclass1.php';
            $u=new studentClass();
            //$u->ID=$_SESSION['id'];
			$u->PID=$_GET['PID'];
            //echo "Delete ".$_SESSION['user']."'s account: <br><br>";
            $result=$u->proview();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
        <form action="index.php" method="POST" enctype="multipart/form-data">
		<?php echo "<img src='Myfile/".$row['PID'].".jpg' height=50 width=100>"; ?>
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
		<td>Mobile:</td>	        
		<td><input type="Bigint" name="mobile" readonly value=<?=$row['MOBILE']?>></td>></td>	    
		</tr>
		<td>Address:</td>	        
		<td><input type="text" name="address" readonly value=<?=$row['ADDRESS']?>></td>></td>	    
		</tr>
			<tr>	        
			<td></td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button> </td>	    
			</tr> 
				</form>				
				</table>
                <?php
            }	
        }
    }
?>
        <?php                     
echo $error;

?>
 </form> 
</body>
</html>