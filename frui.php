
<!DOCTYPE html>
<html>
<head>

                                    <link rel="stylesheet" type="text/css" href="style1.css"> 
</head>
<body>
<h1 align="center"> FRUITS</h1>
    <div class="grid-container">
  <?php
  include_once 'studentClass1.php';
    		$obj=new studentClass();
    		$result=$obj->fruit();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
			{
                echo"<div><a class='a' href='admpro_ins.php?choice=4&PID=".$row['PID'] . "'>";
				echo "<img src='myfile/".$row['PID'].".jpg' height=50 width=100>";
				echo "<label class='l'>".$row['PRODUCTNAME'] ."</label>";
                echo "<label class='l'>".$row['DESCRIPTION'] ."</label>";
                echo "<label class='l'>Type: ".$row['PTYPE'] ."</label>";
                echo "<label class='l'>Weight: ".$row['WEIGHT'] ." Kg</label>";
				echo "<label class='l'>Price: Rs".$row['PRICE'] ." per kg</label>";
				echo "<label class='l'>Contact no: ".$row['MOBILE'] ."</label>";
				echo "<label class='l'>".$row['ADDRESS'] ."</label>";
				echo"</a></div>";
            }
    ?>
</body>
</html>