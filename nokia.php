<?php session_start(); ?>
<!DOCTYPE html>
<html class="no-js" lang="el" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mobile-Shop</title>

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
<span data-src="img/small.jpg"></span>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <!-- Navigation Bar -->
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name"><h1><a href="index.php">Mobile-Shop</a></h1></li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>
    <section class="top-bar-section">
          <ul class="left">
            <li class="has-dropdown">
              <a href="#">ΠΡΟΪΟΝΤΑ</a>
              <ul class="dropdown">
                <li><a href="#">Nokia</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">Apple</a></li>
                <li><a href="#">LG</a></li>
              </ul>
            </li>
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
                        <button  class="button btn-blue expand">Αναζήτηση</button>
                    </div>
                </div>
				</form>
            </li>
            <?php
                if(isset($_SESSION['user'])) echo '
                    <li class="has-dropdown">
                        <a href="#">'.$_SESSION['user']['username'].'</a>
                        <ul class="dropdown">
                          <li><a href="basket.php"><i class="fa fa-shopping-cart"></i>Καλάθι</a></li>
                          <li><a href="logout.php"><i class="fa fa-sign-out"></i>Έξοδος</a></li>
                        </ul>
                    </li>
                ';
                else echo '
                <li class="has-dropdown">
                    <a href="#">Ιδιότητες</a>
                    <ul class="dropdown">
                        <li><a href="login.php"><i class="fa fa-sign-in fa-lg"></i></i> Log In</a></li>
                        <li><a href="register.php"><i class="fa fa-pencil fa-lg"></i> Register</a></li>
                    </ul>
                </li>
                ';
            ?>
        </ul>
    </section>
  </nav>
  <div id="footer" class="row">
    <div class="small-12 medium-12 large-12 columns">
      <p>Copyright &copy; Mobile-Shop 2014</p>
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