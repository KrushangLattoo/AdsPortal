<?php
	session_start();
	include "../classes/db.php";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name=$_POST['yname'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$ob=new DB();
		$ob->connect();
		$sql="INSERT INTO users (uname, uemail, upwd, subsdays,subsads) VALUES ('".$name."', '".$email."', '".$pass."', '0', '0')";
		$result=$ob->selectExecute($sql);
		if($result=="True")
		{
			$_SESSION["id"] = $name;
			header("location: ../html/index.php");
		}
	}
?>