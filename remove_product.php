<?php
	session_start();
	
	$product_id = $_POST['product_id'];
	$user_id = $_SESSION['user']['id'];
	$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
	//$db->query("INSERT INTO basket (product_id, user_id) VALUES (".$product_id.", ".$user_id.")");
	$db->query("DELETE FROM basket WHERE (product_id = $product_id AND user_id = $user_id)");
	if($db->error == "") echo "OK";
	else echo "ERROR";
?>