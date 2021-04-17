<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add new product</title>
	<link rel="stylesheet" href="/user_guide/css/create-style.css">
</head>
<body>
<div class='container'>
<?php	if($this->session->flashdata('error')) {
			echo $this->session->flashdata('error');
		} else {
			echo $this->session->flashdata('added');
		}
?>
	<h1>Add new product</h1>
	<form action="/products/add" method="POST">
		<label for="name">Name</label>
		<input type="text" id='name' name='name' placeholder="Enter the product name">

		<label for="description">Description</label>
		<textarea name="description" id="description" cols="30" rows="10" placeholder="Enter the product description..."></textarea>

		<label for="price">Price</label>
		<input type="text" id='price' name='price' placeholder="Enter the product price">

		<input type="submit" value="Create">
	</form>
	<a href="/">Go back</a>
</div>
</body>
</html>