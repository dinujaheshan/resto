<?php

require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Selling History - Resto</title>
    <!-- Bootstrap CSS -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="icon" href="resources/food-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <a class="navbar-brand" href="#">Selling History</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminpanel.php"><i class="fa-solid fa-rotate-left"></i> Dashboard</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="col-12 col-lg-3 mt-3 mb-3" style="margin-left: 600px;">
        <label class="form-label fs-5">Find by Invoice Number </label>
        <input type="text" class="form-control fs-5" id="searchtxt" onkeyup="searchInvoiceId();" />
    </div>
    <hr>
    <!-- Main Container -->
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- User Table -->
                <div id="viewArea">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Invoice ID</th>
                                <th scope="col">Product</th>
                                <th scope="col">Buyer</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM `invoice`";
                            $pageno;

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $invoice_rs = Database::search($query);
                            $invoice_num = $invoice_rs->num_rows;

                            $results_per_page = 20;
                            $number_of_pages = ceil($invoice_num / $results_per_page);

                            $page_results = ($pageno - 1) * $results_per_page;
                            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                            $selected_num = $selected_rs->num_rows;

                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();

                            ?>
                                <tr>
                                    <th scope="row"> <label class="form-label fs-5 fw-bold text-dark mt-1 mb-1"><?php echo $selected_data["id"]; ?></label></th>
                                    <?php
                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $selected_data["product_id"] . "'");
                                    $product_data = $product_rs->fetch_assoc();
                                    ?>
                                    <td><label class="form-label fs-5 fw-bold text-black mt-1 mb-1"><?php echo $product_data["title"]; ?></label></td>
                                    <?php
                                    $user_rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $selected_data["users_email"] . "'");
                                    $user_data = $user_rs->fetch_assoc();
                                    ?>
                                    <td> <label class="form-label fs-5 fw-bold text-dark mt-1 mb-1">
                                            <?php echo $user_data["fname"] . " " . $user_data["lname"]; ?>
                                        </label></td>
                                    <td> <label class="form-label fs-5 fw-bold text-black mt-1 mb-1">Rs. <?php echo $selected_data["total"]; ?> .00</label></td>
                                    <td> <label class="form-label fs-5 fw-bold text-dark mt-1 mb-1"><?php echo $selected_data["qty"]; ?></label></td>
                                </tr>
                        </tbody>
                </div>
            <?php

                            }
            ?>
            </table>
            <!--  -->
            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
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
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    
</body>

</html>