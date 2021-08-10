<?php require 'top.inc.php';

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
                                                <th class="product-remove"><span class="nobr">Order ID</span></th>
                                                <th class="product-remove"><span class="nobr">Order Date</span></th>
                                                
                                                <th class="product-name"><span class="nobr">Address</span></th>
                                                <th class="product-price"><span class="nobr"> Payment Type </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Order Status </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Payment Status</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $uid = $_SESSION['USER_ID'];
                                                    $sql = "SELECT * FROM orders WHERE user_id = '$uid' and order_status = 'success'";
                                                    $run = mysqli_query($con, $sql);
                                                    while($row = mysqli_fetch_assoc($run)){
                                            ?>
                                            <tr>
                                                
                                                
                                                <td class="product-name" ><a href="my_order_detail.php?id=<?= $row ['id'] ?>"><?= $row ['id'] ?></a>
                                                <a href="order_pdf.php?id=<?php echo $row['id']?>"> PDF</a>
                                            </td>
                                                <td class="product-price"><?= date('jS/m/Y',strtotime($row['added_on'])) ?></td>
                                                <td class="product-name"><?= $row ['address'] ?></td>
                                                <td class="product-name"><?= $row ['payment_type'] ?></td>
                                                <td class="product-price"><span class="amount"><?= $row ['order_status'] ?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?= $row ['payment_status'] ?></span></td>
                                            </tr>
                                            <?php } ?>
                                           
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