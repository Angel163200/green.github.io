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
	<link rel ="stylesheet" type="text/css" href="style2.css" >
</head>
<body>
<h1> Hi <?php echo $_SESSION['user'] ?> <br><br></h1>
<?php
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
    	if($_GET['choice']==11)
    	{
    		//for update
    		// echo " choice=11 and for post update";
    		include_once 'studentclass1.php';
    		$obj=new studentClass();
			$obj->ID=$_POST['id'];
			$obj->name=$_POST['txtsname'];
			$obj->pass=$_POST['pw'];
			$obj->repass=$_POST['rpw'];
			$obj->email=$_POST['mail'];
			$obj->mobile=$_POST['mobile'];
			$obj->address=$_POST['address'];
    		$result=$obj->updatedetails();
    	
    		echo "Result=".$result;
    		if ($result)
    		{
    			header('Location:index.php');
    		}
    		else
    			echo "Error in Updating".mysqli_error($obj->dbConn->con);
    	}
        if($_GET['choice']==22)
        {
            //for delete
            // echo " choice=22 and for post delete";
            include_once 'studentclass1.php';
            $u=new studentClass();
            $u->ID=$_POST['id'];
            $result=$u->deleteuser();
            echo "Result=".$result;
            if ($result)
            {
                header('Location:Login.php');
            }
            else
                echo "Error in Deleting".mysqli_error($u->dbConn->con);
        }
		
		//---------------------------------------------------------------
		if($_GET['choice']==55)
    	{
    		//for update
    		// echo " choice=55 and for post proupdate";
    		include_once 'studentclass1.php';
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
    			header('Location:edit.php?choice=4');
    		}
    		else
    			echo "Error in Updating";
    	}
        if($_GET['choice']==66)
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
                header('Location:edit.php?choice=4');
            }
            else
                echo "Error in Deleting";
        }
    
    }
    else
    {
    	//echo choice=1 in GET Operation";
    	if($_GET['choice']==1)
    	{
    		//CHOICE - EDIT USER ACCOUNT
    		include_once 'studentclass1.php';
    		$u=new studentClass();
    		$u->ID=$_SESSION['id'];
    		echo "Edit ".$_SESSION['user']."'s Details: <br><br>";
    		$result=$u->toupdate();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
    		{
    			?>
    			<form action="edit.php?choice=11" method="POST" enctype="multipart/form-data">
    				<table>	    
<caption>REGISTRATION</caption>
				<tr>	        
				<td>ID:</td>	        
				<td><input type="text" name="id" required readonly value=<?=$row['ID']?>></td>	    
				</tr>  
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required value=<?=$row['USERNAME']?>></td>	    
		</tr>      
				<tr>	        
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required value=<?=$row['EMAIL']?>></td>	    
				</tr>  
		<tr>	        
		<td>PHONE:</td>	        
		<td><input type="bigint" name="mobile" required value=<?=$row['MOBILE']?>></td>	    
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="address" required value=<?=$row['ADDRESS']?>></td>	    
				</tr>  
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required value=<?=$row['PASSWORD']?>></td>	    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required value=<?=$row['REPASSWORD']?>></td>	    
				</tr>
		<tr>	        
		<td></td>	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >SAVE</button></td>	    
		</tr> 
    			</form>
				</table>
    			<?php
    		}
    	}
        if($_GET['choice']==2)
        {
            //echo "choice=2 and to delete";
            include_once 'studentclass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
            echo "Delete ".$_SESSION['user']."'s Account? <br><br>";
            $result=$u->toupdate();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="edit.php?choice=22" method="POST" enctype="multipart/form-data">
<table>	    
<caption>DELETE</caption>
				<tr>	        
				<td>ID:</td>	        
				<td><input type="text" name="id" required readonly value=<?=$row['ID']?>></td>	    
				</tr>  
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required readonly value=<?=$row['USERNAME']?>></td>	    
		</tr>      
				<tr>	        
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required readonly value=<?=$row['EMAIL']?>></td>	    
				</tr>  
		<tr>	        
		<td>PHONE:</td>	        
		<td><input type="bigint" name="mobile" required readonly value=<?=$row['MOBILE']?>></td>	    
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="address" required  readonly value=<?=$row['ADDRESS']?>></td>	    
				</tr>  
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required readonly value=<?=$row['PASSWORD']?>></td>	    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required readonly value=<?=$row['REPASSWORD']?>></td>	    
				</tr>
         <tr>	        
		<td>ARE YOU SURE YOOU WANT TO DELETE YOUR ACCOUNT</td>	  	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >yes</button>
		<button><a href="index.php">CANCEL</a></button></td>	 
	    
		</tr> 
                </form>
				</table>
                <?php
            }
        }
		        if($_GET['choice']==3)
        {
            //echo "choice=3 and to view profile";
            include_once 'studentclass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
            echo "View ".$_SESSION['user']."'s Details: <br><br>";
            $result=$u->toupdate();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="index.php" method="POST" enctype="multipart/form-data">
<table>	    
<caption>view Profile</caption>
				<tr>	        
				<td>ID:</td>	        
				<td><input type="text" name="id" required readonly value=<?=$row['ID']?>></td>	    
				</tr>  
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required readonly value=<?=$row['USERNAME']?>></td>	    
		</tr>      
				<tr>	        
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required readonly value=<?=$row['EMAIL']?>></td>	    
				</tr>  
		<tr>	        
		<td>PHONE:</td>	        
		<td><input type="bigint" name="mobile" required readonly value=<?=$row['MOBILE']?>></td>	    
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="addr" required  readonly value=<?=$row['ADDRESS']?>></td>	    
				</tr>  
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required readonly value=<?=$row['PASSWORD']?>></td>	    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required readonly value=<?=$row['REPASSWORD']?>></td>	    
				</tr>
         <tr>	        
		<td></td>	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >save</button></td>	    
		</tr> 
                </form>
				</table>
                <?php
            }
        }
		
		
		//==============================================================product view==========================================
		
		
		
		if($_GET['choice']==4)
        {
            //echo "choice=4 and to view product";
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
			<td></td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button>  
			<button><a href="edit.php?choice=5&PID=<?=$row['PID']?>">EDIT</a></button>  
			<button><a href="edit.php?choice=6&PID=<?=$row['PID']?>">delete</a></button>
			<button><a href="upload.php?PID=<?=$row['PID']?>">EDIT IMAGE</a></button>
			</td>	    
			</tr> 
				</form>				
				</table>
                <?php
            }	
        }
		
		//============================================================---EDIT PRODUCT---================================================================//
		
		if($_GET['choice']==5)
    	{
    		//CHOICE5 - EDIT product details
    		include_once 'studentclass1.php';
    		$u=new studentClass();
    		$u->ID=$_SESSION['id'];
			$u->PID=$_GET['PID'];
    		echo "Edit ".$_SESSION['user']."'s Details: <br><br>";
    		$result=$u->proview();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
    		{
    			?>
    			<form action="edit.php?choice=55" method="POST" enctype="multipart/form-data">
				
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
		<td><input type="checkbox" name="ptype" value="vegetable" ></td>	    
		</tr>  
				<tr>
				<td>Fruits</td>
				<td><input type="checkbox" name="ptype" value="fruits" ></td>	    
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
			<td align="center"><button style="background-color:gray;color:white" type="submit" >ok</button>  <button><a href="edit.php?choice=4">cancel</a></button> </td>	    
			</tr> 
					</form>				
					</table>
					<?php
            }	
        }
		
		//===========================================================---DELETE PRODUCT---===================================================================//
		if($_GET['choice']==6)
        {
            //echo "choice=2 and to delete";
            include_once 'studentclass1.php';
            $u=new studentClass();
            $u->ID=$_SESSION['id'];
			$u->PID=$_GET['PID'];
            echo "Delete ".$_SESSION['user']."'s account: <br><br>";
            $result=$u->proview();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="edit.php?choice=66" method="POST" enctype="multipart/form-data">
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
			<td>ARE YOU SURE YOOU WANT TO DELETE THE PRODUCT</td>	        
			<td align="center"><button style="background-color:gray;color:white" type="submit" >YESS</button>  
			<button><a href="edit.php?choice=4">CANCEL</a></button></td>	    
			</tr> 
				</form>				
				</table>
                <?php
            }	
        }
		
    }
?>
</body>
</html>
