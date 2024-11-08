<!DOCTYPE html>
<html lang="en" color-scheme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="canonical" href="<?= ROOT ?>" />
  <meta name="theme-color" content="#127fb1" />
  <link rel="icon" type="image/png" href="<?= ASSETS ?>/img/favicon.png">
  <?php if (isset($params['meta'])) { ?>

    <meta name="description" content="<?= $params['meta']['description'] ?>">
    <meta name="keywords" content="<?= $params['meta']['keywords'] ?>">
    <meta name="author" content="<?= $params['meta']['author'] ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo $params['meta']['title']; ?>">
    <meta property="og:description" content="<?php echo $params['meta']['description']; ?>">
    <meta property="og:image" content="<?php echo $params['meta']['image']; ?>">
    <meta property="og:url" content="<?php echo $params['meta']['url']; ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $params['meta']['title']; ?>">
    <meta name="twitter:description" content="<?php echo $params['meta']['description']; ?>">
    <meta name="twitter:image" content="<?php echo $params['meta']['image']; ?>">
<meta name="google-adsense-account" content="ca-pub-1299431623082662">
    <title><?= $params['meta']['title'] ?></title>

  <?php } ?>
  <link rel="stylesheet" href="<?= ASSETS ?>/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/@iconscout/unicons@4.0.8/css/line.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>


  
    <header class="sticky-header">
        <div class="top-bar">
            <div class="logo">
                <a href="<?=ROOT?>"><img src="<?=ASSETS?>/img/logo.svg" style="width:125px;"></a>
                
            </div>

            <div class="search-box">
                <input class="search-input" type="text" name="search" placeholder="search...">
            </div>

            <div class="icons">
            <div class="headerLink">
            <a href="<?=ROOT?>/contact">Get In Touch</a>
            <a href="<?=ROOT?>/about-us">About Us</a>
            </div>
            <!-- <span class="uil uil-shopping-cart"></span>
            <span class="uil uil-user"></span> -->
            </div>
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
        <div class="main-header">
            <nav class="main-nav">
                <ul>
                    <li><a href="#">Bathware &#9662;</a>
                    <div class="mega-menu-content">
                            <div class="column">
                        
                                <h4>COMMODE & Urinal</h4>
                                <a href="">One Piece Commode</a>
                                <a href="">Smart Commode</a>
                                <a href="">Wall Hung Commode</a>
                                <a href="">Squatting Pan</a>
                                <a href="">Urinal</a>
                            </div>
                            <div class="column">
                

                            <h4>BASIN</h4>
                                <a href="">Art Basin</a>
                                <a href="">Bath Vanity</a>
                                <a href="">Under Counter Basin</a>
                                <a href="">Semi Recessed Basin</a>
                                <a href="">Pedestal Basin</a>
                                <a href="">Wall Hung Basin</a>
                                <a href="">Wudu Basin</a>
                                <a href="">Monoblock Washbasin</a>
                            </div>
                            <div class="column">
                            
                            <h4>FAUCET</h4>
                                <a href="">All Faucet Series</a>
                                <a href="">Basin Mixer</a>
                                <a href="">Push Shower Mixer</a> 
                                <a href="">Bath Mixer</a>
                                <a href="">Pillar Cock</a>
                                <a href="">Bib Cock</a>
                                <a href="">Sensor Faucet</a>
                            </div>
                            <div class="column">
                                <h4>Shower</h4>
                                <a href=""> Shower Set</a>
                                <a href="">Shower Panel</a>
                                <a href="">Shower Mixer</a>
                                <a href="">Overhead Shower</a>
                                <a href="">Shower Essentials</a>
                                <a href="">Shower Body Jet</a>
                            </div>
                            <div class="column">
                            <h4>Cozy Showers</h4>
                                <a href="">Bathtub</a>
                                <a href="">Water Heater</a>
                                <a href="">Shower Enclosure</a>
                                <a href="">Cabinet Mirror</a>
                                <a href="">Frame Mirror</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Kitchenware &#9662;</a>
                    <div class="mega-menu-content">
                            <div class="column">
                                <div class="product">
                                    <img src="<?=ASSETS?>/img/menu/kitchen-hood.webp" alt="Product 1">
                                    <div class="overlay">
                                        <div class="product-type">Kitchenware</div>
                                        <div class="view-all">View All</div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="product">
                                    <img src="<?=ASSETS?>/img/menu/kitchen-hood.webp" alt="Product 2">
                                    <div class="overlay">
                                        <div class="product-type">KITCHEN HOOD</div>
                                        <div class="view-all">View All</div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="product">
                                    <img src="<?=ASSETS?>/img/menu/pan.webp" alt="Product 3">
                                    <div class="overlay">
                                        <div class="product-type">KITCHEN BURNERS</div>
                                        <div class="view-all">View All</div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="product">
                                    <img src="<?=ASSETS?>/img/menu/sink-mixer.jpg" alt="Product 4">
                                    <div class="overlay">
                                        <div class="product-type">KITCHEN SINK</div>
                                        <div class="view-all">View All</div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="product">
                                    <img src="<?=ASSETS?>/img/menu/sink.jpg" alt="Product 5">
                                    <div class="overlay">
                                        <div class="product-type">Product 5</div>
                                        <div class="view-all">View All</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </li>
                    <li><a href="#">Luxary Product</a></li>
                    <li><a href="<?=ROOT?>/products">New Product</a></li>
                    <li><a href="<?=ROOT?>/blog">Blogs</a></li>
                    <li><a href="<?=ROOT?>/sales-network">Our Show rooms</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
    {{content}}
    

