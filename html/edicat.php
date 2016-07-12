<?php
	/*ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);*/
	$catman = $catslug = $catkey = $caticon = $sql= "";
	if($_SERVER['REQUEST_METHOD']=="GET")
	{		
		$catid=$_GET['id'];
		$query="SELECT * FROM Category WHERE catid='".$catid."'";
		$username = "root";
		$password = "root";
	 	$hostname = "localhost";
	  	$con = mysql_connect($hostname, $username, $password);
	    $selected = mysql_select_db("TheBigAds",$con);
	    $result = mysql_query ($query);
		while ($row = mysql_fetch_assoc($result))
		{
			$catname=$row["catname"];
			$catslug=$row["catslug"];
			$catkey=$row["catkey"];
		}
	}
?>
<html>
	<head>
		<title>Category Management</title>
		<link href="../css/dash.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/Catshow.js"></script>
	</head>
	<body>
		<?php
			include "header.php";
			include "sidebar.php";
		?>
		<div id="category" >
			<h1 id="bg">Categories</h1>
			<br>
			<div id="catoption">
				&nbsp &nbsp &nbsp<a href="#" onclick="viewshow()">View Category</a>
				&nbsp &nbsp &nbsp<a href="#" onclick="addshow()">Add Category</a>
			</div>
			<br><br><br><br>
			<div id="form" >
				<form action="../controller/editcat.php" method="POST">	
					<table align="center" id="tbcat">
						<tr>
							<td ><input type="text" name="id" value='<?php echo $catid;?>' hidden></td>
						</tr>

						<tr>
							<td>Category Name:</td>
							<td><input type="text" name="catname" value="<?php echo $catname; ?>"></td>
						</tr>
						<tr>
							<td>Category Slug:</td>
							<td><input type="text" name="catslug" value="<?php echo $catslug; ?>"></td>
						</tr>
						<tr>
							<td>Category Keywords:</td>
							<td><input type="text" name="catkey" value="<?php echo $catkey; ?>"></td>
						</tr>
						<tr style="text-align:center">
							<td colspan="2"><input type="submit" value="Edit Category"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div id="viewtable" >	
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
						<td>ID:</td>
						<td>&nbsp</td>
						<td>Name:</td>
						<td>&nbsp</td>
						<td>Slug:</td>
						<td>&nbsp</td>
						<td>Keys:</td>
						<td>&nbsp</td>
						<td>Icon:</td>
						
						<td colspan="3" align="center">Operations:</td>
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
								$query = "select * from Category";
								$result = mysql_query($query);
								$total_records = mysql_num_rows($result);
								$total_pages = ceil($total_records / $per_page);
								$query = "SELECT * FROM Category LIMIT $start, $per_page";
								$result = mysql_query ($query);
								while ($row = mysql_fetch_assoc($result))
								{ 
									echo "<tr>";
									echo "<td>".$row["catid"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["catname"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["catslug"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["catkey"]."</td>";
									echo "<td>&nbsp</td>";
									echo "<td>".$row["caticon"]."</td>";
									echo "<td><a href='../html/edicat.php?id=".$row['catid']."'>EDIT</a></td>";
								   	echo "<td><a href='../controller/addcat.php?id=".$row['catid']."'>Delete</a></td>";
								   	echo "<td><a href='../html/subcat.php?id=".$row['catid']."'>Subcategore</td>";
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
						
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						 	<a href="categoryman.php?page=<?php echo $last; ?>">Previous page</a>
				<?php }if($page<$total_pages){?>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<td colspan="2"><a href="categoryman.php?page=<?php echo $next;?>"/>Next page</td>
						
				<?php } ?>					
			</div>
	</body>
</html>