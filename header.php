<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .search-container {
      max-width: 600px;
      margin: 50px auto;
      text-align: center;
    }

    .search-input {
      width: 60%;
      padding: 10px;
      border-radius: 5px 0 0 5px;
      border: 1px solid #ced4da;
    }

    .search-button,
    .selector {
      padding: 10px;
      border-radius: 0 5px 5px 0;
    }

    .search-button {
      background-color: #007bff;
      color: #fff;
      border: 1px solid #007bff;
      cursor: pointer;
    }
    
  </style>

</head>

<body>
  <!-- header  -->
  <header class="header_section ">
    <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="#">
          <img src="resources/resto-high-resolution-logo-color-on-transparent-background.svg" alt="#" width="100px">
        </a>



        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  mx-auto mt-3">
            <li class="nav-item">
              <a class="nav-link " href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg></span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="index.php" style="font-size: 15px;">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#" style="font-size: 15px;">Contact</span></a>
            </li>
            <div >
                <?php
                if (isset($_SESSION["u"])) {
                  $email = $_SESSION["u"]["email"];
                  $session_data = $_SESSION["u"];
                    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `users_email`='" . $email . "'");
                    $image_data = $image_rs->fetch_assoc();
                ?>
                
                <?php

if (empty($image_data["path"])) {
?>
                     <img src="resources/user-circle-svgrepo-com (1).svg" width="50px" class="rounded-circle ml-5 " style="border: solid;border-color: white;" alt=""> <span class="badge badge-danger ">Hi,   <?php echo $session_data["fname"]." ".$session_data["lname"]; ?></span>
                  <?php
}else{
  ?>
   <img src="<?php echo $image_data["path"]; ?>" width="50px" height="60px" class="rounded-circle ml-5 " style="border: solid;border-color: white;" alt=""> <span class="badge badge-danger ">Hi,   <?php echo $session_data["fname"]." ".$session_data["lname"]; ?></span>

<?php
}
?>
                </span> 
               
             <button class="ml-5 btn btn-warning "  style="border-radius: 5px;"><a class="" onclick="signout();" style="font-size: 14px;cursor: pointer;">Sign Out</a></button>
            </li>
                <?php
                } else {
                ?>
                    <a href="signInandsignUp.php" class="text-decoration-none text-warning ml-2 mt-5" style="font-size: 18px;margin-top: 20px;">
                        Sign In/Sign Up
                    </a> 
                <?php
                }
                ?>
          
          </ul>


          <div class="user_option">
            <a href="userProfile.php" class="user_link">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
            </a>


            <a class="nav-link" href="watchlist.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="orange" class=" bi bi-bag-heart-fill" viewBox="0 0 16 16" style="color: white;">
                <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
              </svg> </span></a>

          </div>
        </div>

      </nav>
    </div>
  </header>

  <!-- end header section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"> </script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="bootstrap.bundle.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="script.js"></script>

</body>

</html>