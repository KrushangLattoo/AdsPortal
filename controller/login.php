<?php
	include '../classes/login1.php';	
	$nameErr = $passErr= "";
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{	
	
		if(empty($_POST['username']))
		{
			$nameErr="User name is required.";
			
		}
		else	
		{
			if(!preg_match("/^[a-zA-Z]*$/",$_POST['username']))
			{		
				$nameErr="User name is invalid.";
				
			}	
		}
		if(empty($_POST['pass']))
		{
			$passErr="Password is required.";
			header("Location: ../html/login.php?nameErr="."$nameErr & passErr="."$passErr");
			
		}
		else	
		{	
			$ob = new auth();
			$ob->authenticate($_POST['username'], $_POST['pass']);	
			
		}
	}
?>

