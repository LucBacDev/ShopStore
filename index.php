<?php 
	include 'header.php';

	// truy vấn láy ra những sản phẩm khuyến mãi 

	$sql_pro_sale = "SELECT * FROM product WHERE sale_price > 0";
	$pro_sale = mysqli_query($conn,$sql_pro_sale);

	// truy vấn lấy ra sản phẩm mới nhất 

	$sql_pro_new = "SELECT * FROM product WHERE status = 1 ORDER BY id DESC";
	$pro_new = mysqli_query($conn,$sql_pro_new);

	
	
	if(isset($_GET['mess'])){
		echo "<script>alert('đặt hàng thành công')</script>";
	}
 ?>

		<!-- <div class="jumbotron">
			<h1 class="display-3">Home </h1>
			<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<hr class="m-y-md">
			<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
			</p>
		</div> -->

		<div class="container">
			<section>
				<h1>Danh sách sản phẩm<span class="label label-default text-danger"> Khuyến mại</span></h1>
			
			<div class="row">

				<?php foreach ($pro_sale as $key => $value): ?>
					<div class="col-lg-3" style="padding:10px;">
						<div class="card text-center">
							<img class="card-img-top" src="uploads/<?php echo $value['image'] ?>" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title"><?php echo $value['name'] ?></h4>
								<p class="card-text">
									<del><?php echo number_format($value['price']) ?>đ</del>
									
									<strong class="text-danger"><?php echo number_format($value['sale_price']) ?>đ</strong>
									
								</p>
								<a href="product-detail.php?id=<?php echo $value['id']?>" class="btn btn-primary">View Detail</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				
			
			</div>
			</section>

			<section>
				<h1>Danh sách sản phẩm<span class="label label-default text-danger"> Mới</span></h1>
			
			<div class="row">

				<?php foreach ($pro_new as $key => $value): ?>
					<div class="col-lg-3">
						<div class="card text-center">
							<img class="card-img-top" src="uploads/<?php echo $value['image'] ?>" alt="Card image cap">
							<div class="card-body">
								<h4 class="card-title"><?php echo $value['name'] ?></h4>
								<p class="card-text">
									<?php if ($value['sale_price'] > 0): ?>
										<del><?php echo $value['price'] ?></del>
										<strong class="text-danger"><?php echo $value['sale_price'] ?></strong>
									<?php else: ?>
										<strong class="text-danger"><?php echo $value['price'] ?></strong>
										
									<?php endif ?>
									
								</p>
								<a href="product-detail.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">View Detail</a>
								<a href="#" class="btn btn-success">Add cart</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				
				
				
			</div>
			</section>
		</div>
<?php include 'footer.php' ?>