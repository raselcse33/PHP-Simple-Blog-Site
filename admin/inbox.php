<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                if(isset($_GET['seenid'])){
                	$seenid=$_GET['seenid'];
                	$query="UPDATE tbl_contuct
                            SET
                            status='1'
                            WHERE id='$seenid'";

                    $catupdate=$db->update($query);
                    if($catupdate){
                        echo "<span class='success'>Message send in  seen box</span>";
                    }else{
                        echo "<span class='error'>something wrong</span>";
                    }
                }


                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Body</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="select * from tbl_contuct where status='0' order by id desc";
							$select=$db->select($query);
							if($select){
								$i=0;
								while($result=$select->fetch_assoc()){
									$i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].''.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshort($result['body']);?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td><a href="viewpage.php?viewid=<?php echo $result['id'];?>">view</a> || 
								<a href="replaymsg.php?repalymsg=<?php echo $result['id'];?>">Reply</a>||
								<a onclick="return confirm('Are you sure to move')" href="?seenid=<?php echo $result['id'];?>">seen</a>
							</td>
						</tr>
						<?php } }?>
						
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Delete Message</h2>

                <?php
                if(isset($_GET['delid'])){
                	$delid=$_GET['delid'];
                $query="delete from tbl_contuct where id='$delid'";
                $delete=$db->delete($query);
                if($delete){
                	echo "<span class='success'>Message delete successfully</span>";
                }else{
                	"<span class='error'>Message not delete</span>";
                }
            }

                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Body</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="select * from tbl_contuct where status='1'";
							$select=$db->select($query);
							if($select){
								$i=0;
								while($result=$select->fetch_assoc()){
									$i++;

						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['firstname'].''.$result['lastname'];?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $fm->textshort($result['body']);?></td>
							<td><?php echo $fm->formatdate($result['date']);?></td>
							<td>
								<a href="viewpage.php?viewid=<?php echo $result['id'];?>">view</a> ||
								<a onclick="return confirm('Are you sure to Delete')" href="?delid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php } }?>
						
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