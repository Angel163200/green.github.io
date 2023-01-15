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
                                    
<style>
table, th,td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body bgcolor="#ffb3b3">
  <h1>ADMIN</h1><br><br>
  <a href="logout.php">LOGOUT</a><br><br><br><br><br><br>
  <table style="background-color:grey">
    <tr>
	   <td>PAY ID</td>
      <td>CARD USERNAME</td>
      <td>AMOUNT</td>
      <td>DATE</td>
	  <td>USER ID</td>
      <td>CARD NUMBER</td>
      <td>CVV</td>
	  <td>PIN NO</td>
    </tr>
    <?php
        include_once 'studentclass1.php';
        $obj=new studentClass();
        $result=$obj->admpay();
        if ($result)
        {
          /* fetch associative array */
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>".$row['PAY_ID'] ."</td>";
            echo "<td>".$row['USERNAME'] ."</td>";
            echo "<td>".$row['AMOUNT'] ."</td>";
			echo "<td>".$row['DATE'] ."</td>";
            echo "<td>".$row['ID'] ."</td>";
            echo "<td>".$row['CARDNO'] ."</td>";
			echo "<td>".$row['CVV'] ."</td>";
            echo "<td>".$row['PIN'] ."</td>";
            echo "</tr>";
          }
		  echo "<td><a href='adm_code.php'><button>ok</button></a></td>";
        }
    ?>
  </table>
</body>
</html>