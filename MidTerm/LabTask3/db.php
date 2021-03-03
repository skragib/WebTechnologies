<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "mydbtask";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }
 function enterdata($conn,$table,$firstname,$email,$username,$password,$gender,$dateofbirth)
 {
$result = $conn->query("INSERT INTO $table (firstname, email, username, passwordd, gender, dateofbirth ) VALUES ('$firstname', '$email', '$username','$password','$gender','$dateofbirth')");
 
 }

 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>