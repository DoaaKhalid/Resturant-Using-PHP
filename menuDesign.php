
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
<body>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate text-center mb-4">
                <h1 class="mb-2 bread">Specialties</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Menu <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
        </div>
    </div>
</section>
<div class="py-1 bg-black top">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
                        <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END nav -->

<?php include('menuBack.php'); ?>
<?php include ('header.php')?>
<form action="" method="get" id="frm">
    <section class="ftco-section">
        <div class="container">
            <div class="ftco-search">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap">
                        <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Breakfast</a>

                            <a class="nav-link ftco-animate" id="lunch-tab" data-toggle="pill" href="#lunch" role="tab" aria-controls="lunch" aria-selected="false">Lunch</a>

                            <a class="nav-link ftco-animate" id="dinner-tab" data-toggle="pill" href="#dinner" role="tab" aria-controls="dinner" aria-selected="false">Dinner</a>

                            <a class="nav-link ftco-animate" id="drinks-tab" data-toggle="pill" href="#drinks" role="tab" aria-controls="drinks" aria-selected="false">Drinks</a>

                            <a class="nav-link ftco-animate" id="desserts-tab" data-toggle="pill" href="#desserts" role="tab" aria-controls="desserts" aria-selected="false">Desserts</a>
                            <input type="submit"  name="order" class="nav-link ftco-animate"  value="Order " style="background: #c3ac7f;margin-left: auto ">


                        </div>
                    </div>
                    <div class="col-md-12 tab-wrap">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                                <?php
                               // require('Database.php');
                                $db = new Database();
                                $db->IsConnected();
                                $item=[];
                                if($db->IsConnected())
                                {
                                    $db->Query("SELECT * From `meals`");
                                    $db->Execute();
                                    $item=$db->resultset();
                                }
                                ?>

                                <div class="row no-gutters d-flex align-items-stretch">

                                    <?php $c=1;

                                    $name='';
                                    foreach ($item as $meal):
                                        if($c>2 )
                                            $name="order-md-last";
                                        else
                                            $name='';
                                        if($meal->type=='breakfast'):
                                        ?>
                                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                                <div class="menu-img img <?php echo $name;?>" style="background-image:url( <?php echo $meal->img_dir?>);"></div>
                                                <div class="text d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="one-half">
                                                                <input type="hidden"  ><h3 ><?php print $meal->name ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php print $meal->price?></span>
                                                            </div>
                                                        </div>
                                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                                        <p><label>
                                                                <input type="text" value="0" name="<?php print $meal->name ?> " placeholder="Number of meal ">
                                                                <?php
                                                                $e='' ;
                                                                foreach($errors as $error) :{
                                                                     foreach($error as $er) :{
                                                                if(strpos((string)$er, $meal->name)===0){
                                                                    $e=$error[1];
                                                                }}
                                                                endforeach;} endforeach;?>
                                                            </label></p>

                                                        <span style="color: #ff0000"> <?php echo( $e); ?></span>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $c=$c+1;if($c==5){$c=1;}
                                        ?>
                                        <?php endif; endforeach; ?>

                                </div>

                            </div>
                            <div class="tab-pane fade " id="lunch" role="tabpanel" aria-labelledby="v-pills-day-2-tab">


                                <div class="row no-gutters d-flex align-items-stretch">

                                    <?php $c=1;

                                    $name='';
                                    foreach ($item as $meal):
                                        if($c>2 )
                                            $name="order-md-last";
                                        else
                                            $name='';
                                    if($meal->type=='lunch'):
                                    ?>
                                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                                <div class="menu-img img <?php echo $name; ?>" style="background-image:url( <?php echo $meal->img_dir?>);"></div>
                                                <div class="text d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="one-half">
                                                                <input type="hidden"  ><h3 ><?php echo $meal->name ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php echo $meal->price?></span>
                                                            </div>
                                                        </div>
                                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                                        <p><label>
                                                                <input type="text" value="0" name="<?php echo $meal->name ?>"  placeholder="Number of meal ">
                                                            </label></p>
                                                        <?php
                                                        $e='' ;
                                                        foreach($errors as $error) :{
                                                            foreach($error as $er) :{
                                                                if(strpos((string)$er, $meal->name)===0){
                                                                    $e=$error[1];
                                                                }}
                                                            endforeach;} endforeach;?>
                                                        </label></p>

                                                        <span style="color: #ff0000"> <?php echo( $e); ?></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $c=$c+1;if($c==5){$c=1;} endif;endforeach ?>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="v-pills-day-2-tab">

                                <div class="row no-gutters d-flex align-items-stretch">

                                    <?php $c=1;

                                    $name='';
                                    foreach ($item as $meal):
                                        if($c>2 )
                                            $name="order-md-last";
                                        else
                                            $name='';
                                    if($meal->type=='dinner'):
                                    ?>
                                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                                <div class="menu-img img <?php echo $name; ?>" style="background-image:url( <?php echo $meal->img_dir?>);"></div>
                                                <div class="text d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="one-half">
                                                                <input type="hidden"  ><h3 ><?php echo $meal->name ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php echo $meal->price?></span>
                                                            </div>
                                                        </div>
                                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                                        <p><label>
                                                                <input type="text" value="0" name="<?php echo $meal->name ?>"  placeholder="Number of meal ">
                                                            </label></p>
                                                        <?php
                                                        $e='' ;
                                                        foreach($errors as $error) :{
                                                            foreach($error as $er) :{
                                                                if(strpos((string)$er, $meal->name)===0){
                                                                    $e=$error[1];
                                                                }}
                                                            endforeach;} endforeach;?>
                                                        </label></p>

                                                        <span style="color: #ff0000"> <?php echo( $e); ?></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $c=$c+1;if($c==5){$c=1;}endif;endforeach ?>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="desserts" role="tabpanel" aria-labelledby="v-pills-day-2-tab">


                                <div class="row no-gutters d-flex align-items-stretch">

                                    <?php $c=1;

                                    $name='';
                                    foreach ($item as $meal):
                                        if($c>2 )
                                            $name="order-md-last";
                                        else
                                            $name='';
                                    if($meal->type=='desserts'):
                                    ?>
                                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                                <div class="menu-img img <?php echo $name; ?>" style="background-image:url( <?php echo $meal->img_dir?>);"></div>
                                                <div class="text d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="one-half">
                                                                <input type="hidden"  ><h3 ><?php echo $meal->name ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php echo $meal->price?></span>
                                                            </div>
                                                        </div>
                                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                                        <p><label>
                                                                <input type="text" value="0" name="<?php echo $meal->name ?>"  placeholder="Number of meal ">
                                                            </label></p>
                                                        <?php
                                                        $e='' ;
                                                        foreach($errors as $error) :{
                                                            foreach($error as $er) :{
                                                                if(strpos((string)$er, $meal->name)===0){
                                                                    $e=$error[1];
                                                                }}
                                                            endforeach;} endforeach;?>
                                                        </label></p>

                                                        <span style="color: #ff0000"> <?php echo( $e); ?></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $c=$c+1;if($c==5){$c=1;} endif;endforeach ?>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="drinks" role="tabpanel" aria-labelledby="v-pills-day-2-tab">


                                <div class="row no-gutters d-flex align-items-stretch">

                                    <?php $c=1;

                                    $name='';
                                    foreach ($item as $meal):
                                        if($c>2 )
                                            $name="order-md-last";
                                        else
                                            $name='';
                                    if($meal->type=='drinks'):
                                    ?>
                                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch">
                                            <div class="menus d-sm-flex ftco-animate align-items-stretch">
                                                <div class="menu-img img <?php echo $name; ?>" style="background-image:url( <?php echo $meal->img_dir?>);"></div>
                                                <div class="text d-flex align-items-center">
                                                    <div>
                                                        <div class="d-flex">
                                                            <div class="one-half">
                                                                <input type="hidden"  ><h3 ><?php echo $meal->name ?></h3>
                                                            </div>
                                                            <div class="one-forth">
                                                                <span class="price"><?php echo $meal->price?></span>
                                                            </div>
                                                        </div>
                                                        <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                                                        <p><label>
                                                                <input type="text" value="0" name="<?php echo $meal->name ?>"  placeholder="Number of meal ">
                                                            </label></p>
                                                        <?php
                                                        $e='' ;
                                                        foreach($errors as $error) :{
                                                            foreach($error as $er) :{
                                                                if(strpos((string)$er, $meal->name)===0){
                                                                    $e=$error[1];
                                                                }}
                                                            endforeach;} endforeach;?>
                                                        </label></p>

                                                        <span style="color: #ff0000"> <?php echo( $e); ?></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $c=$c+1;if($c==5){$c=1;}endif;endforeach ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
