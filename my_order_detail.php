<?php require 'top.inc.php';
$order_id = get_safe_value($con, $_GET['id']);


?>

<div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Product Name</span></th>
                                                <th class="product-remove"><span class="nobr">Product Image</span></th>
                                                
                                                <th class="product-name"><span class="nobr">Qty</span></th>
                                                <th class="product-price">Price</th>
                                                <th class="product-stock-stauts">Total Price</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid = $_SESSION['USER_ID'];
                                            $sql="SELECT distinct(orders_details.id), orders_details.*,products.name,products.image from orders_details, products, orders where orders_details.order_id = '$order_id' and orders.user_id = '$uid' and orders_details.product_id = products.id";
                                            $res = mysqli_query($con, $sql);
                                                    $total_price = 0;
                                                    while($row = mysqli_fetch_assoc($res)){
                                                        $total_price =$total_price +($row['qty']*$row['price']);
                                            ?>
                                            <tr>
                                                
                                                
                                                <td class="product-name" ><?= $row ['name'] ?></td>
                                                <td class="product-name" ><img src="<?= PRODUCT_IMAGE_SITE_PATH.$row ['image'] ?>" alt=""> </td>
                                                <td class="product-name" ><?= $row ['qty'] ?></td>
                                                <td class="product-name" >&#8377; <?= $row ['price'] ?></td>
                                                <td class="product-name" >&#8377; <?= $row ['price']*$row ['qty'] ?></td>
                                                
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td>Total Price</td>
                                                <td>&#8377; <?= $total_price?></td>
                                            </tr>
                                           
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  require './footer.inc.php';?>