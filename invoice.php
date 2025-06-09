<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto | Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resources/food-svgrepo-com.svg">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(121, 169, 197, .92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }
    </style>
</head>

<body>

    <?php require "header.php" ?>
    <div class="page-content container  border-top border border-primary mb-4 mt-2 ">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
            </h1>

            <div class="page-tools border-top">
                <div class="action-buttons">
                    <a class="btn bg-bg-secondary btn-light mx-px text-95" href="#" data-title="Print" onclick="printInvoice();">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2 "></i>
                        Print
                    </a>

                </div>
            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12" id="page">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <img src="resources/resto-high-resolution-logo-black-on-transparent-background.svg" alt="#" width="150px">

                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <?php
                        if (isset($_SESSION["u"])) {
                            $umail = $_SESSION["u"]["email"];
                            $oid = $_GET["id"];

                        ?>

                            <div class="col-sm-6">
                                <div>
                                    <span class="text-sm text-grey-m2 align-middle ">To:</span>


                                    <?php

                                    $address_rs = Database::search("SELECT * FROM `users_has_address` WHERE `users_email`='" . $umail . "'");
                                    $address_data = $address_rs->fetch_assoc();


                                    ?>

                                    <span class="text-600 text-110 text-blue align-middle"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
                                </div>
                                <div class="text-grey-m2 ml-4">
                                    <div class="my-1">
                                        <?php echo $address_data["line1"] . " , " . $address_data["line2"]; ?>
                                    </div>

                                    <span><?php echo $umail; ?></span>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                <hr class="d-sm-none" />
                                <div class="text-grey-m2">
                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                        Invoice
                                    </div>
                                    <?php

                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                    $invoice_data = $invoice_rs->fetch_assoc();

                                    ?>
                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?php echo $invoice_data["id"]; ?></div>

                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span><?php echo $invoice_data["date"]; ?></div>


                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="mt-4">
                                <div class="row text-600 text-white bgc-default-tp1 py-25">

                                    <div class="d-none d-sm-block col-1">#</div>
                                    <div class="d-none d-sm-block col-1">Order Id</div>
                                    <div class="col-9 col-sm-4 ">Product</div>
                                    <div class="d-none d-sm-block col-2">Quantity</div>
                                    <div class="d-none d-sm-block col-2">Unit Price</div>
                                    <div class="col-2">Amount</div>
                                </div>


                                <div class="row mb-2 mb-sm-0 py-25 bgc-default-l4">
                                    <div class="d-none d-sm-block col-1"><?php echo $invoice_data["id"]; ?></div>
                                    <div class="d-none d-sm-block col-1 " style="font-size: 13px;"><?php echo $oid; ?></div>
                                    <?php

                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                    $product_data = $product_rs->fetch_assoc();

                                    ?>
                                    <div class="col-9 col-sm-4 "><?php echo $product_data["title"]; ?></div>
                                    <div class="d-none d-sm-block col-2"><?php echo $invoice_data["qty"]; ?></div>
                                    <div class="d-none d-sm-block col-2 text-95">Rs. <?php echo $product_data["price"]; ?> .00</div>
                                    <div class="col-2 text-secondary-d2">Rs. <?php echo $invoice_data["total"]; ?> .00</div>
                                </div>

                            </div>

                            <div class="row border-b-2 brc-default-l2"></div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0 ">
                                    <span style="color: red;">No Returns after Purchase !</span>
                                </div>
                                <?php

                                $city_rs = Database::search("SELECT * FROM `city` WHERE `city_id`='" . $address_data["city_city_id"] . "'");
                                $city_data = $city_rs->fetch_assoc();

                                $delivery = 0;
                                if ($city_data["district_district_id"] == 9) {
                                    $delivery = $product_data["delivery_fee"];
                                } else {
                                    $delivery = $product_data["delivery_fee"];
                                }

                                $t = $invoice_data["total"];
                                $g = $t - $delivery;



                                ?>
                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            SubTotal
                                        </div>
                                        <div class="col-5">
                                            <span class="text-120 text-secondary-d1">Rs. <?php echo $g; ?> .00</span>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-7 text-right">
                                            Delivery Fee
                                        </div>
                                        <div class="col-5">
                                            <span class="text-110 text-secondary-d1">Rs. <?php echo $delivery; ?> .00</span>
                                        </div>
                                    </div>

                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">Rs. <?php echo $t; ?> .00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                           
                            <div>
                                <span class="text-secondary-d1 text-105" style="font-size: large;">Thank you for your business!</span>

                            </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    </div>
    <?php require "footer.php" ?>
    <script src="script.js"></script>
</body>

</html>
<?php

                        }
?>