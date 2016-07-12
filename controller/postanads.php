<?php
	session_start();
	include "../classes/db.php";
	$sql="SELECT subsdays, subsads FROM users WHERE uemail='".$_SESSION["id"]."'";
	$ob = new DB();
	$ob->connect();
	$result=$ob->selectExecute($sql);
	
	while ($row=mysqli_fetch_assoc($result)) {
		$subsdays = $row['subsdays'];
		$subsads = $row['subsads'];
	}
	$date=$date=date("r", mktime(12, 0, 0, date("m"), date("d"), date("Y")));;
	echo $date;
	echo $subsdays;
	if ($_SESSION["id"] == "")
	{
		header("location: ../html/indexlogin.php");
	}
	elseif ($subsdays <= $date && $subsads == 0) {
		header("location: ../html/subsindex.php?");
	}
	else
	{
		header("location: ../html/indexaddads.php");
	}
?>