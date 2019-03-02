<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

           <?php
           if(isset($_GET['delid'])){
           	$id=$_GET['delid'];
           	$query="delete from tbl_category where id='$id'";
           	$deletecetagory=$db->delete($query);
           	if($deletecetagory){
           		echo "<span class='success'>Delete data</span>";
           	}else{
           		echo "<span class='error'>not delete</span>";
           	}
           }
           
           ?>     
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="select * from tbl_category order by id desc";
					$cetagory=$db->select($query);
					if($cetagory){
						$i=0;
						while($result=$cetagory->fetch_assoc()){
							$i++;

					?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
							<td><a href="catedit.php?catid=<?php echo $result['id'];?>">Edit</a> || 
							<a onclick="return confirm('Are you sure to Delete')" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
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




