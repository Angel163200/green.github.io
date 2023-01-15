<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
      header('Location:verify.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <title>ADMIN | Users</title>
  
                           <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body> <!--style="background-color:powderblue;">"-->
  <h1>ADMIN</h1><br><br>
  <a href="insert.php?choice=11"><button>Add New User</button></a>  <a href="Logout.php"><button>LOGOUT</button></a><br><br><br><br><br><br>
  <table style="background-color:grey">
    <tr>
	  <td>ID</td>
      <td>NAME</td>
      <td>PASSWORD</td>
	  <td>RE-PASSWORD</td>
	  <td>EMAIL</td>
      <td>MOBILE</td>
	  <td>ADDRESS</td>
    </tr>
    <?php
        include_once 'studentClass1.php';
        $obj=new studentClass();
        $result=$obj->welcome();
        if ($result)
        {
          /* fetch associative array */
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "<tr>";
            echo "<td>".$row['ID'] ."</td>";
            echo "<td>".$row['USERNAME'] ."</td>";
            echo "<td>".$row['PASSWORD'] ."</td>";
			echo "<td>".$row['REPASSWORD'] ."</td>";
			echo "<td>".$row['EMAIL'] ."</td>";
            echo "<td>".$row['MOBILE'] ."</td>";
			echo "<td>".$row['ADDRESS'] ."</td>";
            echo "<td><a href='insert.php?choice=2&id=".$row['ID'] . "'><button>Edit</button></a></td>";
            echo "<td><a href='insert.php?choice=3&id=".$row['ID'] . "'><button>DELETE</button></a></td>";
            echo "</tr>";
          }
        }
    ?>
  </table>
</body>
</html>