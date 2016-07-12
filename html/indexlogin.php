<?php 
	include "../html/indexheader.php";
?>
<form id="rform" method="POST" action="../controller/indexlogin.php" onsubmit="return check();">
	<table align="center">
		<tr >
			<td >
				Enter Email:
			</td>
			<td>
				<input id="email" type="email" name="email">
			</td>
		</tr>
		<tr>
			<td>
				Enter Password:
			</td>
			<td>
				<input id="pass" type="password" name="password">
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
				<input type="submit" name="submit" value="Log In">
			</td>
		</tr>
	</table>
</form>
<?php 
	include "../html/indexfooter.php";
?>