<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Post Title</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="select * from tbl_slide";
				    $select=$db->select($query);
				    if($select){
				    	$i=0;
				    	while($result=$select->fetch_assoc()){
				    		$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><img height="40px" width="60px" src="<?php echo $result['image'];?>" alt=""></td>
							
							<td>

							 
                            <?php 
                            if(session::get('userRole')=='0'){

                            ?>
							
							<a href="editslide.php?slideeditid=<?php echo $result['id'];?>">Edit</a> || 
							<a onclick="return confirm('Are you sure to Delete')" href="deleteslide.php?slidedelid=<?php echo $result['id'];?>">Delete</a></
							<?php }?>

							</td>
						</tr>
						<?php } } ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
     <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>


    <?php include 'inc/footer.php';?>




