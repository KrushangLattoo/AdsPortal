<?php
	inclued "../classes/db.php";
	$result;
	if($_SERVER['REQUEST_METHOD']="POST")
	{
		$search=$_POST['submit'];
		$ob=new DB();
		$ob->connect();
		$sql="SELECT * FROM TheBigAds.Category WHERE catnamr='".$search."'";
		$result=$ob->selectexecute($sql);
		header("Location:../html/categoryman.php?result='".$result."'");
	}
?>