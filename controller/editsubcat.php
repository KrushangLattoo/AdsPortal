<?php
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);*/	
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{		
		$catid=$_POST['subcatid'];
		$catname=$_POST['subcatname'];
		$catslug=$_POST['subcatslug'];
		$catkey=$_POST['subcatkey'];		
		$sql="UPDATE subcat set subcatname='".$catname."', subcatslug='".$catslug."', subcatkey='".$catkey."' WHERE subcatid='".$catid."'";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);

	}
?>
