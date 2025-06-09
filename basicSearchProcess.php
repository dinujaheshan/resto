<?php

require "connection.php";

$text = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($text) && $select  == 0) {

    $query .= "WHERE `title` LIKE '%" . $text . "%'";
} else if (empty($text) && $select != 0) {

    $query .= " WHERE `category_id`='" . $select . "'";
} else if (!empty($text) && $select != 0) {

    $query .= " WHERE `title` LIKE '%" . $text . "%' AND `category_id`='" . $select . "'";
}

?>

<div class="row">
    <div class="offset-lg-1 col-12 col-lg-10 text-center">
        <div class="row">
       
            <?php

            if ("0" != $_POST["page"]) {

                $pageno = $_POST["page"];
            } else {

                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 4;
            $number_of_pages = ceil($product_num / $results_per_page);

            //echo ("$number_of_pages");

            $page_results = ($pageno - 1) * $results_per_page;

            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $select_num = $selected_rs->num_rows;

            for ($x = 0; $x < $select_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

                $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                $product_img_data = $product_img_rs->fetch_assoc();
            ?>

                <!-- card -->
               
                <div class="col-md-3 col-sm-6 ">
                    <div class="product-grid6">

                        <div class="product-image6">

                            <img class="card-img-top img-thumbnail mt-2" src="<?php echo $product_img_data["img_path"]; ?>" style="height: 230px;">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><?php echo $selected_data["title"]; ?></h3>
                            <div class="price">Rs.<?php echo $selected_data["price"]; ?>.00

                            </div>
                        </div>
                        <ul class="social">
                            <li><a href="<?php echo "singleproductview.php?id=" . ($product_data["id"]); ?>" data-tip="Buy Now"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg></a></li>
                            <li><button onclick="addToWatchlist();" style="border: none;"><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></button></li>
                            <li><button onclick="addToCart();" style="border: none;"><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></button></li>
                        </ul>
                    </div>
                </div>
        
        <!-- card -->

    <?php

            }

    ?>

<div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination pagination-lg justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if ($pageno <= 1) {
                                            echo ("#");
                                        } else {
                                        ?> onclick=" basicSearch(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                    } ?> aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php

            for ($x = 1; $x <= $number_of_pages; $x++) {
                if ($x == $pageno) {
            ?>

                    <li class="page-item active">
                        <a class="page-link" onclick=" basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?>
                        </a>
                    </li>

                <?php
                } else {
                ?>
                    <li class="page-item ">
                        <a class="page-link" onclick=" basicSearch(<?php echo ($x); ?>);"><?php echo $x; ?>
                        </a>
                    </li>
            <?php
                }
            }

            ?>

            <li class="page-item">
                <a class="page-link" <?php if ($pageno >= $number_of_pages) {
                                            echo "#";
                                        } else {
                                        ?> onclick=" basicSearch(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                    } ?> aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
    </div>
    
</div>


</div>

