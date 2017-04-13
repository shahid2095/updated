<?php
include("cart.php");


?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Shopping cart</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" />

</head>
<body>
	<header id="heading">
		<h1 style="font-family: verdana" >Online Shopping Portal</h1>
		
	</header>
	<div id="main_div">
			<h3>Shopping Products</h3>
				<div id="division">
					<section id="main_section">
						<?php   display_cart(); ?>
						
					</section>
					<aside id="side">
						<span class="your_cart"><h3>Your cart:</h3></span>&nbsp;&nbsp;
						<img src="images/2.png" height="50" width="45"/><br /><br />
						<?php      product(); ?>
						
					</aside>

				</div>
	</div>

</body>
</html>