<?php	
	session_start();
	include '../classes/db.php';
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{	
		$ob = new DB();
		$ob->connect();
		$sql="SELECT subsdays, subsads FROM users WHERE uemail='".$_SESSION["id"]."'";
		echo $sql;
		$result=$ob->selectExecute($sql);
		while ($row=$result->fetch_assoc()) {
			$subsdays = $row['subsdays'];
			$subsads = $row['subsads'];
		}
		$date=date('d-m-Y');
		if ($subsdays>=$date && $subsads >= 0) 
		{
			$subsads--;
			$update="UPDATE users SET subsads='".$subsads."' WHERE uemail='".$_SESSION['id']."'";
	        $executed=$ob->selectExecute($update);
			$cat=$_POST['cat'];
			$subcat=$_POST['subcat'];
			$dis=$_POST['dis'];
			$cost=$_POST['cost'];
			$contact=$_POST['contact'];		
			$file_tmp =$_FILES['adicon']['tmp_name'];
			$file_name = $_FILES['adicon']['name'];
			$head=$_POST['head'];
			$icname=$cat.$subcat;
			$sql="INSERT INTO TheBigAds.adsman (adsuser, adhead, addis, adcost, adcon, catdid, subcatid, adsstatus) VALUES ('".$_SESSION["id"]."', '".$head."', '".$dis."', '".$cost."', '".$contact."','".$cat."','".$subcat."','0')";
			/*echo $sql;
				die();*/
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
	        $executed=$ob->selectExecute($update);

	        header('Location: ../html/usershwoads.php');
	    }
	    else
	    {
	    	header('Location:../html/subsindex.php');
	    }
	}
?>