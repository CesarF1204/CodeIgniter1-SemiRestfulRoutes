<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Show Products</title>
	<link rel="stylesheet" href="/user_guide/css/show-style.css">
</head>
<body>
<div class='container'>
	<h1>Product <?= $product['id'] ?></h1>
	<h2>Name: <span><?=  $product['name'] ?></span></h2>
	<h2>Description: <span><?=  $product['description'] ?></span></h2>
	<h2>Price: <span><?=  $product['price'] ?></span></h2>
	<a href="/products/edit/<?= $product['id'] ?>">Edit</a> | <a href="/">Back</a>
</div>
</body>
</html>