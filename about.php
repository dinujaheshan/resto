<!DOCTYPE html>
<html>

<head>
 
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <title> About | Resto </title>
  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    .intro-text,
    .extra-text {
      font-size: 16px;
      line-height: 1.5;
    }

    .extra-text {
      display: none;
    }

    #read-more-btn {
      background-color: orange;
      color: white;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
    }
  </style>
</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
  </div>

  <!-- about section -->

  <section class="about_section layout_padding mt-3">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Resto
              </h2>
            </div>
            <p class="intro-text" id="intro">
              Welcome to Resto, where culinary delights meet the convenience of modern technology! We understand that the heart of every home lies in its kitchen, and our mission is to bring the world's finest ingredients and culinary treasures right to your fingertips.</p>
            <button onclick="toggleReadMore()" id="read-more-btn">Read More</button>
            <p class="extra-text" id="extra-text">
              At Resto, we have curated a seamless food e-commerce experience that goes beyond just shopping; it's a journey through flavors, cultures, and the art of gastronomy. Whether you're a seasoned chef or an aspiring home cook, our platform is designed to cater to your every culinary need.

              Explore a vast marketplace featuring a diverse range of fresh, organic produce, exotic spices, gourmet treats, and kitchen essentials sourced from local artisans and global purveyors. Our user-friendly interface ensures that you can effortlessly navigate through a treasure trove of culinary delights, making your shopping experience a joyous adventure.


              With a commitment to quality and authenticity, we bring you the best in the world of food. Discover rare ingredients, access exclusive recipes, and elevate your culinary skills with the finest products handpicked just for you.

              But it's not just about the ingredients; it's about the experience. Enjoy the convenience of doorstep delivery, personalized recommendations, and a seamless ordering process that puts you in control of your kitchen. Our commitment to freshness, sustainability, and customer satisfaction is at the heart of everything we do.

              Join us on a gastronomic journey with [Application Name]. Because when it comes to good food, we believe it should be an experience, not just a meal. Welcome to a world where the love for food meets the ease of technology. Happy cooking!
            </p>



          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script>
    function toggleReadMore() {
      var extraText = document.getElementById('extra-text');
      var btnText = document.getElementById('read-more-btn');

      if (extraText.style.display === 'none') {
        extraText.style.display = 'block';
        btnText.innerHTML = 'Read Less';
      } else {
        extraText.style.display = 'none';
        btnText.innerHTML = 'Read More';
      }
    }
  </script>
</body>

</html>