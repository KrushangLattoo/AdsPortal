<?php
 	include "../html/indexheader.php"
?>
				
				<div id="left">
						<?php 
							if($_SERVER['REQUEST_METHOD']=="POST")
							{
								$drop=$_POST['cat'];
								$search=$_POST['search'];
							}
							else
							{
								$drop=$_GET['cat'];
								$search=$_GET['search'];
							}
							if ($drop!="all") 
							{
								$sql="SELECT adid, adhead, adic, addis, adcost, adcon FROM Category, adsman WHERE (Category.catid='$drop' AND '$drop'=adsman.catdid AND adsman.adsstatus='1'  AND adsman.adsed='1') AND ( adsman.adhead LIKE '%$search%' OR adsman.addis LIKE '%$search%')";
							} 
							else
							{
								$sql="SELECT adid, adhead, adic, addis, adcost, adcon FROM adsman WHERE (adsman.adsstatus='1'  AND adsman.adsed='1') AND (adsman.adhead LIKE '%$search%' OR adsman.addis LIKE '%$search%')";
							}
							$ob=new DB();
							$ob->connect();
							$result1=$ob->selectExecute($sql);	
							 while($row=mysqli_fetch_assoc($result1))
							{ 
						?>
						<div class="show">
							<div id="insidesads">
								<br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="detailads.php?id=<?php echo$row['adid']; ?>">Title: <?php echo $row['adhead'];?></a></b><br><br><br><br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCost: <?php echo $row['adcost'];?></b>
								
							</div>		
							<div id = "showads">
								<a href="detailads.php?id=<?php echo$row['adid']; ?>"><p><img src="<?php echo $row['adic'];?>" alt="Image not stored." height="100px" width="100px"></p></a>
							</div>
						</div>
						<?php
							}	
						?>								
				</div>
<?php
	include "../html/indexfooter.php";
?>
