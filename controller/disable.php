<?php
		session_start();
		include "../classes/db.php";
		if($_SERVER['REQUEST_METHOD']=="POST")
		{

			$head=$_POST['head'];
		}
		$sql="UPDATE adsman SET adsed='0' WHERE adsuser='".$_SESSION['id']."' AND adhead='".$_POST['head']."'";
		$ob = new DB();
		$ob->connect();
		$result=$ob->selectExecute($sql);
?>
<script type="text/javascript">
	 window.location="../html/usershwoads.php";
</script>