<!DOCTYPE html>
<html>

<head>
	<title>Wonderland Theme Park - Admin's Crud</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link  rel="stylesheet" href="packages.css"/>
	<link href="style.css" rel="stylesheet" />

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="images/wonderland.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="active" href="index.html">Home</a></li>
					
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<button type="button" class="btn btn-dark" >
            <a href="index.html">Home</a></button>
		<h2>Packages<h2>
		<?php
	
	$connect = mysqli_connect('localhost','root','','wonderland');
	$query = 'SELECT * FROM packages ORDER BY packageId ASC';
	
	$result = mysqli_query($connect,$query);
	
	if($result):
		if(mysqli_num_rows($result)>0):
			while($package = mysqli_fetch_assoc($result)):
			//print_r($package);
			?>
		
		<div class="col-sm-4 col-md-3 col-lg-3">
			<form method="post" action="packages.php?action=add&id=<?php echo $package['packageId']; ?>">
				<div class="packages">
				<img src="<?php echo $package['imageURL']; ?>" class="img-responsive" />
				<h4 class="text-info"><?php echo $package['packageName']; ?></h4>
				<p class="lead"><?php echo $package['description']; ?></p>
				<h4><?php echo $package['price']; ?></h4>
				<input type="text" name="quantity" class="form-control" value="1"/>
				<input type="hidden" name="package" value="<?php echo $package['packageName']; ?>" />
				<input type="hidden" name="price" value="<?php echo $package['price']; ?>" />
				<input type="submit" name="reserve" style="margin-top:5px"; class="btn btn-info" value="Reserve" />

			</div>
			</form>
			</div>
		<?php
			endwhile;
		endif;
	endif;
	?>
	
	</div>
</body>

</html>