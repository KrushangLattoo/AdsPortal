<?php
 	include "../html/indexheader.php";
?>

<form id="rform" method="POST" action="../controller/indexads.php" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td>
				Select Category:
			</td>
			<td><select name="cat" >
				<option >All-</option>
				<?php
					$ob=new DB();
					$ob->connect();
					$sql="SELECT * FROM Category";
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
				<option >-All-</option>
				<?php
					$sql="SELECT * FROM subcat";
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
				<input type="text" name ="head">
			</td>
		</tr>
		<tr>
			<td>
				Product Discription:
			</td>
			<td>
				<input type="text" name="dis">
			</td>
		</tr>
		<tr >
			<td>
				Product Cost:
			</td >
			<td>
				<input type="number" name="cost">
			</td>
		</tr>
		<tr>
			<td>
				Your Contact:
			</td>
			<td>
				<input type="number" name="contact">
			</td>
		</tr>
		<tr>
			<td>
				Product Image:
			</td>
			<td>
				<input type="file" name="adicon">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
				<input type="submit" name="submit" value="Add Ads..!">
			</td>
		</tr>
	</table>
</form>
<?php
	include "../html/indexfooter.php";
?>