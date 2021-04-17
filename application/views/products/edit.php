<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Product</title>
	<link rel="stylesheet" href="/user_guide/css/edit-style.css">
</head>
<body>
<div class='container'>
<?php	if($this->session->flashdata('error')) {
			echo $this->session->flashdata('error');
		} else {
			echo $this->session->flashdata('added');
		}
?>
	<h1>Edit Product <?= $product['id'] ?></h1>
	<form action="/products/update/<?= $product['id'] ?>" method='POST'>
		<label for="name">Name</label>
		<input type="text" id='name' name='name' value="<?= $product['name'] ?>">

		<label for="description">Description</label>
		<textarea name="description" id="description" cols="30" rows="10"><?= $product['description'] ?></textarea>

		<label for="price">Name</label>
		<input type="text" id='price' name='price' value="<?= $product['price'] ?>">

		<input type="submit" value="Update">
	</form>
	<a href="/products/show/<?= $product['id'] ?>">Show</a> | <a href="/">Back</a>
</div>
</body>
</html>