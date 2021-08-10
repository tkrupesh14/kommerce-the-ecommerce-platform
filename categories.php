<?php require './top.inc.php';
$cat_id = mysqli_real_escape_string($con, $_GET['id']);
if($cat_id>0){
    $get_product = get_product($con, 4 , $cat_id);

}else{
    ?>
<script>
    window.location.href= "index.php";
</script>
    <?php
}


?>
<div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
          
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(255,255,255) url(images/bg/bg.jpg) no-repeat scroll center center / cover; ">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner" style="color: #fff;">
                                  <a class="breadcrumb-item" href="index.php" style="color: #fff;">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active" style="color: #fff;"><?= $get_product ['0'] ['categories'] ?></span>
                               
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php
                        if(count($get_product)>0){
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                
                             
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                            foreach($get_product as $list){
                                ?>
                                        <!-- Start Single Product -->
                                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="product.php?id=<?= $list ['id'] ?>">
                                                        <img src="<?= PRODUCT_IMAGE_SITE_PATH.$list ['image'] ?>" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="fr__hover__info">
                                                    <ul class="product__action">
                                                        <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                                        <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                                    
                                                    </ul>
                                                </div>
                                                <div class="fr__product__inner">
                                                    <h4><a href="product-details.html"><?=$list ['name']  ?></a></h4>
                                                    <ul class="fr__pro__prize">
                                                        
                                                        <li>&#8377; <?= $list ['price'] ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Product -->
                                        <?php } ?>
                                        <!-- End Single Product -->
                                    </div>
                                   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }else{
                                echo "<h1> Products Not Found</h1>";
                            }
                            
                            ?>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
  

<?php require './footer.inc.php';?>