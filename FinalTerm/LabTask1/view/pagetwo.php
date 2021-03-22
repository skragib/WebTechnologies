<?php
session_start(); 



include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

Hii, <h3><?php echo $_SESSION["username"];?></h3>
<br>Your Profile Page.
<br><br>
<?php
$radio1=$radio2=$radio3="";
$int1=$int2=$int3="";
$drop1=$drop2="";
$firstname=$email="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $password=$row["password"];
      $address=$row["address"];
      $dob=$row["dob"];
      $cb=$row["interests"];
      $pattern = "/[,]/";
      $checkb = preg_split($pattern, $cb);

     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      if(  $row["profession"]=="Academician" )
      { $drop1="selected"; }
      else{$drop2="selected";}

      if($checkb[0]=="sports"){
        $int1="checked";
      }
      if($checkb[1]=="music"){
        $int2="checked";
      }
      if($checkb[2]=="wasting time"){
        $int3="checked";
      }


      
      
     


   
  } 
}
  else {
    echo "0 results";
  }



?>
<form action='' method='post'>
firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" >
<br><br>
password : <input type='text' name='password' value="<?php echo $password; ?>" >
<br><br>
email : <input type='text' name='email' value="<?php echo $email; ?>" >
<br><br>
address : <input type='text' name='address' value="<?php echo $address; ?>" >
<br><br>
Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php echo $radio3; ?> >Other
     <br> <br>
     
Date of Birth:
<input type="date" name="birthday" value="<?php echo $dob; ?>">
<br><br>

Select your profession:
  <select name='profession'>
    <option value="Academician" <?php echo $drop1; ?>>Academician</option>
    <option value="Student" <?php echo $drop2; ?>>Student</option>
  </select>
  
  <br><br>

  <input type="checkbox"  name="intr[]" value="sports" <?php echo $int1; ?>>
  <label for="int1"> Sports</label><br>
  <input type="checkbox"  name="intr[]" value="music" <?php echo $int2; ?>>
  <label for="int2"> Music</label><br>
  <input type="checkbox"  name="intr[]" value="wasting time" <?php echo $int3; ?>>
  <label for="int3"> Wasting time</label><br><br>
<?php  /*
  if($int1=="checked"){
    $checkb="sports";
  }
  if($int2=="checked"){
    $checkb="music";
  }
  if($int3=="checked"){
    $checkb="wasting time";
  }
  if($int1=="checked" && $int2=="checked"){
    $checkb="sports,music";
  }
  if($int2=="checked" && $int3=="checked"){
    $checkb="music,wasting time";
  }
  if($int1=="checked" && $int3=="checked"){
    $checkb="sports,wasting time";
  }
  if($int1=="checked" && $int2=="checked" && $int3=="checked"){
    $checkb="sports,music,wasting time";
  } 
  $_SESSION["checkb"] = $checkb;
      
      echo $checkb; */
?>


     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>

<a href="../view/pageone.php">Back </a>

<a href="../control/logout.php"> logout</a>


</body>
</html>