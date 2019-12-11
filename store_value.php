
<?php
    
    include("connect.php");
      session_start();
      

     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
	  $name = mysqli_real_escape_string($conn,$_POST['fname']);
      $adhr = mysqli_real_escape_string($conn,$_POST['adhar']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $amt = mysqli_real_escape_string($conn,$_POST['amount']);
      $vehi = mysqli_real_escape_string($conn,$_POST['vehicle']);
      
      $query = "SELECT Aadhar_no FROM registration WHERE Aadhar_no = '$adhr'";
	  if(!$result = mysqli_query($conn, $query))
	  {
	    	exit(mysqli_error($conn));
	  }

	  if(mysqli_num_rows($result) > 0)
	  {
	    	// username is already exist 
		   echo "Already exist";
	  }
	  else
	  {
	  	//$s1 = mysqli_query($conn,"SELECT Sno FROM registration ORDER BY Sno DESC LIMIT 1");
	  	//$s1 = $s1 + 1;
	  	//$sql = ;
      	$result = mysqli_query($conn,"INSERT INTO `registration` (`Sno`, `Name`, `Aadhar_no`, `Mail_id`, `Amount_present`, `Vehicle_number`) VALUES ('13', '$name', '$adhr', '$email', '$amt', '$vehi')");
      	header("location:index.html");
	  }
	}
	else
	{
		echo "Aadhar already in use";
	}

?>