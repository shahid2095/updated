<?php
	include("connection.php");
	session_start();

	function display_cart(){
	
		global $con;
		$q=mysqli_query($con, "SELECT `id`, `image`,`name`,`desc`,`price` FROM cart WHERE `quantity` > 0");
		$num =mysqli_num_rows($q);
		while ($fetch = mysqli_fetch_assoc($q)) 
		{
			echo '<img src="images/' .$fetch['image'].'" width="120" height="120" /><br /><span id="name">'.$fetch['name'].'</span><br />'.$fetch['desc'].'<br /> $ '.$fetch['price'].'<br />'
			.'<a href="cart.php?add='.$fetch['id'].'">Add To Cart</a><br /><br />';
		}
	}
	if(isset($_GET['add']) && !empty($_GET['add']))
	{
		$id = $_GET['add'];
		
		$q = mysqli_query($con,"SELECT `id`, `quantity` FROM cart WHERE `id`= '".$id."'");
			while($quantity = mysqli_fetch_assoc($q)){
			if($quantity['quantity'] != @$_SESSION['cart_'.$id])
				{
					echo @$_SESSION['cart_'.$id]+=1;
				}
				header('location:index.php');
			}
			
		
	}
	



	if(isset($_GET['remove'])){
		$_SESSION['cart_'.$_GET['remove']]--;
		header('location:index.php');
	}
	if(isset($_GET['delete'])){
		$_SESSION['cart_'.$_GET['delete']]=0;
		header('location:index.php');
	}



	function product()
	{
		global $con, $total;
		foreach($_SESSION as $name => $value) {

			
			if($value > 0){
				if(substr($name,0,5) == 'cart_'){
					$id = substr($name,5, (strlen($name-5)));
					

				$q = mysqli_query($con,"SELECT `id`, `shipping`, `name`, `price` FROM cart WHERE `id` ='" .$id."'");
						while($get = mysqli_fetch_assoc($q)) {
							$total = $value * $get['price'];
							echo $get['name']. 'X' .$value. '@' .$get['price'].' = $ '.$total.'<a href="cart.php?add='.$id.'">[+]</a> <a href="cart.php?remove='.$id.'">[-]</a> <a href="cart.php?delete='.$id.'">[delete]</a><br /><br />';
						}
				}
			}
		}
	}



?>