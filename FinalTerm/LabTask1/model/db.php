<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "mydb6";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 function CheckUser($conn,$table,$username,$password)
 {
$result = $conn->query("SELECT * FROM ". $table." WHERE username='". $username."' ");
 return $result;
 }

 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }

 function UpdateUser($conn,$table,$username,$firstname,$email,$password,$address,$gender,$birthday,$profession,$checkbo)
 {
     $sql = "UPDATE $table SET firstname='$firstname', email='$email', password='$password', address='$address', gender='$gender', dob='$birthday', profession='$profession', interests='$checkbo' WHERE username='$username'";/* ; */
     
    if ($conn->query($sql) === TRUE) {
        $result= TRUE;
    

    } else {
        $result= FALSE ;
    }
    return  $result;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>