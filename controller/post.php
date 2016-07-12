<?php
	session_start();
	include "../classes/db.php";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		$head=$_POST['head'];
	}
	$ob = new DB();
	$ob->connect();
	$sql="UPDATE adsman SET adsstatus='1', adsed='1' WHERE adsuser='".$_SESSION['id']."' AND adhead='".$head."'";
	$result=$ob->selectExecute($sql);
?>
<script type="text/javascript">
	 window.location="../html/afterindex.php";
</script>