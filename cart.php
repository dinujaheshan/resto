<?php
require "connection.php";

session_start();

if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"]["email"];

    $total = 0;
    $subtotal = 0;
    $shipping = 0;

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | Resto</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="resources/food-svgrepo-com.svg">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    </head>
    <style>
        body {
            margin-top: 20px;
        }

        .cart-item-thumb {
            display: block;
            width: 10rem
        }

        .cart-item-thumb>img {
            display: block;
            width: 100%
        }

        .product-card-title>a {
            color: #222;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }

        .product-card-title {
            display: block;
            margin-bottom: .75rem;
            padding-bottom: .875rem;
            border-bottom: 1px dashed #e2e2e2;
            font-size: 1rem;
            font-weight: normal;
        }

        .text-muted {
            color: #888 !important;
        }

        .bg-secondary {
            background-color: #f7f7f7 !important;
        }

        .accordion .accordion-heading {
            margin-bottom: 0;
            font-size: 1rem;
            font-weight: bold;
        }

        .font-weight-semibold {
            font-weight: 600 !important;
        }

        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        body {
            background-color: #eee;
            font-family: 'Calibri', sans-serif !important;
        }

        .mt-100 {
            margin-top: 100px;
        }

        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
            border-radius: 8px;
            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 24px;
            border-bottom: 1px solid #f6f7fb;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent;
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important;
        }
    </style>

    <body>
        <?php require "header.php" ?>
        <div class="container pb-5 mt-2 mt-3 border border-primary mb-2 ">
            <div class="row">

                <?php
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email` = '" . $user . "'");
                $cart_num = $cart_rs->num_rows;

                if ($cart_num == 0) {
                ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Cart</h5>
                            </div>
                            <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center">
                                    <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                    <h3><strong>Your Cart is Empty</strong></h3>
                                    <h4>Add something to make me happy :)</h4>
                                    <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-xl-9 col-md-8 mt-2">
                        <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-5 py-3 bg-danger">
                            <span>Products</span>
                            <a class="text-md-start" href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                                    <polyline points="15 18 9 12 15 6"></polyline>
                                </svg>Continue shopping
                            </a>
                        </h2>

                        <?php
                        for ($x = 0; $x < $cart_num; $x++) {
                            $cart_data = $cart_rs->fetch_assoc();

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` ='" . $cart_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();

                            $total += $product_data["price"] * $cart_data["qty"];

                            $address_rs = Database::search("SELECT district.district_id AS `did` FROM`users_has_address`
                                     INNER JOIN `city` ON users_has_address.city_city_id = city.city_id
                                     INNER JOIN `district` ON city.district_district_id = district.district_id
                                     WHERE `users_email`='" . $user . "'");

                            $address_data = $address_rs->fetch_assoc();
                            $ship = 0;

                            if ($address_data["did"] == 1) {
                                $ship = $product_data["delivery_fee"];
                            } else {
                                $ship = $product_data["delivery_fee"];
                            }
                            $shipping += $ship;

                            $seller_rs = Database::search("SELECT * FROM `users` WHERE `email` ='" . $product_data["users_email"] . "'");
                            $seller_data = $seller_rs->fetch_assoc();
                            $seller = $seller_data["fname"] . " " . $seller_data["lname"];

                            $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data['id'] . "'");
                            $img_data = $img_rs->fetch_assoc();
                        ?>
                            <!-- Item-->
                            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <div><a class="cart-item-thumb mx-auto mr-sm-4" href="#"><img src="<?php echo $img_data["img_path"]; ?>" alt="Product" class="border border-primary" style="width: 200px;"></a></div>
                                    <div class="media-body pt-3 ml-5">
                                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#"><?php echo $product_data["title"]; ?></a></h3>
                                        <div class="font-size-sm"><span class="text-muted mr-2">Price</span>Rs. <?php echo $product_data["price"]; ?> .00</div>
                                        <div class="font-size-sm"><span class="text-muted mr-2">Delivery fee</span>Rs.<?php echo $ship; ?>.00</div>
                                        <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Seller</span><?php echo $seller; ?></h3>
                                    </div>
                                </div>
                                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                                    <div class="form-group mb-2">
                                        <label for="quantity1">Quantity</label>
                                        <input class="form-control form-control-sm" type="number" id="quantity1" value="<?php echo $cart_data["qty"]; ?>">
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm btn-block mb-2" type="button">
                                        Buy Now
                                    </button>
                                    <button class="btn btn-outline-danger btn-sm btn-block mb-2" type="submit" onclick="deleteFromCart(<?php echo $cart_data['cart_id']; ?>);">
                                        <i class="fa fa-trash" ></i> Remove
                                    </button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Sidebar -->
                    <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
                        <h2 class="h6 px-4 py-3 bg-danger text-center">Order summary</h2>
                        <div class="h5 text-center mb-4">Subtotal: Rs. <?php echo $total; ?>.00</div>
                        <div class="h5 text-center mb-4">Shipping: Rs. <?php echo $shipping; ?>.00</div>
                        <div class="h3 text-center mb-4">Total: Rs. <?php echo $total + $shipping; ?>.00</div>
                        <button class="btn btn-outline-success btn-lg btn-block" type="button">Proceed to Checkout</button>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <?php require "footer.php"; ?>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("Location: login.php");
}
?>