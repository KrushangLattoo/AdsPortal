<html>
	<head>
		<title>Subscription Management</title>
		<link href="../css/dash.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/Catshow.js"></script>
	</head>
	<body>
		<?php
			include "header.php";
			include "sidebar.php";
		?>
		<div id="category" >
			<h1 id="bg">Subscription</h1>
			<br>
			<div id="catoption">
				&nbsp &nbsp &nbsp<a href="#" onclick="viewsubs()">View Subscription</a>
				&nbsp &nbsp &nbsp<a href="#" onclick="addsubs()">Add Subscription</a>
			</div>
			<br><br><br><br>
			<div id="subsform" style="display:none">
				<form action="../controller/addsubs.php" method="post">	
					<table align="center" id="tbcat">
						<tr>
							<td>Pack Name:</td>
							<td><input type="text" name="pname"></td>
						</tr>
						<tr>
							<td>Pack Days:</td>
							<td><input type="text" name="pdays"></td>
						</tr>
						<tr>
							<td>Pack Ads:</td>
							<td><input type="text" name="pads"></td>
						</tr>
						<tr>
							<td>Pack Cost:</td>
							<td><input type="text" name="pcost"></td>
						</tr>
						<tr>
							<td>Pack Status:</td>
							<td>
								<input type="radio" name="status" value="1">Enable
								<input type="radio" name="status" value="0">Disable
							</td>
						</tr>
						<tr style="text-align:center">
							<td colspan="2"><input type="submit" value="Add Packs">
						</tr>
					</table>
				</form>
			</div>	
			<br>
			
			<br>
			<div id="subviewtable" style="display:none;">	
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
						<td>Subscription Id:</td>
						<td>&nbsp</td>
						<td>Pack Name:</td>
						<td>&nbsp</td>
						<td>Pack Days:</td>
						<td>&nbsp</td>
						<td>Pack Ads:</td>
						<td>&nbsp</td>
						<td>Pack Cost:</td>
						<td>&nbsp</td>	
						<td colspan="2" align="center">Operations:</td>
					</tr>
					<tr>
							<?php
								
								$username = "root";
		 						$password = "root";
	 	 						$hostname = "localhost";
	  	 						$con = mysql_connect($hostname, $username, $password);
	        					$selected = mysql_select_db("TheBigAds",$con);
								if (isset($_GET["page"])) 
								{
									$page = $_GET["page"];
								}
								else 
								{
									$page=1;
								}
								$per_page = 2;
								$start = ($page-1) * $per_page;
								$query = "select * from subscription";
								$result = mysql_query($query);
								$total_records = mysql_num_rows($result);
								$total_pages = ceil($total_records / $per_page);
								$query = "SELECT * FROM subscription LIMIT $start, $per_page";
								$result = mysql_query ($query);
								while ($row = mysql_fetch_assoc($result))
								{ 
									echo "<tr>";
									echo "<td>".$row["subsid"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["packname"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["pdays"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["pads"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["pcost"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td><a href='../html/edicat.php?id=".$row['catid']."'>EDIT</a></td>";
								   	echo "<td><a href='../controller/addcat.php?id=".$row['catid']."'>Delete</a></td>";
									echo "</tr>";				
								}
								$last=$page-1;
								$next=$page+1;
							?>
						</td>
					</tr>
				</table>
				<?php
					if($page!=1){?>
						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						 	<a href="categoryman.php?page=<?php echo $last; ?>">Previous page</a>
				<?php }if($page<$total_pages){?>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<td colspan="2"><a href="categoryman.php?page=<?php echo $next;?>"/>Next page</td>
				<?php } ?>					
			</div>
		</div>
	</body>
</html>