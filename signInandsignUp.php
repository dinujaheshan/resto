<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <title>Log In | Resto</title>
  <style>
    :root {
      --primary-color: #4EA685;
      --secondary-color: #57B894;
      --black: #000000;
      --white: #ffffff;
      --gray: #efefef;
      --gray-2: #757575;

      --facebook-color: #4267B2;
      --google-color: #DB4437;
      --twitter-color: #1DA1F2;
      --insta-color: #E1306C;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');

    * {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100vh;
      overflow: hidden;
      background: url("resources/pexels-lukas-616401.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      position: relative;
      min-height: 100vh;
      overflow: hidden;

    }

    .row {
      display: flex;
      flex-wrap: wrap;
      height: 100vh;
    }

    .col {
      width: 50%;
    }

    .align-items-center {
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .form-wrapper {
      width: 100%;
      max-width: 28rem;
    }

    .form {
      padding: 1rem;
      backdrop-filter: blur(100px);
      border-radius: 1.5rem;
      width: 100%;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      transform: scale(0);
      transition: .5s ease-in-out;
      transition-delay: 1s;
      border-style: solid;
      border-color: #efefef;
      border-radius: 10px;
    }

    .input-group {
      position: relative;
      width: 100%;
      margin: 1rem 0;
      color: black;
      border-radius: 2px;
    }

    .gender {
      position: relative;
      width: 100%;
      margin: 1rem 0;
      padding: 1rem 3rem;
      font-size: 1rem;
      background-color: var(--gray);
      border-radius: .6rem;
      border: 0.125rem solid var(--white);
      border: 0.125rem solid var(--primary-color);
      border-radius: 10px;
    }

    .button {
      cursor: pointer;
      border-radius: 4px;
      background: #f9b7a4;
      background: -webkit-linear-gradient(#f9b7a4, #e7c6ad);
      background: -moz-linear-gradient(#f9b7a4, #e7c6ad);

      height: 10px;
      width: 10px;
    }


    .input-group input {
      width: 100%;
      padding: 1rem 3rem;
      font-size: 1rem;
      backdrop-filter: blur(2px);
      border-radius: .5rem;
      border: black;
      outline: none;
    }

    .input-group input:focus {
      border: 0.125rem solid var(--primary-color);
    }

    .form button {
      cursor: pointer;
      width: 100%;
      padding: .6rem 0;
      border-radius: .5rem;
      border: none;
      background-color: var(--primary-color);
      color: var(--white);
      font-size: 1.2rem;
      outline: none;
    }

    .form p {
      margin: 1rem 0;
      font-size: .7rem;
    }

    .flex-col {
      flex-direction: column;
    }

    .social-list {
      margin: 2rem 0;
      padding: 1rem;
      border-radius: 1.5rem;
      width: 100%;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      transform: scale(0);
      transition: .5s ease-in-out;
      transition-delay: 1.2s;
    }

    .social-list>div {
      color: var(--white);
      margin: 0 .5rem;
      padding: .7rem;
      cursor: pointer;
      border-radius: .5rem;
      cursor: pointer;
      transform: scale(0);
      transition: .5s ease-in-out;
    }

    .social-list>div:nth-child(1) {
      transition-delay: 1.4s;
    }

    .social-list>div:nth-child(2) {
      transition-delay: 1.6s;
    }

    .social-list>div:nth-child(3) {
      transition-delay: 1.8s;
    }

    .social-list>div:nth-child(4) {
      transition-delay: 2s;
    }

    .social-list>div>i {
      font-size: 1.5rem;
      transition: .4s ease-in-out;
    }

    .social-list>div:hover i {
      transform: scale(1.5);
    }

    .facebook-bg {
      background-color: var(--facebook-color);
    }

    .google-bg {
      background-color: var(--google-color);
    }

    .twitter-bg {
      background-color: var(--twitter-color);
    }

    .insta-bg {
      background-color: var(--insta-color);
    }

    .pointer {
      cursor: pointer;
    }

    .container.sign-in .form.sign-in,
    .container.sign-in .social-list.sign-in,
    .container.sign-in .social-list.sign-in>div,
    .container.sign-up .form.sign-up,
    .container.sign-up .social-list.sign-up,
    .container.sign-up .social-list.sign-up>div {
      transform: scale(1);
    }

    .content-row {
      position: absolute;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 6;
      width: 100%;
    }




    .text {
      margin: 4rem;
      color: var(--white);
    }

    .text h2 {
      font-size: 3.5rem;
      font-weight: 800;
      margin: 2rem 0;
      transition: 1s ease-in-out;
    }

    .text p {
      font-weight: 600;
      transition: 1s ease-in-out;
      transition-delay: .2s;
    }

    .img img {
      width: 30vw;
      transition: 1s ease-in-out;
      transition-delay: .4s;
    }

    .text.sign-in h2,
    .text.sign-in p,
    .img.sign-in img {
      transform: translateX(-250%);
    }

    .text.sign-up h2,
    .text.sign-up p,
    .img.sign-up img {
      transform: translateX(250%);
    }

    .container.sign-in .text.sign-in h2,
    .container.sign-in .text.sign-in p,
    .container.sign-in .img.sign-in img,
    .container.sign-up .text.sign-up h2,
    .container.sign-up .text.sign-up p,
    .container.sign-up .img.sign-up img {
      transform: translateX(0);
    }

    /* BACKGROUND */

    .container::before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      height: 100vh;
      width: 300vw;
      transform: translate(35%, 0);
      /*background-image: linear-gradient(-45deg, var(--primary-color) 0%, var(--secondary-color) 100%);*/
      transition: 1s ease-in-out;
      z-index: 6;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border-bottom-right-radius: max(50vw, 50vh);
      border-top-left-radius: max(50vw, 50vh);
    }

    .container.sign-in::before {
      transform: translate(0, 0);
      right: 50%;
    }

    .container.sign-up::before {
      transform: translate(100%, 0);
      right: 50%;
    }

    .r {
      margin-right: 250px;
    }

    /* RESPONSIVE */

    @media only screen and (max-width: 425px) {

      .container::before,
      .container.sign-in::before,
      .container.sign-up::before {
        height: 100vh;
        border-bottom-right-radius: 0;
        border-top-left-radius: 0;
        z-index: 0;
        transform: none;
        right: 0;
      }

      /* .container.sign-in .col.sign-up {
        transform: translateY(100%);
    } */

      .container.sign-in .col.sign-in,
      .container.sign-up .col.sign-up {
        transform: translateY(0);
      }

      .content-row {
        align-items: flex-start !important;
      }

      .content-row .col {
        transform: translateY(0);
        background-color: unset;
      }

      .col {
        width: 100%;
        position: absolute;
        padding: 2rem;
        background-color: var(--white);
        border-top-left-radius: 2rem;
        border-top-right-radius: 2rem;
        transform: translateY(100%);
        transition: 1s ease-in-out;
      }

      .row {
        align-items: flex-end;
        justify-content: flex-end;
      }

      .form,
      .social-list {
        box-shadow: none;
        margin: 0;
        padding: 0;
      }

      .text {
        margin: 0;
      }

      .text p {
        display: none;
      }

      .text h2 {
        margin: .5rem;
        font-size: 2rem;
      }
    }
  </style>
</head>

<body>
  <div id="container" class="container">
    <!-- FORM SECTION -->
    <div class="row">
      <!-- SIGN UP -->

      <div class="col align-items-center flex-col sign-up">

        <div class="form-wrapper align-items-center">

          <div class="form sign-up">
            <h2>Create a New Account</h2>

            <div class="input-group">
              <input type="text" placeholder="Fisrt name" id="fname">
            </div>
            <div class="input-group">
              <input type="text" placeholder="Last name" id="lname">
            </div>
            <div class="input-group">
              <input type="email" placeholder="Email" id="email">
            </div>
            <div class="input-group">
              <input type="password" placeholder="Password" id="password">
            </div>
            <div class="input-group">
              <input type="text" placeholder="Mobile" id="mobile">
            </div>
            <div class="input-group">
              <select class="gender" id="gender">
                <option value="0">Select Your Gender</option>
                <?php
                require "connection.php";

                $rs = Database::search("SELECT * FROM `gender`");
                $n = $rs->num_rows;

                for ($x = 0; $x < $n; $x++) {
                  $d = $rs->fetch_assoc();

                ?>

                  <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                <?php

                }

                ?>
              </select>
            </div>

            <button onclick="signUp();">
              Sign up
            </button>
            <p>
              <span>
                Already have an account?
              </span>
              <b onclick="toggle()" class="pointer">
                Sign in here
              </b>
            </p>
          </div>
        </div>

      </div>
      <!-- END SIGN UP -->

      <!-- SIGN IN -->
      <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
          <div class="form sign-in">
            <h2>Sign In</h2>
            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email"])) {
              $email = $_COOKIE["email"];
            }

            if (isset($_COOKIE["password"])) {
              $password = $_COOKIE["password"];
            }
            ?>

            <div class="input-group">

              <input type="email" id="email2" placeholder="email" value="<?php echo $email; ?>">
            </div>
            <div class="input-group">

              <input type="password" id="password2" placeholder="Password" value="<?php echo $password; ?>">
            </div>
            <div class="form-check" style="margin-top: 2px;">
              <input class="form-check-input " type="checkbox" id="rememberme" style="border-color: black;" />
              <label class="form-check-label">Remember Me</label>
            </div>
            <button onclick="signin();">
              <a href="#" style="text-decoration: none;color:white;">
                Sign in</a>
            </button>

            <div class="col-6 text-end">
              <a href="#" class="link-primary " onclick="forgotPassword();">Forgotton Password?</a>
            </div>

            <p>
              <span>
                Don't have an account?
              </span>
              <b onclick="toggle()" class="pointer">
                Sign up here
              </b>
            </p>
          </div>
        </div>
        <div class="form-wrapper">

        </div>
      </div>
      <!-- END SIGN IN -->
      <!-- modal -->
      <div class="modal" tabindex="-1" id="forgotPasswordModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Forgot Password</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <form>
                <div class="form-group">
                  <label for="password"> New Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="np" placeholder=" password" style="border-style: solid;border-color:black;border-width: 1px;">
                    <div class="input-group-append">
                      <span class="input-group-text password-toggle-btn" style="height: 100px;border-style: solid;border-color:black;" onclick="togglePassword()">
                        <i class="fa fa-eye" id="e1"></i>
                      </span>
                    </div>
                  </div>
                  <label for="password">Retype new Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="rnp" placeholder="password" style="border-style: solid;border-color:black;border-width: 1px">
                    <div class="input-group-append">
                      <span class="input-group-text password-toggle-btn" style="height: 100px;border-style: solid;border-color:black;" onclick="togglePassword2()">
                        <i class="fa fa-eye" id="e2"></i>
                      </span>
                    </div>
                  </div>
                </div>

              </form>

              <div class="input-wrap">
                <label>Verification Code</label>
                <input type="text" class="input-field" required id="vc" style="width: 470px;" />

              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset Password</button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->

    </div>
    <!-- END FORM SECTION -->
    <!-- CONTENT SECTION -->
    <div class="row content-row">
      <!-- SIGN IN CONTENT -->
      <div class="col align-items-center flex-col">
        <div class="text sign-in">

          <h2 style="color: #000000;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Welcome to Resto
          </h2>
          <div class="img sign-in">
            <img src="resources/resto-high-resolution-logo-black-on-transparent-background.svg" alt="#" width="40px">
          </div>



        </div>


      </div>
      <!-- END SIGN IN CONTENT -->
      <!-- SIGN UP CONTENT -->
      <div class="col align-items-center flex-col">

        <div class="text sign-up">

          <h2 style="color: #000000;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
            Join with us
          </h2>

          <div class="img sign-up">
            <img src="resources/resto-high-resolution-logo-black-on-transparent-background.svg" alt="#" width="100px">
          </div>



        </div>
      </div>
      <!-- END SIGN UP CONTENT -->

    </div>
    <!-- END CONTENT SECTION -->

  </div>
  <script src="bootstrap.bundle.js"></script>



  <script>
    let container = document.getElementById('container')

    toggle = () => {
      container.classList.toggle('sign-in')
      container.classList.toggle('sign-up')
    }

    setTimeout(() => {
      container.classList.add('sign-in')
    }, 200)
  </script>
  <script src="script.js"></script>
</body>

</html>