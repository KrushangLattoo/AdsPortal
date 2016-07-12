 <?php
    $paypal_url="https://www.sandbox.paypal.com/cgi-bin/webscr"; // Test Paypal API URL
    $paypal_id="krushangseller@gmail.com"; // Business email ID
    include "../html/indexheader.php";
    /*if ($_SERVER['REQUEST_METHOD']=="GET") {
    	echo $_GET["err"];
    	die();
    }*/
?>
				
				<div id="left">
					<?php 
						if($_SERVER['REQUEST_METHOD']=="POST")
						{
							$drop=$_POST['cat'];
							$search=$_POST['search'];
						}
						$sql="SELECT * FROM subscription WHERE pstatus = 1";
						$ob=new DB();
						$ob->connect();
						$result1=$ob->selectExecute($sql);	
						 while($row=mysqli_fetch_assoc($result1))
						{ 
					?>
					<div class="show">
						<div id="insidesads">
							<br>
							<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name: <?php echo $row['packname'];?></b><br><br><br><br>
							<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDays: <?php echo $row['pdays'];?></b><br><br>
							<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAds: <?php echo $row['pads'];?></b><br><br>
							<b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCost: <?php echo $row['pcost'];?></b><br><br>
						</div>		
						<div id = "showads">
							<p>
								</b><br><br>
								<div class="product">
								<div class="btn">
        						<form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
					                <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
					                <input type="hidden" name="cmd" value="_xclick">
					                <input type="hidden" name="item_name" value="<?php echo $row['packname'];?>">
					                <input type="hidden" name="item_number" value="1">
					                <input type="hidden" name="credits" value="510">
					                <input type="hidden" name="userid" value="1">
					                <input type="hidden" name="amount" value="<?php echo $row['pcost'];?>">
					                <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
					                <input type="hidden" name="no_shipping" value="1">
					                <input type="hidden" name="currency_code" value="USD">
					                <input type="hidden" name="handling" value="0">
					                <input type="hidden" name="cancel_return" value="http://demo.phpgang.com/payment_with_paypal/cancel.php">
					                <input type="hidden" name="return" value="http://localhost/Admin/html/subssuccesfull.php">
					                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
					                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					            </form> 
					            </div>
					        	</div>
							</p>
						</div>
					</div>
					<?php
						}	
					?>								
				</div>
			</div>
			<footer id="footer">		
				<img src="../image/whats_new.jpg" width="810px">
			</footer>
	</body>
</html>
