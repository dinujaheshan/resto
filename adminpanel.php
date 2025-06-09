<?php

session_start();

require "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel | Resto</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" href="resources/food-svgrepo-com.svg">
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h5 class="text-white"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h5>

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                        <li><a class="dropdown-item" href="#!" onclick="adminsignout();">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link " href="manageUsers.php">
                                        User Management

                                    </a>

                                    <a class="nav-link collapsed" href="manageProducts.php" >
                                        Product Management

                                    </a>

                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="sellingHistory.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Sales Record
                            </a>

                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Daily Earnings

                                    </div>
                                    <?php

                                    $today = date("Y-m-d");
                                    $thismonth = date("m");
                                    $thisyear = date("Y");

                                    $a = "0";
                                    $b = "0";
                                    $c = "0";
                                    $e = "0";
                                    $f = "0";

                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                    $invoice_num = $invoice_rs->num_rows;

                                    for ($x = 0; $x < $invoice_num; $x++) {
                                        $invoice_data = $invoice_rs->fetch_assoc();

                                        $f = $f + $invoice_data["qty"]; //total qty

                                        $d = $invoice_data["date"];
                                        $splitDate = explode(" ", $d); //separate date from time
                                        $pdate = $splitDate[0]; //sold date

                                        if ($pdate == $today) {
                                            $a = $a + $invoice_data["total"];
                                            $c = $c + $invoice_data["qty"];
                                        }

                                        $splitMonth = explode("-", $pdate); //separate date as year,month & date
                                        $pyear = $splitMonth[0]; //year
                                        $pmonth = $splitMonth[1]; //month

                                        if ($pyear == $thisyear) {
                                            if ($pmonth == $thismonth) {
                                                $b = $b + $invoice_data["total"];
                                                $e = $e + $invoice_data["qty"];
                                            }
                                        }
                                    }

                                    ?>
                                    <span class="fs-5 " style="margin-left: 5px;">Rs. <?php echo $a; ?> .00</span>
                                    <hr>


                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Monthly Earnings</div>
                                    <span class="fs-5" style="margin-left: 5px;">Rs. <?php echo $b; ?> .00</span>
                                    <hr>

                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">

                                    <div class="card-body">Monthly Sellings</div>
                                    <span class="fs-5" style="margin-left: 5px;"><?php echo $e; ?> Items</span>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">

                                    <div class="card-body">Today Sellings </div>
                                    <span class="fs-5" style="margin-left: 5px;"><?php echo $c; ?> Items</span>
                                    <hr>

                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6">
                                <div class="card bg-success text-white mb-4">


                                    <div class="card-body"> Active Time</div>
                                    <?php

                                    $start_date = new DateTime("2024-06-05 12:00:00");

                                    $tdate = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $tdate->setTimezone($tz);

                                    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                    $difference = $end_date->diff($start_date);

                                    ?>
                                    <label class="form-label fs-4 fw-bold text-warning " style="margin-left: 250px;">
                                        <?php

                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds ";
                                        ?>
                                        <hr>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">

                                    <div class="card-body">Total Engagements </div>

                                    <?php
                                    $user_rs = Database::search("SELECT * FROM `users`");
                                    $user_num = $user_rs->num_rows;
                                    ?>
                                    <span class="fs-5" style="margin-left: 5px;"><?php echo $user_num; ?> Members</span>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">


                                    <div class="card-body"> Total Sellings</div>
                                    <span class="fs-5" style="margin-left: 5px;"><?php echo $f; ?> Items</span>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-burger"></i>
                                        Top-Selling Item
                                    </div>
                                    <?php

                                    $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
                                FROM `invoice` WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY 
                                `value_occurence` DESC LIMIT 1");

                                    $freq_num = $freq_rs->num_rows;
                                    if ($freq_num > 0) {
                                        $freq_data = $freq_rs->fetch_assoc();

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $freq_data["product_id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE 
                                    `product_id`='" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                                        $qty_data = $qty_rs->fetch_assoc();

                                    ?>
                                        <div class="col-12 text-center ">
                                            <img src="<?php echo $image_data["img_path"]; ?>" class="img-fluid rounded-top" style="height: 250px;margin-top: 10px;" />
                                        </div>
                                        <div class="col-12 text-center my-3">
                                            <span class="fs-5 fw-bold"><?php echo $product_data["title"]; ?></span><br />
                                            <span class="fs-6"><?php echo $qty_data["qty_total"]; ?> items</span><br />
                                            <span class="fs-6">Rs. <?php echo $qty_data["qty_total"] * $product_data["price"]; ?> .00</span>
                                        </div>
                                    <?php

                                    } else {
                                    ?>
                                        <div class="col-12 text-center ">
                                            <i class="fa-solid fa-empty-set" style="height: 200px;margin-top: 50px;"></i>
                                        </div>
                                        <div class="col-12 text-center my-3">
                                            <span class="fs-5 fw-bold">-----</span><br />
                                            <span class="fs-6">--- items</span><br />
                                            <span class="fs-6">Rs. ----- .00</span>
                                        </div>
                                    <?php
                                    }

                                    ?>

                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fa-solid fa-person"></i>
                                        Top Merchant
                                    </div>
                                    <?php
                                if ($freq_num > 0) {

                                    $profile_rs = Database::search("SELECT * FROM `profile_img` WHERE 
                                `users_email`='" . $product_data["users_email"] . "'");
                                    $profile_data = $profile_rs->fetch_assoc();

                                    $user_rs1 = Database::search("SELECT * FROM `users` WHERE `email`='" . $product_data["users_email"] . "'");
                                    $user_data1 = $user_rs1->fetch_assoc();

                                ?>
                                    
                                    <div class="col-12 text-center ">
                                        <img src="<?php echo $profile_data["path"]; ?>" class="img-fluid rounded-top" style="height: 250px;margin-top: 10px;" />
                                    </div>
                                    <div class="col-12 text-center my-3">
                                        <span class="fs-5 fw-bold"><?php echo $user_data1["fname"]." ".$user_data1["lname"]; ?></span><br />
                                        <span class="fs-6"><?php echo $user_data1["email"]; ?></span><br />
                                        <span class="fs-6"><?php echo $user_data1["mobile"]; ?></span>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    
                                    <div class="col-12 text-center">
                                    <i class="fa-solid fa-empty-set" style="height: 200px;margin-top: 50px;"></i>
                                    </div>
                                    <div class="col-12 text-center my-3">
                                        <span class="fs-5 fw-bold">----- -----</span><br />
                                        <span class="fs-6">-----</span><br />
                                        <span class="fs-6">----------</span>
                                    </div>
                                <?php
                                }


                                ?>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    echo ("You are Not a Valid User");
}
?>