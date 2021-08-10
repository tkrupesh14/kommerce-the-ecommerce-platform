<?php
require './top.inc.php';
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
?>
    <script>
        window.location.href = 'index.php'
    </script>
<?php
}
if (isset($_POST['register'])) {
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $password = get_safe_value($con, $_POST['password']);

    $ck_user = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users where email = '$email'"));
    if ($ck_user > 0) {
        echo "<script>alert('$email, is already exists use another email') </script>";
    } else {
        $sql = "INSERT INTO users (name, password, email, mobile) VALUES ('$name', '$password', '$email', '$mobile')";
        $run = mysqli_query($con, $sql);


        if ($run) {
            echo "<script>alert('$name, Welcome to Kommerce! Now Login') </script>";
            echo "<script>window.location.href = 'login.php'</script>";
        } else {
            echo "<script>alert('$name, Please try again') </script>";
        }
    }
}
if (isset($_POST['login'])) {

    $email = get_safe_value($con, $_POST['Loginemail']);

    $password = get_safe_value($con, $_POST['Loginpassword']);
    $sql = "SELECT * FROM users where email = '$email' AND password = '$password'";
    $run = mysqli_query($con, $sql);
    $ck_user = mysqli_num_rows($run);
    if ($ck_user > 0) {
        $row = mysqli_fetch_assoc($run);
        $_SESSION['USER_LOGIN'] = 'yes';
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['name'];
        echo "<script>alert('$email, Welcome Back!') </script>";
        echo "<script>window.location.href = window.location.href</script>";
    } else {

        echo "<script>alert('$email, Please try again or Register') </script>";
    }
}
$cart_total = 0;
foreach ($_SESSION['cart'] as $key => $val) {
    $productArr = get_product($con, '', '', $key);  
    $price = $productArr[0]['price'];
    $qty = $val['qty'];
    $cart_total = $cart_total + ($price * $qty);
}

if(isset($_POST['checkout'])){
    $address = get_safe_value($con, $_POST['address']);
    $house = get_safe_value($con, $_POST['house']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $COD = get_safe_value($con, $_POST['payment']);
    $user_id = $_SESSION['USER_ID'];
    $total_price = $cart_total;
    $payment_status = "success";
    $order_status = 'success';

    $insorder = "INSERT INTO orders (user_id, address, house, city, pincode, payment_type, total_price,  payment_status, order_status) VALUES('$user_id', '$address', '$house', '$city', '$pincode', '$COD', '$total_price', '$payment_status', '$order_status' )";
    $run = mysqli_query($con, $insorder);


    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $key => $val) {
        $productArr = get_product($con, '', '', $key);  
        $price = $productArr[0]['price'];
        $qty = $val['qty'];
      
        $insorddet = "INSERT INTO orders_details (order_id, product_id, qty, price) VALUES ('$order_id', '$key', '$qty','$price') ";
        $runins = mysqli_query($con, $insorddet);
        
    }

    if($runins){
        ?>
        <script>
alert('Horray! Your Order is done')
           
        </script>
        <?php
    }else{
        echo "<Script> alert('please try again') </script>";
        
    }
    unset($_SESSION['cart']);
    ?>
    <script>
        window.location.href = 'thank_you.php'
    </script>
<?php
}


?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php
                            $accordion_class = 'accordion__title';
                            if (!isset($_SESSION['USER_LOGIN'])) {
                                $accordion_class = 'accordion__hide';
                            ?>
                                <div class="accordion__title">
                                    Checkout Method
                                </div>


                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form id="contact-form" method="post">
                                                        <h5 class="checkout-method__title">Login</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="email" name="Loginemail" placeholder="Your Email*" style="width:100%">
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" name="Loginpassword" placeholder="Your Password*" style="width:100%">
                                                        </div>
                                                        <p class="require">* Required fields</p>
                                                        <div class="dark-btn">
                                                            <button type="submit" class="fv-btn" name="login">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-method__login">
                                                    <form method="post">
                                                        <h5 class="checkout-method__title">Register</h5>
                                                        <div class="single-input">
                                                            <label for="user-email">Name</label>
                                                            <input type="text" name="name" placeholder="Your Name*" style="width:100%" id="name">
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-email">Email Address</label>
                                                            <input type="email" name="email" placeholder="Your Email*" style="width:100%" id="email">
                                                        </div>

                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="number" name="mobile" placeholder="Your Mobile*" style="width:100%" id="mobile">
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Password</label>
                                                            <input type="password" name="password" placeholder="Your Password*" style="width:100%" id="password">
                                                        </div>
                                                        <div class="dark-btn">
                                                            <button type="submit" class="fv-btn" name="register">Register</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="<?= $accordion_class ?>">
                                Address Information
                            </div>
                            <form method="post">
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                    
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" name="address" placeholder="Street Address" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input type="text" name="house" placeholder="Apartment/Block/House (optional)">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" name="city" placeholder="City/State" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="single-input">
                                                        <input type="text" name="pincode" placeholder="Post code/ zip" required>
                                                    </div>
                                                </div>

                                            </div>
                                       
                                    </div>
                                </div>
                                <div class="<?= $accordion_class ?>">
                                    payment information
                                </div>
                                <div class="accordion__body">
                                    <div class="paymentinfo">
                                        <div class="single-method">
                                            <input type="radio" name="payment" id="" value="COD" required> Cash On Delivery
                                        </div><br><br>
                                        <div class="single-method">
                                          
                                        </div>
                                        
                            
                            
                        </div>
                    </div>
                    <button type="submit" class="fv-btn" name="checkout">Order</button>
                            </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="order-details">
            <h5 class="order-details__title">Your Order</h5>
            <div class="order-details__item">
                <?php
                $cart_total = 0;
                foreach ($_SESSION['cart'] as $key => $val) {
                    $productArr = get_product($con, '', '', $key);
                    $pid = $productArr[0]['id'];
                    $pname = $productArr[0]['name'];
                    $mrp = $productArr[0]['mrp'];
                    $price = $productArr[0]['price'];
                    $image = $productArr[0]['image'];
                    $qty = $val['qty'];
                    $cart_total = $cart_total + ($price * $qty);
                ?>
                    <div class="single-item">
                        <div class="single-item__thumb">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $image ?>" alt="ordered item">
                        </div>
                        <div class="single-item__content">
                            <a href="#"><?= $pname ?></a>
                            <span class="price">&#8377; <?= $price * $qty ?></span>
                        </div>
                        <div class="single-item__remove">
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="order-details__count">

            </div>
            <div class="ordre-details__total">
                <h5>Order total</h5>
                <span class="price">&#8377; <?= $cart_total ?></span>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- cart-main-area end -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function manage_cart(pid, type) {
        if (type == 'update') {
            var qty = jQuery("#" + pid + "qty").val();
        } else {
            var qty = jQuery("#qty").val();
        }
        jQuery.ajax({
            url: 'manage_cart.php',
            type: 'post',
            data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
            success: function(result) {
                if (type == 'update' || type == 'remove') {
                    window.location.href = window.location.href;
                }
                jQuery('.htc__qua').html(result);
            }
        });
    }
</script>
<?php require './footer.inc.php'; ?>