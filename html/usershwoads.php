<?php
 	include "../html/indexheader.php";
	$sql="SELECT * FROM adsman WHERE adsuser='".$_SESSION['id']."'";
	$ob=new DB();
	$ob->connect();
	$result1=$ob->selectExecute($sql);
		 while($row=mysqli_fetch_assoc($result1))
		{
?>
		<div id="rform">
			<div id="insidesads">
				<br>
				<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTitle: <?php echo $row['adhead'];?></b><br><br><br><br>
				<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDiscription: <?php echo $row['addis'];?></b><br><br>
				<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCost: <?php echo $row['adcost'];?></b><br><br>
				<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContact: <?php echo $row['adcon'];?></b><br><br>
				<?php 
					if ($row['adsstatus']=='0') {
				?>
				<form action="../controller/post.php" method="POST">
					&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Publish">
					 <input type="text" name="head" value="<?php echo $row['adhead'];?>" hidden>
				</form>
				<form action="../html/editindexads.php" method="POST">
					&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Edit">
					<input type="text" name="head" value="<?php echo $row['adhead'];?>" hidden>
				</form>
				<?php 
					} 
					if($row['adsed']==1)
					{
				?>
						<form action="../controller/disable.php" method="POST">
							&nbsp&nbsp&nbsp&nbsp&nbsp<input type="submit" value="Disable">
							<input type="text" name="head" value="<?php echo $row['adhead'];?>" hidden>
						</form>
				<?php	
					}
				?>
			</div>		
			<div id = "showads">
				<p><img src="<?php echo $row['adic'];?>" alt="Image not stored." height="155px" width="155px"></p>
			</div>
		</div>
<?php
			}
	include "../html/indexfooter.php";
?>