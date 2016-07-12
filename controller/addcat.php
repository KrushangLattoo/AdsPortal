<?php
		
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$catname=$_POST['catname'];
		$catslug=$_POST['catslug'];
		$catkey=$_POST['catkey'];
		
		
		
		
		$sql="INSERT INTO TheBigAds.Category (catname, catslug, catkey) VALUES ('".$catname."', '".$catslug."', '".$catkey."')";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		$id=$_GET['id'];
		$sql="DELETE FROM TheBigAds.Category WHERE catid='".$id."'";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
?>
