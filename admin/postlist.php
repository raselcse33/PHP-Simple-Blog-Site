<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="15%">Post Title</th>
							<th width="10%">Description</th>
							<th width="10%">Cetagory</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="15%">Date</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$query="SELECT tbl_post.*,tbl_category.name FROM tbl_post 
				            INNER JOIN tbl_category 
				            ON tbl_post.cat=tbl_category.id 
				            ORDER BY tbl_post.title DESC";
				    $select=$db->select($query);
				    if($select){
				    	$i=0;
				    	while($result=$select->fetch_assoc()){
				    		$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['title'];?></td>
							<td><?php echo $fm->textshort($result['body'],50);?></td>
							<td><?php echo $result['name'];?></td>
							<td><img height="40px" width="60px" src="<?php echo $result['image'];?>" alt=""></td>
							<td><?php echo $result['author'];?></td>
							<td><?php echo $result['tags'];?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td>

							<a href="viewpost.php?viewpostid=<?php echo $result['id'];?>">view</a> 
                            <?php 
                            if(session::get('userId')==$result['userid'] || session::get('userRole')=='0'){

                            ?>
							|| 	
							<a href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a> || 
							<a onclick="return confirm('Are you sure to Delete')" href="deletepost.php?delid=<?php echo $result['id'];?>">Delete</a></
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




