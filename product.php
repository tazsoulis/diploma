<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="el" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>smart-mobile!</title>

  <!-- CSS Libraries -->
 <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/foundation-icons.css">
  <link rel="stylesheet" href="css/general_enclosed_foundicons.css">
  <link rel="stylesheet" href="css/app.css">
   <link rel="stylesheet" href="css/font-awesome.css">
    
</head>
<body>
  <!-- HTML Code -->
  <div class="wrapper">
  <!-- Navigation Bar -->
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name"><h1><a href="index.php">Mobile-Shop</a></h1></li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="left">
			<li> 
				<a href="mobiles.php" class="button round btn-black brand">
					<i class="fa fa-mobile fa-lg"></i> Brands Mobiles
				</a>
			</li>
			<li><a><i class="fa fa-phone fa-lg" style="color:#CC0000;"></i><span class="call"> Τηλ.:215.5602000</span></a></li>
        </ul>  
        <ul class="right"> 
			
			<?php 
			if(isset($_SESSION['user']))
				if($_SESSION['user']['type'] == 'admin') 
					echo '<li><a href="admin.php" class="button alert">Admin Panel</a></li>';
            ?>
			
            <li class="has-form">
			<form action="search.php" method="get">
                <div class="row collapse">
                    <div class="small-8 columns">
                        <input name="search" type="text" placeholder="Αναζήτηση...">
                    </div>
                    <div class="small-4 columns">
                        <button  class="button btn-blue expand"><font face="century gothic">Αναζήτηση</font></button>
                    </div>
                </div>
				</form>
            </li>
            <?php
                if(isset($_SESSION['user'])) echo '
                    <li class="has-dropdown">
                        <a href="#"><i class="fa fa-user-md"></i><font face="century gothic"> '.$_SESSION['user']['username'].'</font></a>
                        <ul class="dropdown">
                          <li><a href="basket.php"><i class="fa fa-shopping-cart"></i> <font face="century gothic">Καλάθι</font></a></li>
                          <li><a href="logout.php"><i class="fa fa-sign-out"></i> Έξοδος</a></li>
						  <li><a href="contact.php"><i class="fa fa-info-circle"></i></i><font face="century gothic"> Contact us</font> </a></li>
                        </ul>
                    </li>
                ';
                else echo '
                <li class="has-dropdown">
                    <a href="#"><i class="fa fa-user-md"></i> <font face="century gothic">Ιδιότητες</font></a>
                    <ul class="dropdown">
                        <li><a href="login.php"><i class="fa fa-sign-in fa-lg"></i></i> <font face="century gothic">Log In</font></a></li>
                        <li><a href="register.php"><i class="fa fa-pencil fa-lg"></i> <font face="century gothic">Register</font></a></li>
						<li><a href="contact.php"><i class="fa fa-info-circle"></i></i> <font face="century gothic">Contact us</font> </a></li>
                    </ul>
                </li>
                ';
            ?>
        </ul>
    </section>
  </nav>


  <!-- Product Code -->
  <?php
	if(isset($_GET['id'])) {
		$product_id = $_GET['id'];
		$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
		$results = $db->query("SELECT * FROM products WHERE id=$product_id");
		if($results->num_rows == 1) {
			$product = $results->fetch_assoc();
			echo '
				<div class="row">
					<div class="large-12 columns font-familu"">
						<h2><font face="century gothic">'.$product['title'].'</font></h2>
						<div class="row">
							<div class="small-4 medium-4 large-4 columns">
								<img src="img/products/'.$product['image'].'">
							</div>
							<div class="small-8 medium-8 large-8 columns">							
								<p>Κωδικός: '.$product['id'].'</p>
								<p style="margin-top: 100px;"><font face="century gothic">'.$product['description'].'</font></p>
								<p>Τιμή: <span class="round label alert price-value"> '.$product['price'].' &#8364; </span> &nbsp;&nbsp;&nbsp;&nbsp; '.($product['available'] == 1 ? '<span class="available"><i class="foundicon-checkmark"></i>Διαθέσιμο</span>'  : '<span class="unavailable"><i class="foundicon-minus"></i>Εξαντλήθηκε</span>').'</p>
								<p class="text-right" style="margin-top: 100px;"><button id="btnBuy" class="button success round" style="font-size:15px;"><b>Αγόρασέ το</b> <i class="fi-shopping-cart"></i></button></p>
							</div>
							
						</div>
					</div>
				</div>
			';
		} else {
			echo 'Δεν υπάρχει το προϊόν';
		}
	}
	else Header('Location: index.php');
	?>
	<!--
  
  -->
  
  <?php
	if(isset($_GET['id'])) {
		$product_id = $_GET['id'];
		$db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
		$results = $db->query("SELECT * FROM products WHERE id=$product_id");
		if($results->num_rows == 1) {
			$product = $results->fetch_assoc();
			
			echo '
 
 <div class="row ">
    <div class=" small-12 medium-12 large-12 columns">
		<dl class="tabs " data-tab>
            <dd class="active "><a href="#panel2-1">Γενικά</a></dd>
            <dd> <a href="#panel2-2">Οθόνη</a></dd>
            <dd> <a href="#panel2-3">camera</a></dd>
            <dd><a href="#panel2-4">Χαρακτηριστικά</a></dd>
            <dd><a href="#panel2-5">Συσκευασία</a></dd>
        </dl> 
	</div>
	</div>
	<div class="tabs-content  row ">       
		<!-- 1o tab-->
		<div class="content active small-12 medium-12 large-12 columns" id="panel2-1">
			<div class="row ">
				<div class="small-6 medium-6 large-6 columns">
					Κατηγορία:<hr>
					Τύπος SIM:<hr>   
					Dual-Sim:<hr>
					Χρώμα:<hr>
					Βάρος:<hr>
				</div>
				<div class="small-6 medium-6 large-6 columns">
					Smartphones<hr>
					Nano Sim<hr>
					Oχι<hr>
					'.$product['colour'].'<hr>
					132 γραμμάρια<hr>
				</div>
			</div>
		</div>
		<!-- 2o tab-->
		<div class="content small-12 medium-12 large-12 columns" id="panel2-2">
			<div class="row">
				<div class="small-6 medium-6 large-6 columns">
					Διαγώνιος Οθόνης:<hr>
					Τύπος οθόνης:<hr>
					Χρώματα Οθόνης:<hr>	
				</div>
				<div class="small-6 medium-6 large-6 columns">
					'.$product['monitor'].'<hr>
					IPS LCD capacitive touchscreen<hr>
					16M<hr>
				</div>
			</div>
		</div>	
		<!-- 3o tab-->	
		<div class="content small-12 medium-12 large-12 columns" id="panel2-3">
			<div class="row">
				<div class="small-6 medium-6 large-6 columns">
					Flash:<hr>
					Ανάλυση κάμερας:<hr>
					Αυτόματη Εστίαση:<hr>
					Εγγραφή Βίντεο:<hr>
					Μέγεθος Φωτογραφίας:<hr>
					Μπροστινή Κάμερα:<hr>
				</div>
				<div class="small-6 medium-6 large-6 columns">
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					'.$product['camera'].'<hr>	
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr> 
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					3264x2448 pixels<hr>
					1.2MP<hr>
				</div>
			</div>
		</div>
		<!-- 4o tab-->
		<div class="content small-12 medium-12 large-12 columns" id="panel2-4">
			<div class="row">
				<div class="small-6 medium-6 large-6 columns">
					Γραμματοσειρά (SMS, Eπαφές):<hr>
					Μενού:<hr>
					Ανοιχτή Συνομιλία:<hr>
					Λειτουργικό Σύστημα:<hr>
					Ταχύτητα Επεξεργαστή:<hr>
					Ενσωματωμένη Μνήμη:<hr>
					3G:<hr>
					Βίντεο Κλήση:<hr>
					Bluetooth:<hr>
					Wifi:<hr>
					GPS:<hr>
					Αυτονομία Αναμονή:<hr>
					Αυτονομία Ομιλία:<hr>
				</div>
				<div class="small-6 medium-6 large-6 columns">
					Ελληνική<hr>
					Ελληνικό<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr> 
					'.$product['system'].'<hr>
					Dual-core 1.3 GHz<hr>
					16GB storage, 1 GB RAM<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr> 
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					Πάνω από 250 ώρες<hr>
					Έως 10 ώρες<hr>
				</div>
			</div>
		</div>
		<!-- 5o tab-->
	   <div class="content small-12 medium-12 large-12 columns" id="panel2-5">
			<div class="row">
				<div class="small-6 medium-6 large-6 columns">
					Εγχειρίδιο Χρήσης:<hr>
					Hands Free:<hr>
					Μπαταρία:<hr>
					Καλώδιο Φόρτισης:<hr>
					Τύπος Φορτιστή:<hr>
					Καλώδιο USB:<hr>
					HDMI:<hr>
					CD:<hr>
				</div>
				<div class="small-6 medium-6 large-6 columns">
					ΔΕΝ ΥΠΑΡΧΕΙ<hr>
					<i class="foundicon-checkmark"></i> ΝΑΙ<hr> 
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr>
					BS1363-EURO UK (Συμπ. Αντάπτ. Ελληνικός)<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr> 
					OXI<hr>
					<i class="foundicon-checkmark"></i>ΝΑΙ<hr> 
					OXI<hr>
				</div>
			</div>
		</div>
	</div> 

';
		} else {
			echo 'Δεν υπάρχει το προϊόν';
		}
	}
	else Header('Location: index.php');
	?>

