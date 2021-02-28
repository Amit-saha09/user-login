<DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
<?php 

$usernameErr= $passwordErr="";
$username="";
$password="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['username'])) {
        $usernameErr = "Please fill up the last user name properly";
    }
    else {
        $username = $_POST['username'];
    }
    if(empty($_POST['pass'])) {
        $passwordErr = "Please fill up the Password properly";
    }
    else {
        $password = $_POST['pass'];
    }

 $fn = fopen("data.txt","r") or die("fail to open file");

while($row = fgets($fn)) {
  list( $firstName, $lastname, $gender, $email,$user,$pass ) = explode( ",", $row );

  
  if($username==$user && $password== $pass){
      echo"successfull";
  }
 
}

fclose( $fn );

}

    
    



?>

<h1> Login page:</h1>

    
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?php echo $username ?>">
	<p><?php echo $usernameErr; ?></p>
		
	<br>
    <label for="password">Password</label>
	<input type="password" name="pass" id="pass" value="<?php echo $password ?>">
	<p><?php echo $passwordErr; ?></p>
		
	<br>
    <input type="submit" value="Submit">
</form>
    
</body>

</html>