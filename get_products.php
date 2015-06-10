<?php
	$brand = $_POST['brand'];
	$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
	$results = $db->query("SELECT * FROM products WHERE brand = '".$brand."'");
	$products = array();
	while($product = $results->fetch_assoc()) {
		array_push($products, $product);
	}
	echo json_encode($products);
	
?>