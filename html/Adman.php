<html>
	<head>
		<title>Ads Management</title>
		<link href="../css/dash.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/Catshow.js"></script>
	</head>
	<body>
		<?php
			include "header.php";
			include "sidebar.php";
			include "../classes.php";
		?>
		<div id="category" >
			<h1 id="bg">Ads Management</h1>
			<br>
			<div id="catoption">
				&nbsp &nbsp &nbsp<a href="#" onclick="viewadshow()">View Ads</a>
				&nbsp &nbsp &nbsp<a href="#" onclick="addshow()">Add Ads</a>
			</div>
			<br><br><br><br>
			<div id="formad" style="display:none">
				<form action="../controller/addads.php" method="post"  enctype="multipart/form-data">	
					<table align="center" id="tbcat">
						<tr>
							<td>Ad Head:</td>
							<td><input type="Text" name="head"></td>
						</tr>
						<tr>
							<td>Add Category:</td>
							<td><select name="cat" >
								<option >All-</option>
								<?php
									include ("../controller/select.php");
									while ($row = $result->fetch_assoc()) 
									{
										echo "<option value=" .$row['catid'].">".$row['catname']."</option>";
									}
								?></select>
							</td>
						</tr>
						<tr>
							<td>Add Sub Category:</td>
							<td><select name="subcat" >
								<option >-All-</option>
								<?php
									$sql="SELECT * FROM TheBigAds.subcat";
									$result=$ob->selectExecute($sql);
									while ($row1 = $result->fetch_assoc()) 
									{
										echo "<option value=" .$row1['subcatid'].">".$row1['subcatname']."</option>";
									}
									$catid="<script>document.write(selectedValue)</script>";
								?></select>
							</td>
						</tr>
						<tr>
							<td>Discription:</td>
							<td><input type="textarea" name="dis"></td>
						</tr>
						<tr>
							<td>Cost:</td>
							<td><input type="text" name="cost"></td>
						</tr>
						<tr>
							<td>Contact:</td>
							<td><input type="text" name="contact"></td>
						</tr>
						<tr>
							<td>Ad Icon:</td>
							<td><input type="file" name="adicon"></td>
						</tr>
						<tr style="text-align:center">
							<td colspan="2"><input type="submit" value="Add Ads">
						</tr>
					</table>
				</form>
			</div>	
			<br>
			
			<br>
			<div id="viewtablead" >	
				<form>
					<table align="center">
						<tr>
							<td>Category Name:</td>
							<td><input type="text" name="search"></td>
							<td><input type="submit" name="submit" value="Search"></td>
						</tr>
					</table>
				</form>
				<table id="vct" align="center" >
					<tr>
						<td>Ads ID:</td>
						<td>&nbsp</td>
						<td>Ads Discription:</td>
						<td>&nbsp</td>
						<td>Cost:</td>
						<td>&nbsp</td>
						<td>Contact:</td>
						<td>&nbsp</td>
						<td colspan="3" align="center">Operations:</td>
					</tr>
					<tr>
							<?php
								$ob = new DB();
								$ob->connect();
								/*$username = "root";
		 						$password = "root";
	 	 						$hostname = "localhost";
	  	 						$con = mysql_connect($hostname, $username, $password);
	        					$selected = mysql_select_db("TheBigAds",$con);*/
								if (isset($_GET["page"])) 
								{
									$page = $_GET["page"];
								}
								else 
								{
									$page=1;
								}
								$per_page = 5;
								$start = ($page-1) * $per_page;
								$query = "select * from adsman";
								$result = $ob->selectExecute($query);
								$total_records = mysqli_num_rows($result);
								$total_pages = ceil($total_records / $per_page);
								$query = "SELECT * FROM adsman LIMIT $start, $per_page";
								$result =$ob->selectExecute($query);
								while ($row = $result->fetch_assoc())
								{ 
									echo "<tr>";
									echo "<td>".$row["adid"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["addis"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["adcost"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["adcon"]."</td>";
									echo "<td>&nbsp</td>";
								  echo "<td><a href='../controller/addads.php?id=".$row['adid']."'>Delete</a></td>";				
								}
								$last=$page-1;
								$next=$page+1;
							?>
						</td>
					</tr>
				</table>
				<?php
					if($page!=1){?>
						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						 	<a href="Adman.php?page=<?php echo $last; ?>">Previous page</a>
				<?php }if($page<$total_pages){?>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<td colspan="2"><a href="Adman.php?page=<?php echo $next;?>"/>Next page</td>
						
				<?php } ?>					
			</div>
		</div>
	</body>
</html>
