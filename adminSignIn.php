<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #222D32;
      font-family: 'Roboto', sans-serif;
    }

    .login-box {
      margin-top: 75px;
      height: auto;
      background: #1A2226;
      text-align: center;
      box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
    }

    .login-key {
      height: 100px;
      font-size: 80px;
      line-height: 100px;
      background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
      -webkit-text-fill-color: transparent;
    }

    .login-title {
      margin-top: 15px;
      text-align: center;
      font-size: 30px;
      letter-spacing: 2px;
      margin-top: 15px;
      font-weight: bold;
      color: #ECF0F5;
    }

    .login-form {
      margin-top: 25px;
      text-align: left;
    }

    input[type=text] {
      background-color: #1A2226;
      border: none;
      border-bottom: 2px solid #0DB8DE;
      border-top: 0px;
      border-radius: 0px;
      font-weight: bold;
      outline: 0;
      margin-bottom: 20px;
      padding-left: 0px;
      color: #ECF0F5;
    }

    input[type=password] {
      background-color: #1A2226;
      border: none;
      border-bottom: 2px solid #0DB8DE;
      border-top: 0px;
      border-radius: 0px;
      font-weight: bold;
      outline: 0;
      padding-left: 0px;
      margin-bottom: 20px;
      color: #ECF0F5;
    }

    .form-group {
      margin-bottom: 40px;
      outline: 0px;
    }

    .form-control:focus {
      border-color: inherit;
      -webkit-box-shadow: none;
      box-shadow: none;
      border-bottom: 2px solid #0DB8DE;
      outline: 0;
      background-color: #1A2226;
      color: #ECF0F5;
    }

    input:focus {
      outline: none;
      box-shadow: 0 0 0;
    }

    label {
      margin-bottom: 0px;
    }

    .form-control-label {
      font-size: 10px;
      color: #6C6C6C;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .btn-outline-primary {
      border-color: #0DB8DE;
      color: #0DB8DE;
      border-radius: 0px;
      font-weight: bold;
      letter-spacing: 1px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    }

    .btn-outline-primary:hover {
      background-color: #0DB8DE;
      right: 0px;
    }

    .login-btm {
      float: left;

    }

    .login-button {
      padding-right: 0px;
      text-align: right;
      margin-bottom: 25px;

    }

    .login-text {
      text-align: left;
      padding-left: 0px;
      color: #A2A4A4;
    }

    .loginbttm {
      padding: 0px;
    }
  </style>
  <title>Admin Sign In | Resto</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-2">

      </div>
      <div class="col-lg-6 col-md-8 login-box">
        <div class="img sign-up">
          <img src="resources/resto-high-resolution-logo-black-on-transparent-background.svg" alt="#" width="400px">
        </div>
        <div class="col-lg-12 login-title">
          Welcome to Resto Admins
        </div>

        <div class="col-lg-12 login-form">
          <div class="col-lg-12 login-form">
            <form>

              <div class="form-group">
                <label class="form-control-label">Email</label>
                <input type="text" class="form-control" placeholder="Put Your Email Here..." id="e">
              </div>

              <div class="col-lg-12 loginbttm">
                <div class="col-lg-6 login-btm login-text">
                  <!-- Error Message -->
                </div>
                <div class="col-lg-6 login-btm login-button">
                  <button type="button" class="btn btn-outline-primary" style="border-radius :5px;" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="adminVerification();">Send Verification Code</button>

                </div>
                <div class="col-lg-6 login-btm login-button">
                  <button type="submit" class="btn btn-outline-primary" style="border-radius :5px;"><a class="text-decoration-none text-light" href="signInandsignUp.php"> Customer Login</a></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-2">


        </div>
      </div>

      <!--  -->

      <!-- Modal -->


      <!-- Modal -->
      <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label class="form-label">Enter Your Verification Code</label>
              <input type="text" class="form-control" id="vcode">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
            </div>
          </div>
        </div>
      </div>


      <!--  -->
    </div>






    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</body>

</html>