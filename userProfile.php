<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Resto</title>
    <link rel="icon" href="resources/food-svgrepo-com.svg">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />

    <style>
        body {
            margin-top: 20px;

        }
    </style>
</head>

<body>
<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON  
                        users.gender_id=gender.id WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `users_email`='" . $email . "'");

    $address_rs = Database::search("SELECT * FROM `users_has_address` INNER JOIN `city` ON  
                        users_has_address.city_city_id=city.city_id INNER JOIN 
                        `district` ON city.district_district_id=district.district_id 
                        INNER JOIN `province` ON 
                        district.province_province_id=province.province_id 
                        WHERE `users_email`='" . $email . "'");

    $details_data = $details_rs->fetch_assoc();
    $image_data = $image_rs->fetch_assoc();
    $address_data = $address_rs->fetch_assoc();

?>
    <!-- header section strats -->
    <?php require "header.php" ?>
    <!-- end header section -->

    <div class="container">
        <div class="row flex-lg-nowrap">
            
                <div class="col">
                    <div class="row">
                        <div class="col mb-3 border border-dark mt-3" style="border-radius: 5px;">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">

                                                        <?php

                                                        if (empty($image_data["path"])) {
                                                        ?>
                                                            <img width="150" height="170" style="border-radius: 5px;" src="https://img.icons8.com/3d-fluency/94/guest-male--v1.png"  id="viewimg"/>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img width="150" height="170" style="border-radius: 5px;" src="<?php echo $image_data["path"]; ?>" alt="guest-male--v1" id="viewimg"/>
                                                        <?php
                                                        }

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">My Profile</h4>
                                                    <div class="mt-2">
                                                        <input type="file" class="d-none" id="profileimage" />
                                                        <label for="profileimage" class="btn btn-primary mt-5" onclick="changeImage();"> <i class="fa fa-fw fa-camera"></i><span>Change Photo</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <!--<span class="badge badge-secondary">administrator</span>-->
                                                    <div class="text-muted"><span class="badge badge-secondary"> Joined Date: <?php echo $details_data["joined_date"]; ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                        </ul>
                                        <div class="tab-content pt-3">
                                            <div class="tab-pane active">
                                                <form class="form" novalidate="">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>First Name</label>
                                                                        <input id="fname" class="form-control" type="text" placeholder="John Smith" value="<?php echo $details_data["fname"]; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Last Name</label>
                                                                        <input id="lname" class="form-control" type="text" placeholder="johnny.s" value="<?php echo $details_data["lname"]; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="grid mb-5">
                                                                <div class="row">
                                                                    <div class="form-group col-6 ">
                                                                        <label>Mobile</label>
                                                                        <input id="mobile" class="form-control" type="text" placeholder="0748270982" value="<?php echo $details_data["mobile"]; ?>">
                                                                    </div>
                                                                    <div class="form-group col-6">
                                                                        <label class="form-label">Gender</label>
                                                                        <input type="text" class="form-control" readonly value="<?php echo $details_data["gender_name"]; ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-6">
                                                                <div class="col ">
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input id="email" class="form-control" type="text" placeholder="user@example.com" value="<?php echo $email; ?>" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php

                                                            if (empty($address_data["line1"])) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label>Address Line 01</label>
                                                                            <input id="line1" class="form-control" type="text" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label>Address Line 01</label>
                                                                            <input id="line1" class="form-control" type="text" placeholder="" value="<?php echo $address_data["line1"]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            if (empty($address_data["line2"])) {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label>Address Line 02</label>
                                                                            <input id="line2" class="form-control" type="text" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <div class="form-group">
                                                                            <label>Address Line 02</label>
                                                                            <input id="line2" class="form-control" type="text" placeholder="" value="<?php echo $address_data["line2"]; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 col-sm-6 mb-3">
                                                            <div class="mb-2"><b>Other</b></div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label> Password</label>
                                                                        <input id="pw" class="form-control" type="password" placeholder="••••••" readonly value="<?php echo $details_data["password"]; ?>">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Postal Code</label>
                                                                        <input id="pc" class="form-control" type="text" placeholder="541789">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                            <div class="mb-2"><b>Location</b></div>
                                                            <div class="row">
                                                                <?php

                                                                $province_rs = Database::search("SELECT * FROM `province`");
                                                                $district_rs = Database::search("SELECT * FROM `district`");
                                                                $city_rs = Database::search("SELECT * FROM `city`");

                                                                $province_num = $province_rs->num_rows;
                                                                $district_num = $district_rs->num_rows;
                                                                $city_num = $city_rs->num_rows;

                                                                ?>
                                                                <div class="col-12 mt-2">
                                                                    <div class="custom-controls-stacked px-2">
                                                                        <div class="col-12 ">
                                                                            <label class="form-label mt-2 ml-2">Province</label>
                                                                            <select class="form-select" id="province">
                                                                                <option value="0">Select Province</option>
                                                                                <?php

                                                                                for ($x = 0; $x < $province_num; $x++) {
                                                                                    $province_data = $province_rs->fetch_assoc();
                                                                                ?>
                                                                                    <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                                                                                    if (!empty($address_data["province_province_id"])) {
                                                                                                                                                        if ($province_data["province_id"] == $address_data["province_province_id"]) {
                                                                                                                                                    ?> selected <?php
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                                ?>>
                                                                                        <?php echo $province_data["province_name"]; ?>
                                                                                    </option>
                                                                                <?php
                                                                                }

                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <div class="col-12 ">
                                                                        <label class="form-label mt-2 ml-4">District</label>
                                                                        <select class="form-select ml-2.5" id="district">
                                                                            <option value="">Select District </option>
                                                                            <?php

                                                                            for ($x = 0; $x < $district_num; $x++) {
                                                                                $district_data = $district_rs->fetch_assoc();
                                                                            ?>
                                                                                <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                                                                                if (!empty($address_data["district_district_id"])) {
                                                                                                                                                    if ($district_data["district_id"] == $address_data["district_district_id"]) {
                                                                                                                                                ?>selected<?php
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                            ?>><?php echo $district_data["district_name"] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-3">
                                                                    <div class="col-12 ">
                                                                        <label class="form-label mt-2 ml-5">City</label>
                                                                        <select class="form-select ml-2" id="city">
                                                                            <option value="">Select City</option>
                                                                            <?php

                                                                            for ($x = 0; $x < $city_num; $x++) {
                                                                                $city_data = $city_rs->fetch_assoc();
                                                                            ?>
                                                                                <option value="<?php echo $city_data["city_id"]; ?>" <?php
                                                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                                                            if ($city_data["city_id"] == $address_data["city_city_id"]) {
                                                                                                                                        ?>selected<?php
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                                    ?>><?php echo $city_data["city_name"] ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit" onclick="updateProfile();">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-3 mb-3 ">
                            <div class="card border border-dark mt-3">
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">Feedback</h6>
                                    <p class="card-text"> please share your thoughts to help us enhance your experience!</p>
                                    <button type="button" class="btn btn-success"> <a href="feedback.php" style="color: white;">Give Now</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            } else {
            }
            ?>
        </div>

    </div>

    <?php require "footer.php" ?>
    <script src="script.js"></script>
</body>

</html>