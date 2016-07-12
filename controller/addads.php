<?php	
	session_start();
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$cat=$_POST['cat'];
		$subcat=$_POST['subcat'];
		$dis=$_POST['dis'];
		$cost=$_POST['cost'];
		$contact=$_POST['contact'];		
		$file_tmp =$_FILES['adicon']['tmp_name'];
		$file_name = $_FILES['adicon']['name'];
		$head=$_POST['head'];
		$icname=$cat.$subcat;
		$sql="INSERT INTO TheBigAds.adsman (adsuser, adhead, addis, adcost, adcon, catdid, subcatid, adsstatus, adsed) VALUES ('".$_SESSION["id"]."', '".$head."', '".$dis."', '".$cost."', '".$contact."','".$cat."','".$subcat."','1', '1')";
		/*echo $sql;
		die();*/
		$ob = new DB();
		$ob->connect();
		$result=$ob->selectExecute($sql);
			
		$sql="SELECT adid FROM TheBigAds.adsman WHERE adhead='".$head."'";
		$result=$ob->selectExecute($sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$int=$row['adid'];
		}

		$new_image_name = $int.".jpg";
        $update="UPDATE TheBigAds.adsman SET adic='../image/$new_image_name' WHERE adid='$int'";
        move_uploaded_file($file_tmp,"../image/".$new_image_name);
        $executed=$ob->execute($update);

	}
	if($_SERVER['REQUEST_METHOD']=='GET')
	{
		$id=$_GET['id'];	
		$sql="DELETE FROM TheBigAds.adsman WHERE adid='".$id."'";
		$ob = new DB();
		$ob->connect();
		$ob->execute($sql);
	}
?>