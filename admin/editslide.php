<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset($_GET['slideeditid']) || $_GET['slideeditid']== NULL){
    echo "<script> window.location='slidelist.php'</script>";
}else{
    $id=$_GET['slideeditid'];
}

?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Slide</h2>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 $title = mysqli_real_escape_string($db->link, $_POST['title']);
 $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if($title==""){
     echo "<span class='error'>Field not must be empty</span>";
    }
    else{
         if(!empty($file_name)){ 
                if($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query="UPDATE tbl_slide
                            SET
                            title  ='$title',
                            image  ='$uploaded_image'
                            WHERE id='$id'";

                    $update_row = $db->update($query);
                    if ($update_row) {
                        echo "<span class='success'>Slide update Successfully.
                        </span>";
                    }else {
                        echo "<span class='error'>Slide Not update !</span>";
                    }
                }
            }else{
                    $query="UPDATE tbl_slide
                            SET
                            title  ='$title'
                            WHERE id='$id'";

                    $update_row = $db->update($query);
                    if ($update_row) {
                        echo "<span class='success'> update Successfully.
                        </span>";
                    }else {
                        echo "<span class='error'> Not update !</span>";
                    }

            }

}

}

?>

                <div class="block">    
                <?php
                $query="select * from tbl_slide where id='$id'";
                $editpost=$db->select($query);
                if($editpost){
                    while($result=$editpost->fetch_assoc()){
                ?>           
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $result['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                       
                   
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                              <img height="80px" width="100px" src="<?php echo $result['image'];?>"></br>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                       
                        

                         
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } }?>
                </div>
            </div>
        </div>

        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
         <?php include 'inc/footer.php';?>



