<?php
    
    include("connect.php");
      session_start();
      
      $flag = 0;
     if($_SERVER["REQUEST_METHOD"] == "POST")
     {
     	 $c = mysqli_real_escape_string($conn,$_POST['a']);
     	 $i = 0;
     	 echo "$c";

     	 
     	 	$result = mysqli_query($conn,"SELECT * FROM registration ");
     		while($row = mysqli_fetch_row($result))
     		{
     			$c1 = $row[5];
     			echo "one";
     			$i = $i + 1;

     			if($c == $c1)
     			{
     				$cost = $row[4];
     				echo "$cost";
     				$res = $cost - 60;
     				echo "$res";
     				mysqli_query($conn,"UPDATE `registration` SET `Amount_present`= $res WHERE Sno=$i");
     				$flag = $flag + 1;
     				header("location:success.html");
     				break;

     			}
     		}

     		if($flag == 0)

     		{
     			header("location:onetime_user.html");
     		}
     	}
  

     ?>