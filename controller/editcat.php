<?php
	include "../classes/db.php";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$catid=$_POST["id"];
		$catname=$_POST["catname"];
		$catslug=$_POST["catslug"];
		$catkey=$_POST["catkey"];
		$sql="UPDATE Category set catname='".$catname."', catslug='".$catslug."', catkey='".$catkey."' WHERE catid='".$catid."'";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
?>