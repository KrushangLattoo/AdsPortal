<?php
 	include "../html/indexheader.php"
?>
<div id="rform">
	<h1>Subscription Succesfull</h1>
</div>
<?php
	$amount='$'.$_REQUEST['amt'];
	$sql="SELECT * FROM subscription WHERE pcost='".$amount."'";
	//echo $sql; 
	$ob=new DB();
	$ob->connect();
	$result=$ob->selectExecute($sql);
	while($row=mysqli_fetch_assoc($result))
	{
		$id=$row['subsid'];
		$days=$row['pdays'];
		$ads=$row['pads'];
	} 
	$date=date("r", mktime(12, 0, 0, date("m"), date("d")+$days, date("Y")));
	//echo "<br>".$id."<br>".$days."<br>".$ads."<br>".$_SESSION["id"];
	$sql1="UPDATE users set subsid='".$id."', subsdays='".$date."', subsads='".$ads."' WHERE uemail='".$_SESSION["id"]."'";
	echo "<br>".$sql;
	echo $sql; 
	$ob=new DB();
	$ob->connect();
	$ob->selectExecute($sql1);
	include "../html/indexfooter.php";
?>
