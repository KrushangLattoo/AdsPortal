<?php
	session_start();
	include "../classes/db.php";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$id = $_POST['email'];
		$pass = $_POST['password'];	
		$sql="SELECT upwd FROM users WHERE uemail='".$id."'"; 
		$ob=new DB();
		$ob->connect();
		$result1=$ob->selectExecute($sql);	
		while($row=mysqli_fetch_assoc($result1))
		{
			$tablepass=$row['upwd'];
		} 
		if ((!empty($id) && !empty($pass)) && $pass==$tablepass)
		{	
			$_SESSION["id"] = $id;
			header("location: ../html/index.php");
		}
		else
		{
			header("location: ../html/indexlogin.php?err='Invalid Email & Password.'");
		}
	}
?>