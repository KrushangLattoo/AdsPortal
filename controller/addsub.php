<?php
		
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$catname=$_POST['subcatname'];
		$catslug=$_POST['subcatslug'];
		$catkey=$_POST['subcatkey'];
		$catid=$_POST['catid'];
		
		
		$sql="INSERT INTO TheBigAds.subcat (subcatname, subcatslug, subcatkey,catid) VALUES ('".$catname."', '".$catslug."', '".$catkey."','".$catid."')";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		$id=$_GET['id'];
		$sql="DELETE FROM subcat WHERE subcatid=$id";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
?>
