<?php
require('top.inc.php');
$name = '';
$categories_id = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';
$image_required = 'required';

$msg2 ='';
if (isset($_GET['id'])) {
    $image_required = '';
    $id = get_safe_value($con, $_GET['id']);
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $run = mysqli_query($con, $sql);
    $check = mysqli_num_rows($run);
    if ($check > 0) {
        $row  = mysqli_fetch_assoc($run);
        $name = $row['name'];
        $categories_id = $row['categories_id'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $qty = $row['qty'];
        $image = $row['image'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
    } else {
        header("location: ./product.php");
    }
}

if (isset($_POST['submit'])) {
    $name = get_safe_value($con, $_POST['name']);
    $categories_id = get_safe_value($con, $_POST['categories_id']);
    $mrp = get_safe_value($con, $_POST['mrp']);
    $price = get_safe_value($con, $_POST['price']);
    $qty = get_safe_value($con, $_POST['qty']);

    $short_desc = get_safe_value($con, $_POST['short_desc']);
    $description = get_safe_value($con, $_POST['description']);
    $meta_title = get_safe_value($con, $_POST['meta_title']);
    $meta_desc = get_safe_value($con, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

    $sql = "SELECT * FROM products WHERE name = '$name'";
    $run = mysqli_query($con, $sql);
    $check = mysqli_num_rows($run);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($run);
			if($id==$getData['id']){
			
			}else{
                $msg="<script> alert(' $name Product already exist')</script>";
				echo $msg;
			}
		}else{
			$msg="<script> alert(' $name Product already exist')</script>";
            echo $msg;
		}
	}
    if($msg==''){
    if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
			$msg2="Please select only png,jpg and jpeg image formate";
            
		}
	}else{
		if($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg2="Please select only png,jpg and jpeg image formate";
			}
		}
	}
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if($_FILES['image']['name'] != ''){
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
                $update_sql = "update products set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword', image = '$image' where id='$id'";
            }else{
                $update_sql = "update products set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
            }

            
            mysqli_query($con, $update_sql);
        }
    else {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
        mysqli_query($con, "insert into products(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
    }
    header('location:product.php');
    }
}




?>
<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Products</strong><small> Form</small></div>
                    <div class="card-body card-block">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Product Name</label><input type="text" id="name" placeholder="Enter product name" name="name" class="form-control" required value="<?= $name ?>">
                            </div>
                            <div class="form-group">

                                <label for="categories_id" class=" form-control-label">Select Category</label>
                                <select name="categories_id" id="categories_id" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php
                                    $res = mysqli_query($con, "select id, categories from categories order by categories asc");
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        if ($row['id'] == $categories_id) {
                                            echo "<option selected value='" . $row['id'] . "'>" . $row['categories'] . "</option>";
                                        } else {
                                            echo "<option value='" . $row['id'] . "'>" . $row['categories'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mrp" class=" form-control-label">MRP</label><input type="number" id="mrp" placeholder="Enter MRP" name="mrp" class="form-control" required value="<?= $mrp ?>">
                            </div>
                            <div class="form-group">
                                <label for="price" class=" form-control-label">Price</label><input type="number" id="price" placeholder="Enter Price" name="price" class="form-control" required value="<?= $price ?>">
                            </div>
                            <div class="form-group">
                                <label for="category" class=" form-control-label">Quantity</label><input type="number" id="qty" placeholder="Enter Quantity" name="qty" class="form-control" required value="<?= $qty ?>">
                            </div>
                            <div class="form-group">
                                <label for="image" class=" form-control-label">Product Image</label><input type="file" id="image" name="image" class="form-control" accept="image/png, image/gif, image/jpeg" draggable="false" <?= $image_required?>>
                                <div class=""><?= $msg2?></div>
                            </div>
                            <div class="form-group">
                                <label for="short_desc" class=" form-control-label">Short Description</label><textarea id="short_desc" placeholder="Enter Short Description" name="short_desc" class="form-control" required><?= $short_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description" class=" form-control-label">Description</label><textarea id="description" placeholder="Enter product Description" name="description" class="form-control" required rows="7"><?= $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_title" class=" form-control-label">Meta Title</label><input type="text" id="meta_title" placeholder="Enter Meta Title" name="meta_title" class="form-control" value="<?= $meta_title ?>">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc" class=" form-control-label">Meta Description</label><textarea id="meta_desc" placeholder="Enter Meta Description" name="meta_desc" class="form-control"><?= $meta_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword" class=" form-control-label">Meta Keywords</label><textarea id="meta_keyword" placeholder="Enter Meta Keywords" name="meta_keyword" class="form-control"><?= $meta_keyword ?></textarea>
                            </div>

                            <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Add Product</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>