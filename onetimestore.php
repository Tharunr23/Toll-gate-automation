<?php
    
    include("connect.php");
      session_start();
      

     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
	  $name = mysqli_real_escape_string($conn,$_POST['fname']);
      $adhr = mysqli_real_escape_string($conn,$_POST['adhar']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      
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
      	$result = mysqli_query($conn,"INSERT INTO `vehiclecross`(`S.No`, `Vehicle_number`, `Aadhar`, `email`) VALUES ('1','$name','$adhr','$email')");
      	header("location:check.html");
	  }
	}
	else
	{
		echo "Aadhar already in use";
	}

?>