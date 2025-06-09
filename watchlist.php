<?php
require "connection.php";

session_start();
if (isset($_SESSION["u"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist | Resto</title>
    <link rel="icon" href="resources/food-svgrepo-com.svg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        /* Cart or Wishlist */
        .shopping-cart .cart-header {
            padding: 10px;
        }

        .shopping-cart .cart-header h4 {
            font-size: 18px;
            margin-bottom: 0px;
        }

        .shopping-cart .cart-item a {
            text-decoration: none;
        }

        .shopping-cart .cart-item {
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            padding: 10px 10px;
            margin-top: 10px;
        }

        .shopping-cart .cart-item .product-name {
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            cursor: pointer;
        }

        .shopping-cart .btn1 {
            border: 1px solid;
            margin-right: 3px;
            border-radius: 0px;
            font-size: 10px;
        }

        .shopping-cart .btn1:hover {
            background-color: #2874f0;
            color: #fff;
        }

        .shopping-cart .input-quantity {
            border: 1px solid #000;
            margin-right: 3px;
            font-size: 12px;
            width: 40%;
            outline: none;
            text-align: center;
        }

        /* Cart or Wishlist */
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
</head>

<body>
    <?php require "header.php" ?>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <?php
            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_email`='" . $_SESSION["u"]["email"] . "'");
            $watchlist_num = $watchlist_rs->num_rows;

            if ($watchlist_num == 0) {
            ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Watchlist</h5>
                        </div>
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center">
                                <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Your Watchlist is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4>
                                <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            } else { 
            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php 
                            for ($x = 0; $x < $watchlist_num; $x++) {
                                $watchlist_data = $watchlist_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $watchlist_data['product_id'] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $product_data['id'] . "'");
                                $img_data = $img_rs->fetch_assoc();
                            ?>
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="">
                                            <label class="product-name">
                                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                                    <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $product_data["title"]; ?></h5>
                                                    
                                                    <img src="<?php echo $img_data["img_path"]; ?>" style="width: 200px;margin-top: 50px;margin-left: -150px;" alt="">
                                                </div>
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto" style="margin-left: 550px;margin-top: -150px;">
                                        <label class="price" >Rs. <?php echo $product_data["price"]; ?> .00</label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity"  style="margin-left: 30px;">
                                            <div class="input-group">
                                                <span class="fs-5 fw-bold text-black"><?php echo $product_data["qty"]; ?> Items Available</span><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove" style="margin-left: 30px;">
                                            <a href="" class="btn btn-danger btn-sm" onclick="removeFromWatchlist(<?php echo $watchlist_data['id']; ?>);">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            } 
                            ?>
                        </div>
                    </div>
                </div>
            <?php 
            } 
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <?php require "footer.php" ?>
</body>

</html>
<?php
}
?>
