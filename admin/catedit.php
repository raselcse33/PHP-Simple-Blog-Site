<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

        <?php
        // $_GET[] method dara catid ta dhorlam
        if(!isset($_GET['catid']) || $_GET['catid']== NULL){
            echo "<script> window.location='catlist.php'</script>";
        }else{
            $id=$_GET['catid'];
        }
        ?>
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 

               <?php
               // update code
               if($_SERVER['REQUEST_METHOD']=='POST'){
                $name=$_POST['name'];
                $name=mysqli_real_escape_string($db->link,$name);
                if(empty($name)){
                    echo "<span class='error'>Field not must be empty</span>";

                }else{
                    $query="UPDATE tbl_category
                            SET
                            name='$name'
                            WHERE id='$id'";

                    $catupdate=$db->update($query);
                    if($catupdate){
                        echo "<span class='success'>update success</span>";
                    }else{
                        echo "<span class='error'>update not success</span>";
                    }
                }
               }

               ?>


               <?php
               //data show koranor code
               $query="select * from tbl_category where id='$id' order by id desc";
               $update=$db->select($query)->fetch_assoc();
               ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $update['name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>
