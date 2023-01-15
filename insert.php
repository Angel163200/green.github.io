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
<h1> ADMIN</h1>
<?php
    if(($_SERVER["REQUEST_METHOD"] == "POST"))
    {
    	if($_GET['choice']==1)
    	{
    		// for insert choice=1
    		//  echo " choice=1 for post insert<br>";
    		include_once 'studentClass1.php';
			$obj=new studentClass();	
			$obj->name=$_POST['txtsname'];
			$obj->pass=$_POST['pw'];
			$obj->repass=$_POST['rpw'];
			$obj->email=$_POST['mail'];
			$obj->mobile=$_POST['mobile'];
			$obj->address=$_POST['address'];
			$result=$obj->register();
				if($result)
					header('Location:a_user.php');
				else
					$error="insertion not posivble";
	}
    	}
    	if($_GET['choice']==22)
    	{
    		//for update
    		// echo " choice=22 and for post update";
    		include_once 'studentClass1.php';
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
    			header('Location:a_user.php');
    		}
    		else
    			echo "Error in Updating".mysqli_error($obj->dbConnection->con);
    	}
        if($_GET['choice']==33)
        {
            //for delete
            // echo " choice=33 and for post delete";
            include_once 'studentClass1.php';
            $obj=new studentClass();
            $obj->ID=$_POST['id'];
            $result=$obj->deleteuser();
            echo "Result=".$result;
            if ($result)
            {
                header('Location:a_user.php');
            }
            else
                echo "Error in Deleting".mysqli_error($obj->dbConnection->con);
        }
    
    else
    {
    	//echo "Not in Post operation";
    	if($_GET['choice']==2)
    	{
    		//echo "choice=2 and to update";
    		include_once 'studentClass1.php';
    		$obj=new studentClass();
    		$obj->ID=$_GET['id'];
    		echo "Update User with ID =".$obj->ID."<br><br>";
    		$result=$obj->toupdate();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
    		{
    			?>
    			<form name="f1" action="insert.php?choice=22" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return validate()"> 

<table style="background-color:#00FF00">	    
<caption>REGISTRATION</caption>
				<tr>	        
				<td>ID:</td>	        
				<td><input type="text" name="id" required readonly value=<?=$row['ID']?>></td>	    
				</tr>  
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required value=<?=$row['USERNAME']?>></td>></td>    
		</tr>		  
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required value=<?=$row['PASSWORD']?>></td>></td>    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required value=<?=$row['REPASSWORD']?>></td>></td>	    
				</tr>	
				<tr>
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required value=<?=$row['EMAIL']?>></td>></td>   
				</tr>	
		<tr>	        
		<td>MOBILE:</td>	        
		<td><input type="text" name="mobile" required value=<?=$row['MOBILE']?>></td>></td>   
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="address" required value=<?=$row['ADDRESS']?>></td>></td>	    
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
    	if($_GET['choice']==11)
    	{
    		// echo "choice=11 and for insert operation";
    		?>
    			<form name="f1" action="insert.php?choice=1" autocomplete="off" method="POST" enctype="multipart/form-data" onsubmit="return validate()"> 

		<table style="background-color:#00FF00">	    
	<caption>REGISTRATION</caption>
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required></td>	    
		</tr>      
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required></td>	    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required></td>	    
				</tr>
				<tr>	        
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required></td>	    
				</tr>  
		<tr>	        
		<td>MOBILE:</td>	        
		<td><input type="bigint" name="mobile" required></td>	    
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="address" required></td>	    
				</tr>  
		<tr>	        
		<td></td>	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >SAVE</button></td>	    
		</tr> 

					</form>				
					</table>
					

	        <?php 
        }
        if($_GET['choice']==3)
        {
            //echo "choice=3 and to delete";
            include_once 'studentClass1.php';
            $obj=new studentClass();
            $obj->ID=$_GET['id'];
            echo "Delete User with ID =".$obj->ID."<br><br>";
            $result=$obj->toupdate();
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <form action="insert.php?choice=33" method="POST" autocomplete="off" enctype="multipart/form-data">
				<table style="background-color:yellow">	    
	<caption>REGISTRATION</caption>
				<tr>	        
				<td>ID:</td>	        
				<td><input type="text" name="id" required readonly value=<?=$row['ID']?>></td>	    
				</tr> 
		<tr>	        
		<td>USERNAME:</td>	        
		<td><input type="text" name="txtsname" required readonly value=<?=$row['USERNAME']?>></td>></td>	    
		</tr>      
		<tr>	        
		<td>PASSWORD:</td>	        
		<td><input type="password" name="pw" placeholder="New password"  required readonly value=<?=$row['PASSWORD']?>></td>></td>	    
		</tr>   	
				<tr>	        
				<td>RE-PASSWORD:</td>	        
				<td><input type="Password" name="rpw" placeholder="RE-ENTER"  required readonly value=<?=$row['REPASSWORD']?>></td>></td>	    
				</tr>
				<tr>	        
				<td>E-MAIL:</td>	        
				<td><input type="email" name="mail" required readonly value=<?=$row['EMAIL']?>></td>></td>	    
				</tr>  
		<tr>	        
		<td>MOBILE:</td>	        
		<td><input type="bigint" name="mobile" required readonly value=<?=$row['MOBILE']?>></td>></td>	    
		</tr>  
				<tr>	        
				<td>ADDRESS:</td>	        
				<td><input type="text" name="address" required readonly value=<?=$row['ADDRESS']?>></td>></td>	    
				</tr>  
				
		<tr>	        
		<td></td>	        
		<td align="center"><button style="background-color:gray;color:white" type="submit" >DELETE</button></td>	    
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