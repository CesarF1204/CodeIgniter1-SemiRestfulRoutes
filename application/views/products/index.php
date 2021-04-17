<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Products</title>
	<link rel="stylesheet" href="user_guide/css/style.css">
</head>
<body>
<div class='container'>
<?php	if($this->session->flashdata('deleted')) {
			echo $this->session->flashdata('deleted');
		} else if($this->session->flashdata('added')){
			echo $this->session->flashdata('added');
		} else if($this->session->flashdata('updated')) {
			echo $this->session->flashdata('updated');
		}
?>
	<h1>Products</h1>
	<table border='1'>
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php	foreach($get_each_product as $product) { ?>
			<tr>
				<td><?= $product['name'] ?></td>
				<td><?= $product['description'] ?></td>
				<td><?= $product['price'] ?></td>
				<td><a class='show-product' href="/products/show/<?= $product['id']; ?>">Show</a> |
					<a href="/products/edit/<?= $product['id']; ?>">Edit</a>
					<form action="/products/delete/<?= $product['id'] ?>" method="post">
                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>"/>
                        <input type="submit" value="Remove"/>
                    </form>
				</td>
			</tr>
<?php 	} ?>
		</tbody>
	</table>
	<a class='add-product' href="/products/new">Add a new product</a>
</div>
</body>
</html>