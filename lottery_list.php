<?php
require('top.inc.php');
?>
<div class="product-container">

<div class="container">


  <!--
    - SIDEBAR
  -->
  <!-- 
  <div class="sidebar  has-scrollbar" data-mobile-menu style="display:none">

    <div class="sidebar-category">

      <div class="sidebar-top">
        <h2 class="sidebar-title">Category</h2>

        <button class="sidebar-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="sidebar-menu-category-list">

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/dress.svg" alt="clothes" width="20" height="20"
                class="menu-title-img">

              <p class="menu-title">Clothes</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Shirt</p>
                <data value="300" class="stock" title="Available Stock">300</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">shorts & jeans</p>
                <data value="60" class="stock" title="Available Stock">60</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">jacket</p>
                <data value="50" class="stock" title="Available Stock">50</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">dress & frock</p>
                <data value="87" class="stock" title="Available Stock">87</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/shoes.svg" alt="footwear" class="menu-title-img" width="20"
                height="20">

              <p class="menu-title">Footwear</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Sports</p>
                <data value="45" class="stock" title="Available Stock">45</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Formal</p>
                <data value="75" class="stock" title="Available Stock">75</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Casual</p>
                <data value="35" class="stock" title="Available Stock">35</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Safety Shoes</p>
                <data value="26" class="stock" title="Available Stock">26</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/jewelry.svg" alt="clothes" class="menu-title-img" width="20"
                height="20">

              <p class="menu-title">Jewelry</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Earrings</p>
                <data value="46" class="stock" title="Available Stock">46</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Couple Rings</p>
                <data value="73" class="stock" title="Available Stock">73</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Necklace</p>
                <data value="61" class="stock" title="Available Stock">61</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/perfume.svg" alt="perfume" class="menu-title-img" width="20"
                height="20">

              <p class="menu-title">Perfume</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Clothes Perfume</p>
                <data value="12" class="stock" title="Available Stock">12 pcs</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Deodorant</p>
                <data value="60" class="stock" title="Available Stock">60 pcs</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">jacket</p>
                <data value="50" class="stock" title="Available Stock">50 pcs</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">dress & frock</p>
                <data value="87" class="stock" title="Available Stock">87 pcs</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/cosmetics.svg" alt="cosmetics" class="menu-title-img" width="20"
                height="20">

              <p class="menu-title">Cosmetics</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Shampoo</p>
                <data value="68" class="stock" title="Available Stock">68</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Sunscreen</p>
                <data value="46" class="stock" title="Available Stock">46</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Body Wash</p>
                <data value="79" class="stock" title="Available Stock">79</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Makeup Kit</p>
                <data value="23" class="stock" title="Available Stock">23</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/glasses.svg" alt="glasses" class="menu-title-img" width="20"
                height="20">

              <p class="menu-title">Glasses</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Sunglasses</p>
                <data value="50" class="stock" title="Available Stock">50</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Lenses</p>
                <data value="48" class="stock" title="Available Stock">48</data>
              </a>
            </li>

          </ul>

        </li>

        <li class="sidebar-menu-category">

          <button class="sidebar-accordion-menu" data-accordion-btn>

            <div class="menu-title-flex">
              <img src="./assets/images/icons/bag.svg" alt="bags" class="menu-title-img" width="20" height="20">

              <p class="menu-title">Bags</p>
            </div>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>

          </button>

          <ul class="sidebar-submenu-category-list" data-accordion>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Shopping Bag</p>
                <data value="62" class="stock" title="Available Stock">62</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Gym Backpack</p>
                <data value="35" class="stock" title="Available Stock">35</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Purse</p>
                <data value="80" class="stock" title="Available Stock">80</data>
              </a>
            </li>

            <li class="sidebar-submenu-category">
              <a href="#" class="sidebar-submenu-title">
                <p class="product-name">Wallet</p>
                <data value="75" class="stock" title="Available Stock">75</data>
              </a>
            </li>

          </ul>

        </li>

      </ul>

    </div>

    <div class="product-showcase">

      <h3 class="showcase-heading">best sellers</h3>

      <div class="showcase-wrapper">

        <div class="showcase-container">

          <div class="showcase">

            <a href="#" class="showcase-img-box">
              <img src="./assets/images/products/1.jpg" alt="baby fabric shoes" width="75" height="75"
                class="showcase-img">
            </a>

            <div class="showcase-content">

              <a href="#">
                <h4 class="showcase-title">baby fabric shoes</h4>
              </a>

              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>

              <div class="price-box">
                <del>$5.00</del>
                <p class="price">$4.00</p>
              </div>

            </div>

          </div>

          <div class="showcase">

            <a href="#" class="showcase-img-box">
              <img src="./assets/images/products/2.jpg" alt="men's hoodies t-shirt" class="showcase-img"
                width="75" height="75">
            </a>

            <div class="showcase-content">

              <a href="#">
                <h4 class="showcase-title">men's hoodies t-shirt</h4>
              </a>
              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-half-outline"></ion-icon>
              </div>

              <div class="price-box">
                <del>$17.00</del>
                <p class="price">$7.00</p>
              </div>

            </div>

          </div>

          <div class="showcase">

            <a href="#" class="showcase-img-box">
              <img src="./assets/images/products/3.jpg" alt="girls t-shirt" class="showcase-img" width="75"
                height="75">
            </a>

            <div class="showcase-content">

              <a href="#">
                <h4 class="showcase-title">girls t-shirt</h4>
              </a>
              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-half-outline"></ion-icon>
              </div>

              <div class="price-box">
                <del>$5.00</del>
                <p class="price">$3.00</p>
              </div>

            </div>

          </div>

          <div class="showcase">

            <a href="#" class="showcase-img-box">
              <img src="./assets/images/products/4.jpg" alt="woolen hat for men" class="showcase-img" width="75"
                height="75">
            </a>

            <div class="showcase-content">

              <a href="#">
                <h4 class="showcase-title">woolen hat for men</h4>
              </a>
              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
              </div>

              <div class="price-box">
                <del>$15.00</del>
                <p class="price">$12.00</p>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div> -->



  <div class="product-box">

    <!--
      - PRODUCT MINIMAL
    -->

    <div class="product-minimal">
      <style>
        .product-showcase{
          margin-bottom:2rem;
        }
        .showcase-block{
          display:grid;
          grid-template-columns:repeat(2 , 1fr)
        }
        .showcase-wrapper {
              overflow: auto; 
          }
            /* Add scrollbar if content overflows */
          

          .showcase-container {
            margin-bottom: 20px; /* Add some space between each showcase container */
          }

          .showcase {
              background: gold; 
              display: flex;
              flex-direction: column;
              align-items: center;
              border: 1px solid #ccc; /* Example border style */
              padding: 10px; /* Example padding */
              box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Example box shadow */
          }


          .showcase-img-box {
            margin-right: 20px; /* Add space between image and content */
          }

          .showcase-img {
            border-radius: 50%; /* Example border-radius */
          }

          .showcase-content {
            flex-grow: 1; /* Allow content to expand */
          }

          .showcase-title {
            margin-bottom: 5px; /* Example margin */
          }

          .price-box {
            margin-top: 5px; /* Example margin */
          }
          
            


      </style>

      <div class="product-showcase" style="margin-bottom:5rem;">

        <h2 class="title">ဝယ်သူနိုင်သည့်ထီစောင်တွဲများ</h2>
        <div class="showcase-block" style="gap:0.5rem">
        </div>

          
            <style>
              .product-container-small {
                  display: flex;
                  align-items: center;
                  padding: 15px;
                  border-radius: 10px;
                  background-color: #8FF0D8;
                  margin-bottom: 10px;
              }

              .ticket-icon {
                  flex: 0 0 auto;
                  margin-right: 15px;
                  font-size: 24px;
                  color: #ff6347; /* Coral color */
              }

              .product-details {
                  flex: 1;
              }

              .product-title {
                  margin: 0;
                  font-size: 18px;
                  color: #333;
              }

              .product-price {
                  margin: 0;
                  font-size: 16px;
                  color: #007bff; /* Blue color */
              }
              .product-container-small.disabled {
                  opacity: 0.5; /* Reduce opacity to indicate it's disabled */
                  pointer-events: none; /* Disable pointer events to prevent clicking */
                  background-color: #BDCCEE; /* Change background color to a lighter shade */
                  cursor: not-allowed; /* Change cursor to indicate it's not clickable */
                  /* Add any additional styles to visually indicate it's disabled */
              }


            </style>
          <?php
          date_default_timezone_set('Asia/Yangon');
          $added_on = date('F Y');
          $price_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `date`='$added_on'"));
          $price=$price_row['price'];  
           ?>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <!-- JavaScript for making AJAX request -->
          <script>
              // Function to fetch and display product containers
              function fetchAndDisplayProducts(added_on, price) {
                  $.ajax({
                      url: 'list_fetch.php',
                      type: 'POST',
                      data: { added_on: added_on, price: price },
                      success: function(response) {
                          $('.showcase-block').html(response);
                      },
                      error: function(xhr, status, error) {
                          console.error(error);
                      }
                  });
              }

              // Call the function with your desired parameters
              var added_on = '<?php echo $added_on; ?>'; // Assuming you have $added_on variable
              var price = <?php echo $price; ?>; // Assuming you have $price variable
              setInterval(function() {
                // Call the fetchAndDisplayProducts function with your desired parameters
                fetchAndDisplayProducts(added_on, price);
            }, 1000);
          </script>

        
       




      </div>

      <!-- <div class="product-showcase">
      
        <h2 class="title">Trending</h2>
      
        <div class="showcase-wrapper  has-scrollbar">
      
          <div class="showcase-container">
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/sports-1.jpg" alt="running & trekking shoes - white" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Running & Trekking Shoes - White</h4>
                </a>
      
                <a href="#" class="showcase-category">Sports</a>
      
                <div class="price-box">
                  <p class="price">$49.00</p>
                  <del>$15.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/sports-2.jpg" alt="trekking & running shoes - black" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Trekking & Running Shoes - black</h4>
                </a>
      
                <a href="#" class="showcase-category">Sports</a>
      
                <div class="price-box">
                  <p class="price">$78.00</p>
                  <del>$36.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/party-wear-1.jpg" alt="womens party wear shoes" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Womens Party Wear Shoes</h4>
                </a>
      
                <a href="#" class="showcase-category">Party wear</a>
      
                <div class="price-box">
                  <p class="price">$94.00</p>
                  <del>$42.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/sports-3.jpg" alt="sports claw women's shoes" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Sports Claw Women's Shoes</h4>
                </a>
      
                <a href="#" class="showcase-category">Sports</a>
      
                <div class="price-box">
                  <p class="price">$54.00</p>
                  <del>$65.00</del>
                </div>
      
              </div>
      
            </div>
      
          </div>
      
          <div class="showcase-container">
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/sports-6.jpg" alt="air tekking shoes - white" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Air Trekking Shoes - white</h4>
                </a>
      
                <a href="#" class="showcase-category">Sports</a>
      
                <div class="price-box">
                  <p class="price">$52.00</p>
                  <del>$55.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/shoe-3.jpg" alt="Boot With Suede Detail" class="showcase-img" width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Boot With Suede Detail</h4>
                </a>
      
                <a href="#" class="showcase-category">boots</a>
      
                <div class="price-box">
                  <p class="price">$20.00</p>
                  <del>$30.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/shoe-1.jpg" alt="men's leather formal wear shoes" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Men's Leather Formal Wear shoes</h4>
                </a>
      
                <a href="#" class="showcase-category">formal</a>
      
                <div class="price-box">
                  <p class="price">$56.00</p>
                  <del>$78.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/shoe-2.jpg" alt="casual men's brown shoes" class="showcase-img" width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Casual Men's Brown shoes</h4>
                </a>
      
                <a href="#" class="showcase-category">Casual</a>
      
                <div class="price-box">
                  <p class="price">$50.00</p>
                  <del>$55.00</del>
                </div>
      
              </div>
      
            </div>
      
          </div>
      
        </div>
      
      </div>

      <div class="product-showcase">
      
        <h2 class="title">Top Rated</h2>
      
        <div class="showcase-wrapper  has-scrollbar">
      
          <div class="showcase-container">
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/watch-3.jpg" alt="pocket watch leather pouch" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Pocket Watch Leather Pouch</h4>
                </a>
      
                <a href="#" class="showcase-category">Watches</a>
      
                <div class="price-box">
                  <p class="price">$50.00</p>
                  <del>$34.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/jewellery-3.jpg" alt="silver deer heart necklace" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Silver Deer Heart Necklace</h4>
                </a>
      
                <a href="#" class="showcase-category">Jewellery</a>
      
                <div class="price-box">
                  <p class="price">$84.00</p>
                  <del>$30.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/perfume.jpg" alt="titan 100 ml womens perfume" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Titan 100 Ml Womens Perfume</h4>
                </a>
      
                <a href="#" class="showcase-category">Perfume</a>
      
                <div class="price-box">
                  <p class="price">$42.00</p>
                  <del>$10.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/belt.jpg" alt="men's leather reversible belt" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Men's Leather Reversible Belt</h4>
                </a>
      
                <a href="#" class="showcase-category">Belt</a>
      
                <div class="price-box">
                  <p class="price">$24.00</p>
                  <del>$10.00</del>
                </div>
      
              </div>
      
            </div>
      
          </div>
      
          <div class="showcase-container">
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/jewellery-2.jpg" alt="platinum zircon classic ring" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">platinum Zircon Classic Ring</h4>
                </a>
      
                <a href="#" class="showcase-category">jewellery</a>
      
                <div class="price-box">
                  <p class="price">$62.00</p>
                  <del>$65.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/watch-1.jpg" alt="smart watche vital plus" class="showcase-img" width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Smart watche Vital Plus</h4>
                </a>
      
                <a href="#" class="showcase-category">Watches</a>
      
                <div class="price-box">
                  <p class="price">$56.00</p>
                  <del>$78.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/shampoo.jpg" alt="shampoo conditioner packs" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">shampoo conditioner packs</h4>
                </a>
      
                <a href="#" class="showcase-category">cosmetics</a>
      
                <div class="price-box">
                  <p class="price">$20.00</p>
                  <del>$30.00</del>
                </div>
      
              </div>
      
            </div>
      
            <div class="showcase">
      
              <a href="#" class="showcase-img-box">
                <img src="./assets/images/products/jewellery-1.jpg" alt="rose gold peacock earrings" class="showcase-img"
                  width="70">
              </a>
      
              <div class="showcase-content">
      
                <a href="#">
                  <h4 class="showcase-title">Rose Gold Peacock Earrings</h4>
                </a>
      
                <a href="#" class="showcase-category">jewellery</a>
      
                <div class="price-box">
                  <p class="price">$20.00</p>
                  <del>$30.00</del>
                </div>
      
              </div>
      
            </div>
      
          </div>
      
        </div>
      
      </div> -->

    </div>


    <!-- <div class="product-featured">

      <h2 class="title">Deal of the day</h2>

      <div class="showcase-wrapper has-scrollbar">

        <div class="showcase-container">

          <div class="showcase">
            
            <div class="showcase-banner">
              <img src="./assets/images/products/shampoo.jpg" alt="shampoo, conditioner & facewash packs" class="showcase-img">
            </div>

            <div class="showcase-content">
              
              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
              </div>

              <a href="#">
                <h3 class="showcase-title">shampoo, conditioner & facewash packs</h3>
              </a>

              <p class="showcase-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet consectetur Lorem ipsum dolor
              </p>

              <div class="price-box">
                <p class="price">$150.00</p>

                <del>$200.00</del>
              </div>

              <button class="add-cart-btn">add to cart</button>

              <div class="showcase-status">
                <div class="wrapper">
                  <p>
                    already sold: <b>20</b>
                  </p>

                  <p>
                    available: <b>40</b>
                  </p>
                </div>

                <div class="showcase-status-bar"></div>
              </div>

              <div class="countdown-box">

                <p class="countdown-desc">
                  Hurry Up! Offer ends in:
                </p>

                <div class="countdown">

                  <div class="countdown-content">

                    <p class="display-number">360</p>

                    <p class="display-text">Days</p>

                  </div>

                  <div class="countdown-content">
                    <p class="display-number">24</p>
                    <p class="display-text">Hours</p>
                  </div>

                  <div class="countdown-content">
                    <p class="display-number">59</p>
                    <p class="display-text">Min</p>
                  </div>

                  <div class="countdown-content">
                    <p class="display-number">00</p>
                    <p class="display-text">Sec</p>
                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

        <div class="showcase-container">
        
          <div class="showcase">
        
            <div class="showcase-banner">
              <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold diamonds Earring" class="showcase-img">
            </div>
        
            <div class="showcase-content">
        
              <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
              </div>
        
              <h3 class="showcase-title">
                <a href="#" class="showcase-title">Rose Gold diamonds Earring</a>
              </h3>
        
              <p class="showcase-desc">
                Lorem ipsum dolor sit amet consectetur Lorem ipsum
                dolor dolor sit amet consectetur Lorem ipsum dolor
              </p>
        
              <div class="price-box">
                <p class="price">$1990.00</p>
                <del>$2000.00</del>
              </div>
        
              <button class="add-cart-btn">add to cart</button>
        
              <div class="showcase-status">
                <div class="wrapper">
                  <p> already sold: <b>15</b> </p>
        
                  <p> available: <b>40</b> </p>
                </div>
        
                <div class="showcase-status-bar"></div>
              </div>
        
              <div class="countdown-box">
        
                <p class="countdown-desc">Hurry Up! Offer ends in:</p>
        
                <div class="countdown">
                  <div class="countdown-content">
                    <p class="display-number">360</p>
                    <p class="display-text">Days</p>
                  </div>
        
                  <div class="countdown-content">
                    <p class="display-number">24</p>
                    <p class="display-text">Hours</p>
                  </div>
        
                  <div class="countdown-content">
                    <p class="display-number">59</p>
                    <p class="display-text">Min</p>
                  </div>
        
                  <div class="countdown-content">
                    <p class="display-number">00</p>
                    <p class="display-text">Sec</p>
                  </div>
                </div>
        
              </div>
        
            </div>
        
          </div>
        
        </div>

      </div>

    </div> -->



    <!--
      - PRODUCT GRID
    -->

    <!-- <div class="product-main">

      <h2 class="title">New Products</h2>

      <div class="product-grid">

        <div class="showcase">

          <div class="showcase-banner">

            <img src="./assets/images/products/jacket-3.jpg" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
            <img src="./assets/images/products/jacket-4.jpg" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

            <p class="showcase-badge">15%</p>

            <div class="showcase-actions">

              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>

              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>

              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>

              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>

            </div>

          </div>

          <div class="showcase-content">

            <a href="#" class="showcase-category">jacket</a>

            <a href="#">
              <h3 class="showcase-title">Mens Winter Leathers Jackets</h3>
            </a>

            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>

            <div class="price-box">
              <p class="price">$48.00</p>
              <del>$75.00</del>
            </div>

          </div>

        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/shirt-1.jpg" alt="Pure Garment Dyed Cotton Shirt" class="product-img default"
              width="300">
            <img src="./assets/images/products/shirt-2.jpg" alt="Pure Garment Dyed Cotton Shirt" class="product-img hover"
              width="300">
        
            <p class="showcase-badge angle black">sale</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">shirt</a>
        
            <h3>
              <a href="#" class="showcase-title">Pure Garment Dyed Cotton Shirt</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$45.00</p>
              <del>$56.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/jacket-5.jpg" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img default"
              width="300">
            <img src="./assets/images/products/jacket-6.jpg" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img hover"
              width="300">
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">Jacket</a>
        
            <h3>
              <a href="#" class="showcase-title">MEN Yarn Fleece Full-Zip Jacket</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$58.00</p>
              <del>$65.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/clothes-3.jpg" alt="Black Floral Wrap Midi Skirt" class="product-img default"
              width="300">
            <img src="./assets/images/products/clothes-4.jpg" alt="Black Floral Wrap Midi Skirt" class="product-img hover"
              width="300">
        
            <p class="showcase-badge angle pink">new</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">skirt</a>
        
            <h3>
              <a href="#" class="showcase-title">Black Floral Wrap Midi Skirt</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$25.00</p>
              <del>$35.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/shoe-2.jpg" alt="Casual Men's Brown shoes" class="product-img default"
              width="300">
            <img src="./assets/images/products/shoe-2_1.jpg" alt="Casual Men's Brown shoes" class="product-img hover"
              width="300">
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">casual</a>
        
            <h3>
              <a href="#" class="showcase-title">Casual Men's Brown shoes</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$99.00</p>
              <del>$105.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/watch-3.jpg" alt="Pocket Watch Leather Pouch" class="product-img default"
              width="300">
            <img src="./assets/images/products/watch-4.jpg" alt="Pocket Watch Leather Pouch" class="product-img hover"
              width="300">
        
            <p class="showcase-badge angle black">sale</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">watches</a>
        
            <h3>
              <a href="#" class="showcase-title">Pocket Watch Leather Pouch</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$150.00</p>
              <del>$170.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/watch-1.jpg" alt="Smart watche Vital Plus" class="product-img default"
              width="300">
            <img src="./assets/images/products/watch-2.jpg" alt="Smart watche Vital Plus" class="product-img hover" width="300">
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">watches</a>
        
            <h3>
              <a href="#" class="showcase-title">Smart watche Vital Plus</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$100.00</p>
              <del>$120.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/party-wear-1.jpg" alt="Womens Party Wear Shoes" class="product-img default"
              width="300">
            <img src="./assets/images/products/party-wear-2.jpg" alt="Womens Party Wear Shoes" class="product-img hover"
              width="300">
        
            <p class="showcase-badge angle black">sale</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">party wear</a>
        
            <h3>
              <a href="#" class="showcase-title">Womens Party Wear Shoes</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$25.00</p>
              <del>$30.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/jacket-1.jpg" alt="Mens Winter Leathers Jackets" class="product-img default"
              width="300">
            <img src="./assets/images/products/jacket-2.jpg" alt="Mens Winter Leathers Jackets" class="product-img hover"
              width="300">
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">jacket</a>
        
            <h3>
              <a href="#" class="showcase-title">Mens Winter Leathers Jackets</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$32.00</p>
              <del>$45.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/sports-2.jpg" alt="Trekking & Running Shoes - black" class="product-img default"
              width="300">
            <img src="./assets/images/products/sports-4.jpg" alt="Trekking & Running Shoes - black" class="product-img hover"
              width="300">
        
            <p class="showcase-badge angle black">sale</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">sports</a>
        
            <h3>
              <a href="#" class="showcase-title">Trekking & Running Shoes - black</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$58.00</p>
              <del>$64.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/shoe-1.jpg" alt="Men's Leather Formal Wear shoes" class="product-img default"
              width="300">
            <img src="./assets/images/products/shoe-1_1.jpg" alt="Men's Leather Formal Wear shoes" class="product-img hover"
              width="300">
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">formal</a>
        
            <h3>
              <a href="#" class="showcase-title">Men's Leather Formal Wear shoes</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$50.00</p>
              <del>$65.00</del>
            </div>
        
          </div>
        
        </div>

        <div class="showcase">
        
          <div class="showcase-banner">
            <img src="./assets/images/products/shorts-1.jpg" alt="Better Basics French Terry Sweatshorts"
              class="product-img default" width="300">
            <img src="./assets/images/products/shorts-2.jpg" alt="Better Basics French Terry Sweatshorts"
              class="product-img hover" width="300">
        
            <p class="showcase-badge angle black">sale</p>
        
            <div class="showcase-actions">
              <button class="btn-action">
                <ion-icon name="heart-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="eye-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="repeat-outline"></ion-icon>
              </button>
        
              <button class="btn-action">
                <ion-icon name="bag-add-outline"></ion-icon>
              </button>
            </div>
          </div>
        
          <div class="showcase-content">
            <a href="#" class="showcase-category">shorts</a>
        
            <h3>
              <a href="#" class="showcase-title">Better Basics French Terry Sweatshorts</a>
            </h3>
        
            <div class="showcase-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
              <ion-icon name="star-outline"></ion-icon>
            </div>
        
            <div class="price-box">
              <p class="price">$78.00</p>
              <del>$85.00</del>
            </div>
        
          </div>
        
        </div>

      </div>

    </div> -->

  </div>

</div>

</div>

</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
