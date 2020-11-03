<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feliciano - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: black">
<?php
include('header.php');
include('menuBack.php');
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pill <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>

<form method="post" action="index.php">


    <div class="container">
        <div class="row mb-5" style="background-color: #e5900a">
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widPOST mb-4">
                    <h2 class="ftco-heading-2">Meal Name</h2>

                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widPOST mb-4">
                    <h3 class="ftco-heading-2">Number Of Meals</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widPOST mb-4">
                    <h3 class="ftco-heading-2">Price</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="ftco-footer-widPOST mb-4">
                    <?php
                    $totalPrice=0;
                    $db = new Database();
                    $db->Query("SELECT * FROM `pill`");
                    $db->Execute();
                    $pill=$db->resultset();
                    foreach ($pill as $p ):
                        $totalPrice+=$p->price;
                    endforeach

                    ?>
                    <h3 class="ftco-heading-2">Total Price  </h3>

                    <h3 class="ftco-heading-2"><?php echo "$totalPrice"."$"?></h3>

                </div>
            </div>

        </div>
    </div>

    <?php

    foreach($pill as $P) :{
            ?>

        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widPOST mb-4">
                        <h2 style="color: #ffdf7e" class="ftco-heading-2"><?php echo "$P->name ";?></h2>

                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widPOST mb-4">
                        <h2 style="color: #ffdf7e" class="ftco-heading-2"><?php echo " $P->number";?></h2>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widPOST mb-4">
                        <h2 style="color: #ffdf7e" class="ftco-heading-2"><?php echo " $P->price"."$";?></h2>
                    </div>
                </div>

            </div>
        </div>


    <?php
      } endforeach;?>
    <input type="submit"  name="done" class="nav-link ftco-animate"  value="Done " style="background: #e5900a;margin-left: 500px ">

</form>

<?php include('footer.php'); ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>
