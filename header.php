<?php 
	include 'config/connect.php';
	include 'function.php';
	ob_start();
	session_start();
	
	$user = isset($_SESSION['login']) ? $_SESSION['login'] : [];
	$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../../../favicon.ico">

		<title>Blog Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

		<!-- Custom styles for this template -->
		<link href="blog.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/product-detail.css">
	</head>

	<body>
		
		<nav class="navbar navbar-expand-lg navbar-primary bg-dark">
		  <a class="navbar-brand" href="#">Logo</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="product.php">Sản phẩm</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <?php  echo !empty($user) ? $user['name'] : 'Tài Khoản' ?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		        	<?php if (!empty($user)): ?>
		        		<a class="dropdown-item" href="logout.php">Logout</a>
		        	<?php else: ?>
		        		<a class="dropdown-item" href="login.php">Login</a>
		          		<a class="dropdown-item" href="register.php">Register</a>
		        	<?php endif ?>
		          
		         
		        </div>
		      </li>
		     <li class="nav-item">
		        <a class="nav-link" href="show-cart.php">Giỏ hàng (<?php echo totalQty($cart) ?>)</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" method="GET" action="product.php">

		      <input class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa tk" name="keyword">
		      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Tìm Kiếm</button>
		    </form>
		  </div>
		</nav>