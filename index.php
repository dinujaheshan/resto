<?php

session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title> Resto </title>
  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style>
    @keyframes blink {
      0% {
        opacity: 1;
      }

      50% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    .blink-text {
      animation: blink 1s infinite;
      margin-left: 100px;
      font-size: 50px;
      font-family: Georgia, 'Times New Roman', Times, 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      color: #3498db;
    }

    .product-grid6,
    .product-grid6 .product-image6 {
      overflow: hidden
    }

    .product-grid6 {
      font-family: 'Open Sans', sans-serif;
      text-align: center;
      position: relative;
      transition: all .5s ease 0s
    }

    .product-grid6:hover {
      box-shadow: 0 0 10px rgba(0, 0, 0, .3)
    }

    .product-grid6 .product-image6 a {
      display: block
    }

    .product-grid6 .product-image6 img {
      width: 100%;
      height: auto;
      transition: all .5s ease 0s
    }

    .product-grid6:hover .product-image6 img {
      transform: scale(1.1)
    }

    .product-grid6 .product-content {
      padding: 12px 12px 15px;
      transition: all .5s ease 0s
    }

    .product-grid6:hover .product-content {
      opacity: 0
    }

    .product-grid6 .title {
      font-size: 20px;
      font-weight: 600;
      text-transform: capitalize;
      margin: 0 0 10px;
      transition: all .3s ease 0s
    }

    .product-grid6 .title a {
      color: #000
    }

    .product-grid6 .title a:hover {
      color: #2e86de
    }

    .product-grid6 .price {
      font-size: 18px;
      font-weight: 600;
      color: #2e86de
    }

    .product-grid6 .price span {
      color: #999;
      font-size: 15px;
      font-weight: 400;
      text-decoration: line-through;
      margin-left: 7px;
      display: inline-block
    }

    .product-grid6 .social {
      background-color: #fff;
      width: 100%;
      padding: 0;
      margin: 0;
      list-style: none;
      opacity: 0;
      transform: translateX(-50%);
      position: absolute;
      bottom: -50%;
      left: 50%;
      z-index: 1;
      transition: all .5s ease 0s
    }

    .product-grid6:hover .social {
      opacity: 1;
      bottom: 20px
    }

    .product-grid6 .social li {
      display: inline-block
    }

    .product-grid6 .social li a {
      color: #909090;
      font-size: 16px;
      line-height: 45px;
      text-align: center;
      height: 45px;
      width: 45px;
      margin: 0 7px;
      border: 1px solid #909090;
      border-radius: 50px;
      display: block;
      position: relative;
      transition: all .3s ease-in-out
    }

    .product-grid6 .social li a:hover {
      color: #fff;
      background-color: #2e86de;
      width: 80px
    }

    .product-grid6 .social li a:after,
    .product-grid6 .social li a:before {
      content: attr(data-tip);
      color: #fff;
      background-color: #2e86de;
      font-size: 12px;
      letter-spacing: 1px;
      line-height: 20px;
      padding: 1px 5px;
      border-radius: 5px;
      white-space: nowrap;
      opacity: 0;
      transform: translateX(-50%);
      position: absolute;
      left: 50%;
      top: -30px
    }

    .product-grid6 .social li a:after {
      content: '';
      height: 15px;
      width: 15px;
      border-radius: 0;
      transform: translateX(-50%) rotate(45deg);
      top: -20px;
      z-index: -1
    }

    .product-grid6 .social li a:hover:after,
    .product-grid6 .social li a:hover:before {
      opacity: 1
    }

    @media only screen and (max-width:990px) {
      .product-grid6 {
        margin-bottom: 30px
      }
    }

    .form-control-borderless {
      border: none;
    }

    .form-control-borderless:hover,
    .form-control-borderless:active,
    .form-control-borderless:focus {
      border: none;
      outline: none;
      box-shadow: none;
    }
  </style>
</head>

<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="#">
    </div>

    <?php include 'header.php'; ?>

    <hr>
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food
                    </h1>
                    <p>
                      Satisfy your cravings instantly with our delectable fast food options, crafted with the finest ingredients to deliver a burst of flavor in every bite.

                      Indulge in a quick and delicious dining experience with our mouthwatering fast food menu, featuring a variety of savory delights that are perfect for those on the go.
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      24 / 7 Service
                    </h1>
                    <p>
                      Indulge your cravings anytime with our food selling website that offers a 24/7 service, ensuring a delectable array of culinary delights available at your fingertips, around the clock. Whether it's a midnight snack or a gourmet breakfast, our platform is dedicated to satisfying your appetite whenever hunger strikes.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Exclusive Offer
                    </h1>
                    <p>
                      Unlock a world of culinary savings with our exclusive offers on the Resto, where tantalizing discounts and special promotions await your taste buds. From enticing first-order deals to loyalty rewards, indulge in a feast of savings as a token of our appreciation for choosing us as your preferred dining companion.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- offer section -->

  <section class="offer_section layout_padding-bottom">
    <div class="offer_container">
      <p class="blink-text">Populer Dishes</p>
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">

              <div class="img-box">
                <img src="images/o1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Tasty Thursdays
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                <a href="">
                  Order Now <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/o2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pizza Days
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="">
                  Order Now <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <!-- end offer section -->
  <!-- food section -->
  <div id="basicSearchResult">



    <div>
      
      <div class="mt-3">
        <div class="col-12">
          <div class="row">
            <div class="col-6 mt-2">
              <input type="text" class="search-input " id="kw" placeholder="Search in Resto...">
              <button class="search-button " onclick="basicSearch(0);" style="border-radius: 5px; width: 200px;">Search</button>
            </div>
            <div class="col-6 ">
              <select class="selector form-control mt-2" id="c" style="height: 45px;">

                <option value="">Select Your Favourite</option>
                <?php

                $category_rs = Database::search("SELECT * FROM `category`");
                $category_num = $category_rs->num_rows;

                for ($x = 0; $x < $category_num; $x++) {

                  $category_data = $category_rs->fetch_assoc();

                ?>

                  <option value="<?php echo $category_data["id"]; ?>">
                    <?php echo $category_data["cat_name"]; ?>
                  </option>

                <?php
                }
                ?>
              </select>

            </div>


          </div>
        </div>
      </div>

    </div>
    <hr/>
    <div class="container ">
    <h2 style="text-align: center;">
        Our Menu
      </h2>
      <div class="container mt-4 ">
        <?php

        $c_rs = Database::search("SELECT * FROM `category`");
        $c_num = $c_rs->num_rows;

        for ($y = 0; $y < $c_num; $y++) {

          $c_data = $c_rs->fetch_assoc();

        ?>

          <!-- category names -->
          <div class="col-12 mt-3 mb-3">
            <a href="#" class="text-decoration-none text-dark fs-3 fw-bold">
              <?php echo $c_data["cat_name"]; ?>
            </a>&nbsp;&nbsp;

          </div>
          <!-- category names -->
          <div class="row border border-success">
            <?php

            $product_rs = Database::search("SELECT * FROM `product` WHERE 
             `category_id`='" . $c_data['id'] . "' LIMIT 4");

            $product_num = $product_rs->num_rows;

            for ($x = 0; $x < $product_num; $x++) {
              $product_data = $product_rs->fetch_assoc();

            ?>
              <div class="col-md-3 col-sm-6 ">
                <div class="product-grid6">

                  <div class="product-image6">
                    <?php

                    $img_rs = Database::search("SELECT * FROM `product_img` WHERE 
                                            `product_id`='" . $product_data['id'] . "'");

                    $img_data = $img_rs->fetch_assoc();

                    ?>

                    <a href="#">
                      <img class="card-img-top img-thumbnail mt-2" src="<?php echo $img_data["img_path"]; ?>" style="height: 200px;">
                    </a>
                  </div>
                  <div class="product-content">
                    <h3 class="title"><?php echo $product_data["title"]; ?></h3>
                    <div class="price">Rs.<?php echo $product_data["price"]; ?>.00

                    </div>
                  </div>
                  <ul class="social">
                    <li><a href="<?php echo "singleproductview.php?id=" . ($product_data["id"]); ?>" data-tip="Buy Now"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                        </svg></a></li>
                    <li><button onclick="addToWatchlist(<?php echo $product_data['id']; ?>);" style="border: none;"><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></button></li>
                    <li><button onclick="addToCart(<?php echo $product_data['id']; ?>)" style="border: none;"><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></button></li>
                  </ul>
                </div>

              </div>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
      </div>

    </div>

    </section>
    <!-- end food section -->

    <!-- about section -->
    <?php require "about.php" ?>
    <!-- end about section -->

    <!-- book section -->
    <?php require "book.php" ?>
    <!-- end book section -->

    

  <!-- footer section -->
  <?php require "footer.php" ?>
  <!-- footer section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="bootstrap.bundle.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="script.js"></script>

</body>

</html>