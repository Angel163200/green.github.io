<?php

class dbConnection {
    
    
//*******************************
    //Variable Declaration
    //*******************************
        
var $con;
        
var $ret;
        
//*******************************
    
    
function dbConnection()
    
{
        
$this->con = new mysqli("localhost","root","","green");
        
if ($this->con->connect_error) 
{
        
die("Connection failed: " . $conn->connect_error);
        
} 
        
return $this->con;
    
}
    
function query($sql)
    
{
	//if(mysqli_query($this->con,$sql))
		//	echo "sucess";
	//else
		//die ("fallse".mysqli_error($this->con));
        
$ret=mysqli_query($this->con,$sql);//or die('<br><div style="padding:25px;color:red">No Result</div>');        
return $ret;
    
}   

}

?>