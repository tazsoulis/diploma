<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
if(mysqli_connect_errno()) { echo 'DATABASE ERROR'; }
else {
	$results = $db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	if($results->num_rows == 1) {
		// Create list user => $_SESSION['user']
		$row = $results->fetch_assoc();
		$_SESSION['user']['username'] = $row['username'];
		$_SESSION['user']['type'] = $row['type'];
		$_SESSION['user']['id']=$row['id'];
		Header('Location:index.php');
	}
	else {
		echo 'Λάθος διαπιστευτήρια <a href="login.php">Προσπαθήστε ξανά</a>';
		//Header('Location:index.php');
	}
}
?>
</body>
</html>