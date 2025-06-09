<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link rel="shortcut icon" href="images/favicon.png" type="">
  <title>Book Table | Resto </title>
  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=AR+One+Sans&family=Comfortaa:wght@500&family=Tilt+Neon&family=Young+Serif&display=swap" rel="stylesheet">

  <style>
    .book {
      cursor: pointer;
      font-family: 'AR One Sans', sans-serif;
      font-family: 'Comfortaa', sans-serif;
      font-family: 'Tilt Neon', sans-serif;
      font-family: 'Young Serif', serif;
      background-color: orange;
      font-size: 22px;
      padding: 15px 32px;
      border-radius: 5px;
    }

    .book:hover{
      background:#0694a7 ;
      color: white;
    }
  </style>

</head>

<body class="sub_page">
  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book Your Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="First Name" id="fname" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Last Name" id="lname" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" id="mobile" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder=" Email" id="email" />
              </div>
              <div>

                <input type="email" class="form-control" placeholder=" How Many Persons" id="person" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="yyyy-mm-dd" id="date">
              </div>
              <div class="btn_box">
                <span onclick="bookTable()" class="book">
                  Book Now
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <img src="resources/giphy.gif" alt="" width="700px">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->



  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="script.js"></script>


</body>

</html>