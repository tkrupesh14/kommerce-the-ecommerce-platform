<?php
require './connection.inc.php';
require './functions.inc.php';
require './add_to_cart.inc.php';

$cat_res = "SELECT * FROM categories WHERE status = 1 ORDER BY categories DESC";
$run = mysqli_query($con, $cat_res);
$cat_arr = array();
while($row = mysqli_fetch_assoc($run)){
    $cat_arr[]= $row;
}
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct()
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kommerce - The E-Commerce Platform</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- Modernizr JS -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo">
                                    <a href="index.php">Kommerce</a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <li class="drop"><a href="#">Categories</a>
                                            <ul class="dropdown mega_dropdown">
                                               
                                                    <ul class="mega__item">
                                                        <?php
                                                            foreach($cat_arr as $list){
                                                                ?>
                                                            <li><a href="categories.php?id=<?= $list ['id'] ?>"> <?= $list ['categories'] ?></a></li>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </ul>
                                                </li>
                                            </ul>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="#">Categories</a>
                                            <ul>
                                            <?php
                                                            foreach($cat_arr as $list){
                                                                ?>
                                                            <li><a href="categories.php?id=<?= $list ['id'] ?>"> <?= $list ['categories'] ?></a></li>
                                                                <?php
                                                            }
                                                        ?>
                                                </ul>
                                                </li>
                                            <li><a href="contact.php">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">

                                    <div class="header__account">
                                        <?php 
                                            if(isset($_SESSION['USER_LOGIN'])){
                                                
                                                echo '<a href="./logout.php"><i class="fa fa-power-off"></i></a><a href="./my_order.php"><i class="fas fa-dolly    "></i></a>';
                                            }else{
                                                echo '<a href="./login.php">Login/Register</a>';
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a href="./cart.php"><i class="icon-handbag icons"></i></a>
                                        <a href="./cart.php"><span class="htc__qua"><?= $totalProduct?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>

            <!-- jquery latest version -->
