<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];



    $product_rs = Database::search("SELECT product.price,product.description,product.title,product.datetime_added,
  product.delivery_fee,product.category_id,product.users_email,product.status_status_id FROM `product`  WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {
        $product_data = $product_rs->fetch_assoc();

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $product_data["title"]; ?> | resto</title>
            <link rel="icon" href="resources/food-svgrepo-com.svg">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />


            <style>
                body {
                    margin-top: 20px;
                    background: #eee;
                    font-size: 30px;


                }

                .panel {
                    border: none;
                    box-shadow: none;
                }

                .panel-heading {
                    border-color: #eff2f7;
                    font-size: 30px;
                    font-weight: 300;
                }

                .panel-title {
                    color: #2A3542;
                    font-size: 30px;
                    font-weight: 400;
                    margin-bottom: 0;
                    margin-top: 0;
                    font-family: 'Open Sans', sans-serif;
                }

                /*product list*/

                .prod-cat li a {
                    border-bottom: 1px dashed #d9d9d9;
                }

                .prod-cat li a {
                    color: #3b3b3b;
                }

                .prod-cat li ul {
                    margin-left: 30px;
                }

                .prod-cat li ul li a {
                    border-bottom: none;
                }

                .prod-cat li ul li a:hover,
                .prod-cat li ul li a:focus,
                .prod-cat li ul li.active a,
                .prod-cat li a:hover,
                .prod-cat li a:focus,
                .prod-cat li a.active {
                    background: none;
                    color: #ff7261;
                }

                .pro-lab {
                    margin-right: 20px;
                    font-weight: normal;
                }

                .pro-sort {
                    padding-right: 20px;
                    float: left;
                }

                .pro-page-list {
                    margin: 5px 0 0 0;
                }

                .product-list img {
                    width: 100%;
                    border-radius: 4px 4px 0 0;
                    -webkit-border-radius: 4px 4px 0 0;
                }

                .product-list .pro-img-box {
                    position: relative;
                }

                .adtocart {
                    background: #fc5959;
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    -webkit-border-radius: 50%;
                    color: #fff;
                    display: inline-block;
                    text-align: center;
                    border: 3px solid #fff;
                    left: 45%;
                    bottom: -25px;
                    position: absolute;
                }

                .adtocart i {
                    color: #fff;
                    font-size: 30px;
                    line-height: 42px;
                }

                .pro-title {
                    color: #5A5A5A;
                    display: inline-block;
                    margin-top: 20px;
                    font-size: 30px;
                }

                .product-list .price {
                    color: #fc5959;
                    font-size: 15px;
                }

                .pro-img-details {
                    margin-left: -15px;
                }

                .pro-img-details img {
                    width: 100%;
                }

                .pro-d-title {
                    font-size: 30px;
                    margin-top: 0;
                }

                .product_meta {
                    border-top: 1px solid #eee;
                    border-bottom: 1px solid #eee;
                    padding: 10px 0;
                    margin: 15px 0;
                }

                .product_meta span {
                    display: block;
                    margin-bottom: 10px;
                }

                .product_meta a,
                .pro-price {
                    color: #fc5959;
                }

                .pro-price,
                .amount-old {
                    font-size: 30px;
                    padding: 0 10px;
                }

                .amount-old {
                    text-decoration: line-through;
                }

                .quantity {
                    width: 120px;
                }

                .pro-img-list {
                    margin: 10px 0 0 -15px;
                    width: 100%;
                    display: inline-block;
                }

                .pro-img-list a {
                    float: left;
                    margin-right: 10px;
                    margin-bottom: 10px;
                }

                .pro-d-head {
                    font-size: 58px;
                    font-weight: 300;
                }

                .hover-scale img {
            transition: transform 0.5s ease;
        }

        .hover-scale img:hover {
            transform: scale(1.1);
        }
            </style>
        </head>

        <body>

            <?php require "header.php" ?>
            <div class="container bootdey">
                <div class="col-12 border border-primary mt-3 mb-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="col-md-6">

                                <?php


                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id` = '" . $pid . "'");
                                $img_num = $img_rs->num_rows;
                                $img_list = array();

                                if ($img_num != 0) {
                                    for ($x = 0; $x < $img_num; $x++) {

                                        $img_data = $img_rs->fetch_assoc();
                                        $img_list[$x] = $img_data["img_path"];
                                ?>
                                        <div class="pro-img-details hover-scale">
                                            <img  src="<?php echo $img_list[$x]; ?>" alt="#" class=" mr-5">
                                        </div>

                                    <?php

                                    }
                                } else {
                                    ?>

                                    <div class="pro-img-details">
                                        <img src="https://www.bootdey.com/image/550x380/FFB6C1/000000" alt="">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h4 class="pro-d-title">
                                    <a href="#" class="">
                                        <u> <?php echo $product_data["title"]; ?></u>
                                    </a>
                                </h4>
                                <p style="font-size: 20px;">
                                    <?php echo $product_data["description"]; ?>
                                </p>

                                <div class="product_meta">
                                    <span class=" text-warning fw-bold badge badge-danger" style="font-size: 20px;width: 100px;">In Stock</span><br />
                                    <span class="tagged_as"><strong style="font-size: 15px;">Delivery fee:<a style="color:blueviolet;"> Rs.<?php echo $product_data["delivery_fee"]; ?>.00</a></strong>
                                </div>
                                <?php

                                $price = $product_data["price"];
                                $adding_price = ($price / 100) * 5;
                                $new_price = $price + $adding_price;
                                $difference =  $new_price - $price;
                                $percentage = ($difference / $price) * 100;

                                ?>

                                <div class="m-bot15"> <strong style="font-size: 20px;">Price : </strong> <span class="amount-old">Rs. <?php echo $new_price; ?> .00</span> <span class="pro-price"> Rs. <?php echo $price; ?> .00</span></div>
                                <div class="form-group">
                                    <label style="font-size: 20px;">Quantity Of Dishes/scoopes</label>
                                    <input type="quantiy" placeholder="1" class="form-control quantity" style="font-size: 20px;" id="qty_input">

                                </div>
                                <div class="mt-5">

                                    <button class="btn btn-round btn-success" style="width: 150px;height: 40px;font-size: 15px;" type="submit" id="payhere-payment" onclick="payNow(<?php echo $pid ?>);"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
                                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                                        </svg> Pay Now</button>
                                    <button class="btn btn-round btn-danger ml-4" style="width: 150px;height: 40px;font-size: 15px;" type="button" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    <button class="btn btn-round btn-secondary ml-4" style="width: 150px;height: 40px;font-size: 15px;" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                        </svg> Add to Watchlist</button>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>

            </div>
            <?php require "footer.php" ?>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        </body>

        </html>

    <?php

    } else {
    ?>


<?php

    }
}
