<?php
	session_start();
	if ($_SESSION["id"] == "")
	{
		header("location: ../html/indexlogin.php");
	}
	else
	{
		header("location: ../html/usershwoads.php");
	}
?>