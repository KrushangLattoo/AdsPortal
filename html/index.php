<?php
	session_start();
?>
<html>
	<head>
		<title>thebigads</title>
		<link href="../css/thebigads.css" rel="stylesheet" type="text/css">
	<head>
	<body>
		<div id="maindiv">				
				<div id="upleft">
					<a href="../html/index.php"><img src="../image/top_left_art.jpg" width="175px" height="160px"></td></a>
				</div>
				<div id="upcenter">
					
					<?php
					if ($_SESSION["id"] == "")
					{ ?>
						<a href="../html/indexregister.php">Sign Up..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a href="../html/indexlogin.php">Log In..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					<?php
						}
						else
						{ 
					?>
						<a href="subsindex.php"> subscription..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<a href="../controller/indexlogout.php"> Logout..!</a>&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp
					<?php 
						}	
					?>
					<form action="../html/afterindex.php" method="POST">
					<br><br><div id="com"><b>Community Classifieds for New England!</b></div><br>
						animals, cars, motorcycles, boats, building materials and more...<br><br>
						<I>Search &nbsp &nbsp &nbsp</I><input type="text" name="search">&nbsp <I>in</I>&nbsp
						<select name="cat">
							<option value="all">-ALL-</option>
							<?php
								include ("../controller/select.php");
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
						<img src="../image/home_16.gif" height="140px">
						<img src="../image/57708b11b85a9a10af73703c2.jpg" height="130px" width="145px">
						<img src="../image/575f5f18f1b59e2a8c2bb4b9b.jpg" height="120px" width="145px">
						<img src="../image/575f60ad6b8643008198189f9.jpg" height="120px" width="145px">
						<img src="../image/575f60656bc60a7a0692ea637.jpg" height="120px" width="145px">
						<img src="../image/57708b6e7ad894d9a4d434ad9.jpg" height="120px" width="145px">
						<img src="../image/home_21.jpg" height="140px">
					</div>	
			</div>
			<?php
				$side = 2;
				$ob=new DB();
				$ob->connect();

				while ($row = $result2->fetch_assoc()) 
				{
					$id=$row['catid'];
					$sql="SELECT * FROM TheBigAds.subcat WHERE catid='".$id."'";
					$subresult=$ob->selectExecute($sql);
					if($side%2==0)
					{
			?>
			
				<div id="left">
						
						<div id="bg"><?php echo $row['catname'];?></div>
						<?php while ($row1 = $subresult->fetch_assoc()) 
						{ ?> 
							<li><?php echo $row1['subcatname'];?></li>
						<?php } ?>
						<br><br>
						
					<?php 
							$side=3;
						}
						else if($side % 3 == 0)
						{
					?>									
				</div>
				<div id=center>
						<div id="bg"><?php echo $row['catname'];?></div>
						<?php while ($row = $subresult->fetch_assoc()) 
						{ ?> 
							<li><?php echo $row['subcatname'];?></li>
						<?php } ?>
						<br><br>
				</div>
				<?php
						$side=1 ; 
					} 
					else
					{
				?>
				<div id=right>
						<div id="bg"><?php echo $row['catname'];?></div>
						<?php while ($row = $subresult->fetch_assoc()) 
						{ ?> 
							<li><?php echo $row['subcatname'];?></li>
						<?php } ?>
						<br><br>
						
				</div>
				<?php $side++ ;}  } ?>

			
			<footer id="footer">		
				<img src="../image/whats_new.jpg" width="819.5px">
			</footer>
		
	</body>	
</html>