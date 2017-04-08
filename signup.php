
<?php 
include('includes/header.php');

include('includes/connection.php');

include('includes/functions.php');

$name=$email=$password=$password2="";
$inputError="";
if(isset($_POST['signup'])){
	
	
	if(!$_POST["memberName"]){
		$inputError = "<div class='alert alert-danger'>Please enter a name!<a class='close' data-dismiss='alert'>&times;</a></div>";;
	}else{
		$name = validateFormData($_POST["memberName"]);
	}
	if(!$_POST["memberEmail"]){
		$inputError = "<div class='alert alert-danger'>Please enter a valid email!<a class='close' data-dismiss='alert'>&times;</a></div>";;
	}else{
		$email = validateFormData($_POST["memberEmail"]);
	}
	
	if(!$_POST["password"]){
		$inputError = "<div class='alert alert-danger'>Please enter a password.<a class='close' data-dismiss='alert'>&times;</a></div>";;
	}else{
		$password = validateFormData($_POST["password"]);
	}
	
	if(!$_POST["password2"]){
		$inputError = "<div class='alert alert-danger'>Please enter the password again<a class='close' data-dismiss='alert'>&times;</a></div>";;
	}else{
		$password2 = validateFormData($_POST["password2"]);
	}
	if($_POST["password"] != $_POST["password2"]){
		$inputError = "<div class='alert alert-danger'>The password did not match. Please try again!<a class='close' data-dismiss='alert'>&times;</a></div>";;
	}else{
		$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
		$password2 =  password_hash($_POST["password2"], PASSWORD_DEFAULT);
		
	}
	
	$memberName  = validateFormData($_POST["memberName"]);
	$email       = validateFormData($_POST["memberEmail"]);
	$password    =  password_hash($_POST["password"], PASSWORD_DEFAULT);
	$password2   =  password_hash($_POST["password2"], PASSWORD_DEFAULT);
	
	
	if($memberName && $email && $password && $password2){
		$query = "INSERT INTO  users(id,email,name,password) VALUES (NULL,'$email','$memberName','$password')";
		
		$result = mysqli_query($conn, $query);
			if($result){
				header("Location: index.php?signup=success");
				
			}else{
				echo "Error:".$query."<br>". mysqli_error($conn);
			}
	}
	
}
 ?>


<h1>Sign up Form</h1>
<?php echo $inputError;?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-8">
        <label for="member-name">Name *</label>
        <input type="text" class="form-control input-lg" id="member-name" name="memberName" value="">
    </div>
    <div class="form-group col-sm-8">
        <label for="member-email">Email *</label>
        <input type="email" class="form-control input-lg" id="member-email" name="memberEmail" value="">
    </div>
    <div class="form-group col-sm-8">
        <label for="password">Password *</label>
        <input type="password" class="form-control input-lg" id="password" name="password" value="">
    </div>
    <div class="form-group col-sm-8">
        <label for="password2">Re-enter password *</label>
        <input type="password" class="form-control input-lg" id="password2" name="password2" value="">
    </div>
    
    <div class="col-sm-12">
            <a href="clients.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success " name="signup">Sign up</button>
    </div>
</form>

<?php include('includes/footer.php') ?>
