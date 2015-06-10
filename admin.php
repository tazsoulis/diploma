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
 <div class="wrapper">
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

  <!-- Main Content -->
  
  <div class="row">
	<div class="small-12 medium-12 large-offset-1 large-10 columns">
		<form action="insert.php" method="post" enctype="multipart/form-data">
		  <fieldset>
			<legend>Νέο Προϊόν</legend>
			<div class="row">
				<div class="small-12">
				  <div class="row">
					<div class="small-1 columns">
					  <label class="right inline">Τίτλος:</label>
					</div>
					<div class="small-11 columns">
					  <input name="title" type="text" placeholder="Τίτλος προϊόντος">
					</div>
				  </div>
				</div>
			 </div>
			<label>Περιγραφή</label>
			<textarea name="description" placeholder="Περιγραφή προϊόντος"></textarea>
			<input id="available" name="available" value="true" type="checkbox"><label for="available">Διαθέσημο</label>
			<div class="row">
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Χρώμα:</label>
					</div>
					<div class="small-9 columns">
					  <input name="colour" type="text" placeholder="χρώμα κινητού">
					</div>
				  </div>
				</div>
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Διαγώνιος Οθόνη</label>
					</div>
					<div class="small-9 columns">
					  <input name="monitor" type="text" placeholder="Διαγώνιος Οθόνη">
					</div>
				  </div>
				</div>
			</div>
			<div class="row">
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Αναλυση Cameras:</label>
					</div>
					<div class="small-9 columns">
					  <input name="camera" type="text" placeholder="Αναλυση Cameras">
					</div>
				  </div>
				</div>
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Λειτουργικό σύστημα</label>
					</div>
					<div class="small-9 columns">
					  <input name="system" type="text" placeholder="Λειτουργικό σύστημα">
					</div>
				  </div>
				</div>
			</div>
		
			<div class="row">
			<div class="row">
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Τιμή:</label>
					</div>
					<div class="small-9 columns">
					  <input name="price" type="text" placeholder="Τιμή προϊόντος">
					</div>
				  </div>
				</div>
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">Ποσότητα:</label>
					</div>
					<div class="small-9 columns">
					  <input name="quantity" type="text" placeholder="Διαθέσιμο απόθεμα">
					</div>
				  </div>
				</div>
				<div class="small-6 columns">
				  <div class="row">
					<div class="small-3 columns">
					  <label for="right-label" class="right inline">brand:</label>
					</div>
					<div class="small-9 columns">
					  <input name="brand" type="text" placeholder="brand">
					</div>
				  </div>
				</div>
			</div>
			<div class="row">
				<div class="small-12">
				  <div class="row">
					<div class="small-1 columns">
					  <label class="right inline">Εικόνα:</label>
					</div>
					<div class="small-11 columns">
					  <input name="image" type="file">
					</div>
				  </div>
				</div>
			 </div>
			<button type="submit">Καταχώρηση</button>
		  </fieldset>
		</form>
	</div>
  </div>
  </div>
   <br clear="all"> <br clear="all"> <br clear="all"> <br clear="all"> <br clear="all">
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
  
  <!-- JS Code -->
  <script src="js/vendor/custom.modernizr.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>