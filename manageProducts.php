<?php

session_start();

require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Product Management - Resto</title>
  <link rel="icon" href="resources/food-svgrepo-com.svg">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Roboto', sans-serif;
    }

    .navbar {
      background-color: #343a40;
    }

    .navbar-brand {
      color: #fff;
    }

    .navbar-brand:hover {
      color: #adb5bd;
    }

    .container {
      margin-top: 20px;
    }

    .table-hover tbody tr:hover {
      background-color: #f1f3f5;
    }

    .form-control:focus {
      border-color: #0d6efd;
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn-primary {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
      border-color: #0a58ca;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Product Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">

            <a class="nav-link" href="adminpanel.php"> <i class="fa-solid fa-rotate-left"></i> Dashboard</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="my-4">Manage Products</h2>
        <!-- User Table -->
        <table class="table table-hover">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product Image</th>
              <th scope="col">Title</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Registered Date</th>
            </tr>
          </thead>

          <?php


          $query = "SELECT * FROM `product`";
          $pageno;

          if (isset($_GET["page"])) {
            $pageno = $_GET["page"];
          } else {
            $pageno = 1;
          }

          $product_rs = Database::search($query);
          $product_num = $product_rs->num_rows;

          $results_per_page = 20;
          $number_of_pages = ceil($product_num / $results_per_page);

          $page_results = ($pageno - 1) * $results_per_page;
          $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

          $selected_num = $selected_rs->num_rows;

          for ($x = 0; $x < $selected_num; $x++) {
            $selected_data = $selected_rs->fetch_assoc();

          ?>

            <tbody>
              <tr>
                <th scope="row"><span class="fs-4 text-dark"><?php echo $x + 1; ?></span></th>
                <td> <?php
                      $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                      $image_num = $image_rs->num_rows;
                      if ($image_num == 0) {
                      ?>
                    <img src="resource/mobile_images/iphone12.jpg" style="height: 100px;margin-left: 80px;" />
                  <?php
                      } else {
                        $image_data = $image_rs->fetch_assoc();
                  ?>
                    <img src="<?php echo $image_data["img_path"]; ?>" style="height: 100px;margin-left: 80px;" />
                  <?php
                      }

                  ?>
                <td><span class="fs-5 fw-bold text-dark"><?php echo $selected_data["title"]; ?></span></td>
                <td> <span class="fs-4 fw-bold">Rs. <?php echo $selected_data["price"]; ?> .00</span></td>
                <td><?php echo $selected_data["qty"]; ?></td>
                <td><?php echo $selected_data["datetime_added"]; ?></td>
                <td>

                  <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                    <?php

                    if ($selected_data["status_status_id"] == 1) {
                    ?>
                      <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-danger" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Block</button>
                    <?php
                    } else {
                    ?>
                      <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-success" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Unblock</button>
                    <?php

                    }

                    ?>
                  </div>
                </td>
              </tr>
            </tbody>
          <?php
          }
          ?>
        </table>
        <!--  -->
        <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-lg justify-content-center">
              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php

              for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
              ?>
                  <li class="page-item active">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
                <?php
                } else {
                ?>
                  <li class="page-item">
                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                  </li>
              <?php
                }
              }

              ?>

              <li class="page-item">
                <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
        <!--  -->
      </div>
    </div>
    <hr>
      
  </div>
  
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>

</html>