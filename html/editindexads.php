<?php
 	include "../html/indexheader.php";
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$id = $_SESSION['id'];
		$head = $_POST['head'];
	}
	$ob = new DB();
	$ob->connect();
	$sql="SELECT * FROM adsman WHERE adsuser='".$id."' AND adhead='".$head."'";
	$result=$ob->selectExecute($sql);
	while ($row=$result->fetch_assoc()) 
	{
		$id=$row['adid'];
		$ic=$row['adic'];
		$dis=$row['addis'];
		$cost=$row['adcost'];
		$contact=$row['adcon'];
		$catdid=$row['catdid'];
		$subcatid=$row['subcatid'];
	}
	$sql="SELECT catname FROM Category WHERE catid='".$catdid."'";
	$result=$ob->selectExecute($sql);
	while ($row=$result->fetch_assoc()) 
	{
		$catname=$row['catname'];
	}
	$sql="SELECT subcatname FROM subcat WHERE subcatid='".$subcatid."'";
	$result=$ob->selectExecute($sql);
	while ($row=$result->fetch_assoc()) 
	{
		$subcatname=$row['subcatname'];
	}
?>

<form id="rform" method="POST" action="../controller/editindexads.php" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td>
				Select Category:
			</td>
				<input type="text" name="id" value="<?php echo $id; ?>" hidden>
			<td><select name="cat" >
				<option value=" <?php echo $catdid; ?>"><?php echo $catname; ?></option>
				<?php
					$ob=new DB();
					$ob->connect();
					$sql="SELECT * FROM Category WHERE catname != '".$catname."'";
					$result=$ob->selectExecute($sql);
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
				<option value=" <?php echo $subcatid; ?>"><?php echo $subcatname; ?></option>
				<?php
					$sql="SELECT * FROM subcat WHERE subcatname != '".$subcatname."'";
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
			<td>
				
			</td>
		</tr>
		<tr>
			<td>
				Product Name:
			</td>
			<td>
				<input type="text" name ="head" value="<?php echo $head; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Product Discription:
			</td>
			<td>
				<input type="text" name="dis" value="<?php echo $dis; ?>">
			</td>
		</tr>
		<tr >
			<td>
				Product Cost:
			</td >
			<td>
				<input type="number" name="cost" value="<?php echo $cost; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Your Contact:
			</td>
			<td>
				<input type="number" name="contact" value="<?php echo $contact; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Product Image:
			</td>
			<td>
				<input type="file" name="adicon" value="<?php echo $ic; ?>">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
				<input type="submit" name="submit" value="Edit Ads..!">
			</td>
		</tr>
	</table>
</form>
<?php
	include "../html/indexfooter.php";
?>