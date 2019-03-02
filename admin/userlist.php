<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Profile List</h2>

           <?php
           if(isset($_GET['delid'])){
           	$id=$_GET['delid'];
           	$query="delete from tbl_user where id='$id'";
           	$deletecetagory=$db->delete($query);
           	if($deletecetagory){
           		echo "<span class='success'>Delete profile</span>";
           	}else{
           		echo "<span class='error'>not profile</span>";
           	}
           }
           
           ?>     
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>User Name</th>
              <th>Email</th>
              <th>Details</th>
              <th>Role</th>
              <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="select * from tbl_user order by id desc";
					$select=$db->select($query);
					if($select){
						$i=0;
						while($result=$select->fetch_assoc()){
							$i++;

					?>

						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name'];?></td>
              <td><?php echo $result['username'];?></td>
              <td><?php echo $result['email'];?></td>
              <td><?php echo $result['details'];?></td>
              <td>
                <?php
                if($result['role']=='0'){
                  echo "Admin";
                }if ($result['role']=='1') {
                  echo "Author";
                }if($result['role']=='2'){
                  echo "Editor";
                }

                ?>
                  
                </td>
							<td>
                <a href="viewprofile.php?viewprofileid=<?php echo $result['id'];?>">View</a> 
                <?php
                if(session::get('userRole')=='0'){
                ?>


                || 
							<a onclick="return confirm('Are you sure to Delete')" href="?delid=<?php echo $result['id'];?>">Delete</a>
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




