<html>
	<head>
		<title>LogIn Page</title>
		<link href="../css/login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>Login Form<h1>
		<br><br><br><br><br><br>
		<form action="../controller/login.php" method="POST">
			<table class="tb1" align="center">
				<tr>
					<td><img src="../image/default-user.png" height="20px" weidth="20px"></td>
					<td><input type="text" name="username"></td>
					<td><span id="error">*<?php echo $_GET['nameErr'];?></span></td>
				</tr>
				<tr>
					<td><img src="../image/pass.png" height="20px" weidth="20px"></td>
					<td><input type="password" name="pass"></td>
					<td><span id="error">*<?php echo $_GET['passErr'];?></span></td>
				</tr>
				<tr>	
					<td colspan="2"><span id="error"><?php echo $_GET['unpa'];?></span></td>
				</tr>
				<tr>
					<td colspan="2" id="sub"><input type="submit" name="submit" value="Log In"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
