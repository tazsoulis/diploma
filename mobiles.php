<?php session_start(); ?>
<!DOCTYPE html>

<html class="no-js" lang="el">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>smart-mobile!</title><!-- CSS Libraries -->
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/foundation.css" rel="stylesheet">
    <link href="css/foundation-icons.css" rel="stylesheet">
    <link href="css/general_enclosed_foundicons.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/elastislide.css" rel="stylesheet">
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

   <hr>
	
    <div class="row ">
        <div class="medium-12 columns">
            <!-- Elastislide Carousel -->
			<style>#carousel img { height: 100px; }</style>
            <ul class="elastislide-list" id="carousel">
                <li><a href="#" onclick="get_products('nokia');"><img alt="image01" src="img/nokia-logo-brand-wallpapers.jpg"></a></li>

                <li><a href="#" onclick="get_products('apple');"><img alt="image02" src="img/41410-apple-apple-logo.png"></a></li>
				
				<li><a href="#" onclick="get_products('sony');"><img alt="image03" src="img/Sony.jpg"></a></li>

                <li><a href="#"onclick="get_products('samsung');"><img alt="image04" src="img/Samsung-Logo-Wallpaper-Blue-Colour.jpg"></a></li>

                <li><a href="#" onclick="get_products('htc');"><img alt="image05" src="img/htc-logo.jpg"></a></li>

                <li><a href="#"onclick="get_products('huawei')"><img alt="image06" src="img/huawei-logo.jpeg"></a></li>

                <li><a href="#"onclick="get_products('alcatel')"><img alt="image07" src="img/alcatel-logo.jpg"></a></li>

                <li><a href="#"onclick="get_products('motorola')"><img alt="image08" src="img/a-motorola_logo-392099.jpg"></a></li>

               <li><a href="#" onclick="get_products('zte');"><img alt="image09" src="img/10830-the-logo-of-zte-is-seen-inside-a-showroom-in-shenzhen-chinas.jpg"></a></li>

                
            </ul><!-- End Elastislide Carousel -->
        </div>
    </div>
	 
	
	<hr>
	
			<div id="products"></div>
			<hr>
			</div>
	<div class="push"></div>
	<!--footer-->
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



<div id="product-modal" class="reveal-modal tiny  text-center" data-reveal> 
<img src="img/main.png"><br> 
<button class="button success radius" onclick="$('#product-modal').foundation('reveal', 'close');">Συνέχεια αγορών</button> 
<a href="basket.php" class="button tiny">Ολοκλήρωση παραγγελίας</a> 
<a class="close-reveal-modal">&#215;</a> 
</div>

<!-- JS Code -->
    <script src="js/vendor/custom.modernizr.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/foundation.min.js"></script>
	<script>
		$(document).foundation();
    </script>
	<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
	<script src="js/jquerypp.custom.js"></script>
	<script src="js/jquery.elastislide.js"></script>
	<script>
		$('#carousel').elastislide();
	</script>
	<script>
		function get_products(brand) {
			$.ajax({
				url: "get_products.php", method: "post", dataType: "json",
				data: { brand: brand },
				success: function(response) {
					products = response;
					$('#products').children().remove();
					$(products).each(function(i, product) {
						var product = $(' \
						<div class="row"> \
							<div class="medium-2 columns"> \
								<img src="img/products/' + product.image + '"> \
							</div> \
							<div class="medium-10 columns"> \
								<div class="row"> \
									<div class="medium-8 columns"> \
										<h4 style="font-weight:bold;"> <a href="product.php?id=' + product['id'] + ' " >  ' + product.title + '</a></h4> \
										<p style="font-size:13px;">' + product.description + '</p> \
									</div> \
									<div class="medium-4 columns"> \
										<button class="button small round" style="margin-top:35px;" onclick="addProduct(' + product.id + ');"><b>Αγόρασέ το</b> <i class="fi-shopping-cart"></i></button> \
									</div> \
								</div> \
							</div> \
						</div> \
						');
						$('#products').append(product);
						product.hide().slideDown(1000);
					});
				}
			});
		}
		
	</script>
	
<script>
	$(document).ready(function() {
		get_products('nokia');
	});
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
</script>
</body>
</html>