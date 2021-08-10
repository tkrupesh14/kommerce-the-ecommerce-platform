<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type'] != ''){
    $type =get_safe_value($con, $_GET['type']);
    if($type == 'status'){
        $operation =get_safe_value($con, $_GET['operation']);
        $id =get_safe_value($con, $_GET['id']);
        if($operation == 'active'){
            $status = '1';
        }else{
            $status = 0;
        }
        $update_status = "UPDATE categories SET status = '$status' WHERE id = '$id'";
        $run = mysqli_query($con, $update_status);
    }
    if($type == 'delete'){
    
        $id =get_safe_value($con, $_GET['id']);
        $delete = "DELETE FROM categories  WHERE id = '$id'";
        $run = mysqli_query($con, $delete);
    }
}

$sql = "SELECT * FROM categories ORDER BY categories ASC";
$run = mysqli_query($con , $sql);


?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Categories </h4>
				   <h4 class="box-link"><a href="manage_categories.php" style="text-decoration: none; color:#005ce6;">Add Categories</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>Categories</th>
							   <th>Action</th>
							</tr>
						 </thead>
						 <tbody>
                            
                            <?php
                            $no = 0;
                                while($row = mysqli_fetch_assoc($run)){
                                    $no++;
                                    ?>
                             <tr>
					        	<td><?= $no?></td>
					        	<td><?= $row ['categories'] ?></td>
					        	<td><?php
                                if($row ['status'] == 1) {
                                        
                                         echo  " <span class='badge badge-complete'><a href='?type=status&operation=deactie&id=".$row ['id']. "'>Active</a></span>&nbsp;&nbsp;&nbsp;";
                                            
                                }else{
                                    
                                    echo  "<span class ='badge badge-pending'><a href='?type=status&operation=active&id=".$row ['id']. "'>Deactive</a></span>&nbsp;&nbsp;&nbsp;";

                                    
                                }
                                echo  "<span class ='badge badge-edit'><a href='manage_categories.php?id=".$row ['id']. "'>Edit</a></span>&nbsp;&nbsp;&nbsp;";
                                echo  "<span class ='badge badge-delete'><a href='?type=delete&id=".$row ['id']. "'>Delete</a></span>";
                                ?>
                            
                            </td>
							</tr>
                                    <?php
                                }
                            ?>
						
						
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>