﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST'){
                  $note =$fm->validation($_POST['note']);
                   $note = mysqli_real_escape_string($db->link, $note);
                   if($note==""){
                    echo "<span class='error'>Field not must be empty</span>";
                }else{
                    $query="UPDATE tbl_copyright
                                        SET
                                        note ='$note'
                                        WHERE id='1'";
                                $update_row = $db->update($query);
                                if ($update_row) {
                                    echo "<span class='success'>Post update Successfully.
                                    </span>";
                                }else {
                                    echo "<span class='error'>Post Not update !</span>";
                                }

                }
              }

                ?>
                <div class="block copyblock"> 
                <?php
                $query="select * from tbl_copyright where id='1'";
                $select=$db->select($query);
                if($select){
                    while($result=$select->fetch_assoc()){
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note'];?>" name="note" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>
     <?php include 'inc/footer.php';?>