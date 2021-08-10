<?php require './top.inc.php'; 
$product_id = mysqli_real_escape_string($con, $_GET['id']);
if($product_id>0){
    $get_product = get_product($con,'','', $product_id);


}else{
    ?>
<script>
    window.location.href= "index.php";
</script>
    <?php
}

$sql = "SELECT products. *,categories.categories FROM products, categories WHERE products.categories_id = categories.id ORDER BY products.id DESC";
$run = mysqli_query($con , $sql);
$row2 = mysqli_fetch_assoc($run);

?>
 <!-- Start Bradcaump area -->

        <!-- End Bradcaump area -->
<div class="body__overlay"></div>
<a class="breadcrumb-item" href="index.php" style="color: #444444; margin-left:40px; margin-top:50px;">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a href="categories.php?id=<?= $get_product ['0'] ['categories_id'] ?>" class="breadcrumb-item active" style="color: #444444;"><?= $get_product ['0'] ['categories'] ?></a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active" style="color: #444444;"><?= $get_product ['0'] ['name'] ?></span>

        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src=<?= PRODUCT_IMAGE_SITE_PATH.$get_product ['0'] ['image'] ?> alt="full-image" draggable="false" style="border-radius: 20px;" id="img_01" xpreview="<?= PRODUCT_IMAGE_SITE_PATH.$get_product ['0'] ['image'] ?> ">
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?= $get_product ['0']['name']  ?></h2>
                                <ul  class="pro__prize">
                                    <li>&#8377; <?= $get_product ['0']['price'] ?></li>
                                </ul>
                                <p class="pro__info"><?= $get_product ['0']['short_desc'] ?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
                                    <div class="sin__desc">
                                    <p><span>Qty:</span> 
										<input type="number" id="qty" value="1"  style="border:none; outline:none; background-color:#E5E5E5; border-radius:5px;width:25%; height:30px; margin-left:10px; padding-left:10px;"/>
										</p>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="<?= $get_product ['0'] ['categories_id'] ?>"><?= $get_product ['0'] ['categories'] ?></a></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="cr__btn" style="margin-top:20px ;border-radius: 50px;">
                                            <a href="javascript:void(0)" onclick="manage_cart('<?= $get_product ['0']['id'] ?>', 'add' );" style="border-radius: 50px;" id="manage_cart">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p><?= $get_product ['0']['description'] ?></p>
                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            <p>But I must explain to you how all this mistaken idea</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">
                    <div class="product__list clearfix mt--30">
                            <?php
                            $get_product = get_product($con, 4);
                            foreach($get_product as $list){
                                ?>
                            
                            
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
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
                                        <h4><a href="product-details.html"><?= $list ['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            
                                            <li>&#8377; <?= $list ['price'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- End Single Category -->
                            <?php }?>
                            
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
        <!-- End Banner Area -->
  
        <script>
 function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){

			if(type=='update' || type=='remove'){
				window.location.href='cart.php';
			}
			jQuery('.htc__qua').html(result);
            alert(' Added to Cart');
		}	
	});	
}
        </script>
<?php require './footer.inc.php';?>