
<header id="header">
	<h1>Dashboard<h1>
</header>
<div id=afterheader>	
     <h3><img src="../image/240_F_89009948_q5MgVdZY1kOQM8mBCRbiScUv0IiLGEFx.jpg" height="20px" width="20px"/>&nbsp Control Pannel</h3>
</div>
<?php
	session_start();
	if($_SESSION["id"] =="")
		header('Location:../html/login.php');
?>	
