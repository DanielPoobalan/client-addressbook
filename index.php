<?php
$loginError ="";
$alertMessage="";
session_start();
include('includes/functions.php');
if(isset($_POST['login'])){
	$formEmail =validateFormData($_POST['email']);
	$formPass =validateFormData($_POST['password']);
	
	include('includes/connection.php');
	$query = "SELECT name, password FROM users WHERE email='$formEmail'";
	$result = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$name       = $row['name'];
			$hashedPass = $row['password'];
		}
		
		if(password_verify($formPass, $hashedPass)){
			$_SESSION['loggedInUser'] = $name;
			
			header("Location:clients.php");
		}else{
			$loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again</div>";
		}
	}else{
		
		    $loginError = "<div class='alert alert-danger'>No such user in database. Please try again.<a class='close' data-dismiss='alert'>&times;</a> </div>";
	}
	
}
if(isset($_GET['signup'])){
	
	//if registration is successful
	if($_GET['signup'] == 'success'){
	$alertMessage= "<div class='alert alert-success'>Registration is successful.You may login now<a class='close' data-dismiss='alert'>&times;</a></div>";
	
 }
}

//mysqli_close($conn);
include('includes/header.php');

//$password = password_hash("joesatriani", PASSWORD_DEFAULT);
//echo $password;


?>

<h1 align="center">Client Address Book</h1>

<?php echo $loginError;?>
<?php echo $alertMessage;?>
<!--
<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
-->
<style>
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<div class="container">

      <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <p class="lead">Log in to your account.</p>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name ="email" >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>
      <p align="center">Not a member? Sign up <a href="signup.php" style="none">here</a></p>
    </div> <!-- /container -->
<?php
include('includes/footer.php');
?>