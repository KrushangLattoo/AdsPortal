
<html>
	<head>
		<title>Category Management</title>
		<link href="../css/dash.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/Catshow.js"></script>
		<?php
			/*ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);*/
			
		?>
	</head>
	<body>
		<?php
			include "header.php";
			include "sidebar.php";
			include "../classes/dp.php";
			$username = "root";
		 	$password = "root";
	 	 	$hostname = "localhost";
	  	 	$con = mysql_connect($hostname, $username, $password);
	        $selected = mysql_select_db("TheBigAds",$con);
			$id=$_GET['id'];
			$query = "SELECT catname FROM Category WHERE catid='".$id."'";
			$result = mysql_query ($query);
			while ($row = mysql_fetch_assoc($result))
			{
				$catname=$row['catname'];
			}
		?>
		<div id="category" >
			<h1 id="bg">Sub Categories of <?php echo $catname;?></h1>
			<br>
			<div id="catoption">
				&nbsp &nbsp &nbsp<a href="#" onclick="subviewshow()">View SubCategory</a>
				&nbsp &nbsp &nbsp<a href="#" onclick="subaddshow()">Add SubCategory</a>
			</div>
			<br><br><br><br>
			<div id="subform" style="display:none">
				<form action="../controller/addsub.php" method="post">	
					<table align="center" id="tbcat">
						<tr>
							<td ><input type="text" name="catid" value='<?php echo $id; ?>' hidden></td>
						</tr>
						<tr>
							<td>SubCategory Name:</td>
							<td><input type="text" name="subcatname"></td>
						</tr>
						<tr>
							<td>SubCategory Slug:</td>
							<td><input type="text" name="subcatslug"></td>
						</tr>
						<tr>
							<td>SubCategory Keywords:</td>
							<td><input type="text" name="subcatkey"></td>
						</tr>

						<tr style="text-align:center">
							<td colspan="2"><input type="submit" value="Add SubCategory">
						</tr>
					</table>
				</form>
			</div>	
			<br>
			
			<br>
			<div id="subviewtable" style="display:none">	
				<table id="vct" align="center" >
					<tr>
						<td>ID:</td>
						<td>&nbsp</td>
						<td>Name:</td>
						<td>&nbsp</td>
						<td>Slug:</td>
						<td>&nbsp</td>
						<td>Keys:</td>
						<td colspan="4" align="center">Operations:</td>
					</tr>
					<tr>
							<?php
								/*ini_set('display_errors', 1);
								ini_set('display_startup_errors', 1);
								error_reporting(E_ALL);*/
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
								$per_page = 5;
								$start = ($page-1) * $per_page;
								$query = "SELECT * FROM subcat WHERE catid='".$id."'";
								$result = mysql_query($query);
								$total_records = mysql_num_rows($result);
								$total_pages = ceil($total_records / $per_page);
								$query = "SELECT * FROM subcat WHERE catid='".$id."' LIMIT $start, $per_page";
								$result = mysql_query ($query);
								while ($row = mysql_fetch_assoc($result))
								{ 
									echo "<tr>";
									echo "<td>".$row["subcatid"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["subcatname"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["subcatslug"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["subcatkey"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td><a href='../html/editsubcat.php?id=".$row['subcatid']."'>EDIT</a></td>";
								   	echo "<td><a href='../controller/addsub.php?id=".$row['subcatid']."'>Delete</a></td>";
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
						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						 	<a href="categoryman.php?page=<?php echo $last; ?>"/>Previous page &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
				<?php }if($page<$total_pages){?>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<td colspan="2"><a href="categoryman.php?page=<?php echo $next;?>"/>Next page</td>
						
				<?php } ?>						
			</div>
		</div>
	</body>
</html>
