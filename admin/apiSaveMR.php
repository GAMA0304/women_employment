<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$name=$_POST["name"];
	$mobileno=$_POST["mobileno"];
	$email=$_POST["email"];
	
	$qry="Select count(*) as cnt from pt_mr_details where mobileno='".$mobileno."'";
	$result=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($result);
	if($row["cnt"]>0){
		echo "Exist";
	}
	else{	
		$qry="insert into pt_mr_details(MR_name,mobileno,email) values('".$name."','".$mobileno."','".$email."')";
		if(mysqli_query($con,$qry))
		{
			$qry="insert into pt_mr_login(username,password,status) values('".$email."','".md5($mobileno)."','on')";
			if(mysqli_query($con,$qry))
			{
				echo "Success";
			}
			else{
				echo "Error";
			}
		}
		else{
			echo "Error";
		}
	}
	
?>
