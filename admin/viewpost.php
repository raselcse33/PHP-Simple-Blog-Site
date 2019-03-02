<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
if(!isset($_GET['viewpostid']) || $_GET['viewpostid']== NULL){
    echo "<script> window.location='postlist.php'</script>";
}else{
    $id=$_GET['viewpostid'];
}

?>
        <div class="grid_10">
        <div class="box round first grid">
        <h2>Update Post</h2>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  echo "<script> window.location='postlist.php'</script>";

}

?>

                <div class="block">    
                <?php
                $query="select * from tbl_post where id='$id'";
                $editpost=$db->select($query)->fetch_assoc();

                ?>           
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $editpost['title'];?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Cetegory</option>

                                    <?php
                                    $query="select * from tbl_category";
                                    $cetagory=$db->select($query);
                                    if($cetagory){
                                        while($result=$cetagory->fetch_assoc()){
                                    ?>
                                    <option
                                    <?php
                                    if($editpost['cat']==$result['id']){?>
                                    selected="selected";
                                    <?php }?>
                                    
                                     value="<?php echo $result['id'];?>"><?php echo $result['name'];?></option>

                                    <?php } }?>
                                    
                                </select>
                            </td>
                        </tr>
                   
                    
                       
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                              <img height="80px" width="100px" src="<?php echo $editpost['image'];?>"></br>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $editpost['body'];?>
                                </textarea>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" value="<?php echo $editpost['tags'];?>" class="medium"/>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" name="author" value="<?php echo $editpost['author'];?>" class="medium"/>
                                
                            </td>
                        </tr>

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
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