</main>
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>CAREERS</h3>
                <ul>
                    <li><a href="#">Leadership</a></li>
                    <li><a href="#">Career Opportunities</a></li>
                    <li><a href="#">Drop your CV</a></li>
                    <li><a href="#">Events</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>ABOUT US</h3>
                <ul>
                    <li><a href="<?=ROOT?>/about-us">About</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact Us</a></li> 
                </ul>
            </div>
            <div class="footer-column">
                <h3>OUR POLICIES</h3>
                <ul>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Warranty Policy</a></li>
                    <li><a href="#">Return & Refund Policy</a></li>
                    <li><a href="#">Legal</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>QUICK LINKS</h3>
                <ul>
                    <li><a href="<?=ROOT?>/sales-network">Store Location</a></li>
                    <li><a href="<?=ROOT?>/iconic-projects">Iconic Project</a></li>
                    <li><a href="<?=ROOT?>/factory">Factory</a></li>
                    <li><a href="<?=ROOT?>/faq">FAQs</a></li>
                </ul>



            </div>
        </div>
        <div class="container">
            <div>
            <div class="sharing">
                
                <a class="sharing-item sharing-facebook" href="https://www.facebook.com/UComfortbd">
                    <svg class="i i-facebook" viewBox="0 0 24 24">
                        <path d="M17 14h-3v8h-4v-8H7v-4h3V7a5 5 0 0 1 5-5h3v4h-3q-1 0-1 1v3h4Z"></path>
                    </svg></a>
                    
                    <a class="sharing-item sharing-twitter" href="https://twitter.com/ucomfortbd">
                    <svg class="i i-twitter" viewBox="0 0 24 24">
                        <path d="m3 21 7.5-7.5m3-3L21 3M8 3H3l13 18h5Z"></path>
                    </svg></a>
                    
                    <a class="sharing-item sharing-pinterest" href="#">
                    <svg class="i i-pinterest" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="11"></circle>
                        <path d="m8 22 3-11a1 1 0 0 0 5 5.5A6 6 0 1 0 6 12"></path>
                    </svg></a>
                    

                    
 
                    
                    <a class="sharing-item sharing-linkedin" href="https://www.linkedin.com/company/ucomfortbd/">
                    <svg class="i i-linkedin" viewBox="0 0 24 24">
                        <circle cx="4" cy="4" r="2"></circle>
                        <path d="M2 9h4v12H2Zm20 12h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 12 0Z"></path>
                    </svg></a>

                    
                
                    <a class="sharing-item sharing-whatsapp" href="https://wa.me/+8801818131816?text=Welcome%20to%20WhatsApp!">
                        <svg class="i i-whatsapp" viewBox="0 0 24 24">
                            <circle cx="9" cy="9" r="1"></circle>
                            <circle cx="15" cy="15" r="1"></circle>
                            <path d="M8 9a7 7 0 0 0 7 7m-9 5.2A11 11 0 1 0 2.8 18L2 22Z"></path>
                        </svg></a>
                    
                    
            </div>
            </div>
            <div>
            <button id="goTopBtn" title="Go to top"><i class="uil uil-top-arrow-from-top"></i></button>
            </div>

        </div>
        <div class="second-footer">
            <div>
                <span class="small">© Copyright 2024 uComfortBD. All rights reserved. </span>
            </div>
            <div>
                <span class="small">Technical support: support@ucomfortbd.com </span>
            </div>
            <div>
                <span class="small">Customer support: +880-152-1257123</span>
            </div>
        </div>

    </footer>

</body>
<script>


document.addEventListener('DOMContentLoaded', () => {
    const hamburgerMenu = document.querySelector('.hamburger-menu');
    const mainNav = document.querySelector('.main-nav ul');
    const searchIcon = document.querySelector('.search-icon');
    const searchBox = document.querySelector('.search-box');

    // Toggle menu open/close and animation of hamburger to cross
    hamburgerMenu.addEventListener('click', () => {
        hamburgerMenu.classList.toggle('active'); // Toggle the cross
        mainNav.classList.toggle('open'); // Show/hide mega menu
    });

    // Toggle search box
    searchIcon && searchIcon.addEventListener('click', () => {
        searchBox.classList.toggle('open');
    });

    // Change header background on scroll
    window.addEventListener('scroll', () => {
        const header = document.querySelector('.sticky-header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});


let mybutton = document.getElementById("goTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document smoothly
mybutton.onclick = function() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

</script>
</html>