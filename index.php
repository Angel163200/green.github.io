<!DOCTYPE html>
<?php
session_start();
?>
<html>

<head>
<title>homepage</title>
<link rel ="stylesheet" type="text/css" href="style1.css" >
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<div class="sbg">

<h1 align="center"> Home Page</h1>
<div class="navbar">
<nav>
  <a class="active" href="#"> Home</a>
  <a href="veg.php"> Vegetable</a>
  <a href="frui.php" >Fruits</a>
  <a href="about.html" >About Us</a>
  <a href="sell.php" >Sell Your Product Here</a>
  <a href="Logout.php" >Logout</a>
  <div class="w3-dropdown-hover w3-right">
			<button class="w3-button ">My Account</button>
				<div class="w3-dropdown-content w3-bar-block w3-border" style="right:0">
				<a href="edit.php?choice=3" >view profile</a>
				<a href="edit.php?choice=1" >edit profile</a>
				<a href="edit.php?choice=2" >delete acc</a>
				<a href="edit.php?choice=4" >view product</a>
				<a href="subsribed.php">view Your Premium Details</a>
				<a href="Logout.php" >Logout</a>
				</div>
			</div>
</div>
</nav>
</div>
<br><br><br><br><br><br>
<div class="grid-container">
<?php
  include_once 'studentclass1.php';
    		$u=new studentClass();
    		$result=$u->admpro();
    		/* fetch associative array */
    		while ($row = mysqli_fetch_assoc($result))
			{
				echo"<div><a class='a' href='admpro_ins.php?choice=4&PID=".$row['PID'] . "'>";
				echo "<img src='Myfile/".$row['PID'].".jpg' height=50 width=100>";
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
</div>
</div>

</body>
</html>