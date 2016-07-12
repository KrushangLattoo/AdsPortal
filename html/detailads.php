<?php
	include "../html/indexheader.php";
?>
				<div id="left">
						<?php 
							
						
							$sql="SELECT * From adsman WHERE adid='".$_GET['id']."'";
							$ob=new DB();
							$ob->connect();
							$result1=$ob->selectExecute($sql);	
							 while($row=mysqli_fetch_assoc($result1))
							{ 
						?>
						<div class="show">
							<div id="insidesads">
								<br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTitle: <?php echo $row['adhead'];?></b><br><br><br><br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDiscription: <?php echo $row['addis'];?></b><br><br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCost: <?php echo $row['adcost'];?></b><br><br>
								<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContact: <?php echo $row['adcon'];?></b><br><br>
							</div>		
							<div id = "showads">
								<p><img src="<?php echo $row['adic'];?>" alt="Image not stored." height="200px" width="200px"></p>
							</div>
						</div>
						<?php
							}	
						?>								
				</div>
<?php
	include "../html/indexfooter.php";
?>