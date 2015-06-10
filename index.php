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
  <!-- SLIDESHOW Code -->
  <div id="navigation-bar" class="row">
    <div class="large-12 columns">
      <ul data-orbit>
        <li>
          <img src="img/1.jpg" alt="slide 1" />
          <div class="orbit-caption">
            Caption One.
          </div>
        </li>
        
        <li>
          <img src="img/5.jpg" alt="slide 2" />
          <div class="orbit-caption">
            Caption Two.
          </div>
        </li>
		<li>
          <img src="img/2.jpg" alt="slide 3" />
          <div class="orbit-caption">
            Caption Three.
		 </div>
      </ul>
	</div>
 </div>
 
  <hr>
 
  <!-- MAIN Content -->
  <div class="row">
    <div class="large-12 columns">
      <ul id="index-products" class="small-block-grid-3 medium-block-grid-4 large-block-grid-5">
	  
	 
	  
		  <?php
		  $db = new mysqli('mysql5.000webhost.com','a7124627_taz','123qwe','a7124627_mobile');
		
		   $products=$db->query("SELECT * FROM products WHERE id=1 or id=2 or id=3 or id=4 or id=5 or id=6 or id=7 or id=8 or id=9 or id=10");
		 $product1 = $products->fetch_assoc();
		 $product2 = $products->fetch_assoc();
		 $product3 = $products->fetch_assoc();
		 $product4 = $products->fetch_assoc();
		 $product5 = $products->fetch_assoc();
	     $product6 = $products->fetch_assoc();
	     $product7 = $products->fetch_assoc();
		 $product8 = $products->fetch_assoc();
		 $product9 = $products->fetch_assoc();
	     $product10 = $products->fetch_assoc();
		   ?>
		   <!--1h eikona-->
				<li class="text-center">
					<h5><font face="century gothic"><?= $product1['title']; ?> </font></h5> 
					<a href="product.php?id=<?=  $product1['id']  ?>">
					<img src="img/products/<?= $product1['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product1['price']; ?> &#8364; </span> 
				</li>
			<!--2h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product2['title']; ?></font></h5> 
					<a href="product.php?id=<?=  $product2['id']  ?>">
					<img src="img/products/<?= $product2['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product2['price']; ?> &#8364; </span> 
				</li>
			<!--3h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product3['title']; ?></font></h5>
					<a href="product.php?id=<?=  $product3['id']  ?>">					
					<img src="img/products/<?= $product3['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product3['price']; ?> &#8364; </span> 
				</li>
			<!--4h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product4['title']; ?></font></h5> 
					<a href="product.php?id=<?=  $product4['id']  ?>">
					<img src="img/products/<?= $product4['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product4['price']; ?> &#8364; </span> 
				</li>
			<!--5h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product5['title']; ?></font></h5>
					<a href="product.php?id=<?=  $product5['id']  ?>">					
					<img src="img/products/<?= $product5['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product5['price']; ?> &#8364; </span> 
				</li>
			<!--6h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product6['title']; ?></font></h5> 
					<a href="product.php?id=<?=  $product6['id']  ?>">
					<img src="img/products/<?= $product6['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product6['price']; ?> &#8364; </span> 
				</li>
			<!--7h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product7['title']; ?></font></h5>
					<a href="product.php?id=<?=  $product7['id']  ?>">
					<img src="img/products/<?= $product7['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product7['price']; ?> &#8364; </span>  
				</li>
			<!--8h eikona-->
				<li class="text-center">
					<h5><font face="century gothic"><?= $product8['title']; ?></font></h5> 
					<a href="product.php?id=<?=  $product8['id']  ?>">
					<img src="img/products/<?= $product8['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product8['price']; ?> &#8364; </span> 
				</li>
			<!--9h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product9['title']; ?></font></h5>
					<a href="product.php?id=<?=  $product9['id']  ?>">
					<img src="img/products/<?= $product9['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product9['price']; ?> &#8364; </span> 
				</li>
			<!--10h eikona-->
				  <li class="text-center">
					<h5><font face="century gothic"><?= $product10['title']; ?></font></h5> 
					<a href="product.php?id=<?=  $product10['id']  ?>">
					<img src="img/products/<?= $product10['image'] ?>"></a>
					<span class="round label alert price-value"> <?=$product10['price']; ?> &#8364; </span> 
				</li>
		</ul>
    </div>
  </div>

<hr>

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