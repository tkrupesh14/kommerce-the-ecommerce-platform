<?php
require('top.inc.php');
$categories = '';
if(isset($_GET['id'])){
    $id=get_safe_value($con,$_GET['id']);
    $sql = "SELECT * FROM categories WHERE id = '$id'";
    $run = mysqli_query($con , $sql); 
    $check = mysqli_num_rows($run);
    if($check>0){
    $row  = mysqli_fetch_assoc($run);
    $categories = $row ['categories'];
    }else{
        header("location: ./categories.php");

    }
}

if(isset($_POST['submit'])){
	$category=get_safe_value($con,$_POST['category']);

    $sql = "SELECT * FROM categories WHERE categories = '$category'";
    $run = mysqli_query($con , $sql); 
    $check = mysqli_num_rows($run);
    if($check>0){
        echo "<script> alert('$category category is alrady exists') </script>";
    }
    else{
    if(isset($_GET['id'])){
        $sql = "UPDATE categories SET categories = '$category' WHERE id = $id";
        $run = mysqli_query($con, $sql);
        if($run){
            header("location: ./categories.php");
        }else{
            echo "<script> alert('please try again')</script>";
        }
    
    }else{
        
    
    $sql = "INSERT INTO categories (categories, status) VALUES ('$category', '1')";
    $run = mysqli_query($con, $sql);
}
    if($run){
        header("location: ./categories.php");
    }else{
        echo "<script> alert('please try again')</script>";
    }
}
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <div class="form-group">
                               <form  method="post">
                               <label for="category" class=" form-control-label">Category Name</label><input type="text" id="category"  placeholder="Enter Category name" name="category" class="form-control" required value="<?=  $categories?>">
                            </div>
                           
                           <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Add Category</span>
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