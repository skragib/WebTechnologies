<!DOCTYPE html>
<html>
<head>
<title>Labtask 2</title>

</head>
<body>
<h1> Registration </h1>

<?php 

$validatename="";
$validateemail="";
$validateall="";
$validatepass="";
$validateconfirmpass="";


if(empty($_REQUEST["gname"]) || (strlrn($_REQUEST["gname"])<5) || !preg_match("/^[a-zA-Z0-9_.-]*$/", $_REQUEST["gname"])){
$validatename = "Invalid user name<br>
User Name can contain alpha numeric characters, period, dash or underscore only<br>User Name must contain at least five characters<br>";
}
if(empty($_REQUEST["jname"]) || (strlrn($_REQUEST["jname"])<8) || !preg_match("/^[a-zA-Z0-9@#$%]+$/", $_REQUEST["jname"])){
    $validatepass = "Invalid password<br>
    Password must not be less than eight characters<br>Password must contain at least one of the special characters (@, #, $, %)s<br>";
}
if($_REQUEST["kname"] != $_REQUEST["jname"]){
    $validateconfirmpass ="Password did not match";
}
if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_REQUEST["iname"]) ){  
    $validateemail = "Invalid email";
}
if(empty($_REQUEST["gname"]) || empty($_REQUEST["fname"]) ||empty($_REQUEST["iname"]) ||empty($_REQUEST["jname"]) ||empty($_REQUEST["kname"])){
    $validateall = "Fill all the forms";
}


?>


<form>
<table>
<tr>
<td>
First Name: </td><td><input type="text" id="f" name="fname"></td>
</tr>

<tr><td>Email:</td><td> <input type="text" id="i" name="iname"></td>
<?php echo $validateemail?>
</tr>
<tr>
<td>
User Name: </td><td><input type="text" id="g" name="gname"></td>
<?php echo $validatename?>
</tr>
<tr>
<td>Password:</td><td> <input type="password" id="j" name="jname"><td>
<?php echo $validatepass?>
</tr>
<tr>
<td>Confirm Password:</td><td> <input type="password" id="k" name="kname"><td>
<?php echo $validateconfirmpass?>
</tr>
</table>


<?php $validateradio="";
if(isset($_REQUEST["gender"])){
    $validateradio = $_REQUEST["gender"];
}
else{
    $validateradio="please select a radio/gender";
}
?>
<p>Gender:</p>
<input type="radio" id="male" name="gender" value="male">
Male
<input type="radio" id="female" name="gender" value="female">
Female
<input type="radio" id="other" name="gender" value="other">
Other
<br>

<?php echo $validateradio; ?>


<br>
<p>Date of Birth:</p>
<input type="date" id="birthday" name="birthday">
<br><br>

<?php echo $validateall?>

<table><tr><td>
<input type ="submit" value="Submit"></td>

<td>
<input type ="reset" value="Reset"></td>
</tr>
</table>


</form>
</body>
</html>
