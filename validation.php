<!DOCTYPE html>
<html>
<head>
	<title>Registration Form Self</title>
</head>
<body>

	<h1>Registration Form Self</h1>

	<?php
		$firstNameErr = $lastNameErr = $genderErr= $emailErr = $usernameErr= $passwordErr=$recoveryemailErr="";
		$firstName = ""; 
		$lastName = ""; 
		$gender="";
        $email="";
        $username="";
        $password="";
        $recoveryemail="";



		if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the first name properly";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the last name properly";
			}
			else {
				$lastName = $_POST['lname'];
			}
            if(empty($_POST['email'])) {
				$emailErr = "Please fill up the last name properly";
			}
			else {
				$email = $_POST['email'];
			}
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr="Invalid mail";
            }
            else{
                $email=$_POST['email'];
            }

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
            if(empty($_POST['remail'])) {
				$recoveryemailErr = "Please fill up the last recovery email properly";
			}
			else {
				$recoveryemail = $_POST['remail'];
			}
            if (!filter_var($recoveryemail, FILTER_VALIDATE_EMAIL)) {
                $recoveryemailErr="Invalid mail";
            }
            else{
                $recoveryemail=$_POST['remail'];
            }


            $filepath = "data.txt"; 
            $f = fopen($filepath,'a');
            fwrite($f,"$firstName,$lastName,$email,$gender,$username,$password,$recoveryemail \n");







			

		
		}
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		
		<!-- Input Text Field -->
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" value="<?php echo $firstName; ?>"> 
		<p style="color:red"><?php echo $firstNameErr; ?></p>

		<br>

		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
		<p><?php echo $lastNameErr; ?></p>
		
		<br>
        <label for="gender">Gender</label>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
		
		
		<br>

        <label for="email">Email</label>
		<input type="email" name="email" id="email" value="<?php echo $email ?>">
		<p><?php echo $emailErr; ?></p>
		
		<br>
        <label for="username">Username</label>
		<input type="text" name="username" id="username" value="<?php echo $username ?>">
		<p><?php echo $usernameErr; ?></p>
		
		<br>
        <label for="password">Password</label>
		<input type="password" name="pass" id="pass" value="<?php echo $password ?>">
		<p><?php echo $passwordErr; ?></p>
		
		<br>

		<label for="recoveremail">Recoveremail</label>
		<input type="email" name="remail" id="remail" value="<?php echo $recoveryemail ?>">
		<p><?php echo $recoveryemailErr; ?></p>
		
		<br>

		<!-- Input submit -->
		<input type="submit" value="Submit">

	</form>

</body>
</html>