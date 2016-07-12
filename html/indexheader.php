<?php
	session_start();
?>
<html>
	<head>
		<title>thebigads</title>
		<link href="../css/thebigads.css" rel="stylesheet" type="text/css">
		<script type="text/javascript">
			function check()
			{
				var email=document.getElementById("email").value;
				var cemail=document.getElementById("cemail").value;
				var cpass=document.getElementById("cpass").value;
				var pass=document.getElementById("pass").value;
				if (pass!=cpass || pass=="" || cpass=="") 
				{
					alert("Invalid Password's");
					return false;
				}
				if (email!=cemail || email=="" || cemail=="") 
				{
					alert("Invalid Email's");
					return false;
				}
				return true;
			}
		</script>
	<head>
	<body>
		<div id="maindiv">				
			<div id="upleft">
				<a href="../html/index.php"><img src="../image/top_left_art.jpg" width="175px" height="160px"></td></a>
			</div>
			<div id="upcenter">
				<form action="../html/afterindex.php" method="post">
				<?php
					if ($_SESSION["id"] == "")
					{ ?>
						<a href="../html/indexregister.php">Sign Up..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a href="../html/indexlogin.php">Log In..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php
					}
					else
					{ ?>
						<a href="subsindex.php"> subscription..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a href="../controller/indexlogout.php"> Logout..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp
						
				<?php }	
				?>
				<div id="com"><b>Community Classifieds for New England!</b></div><br>
					animals, cars, motorcycles, boats, building materials and more...<br><br>
					<I>Search &nbsp &nbsp &nbsp</I><input type="text" name="search">&nbsp <I>in</I>&nbsp
					<select name="cat">
						<option value="all">-ALL-</option>
						<?php
							include ("../controller/select.php");
							include "../js/registration.js";
							while ($row = $result->fetch_assoc()) 
							{
								echo "<option value=".$row['catid'].">".$row['catname']."</option>";
							}
						?>
					</select>
					&nbsp &nbsp
					<button><img src="../image/home_13.jpg"></button><br>
					&nbsp
				</form>
			</div>
			<div id="upright">
				<a href="../controller/postanads.php"><img src="../image/main_btns_01.jpg" height="33px" width="100px"></a>
				<br>
				<a href="../controller/usershowads.php"><img src="../image/main_btns_02.jpg" height="32px" width="100px"></a>
				<br>
				<img src="../image/main_btns_03.gif" height="33px" width="100px">
				<br>
				<img src="../image/first_time.gif" height="62px" width="100px">	
			</div id="sidepics">
		