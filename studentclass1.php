<?php

include_once 'dbConnection.php';

class studentClass {
	
	var $ID;
	var $name;
	var $pass;
	var $repass;
	var $email;
	var $address;
	var $mobile;
	var $type;
	var $PID;
	var $pname;
	var $des;
	var $price;
	var $status;
	var $weight;
	var $ptype;
	var $amt;
	var $dat;
	var $cno;
	var $cv;
	var $pin;
    
function studentClass()
    
{
        
$this->dbConnection=new dbConnection();
    
}
function login()
{
	
$sql="select * from Registration where USERNAME='$this->name' && PASSWORD='$this->pass'";

$result=$this->dbConnection->query($sql); 

return $result;

} 
function register()
{

$sql="INSERT INTO `registration` (`ID`, `USERNAME`, `PASSWORD`, `REPASSWORD`, `EMAIL`, `MOBILE`, `ADDRESS`, `type`) 
VALUES ('$this->ID', '$this->name', '$this->pass', '$this->repass', '$this->email', '$this->mobile', '$this->address', '1')";

$result=$this->dbConnection->query($sql); 

return $result;

}
 function updatedetails()
      {
        $sql="UPDATE Registration SET username='$this->name',password='$this->pass',email='$this->email',
        mobile='$this->mobile',address='$this->address',repassword='$this->repass' WHERE ID='$this->ID'";
        $result=$this->dbConnection->query($sql);
        return $result;
      }
function toupdate()
{
		$sql="select * from Registration where ID='$this->ID'";
		$result=$this->dbConnection->query($sql); 
		return $result;
}
function welcome()
      {
        $sql="SELECT * FROM Registration";
        $result=$this->dbConnection->query($sql); 
        return $result;
      }
function deleteuser()
{
    $sql="DELETE FROM Registration where ID='$this->ID'";
    $result=$this->dbConnection->query($sql);
    return $result;
}

function type()
{
	$sql="SELECT type FROM Registration WHERE USERNAME='$this->name' && PASSWORD='$this->pass'";
	$result=$this->dbConnection->query($sql);        
	return $result;
}





function proregister()
{
	$sql="INSERT INTO `product`(`ID`, `PRODUCTNAME`, `DESCRIPTION`, `PTYPE`, `WEIGHT`, `PRICE`, `MOBILE`, `ADDRESS`) VALUES
		('$this->ID','$this->pname','$this->des','$this->ptype','$this->weight','$this->price','$this->mobile','$this->address')";
	$result=$this->dbConnection->query($sql); 
	return $result;
}
	 function updateprodetails()
      {
        $sql="UPDATE product SET PRODUCTNAME='$this->pname', DESCRIPTION='$this->des', PTYPE='$this->ptype',WEIGHT='$this->weight',
		PRICE='$this->price',MOBILE='$this->mobile', ADDRESS='$this->address' where PID='$this->PID'";
        $result=$this->dbConnection->query($sql);
        return $result;
      }
	 function toview()
		{
        $sql="SELECT * FROM product where ID='$this->ID'";
        $result=$this->dbConnection->query($sql); 
        return $result;
		}
	function proview()
		{
        $sql="SELECT * FROM product where PID='$this->PID'";
        $result=$this->dbConnection->query($sql); 
        return $result;
		}	
	function deletepro()
        {
            $sql="DELETE FROM product where PID='$this->PID'";
            $result=$this->dbConnection->query($sql);
            return $result;
        }
	function admpro()
      {
        $sql="SELECT * FROM product";
        $result=$this->dbConnection->query($sql); 
        return $result;
      }
	  	function veg()
      {
        $sql="SELECT * FROM product where PTYPE='vegetable'";
        $result=$this->dbConnection->query($sql); 
        return $result;
      }
	  	  	function fruit()
      {
        $sql="SELECT * FROM product where PTYPE='fruits'";
        $result=$this->dbConnection->query($sql); 
        return $result;
      }
		function pay()
		{
			$sql="INSERT INTO `payment`(`AMOUNT`, `DATE`, `ID`, `USERNAME`, `CARDNO`, `CVV`, `PIN`) VALUES
			('$this->amt', '$this->dat', '$this->ID', '$this->name', '$this->cno', '$this->cv','$this->pin')";
			$result=$this->dbConnection->query($sql); 
			if($result)
			{
				return true;
			}
			else
			{
				return false;
			}			
		}	
		function checkpremium()
		{
			 $sql="SELECT * FROM payment where ID='$this->ID'";
			$result=$this->dbConnection->query($sql); 
        return $result;
		}
			function deletesub()
        {
			 $sql="DELETE FROM payment where ID='$this->ID'";
            $result=$this->dbConnection->query($sql);
            if($result)
			{
				return true;
			}
			else
			{
				return false;
			}	
		}
		function admpay()
      {
        $sql="SELECT * FROM payment";
        $result=$this->dbConnection->query($sql); 
        return $result;
      }
}
?>