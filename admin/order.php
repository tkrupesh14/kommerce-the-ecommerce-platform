<?php 

require './top.inc.php';
if(isset($_GET['type']) && $_GET['type'] != ''){
    $type =get_safe_value($con, $_GET['type']);

    if($type == 'delete'){
    
        $id =get_safe_value($con, $_GET['id']);
        $delete = "DELETE FROM orders  WHERE id = '$id'";
        $run = mysqli_query($con, $delete);
    }
    }

$sql = "SELECT * FROM orders ORDER BY id DESC";
$run = mysqli_query($con , $sql);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Contact Leads </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Name</th>
							   <th>Username</th>
						
							   <th>Address</th>
							   
							   <th>City</th>
							   <th>QTY</th>
							   <th>Total Price</th>
							   <th>Date</th>
							   <th>Action</th>
							</tr>
						 </thead>
						 <tbody>
                            
                            <?php
                            $no = 0;
                            $sql = "SELECT * FROM users ORDER BY id DESC";
$run2 = mysqli_query($con , $sql);
$row2 = mysqli_fetch_assoc($run2);
                            $sql = "SELECT * FROM products ORDER BY id DESC";
$run3 = mysqli_query($con , $sql);
$row3 = mysqli_fetch_assoc($run3);
                            $sql = "SELECT * FROM orders_details ORDER BY id DESC";
$run4 = mysqli_query($con , $sql);
$row4 = mysqli_fetch_assoc($run4);
                                while($row = mysqli_fetch_assoc($run)){
                                    $no++;
                                    ?>
                             <tr>
					        	<td><?= $row ['id'] ?></td>
								<td><?= $row3 ['name'] ?></td>
					        	<td><?= $row2 ['name'] ?></td>
					        	<td><?= $row ['address'] ?></td>
					        	
					        	<td><?= $row ['city'] ?></td>
					        	<td><?= $row4 ['qty'] ?></td>
					        	
					        	
					        	<td>&#8377; <?= $row ['total_price'] ?></td>
					        	<td><?= date('jS F ',strtotime($row['added_on'])) ?></td>
					        	<td>
                                    <?php
                               

                                    
                                
                             
                                echo  "<span class ='badge badge-delete'><a href='?type=delete&id=".$row ['id']. "'>Delete</a></span>";
                                }
                                ?>
                            
                            </td>
							</tr>
                            
						
						
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php require './footer.inc.php';