<div id="product-modal" class="reveal-modal tiny  text-center" data-reveal> 
<img src="img/main.png"><br> 
<button class="button success radius" onclick="$('#product-modal').foundation('reveal', 'close');">Συνέχεια αγορών</button> 
<a href="basket.php" class="button tiny">Ολοκλήρωση παραγγελίας</a> 
<a class="close-reveal-modal">&#215;</a> 
</div>
	
<!-- JS Code -->
<script src="js/jquery.js"></scrip>
<script src="js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>

<script>
	function addProduct(productID) {
		//Send ajax request
		$.ajax({
			url: 'add_product.php',
			method: 'post',
			data: { product_id: productID },
			complete: function(response){
				if(response.responseText == 'OK') {
					$('#product-modal').foundation('reveal', 'open');
				}
				if(response.responseText == 'ERROR') alert('Το προϊόν βρίσκεται ήδη στο καλάθι σας.');
				if(response.responseText == 'UNAUTHORIZED') alert('Για να αγοράσεις το προιον θα πρέπει να συνδεθείς!');
			}
		});
	}
	
	$('#btnBuy').click(function(){ addProduct(<?= $product['id'] ?>); });
</script>
</div>
<div class="push"></div>
<div class="row" id="footer" >
	<div class=" medium-3 columns infos">
		<small>Copyright©</small> Mobile-Shop 2014
	</div>
	<div class="medium-2 columns info">
		<a href="mailto:tazsoulis@gmail.com"><i class="fa fa-envelope"></i> tazsoulis@gmail.com</a>
	</div>
	<div class="medium-7 columns infos">
		<ul class="list-inline">
		<li>Join us on <i class="fa fa-facebook-square"></i></li>
		<li><i class="infos">|Follow us on</i> <i class="fa fa-twitter-square"></i></li>
		<li><i class="infos">|<small>Powered by</small> @<b>Anastasios Mitronatsios</b></i></li>
		</ul>
	</div>
</div>			
</div>
  <!-- JS Code -->
  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>