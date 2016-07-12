<?php
 	include "../html/indexheader.php"
?>
			<form id="rform" method="POST" action="../controller/register.php" onsubmit="return check();">
					<table align="center">
						<tr>
							<td>
								Your name:
							</td>
							<td>
								<input type="text" name ="yname">
							</td>
						</tr>
						<tr >
							<td >
								Your Email:
							</td>
							<td>
								<input id="email" type="email" name="email">
							</td>
						</tr>
						<tr >
							<td>
								Repeat Email:
							</td >
							<td>
								<input id="cemail" type="email" name="cemail">
							</td>
						</tr>
						<tr>
							<td>
								Password:
							</td>
							<td>
								<input id="pass" type="password" name="password">
							</td>
						</tr>
						<tr>
							<td >
								Repeat Password:
							</td>
							<td>
								<input id="cpass" type="password" name="rpassword">
							</td>
						</tr>
						</tr>
						<tr>
							<td colspan="2" style="text-align:center;">
								<input type="submit" name="submit" value="Sign Up...!!">
							</td>
						</tr>
					</table>
			</form>
			
<?php
	include "../html/indexfooter.php";
?>