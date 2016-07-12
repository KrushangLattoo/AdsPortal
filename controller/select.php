<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include "../classes/db.php";
	$result="";
	$ob=new DB();
	$ob->connect();
	$sql="SELECT * FROM TheBigAds.Category";
	$result=$ob->selectExecute($sql);
	$result2=$ob->selectExecute($sql);			
?>