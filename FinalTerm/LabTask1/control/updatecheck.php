<?php
include('../model/db.php');


 $error="";

if (isset($_POST['update'])) {
if (empty($_POST['firstname']) || empty($_POST['email'])) {
$error = "input given is invalid";
}
else
{
$connection = new db();
$conobj=$connection->OpenCon();
$checkbox1=$_POST['intr'];
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  

$userQuery=$connection->UpdateUser($conobj,"student",$_SESSION["username"],$_POST['firstname'],$_POST['email'],$_POST['password'],$_POST['address'],$_POST['gender'],$_POST['birthday'],$_POST['profession'],$chk); /* ); */
if($userQuery==TRUE)
{
    echo "update successful"; 
}
else
{
    echo "could not update";
    

    
}
$connection->CloseCon($conobj); 

}
}


?>
