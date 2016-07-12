<?php
		
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$pname=$_POST['pname'];
		$pdays=$_POST['pdays'];
		$pads=$_POST['pads'];
		$pcost=$_POST['pcost'];
		$status=$_POST['status'];
		
		
		$sql="INSERT INTO subscription (packname, pdays, pads, pcost, pstatus) VALUES ('".$pname."', '".$pdays."', '".$pads."','".$pcost."','".$status."')";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		$id=$_GET['id'];
		$sql="DELETE FROM subscription WHERE subsid=$id";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
?>