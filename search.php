
<?php

session_start();

if(!$_SESSION['loggedInUser']){
	header("Location: index.php");
}

 include('includes/header.php');

include('includes/connection.php');

include('includes/functions.php');
if(isset($_GET['client'])){
	$client = validateFormData( $_GET["client"]);
	if(!empty($_GET["client"])){
	
		
		$query = "SELECT * FROM  clients WHERE name LIKE '%".$client."%' ";
		
		$result = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($result) > 0){ 
		while($row=mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$name= $row['name'];
			$email= $row['email'];
			$phone= $row['phone'];
			$address= $row['address'];
			
			echo"<table class='table table-responsive'>";
			echo"<thead>";
			echo "<tr class='bg-primary'>";
			echo"<th>Name</th>";
			echo"<th>Email</th>";
			echo"<th>Phone</th>";
			echo"<th>Address</th>";
			echo"<tbody>";
			echo"</tr>";
			
			echo "<td class='bg-success'>" .$row['name']. "</td>";
			echo "<td class='bg-success'>" .$row['email']. "</td>";
			echo "<td class='bg-success'>" .$row['phone']. "</td>";
			echo "<td class='bg-success'>" .$row['address']. "</td>";
			echo"</tr>";
			echo"</tbody>";
			echo"</table>";
		}
		}else{
			echo"The query returned zero results.";
		}
		
	  }
	}
	





?>


<?php include('includes/footer.php');?>

