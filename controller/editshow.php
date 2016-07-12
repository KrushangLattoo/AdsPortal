<?php
	session_start();
	
	$sql="SELECT * FROM adsman WHERE (adsuser='".$_SESSION['id']."' AND adsstatus='1')";
	$ob=new DB();
	$ob->connect();
	$result=$ob->selectExecute($sql);
	print_r($result);
		
?>