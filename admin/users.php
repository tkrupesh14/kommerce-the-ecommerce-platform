<?php
require('top.inc.php');
if(isset($_GET['type']) && $_GET['type'] != ''){
    $type =get_safe_value($con, $_GET['type']);

    if($type == 'delete'){
    
        $id =get_safe_value($con, $_GET['id']);
        $delete = "DELETE FROM users  WHERE id = '$id'";
        $run = mysqli_query($con, $delete);
    }
    }


$sql = "SELECT * FROM users ORDER BY id DESC";
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
							   <th>Email</th>
							   <th>Mobile</th>
							   <th>Date</th>
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
					        	<td><?= $row ['name'] ?></td>
					        	<td><?= $row ['email'] ?></td>
					        	<td><?= $row ['mobile'] ?></td>
					        	<td><?= date('F jS, Y',strtotime($row['added_on'])) ?></td>
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
<?php
require('footer.inc.php');
?>