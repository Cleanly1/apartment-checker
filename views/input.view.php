<?php require_once __DIR__ . '/views-components/header.php' ?>


<h1>Input</h1>

<form action="" method="post" class="form">
	<label for="address">Enter the address: </label>
	<input name="address" id="address" type="text">
	<label for="price">Enter the price: </label>
	<input name="price" id="price" type="number">
	<label for="fee">Enter the fee: </label>
	<input name="fee" id="fee" type="number">
	<label for="area">Enter the area: </label>
	<input name="area" id="area" type="number">
	<button type="submit">Submit</button>
</form>


<?php require_once __DIR__ . '/views-components/footer.php' ?>