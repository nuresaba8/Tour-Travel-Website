<?php
require_once('../model/userModel.php');
if (isset($_COOKIE['flag'])) {
    $username = $_COOKIE['username'];
    $role = getRole($username);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
    rel="stylesheet"
    
    />

    <link rel="stylesheet" href="../CSS/styleView.css"/>
    <title>Home</title>
   
</head>
<body>
    <nav>
                <div  class="nav__logo">San Tour</div>
                <ul class="nav__links">
                    <li class="link"><a href="home1.php" > Home</a></li>
                    <li  class="link"><a href="tour.php">Tour</a></li>
                    <li  class="link"><a href="travel.php">Travel</a></li>
                    <li  class="link"><a href="about.php">About Us</a></li>
                    <?php if ($role == 'user') { ?>
                       <li class="link"> <a href="menu.php" >Menu</a></li>
                        <?php } elseif ($role == 'host') { ?>
                            <li class="link"> <a href="hostdashboard.php" >Menu</a></li>
                            <?php } else { ?>
                                <li class="link"><a href="admindashboard.php" >Menu</a></li>
                                <?php } ?> 
                              
                                    <?php
                                    if (!isset($_COOKIE['flag'])) {
                                    ?>
                                        <li class="link"><a href="login.php" >Login</a></li>
                                        <li class="link"><a href="registration.php">Signup</a></li>
                                    <?php } else { ?>
                                        Logged in as <li class="link"><a href="../view/viewprofile.php" > <?php echo $username; ?> </a></li>
                                        <li class="link"><a href="../controller/logoutCheck.php">Logout</a></li>
                                    <?php } ?>
                                
                    </ul>
        
    </nav>


    <section class="section__container popular__container">
      <h2 class="section__header">Tour Details</h2>
      <div class="popular__grid">
      <div class="popular__card">
          <img src="https://cdn.pixabay.com/photo/2024/03/05/10/38/boat-8614314_1280.jpg" alt="popular hotel" />
      </div>
        <div class="popular__card">
        <img src="https://cdn.pixabay.com/photo/2023/12/13/06/47/footprints-8446394_1280.jpg" alt="popular hotel" />
          
        </div>
        <div class="popular__card">
          <img src="https://cdn.pixabay.com/photo/2023/07/08/04/58/sunset-8113697_1280.jpg" alt="popular hotel" />
          
        </div>
        <div class="popular__card">
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>Atlantis The Palm</h4>
              <h4>$449</h4>
            </div>
            <p>Dubai, United Arab Emirates</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum animi maxime aut illum nobis velit quis in dignissimos distinctio ex! Ea, quisquam. Minima, praesentium? Quia 
              obcaecati provident impedit dignissimos ea.</p>
          </div>
        </div>
      </div>
    </section>


    <section class="client">
      <div class="section__container client__container">
        <h2 class="section__header">Check and Book!</h2>
        <div class="client__grid">
          <div class="client__card">
            <a href="../view/wishlist.php">Wishlist</a>
          </div>
          <div class="client__card">
            <a href="../view/BF.php">Book now</a>
          </div>
        </div>
      </div>
    </section>



    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>San Tour</h3>
          <p>
            San Tour is a premier hotel booking website that offers a seamless and
            convenient way to find and book accommodations worldwide.
          </p>
          <p>
            With a user-friendly interface and a vast selection of hotels,
            WDM&Co aims to provide a stress-free experience for travelers
            seeking the perfect stay.
          </p>
        </div>
        <div class="footer__col">
          <h4>Company</h4>
          <p><a href="viewprofile.php">Customer Support</a></p>
          <p><a href="Blog.php">Blogs</a></p>
          <p><a href="customer_feedback.php">Reviews</a></p>
          <p><a href="pcp.php">Promotions</a></p>
        </div>
        <div class="footer__col">
          <h4>Legal</h4>
          <p><a href="about.php">About Us</a></p>
        <p><a href="term.php">Terms & Conditions</a></p>
        <p><a href="faq.php">FAQ</a></p>
        </div>
        <div class="footer__col">
          <h4>We accept</h4>
          <p>Visa</p>
          <p>Master Card</p>
          <p>American Express</p>
          <p>Paypal</p>
        </div>
      </div>
      <div class="footer__bar">
      Copyright © 2024. SAN Tour. All rights reserved
      </div>
    </footer>
  </body>
</html>


