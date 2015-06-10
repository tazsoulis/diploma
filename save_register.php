<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();

$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
$db->query("INSERT INTO users (name , surname , city , adress , username , password , email) VALUES ('".
	$_POST['name']."','".
	$_POST['surname']."','".
	$_POST['city']."','".
	$_POST['adress']."','".
	$_POST['username']."','".
	$_POST['password']."','".
	$_POST['email']."')"
);
if($db->insert_id !=0 ) { 
//echo('Η εγγραφή ήταν επιτυχής! Για να επιστρέψετε στην αρχική σας οθόνη πατήστε το πλήκτρο <a href="index.php">εδω!</a>');
	$_SESSION['user']['username'] = $_POST['username'];
	$_SESSION['user']['type'] = 'user';
	Header('Location:index.php');
}
else echo('Πρόβλημα κατα την εγγραφή! Δοκιμάστε ξανά. <button onclick="window.history.back();">Πίσω</button> ');
?>
</body>
</html>