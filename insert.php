<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
	session_start();
	$title = $_POST['title'];
	$description = htmlspecialchars($_POST['description'], ENT_QUOTES);
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$image = $_FILES['image']['name'];
	$colour=$_POST['colour'];
	$monitor=$_POST['monitor'];
	$camera=$_POST['camera'];
	$system=$_POST['system'];
	$brand=$_POST['brand'];
	
	if(isset($_POST['available']) && $_POST['available'] == 'true') {
		$available = 1;
	} else {
		$available = 0;
	}
	
	$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
	if(mysqli_connect_errno()) { echo 'DATABASE ERROR'; }
	else {
		// Update image
		if(!empty($image) && file_exists('img/products/'.$image)) echo 'Το όνομα του αρχείου "'.$image.'" υπάρχει ήδη <button onclick="window.history.back();">Πίσω</button>';
		else {
			move_uploaded_file($_FILES["image"]["tmp_name"], 'img/products/'.$image);
			// Insert to Database
		if(file_exists('img/products/'.$image)) {
			$db->query("INSERT INTO products (title, description, price, quantity, image, available, colour, monitor, camera, system, brand) VALUES ('$title', '$description', $price, $quantity, '$image', $available, '$colour', '$monitor', '$camera', '$system','$brand')");
			if($db->insert_id == 0) echo $db->error;
			else echo "Καταχωρήθηκε";
			}
		}
	}
?>
</body>
</html>
