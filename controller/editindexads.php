<?php
	session_start();
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$id=$_POST['id'];
		$cat=$_POST['cat'];
		$subcat=$_POST['subcat'];
		$dis=$_POST['dis'];
		$cost=$_POST['cost'];
		$contact=$_POST['contact'];		
		$file_tmp =$_FILES['adicon']['tmp_name'];
		$file_name = $_FILES['adicon']['name'];
		$head=$_POST['head'];
		$icname=$cat.$subcat;
		$sql="UPDATE adsman SET adhead='".$head."', addis='".$dis."', adcost='".$cost."', adcon='".$contact."', catdid='".$cat."', subcatid='".$subcat."' WHERE adid='".$id."'" ;
	//	echo $sql;
        //die();
		$ob = new DB();
		$ob->connect();
		$result=$ob->selectExecute($sql);

		$new_image_name = $id.".jpg";
        $update="UPDATE adsman SET adic='../image/$new_image_name' WHERE adid='".$id."'";
        move_uploaded_file($file_tmp,"../image/".$new_image_name);
        $executed=$ob->selectExecute($update);
        header('Location: ../html/usershwoads.php');

	}
	
?>
?>