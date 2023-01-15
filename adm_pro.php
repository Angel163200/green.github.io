<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
      header('Location:adm_verify.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN | Users</title>
                                        <!--<link rel="stylesheet" type="text/css" href="list.css"> "-->
<style>
table, th,td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body bgcolor="#ffb3b3">
  <h1>ADMIN</h1><br><br>
  <a href="admpro_ins.php?choice=11">Add New product</a> <br> <a href="logout.php">LOGOUT</a><br><br><br>
  <table>
    <tr>
	<td>ID</td>
	   <td>PID</td>
      <td>PRODUCT NAME</td>
      <td>DESCRIPTION</td>
      <td>TYPE</td>
      <td>WEIGHT</td>
      <td>PRICE</td>
	  <td>MOBILE</td>
	  <td>ADDRESS</td>
    </tr>
    <?php
        include_once 'studentclass1.php';
        $obj=new studentClass();
        $result=$obj->admpro();
        if ($result)
        {
          /* fetch associative array */
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<tr>";
			echo "<td>".$row['ID'] ."</td>";
            echo "<td>".$row['PID'] ."</td>";
            echo "<td>".$row['PRODUCTNAME'] ."</td>";
            echo "<td>".$row['DESCRIPTION'] ."</td>";
			echo "<td>".$row['PTYPE'] ."</td>";
            echo "<td>".$row['WEIGHT'] ."</td>";
            echo "<td>".$row['PRICE'] ."</td>";
			echo "<td>".$row['MOBILE'] ."</td>";
            echo "<td>".$row['ADDRESS'] ."</td>";
			echo "<td><img src='Myfile/".$row['PID'].".jpg' height=50 width=100></td>";
            echo "<td><a href='admpro_ins.php?choice=2&PID=".$row['PID'] . "'><button>EDIT</button></a></td>";
            echo "<td><a href='admpro_ins.php?choice=3&PID=".$row['PID'] . "'><button>DELETE</button></a></td>";
            echo "</tr>";
          }
        }
    ?>
  </table>
</body>
</html>