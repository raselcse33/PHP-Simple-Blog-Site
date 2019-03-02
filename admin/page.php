<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(!isset($_GET['pageid']) || $_GET['pageid']== NULL){
     echo "<script> window.location='index.php'</script>";
}else{
    $id=$_GET['pageid'];
}

?>
<style>
    .actiondel{margin-left: 10px}
    .actiondel a{border: 1px solid #ddd;color: #444;cursor: pointer;font-size: 20px;padding: 3px 8px;
font-weight: normal;
background: #F0F0F0;}

</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit Page</h2>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $body   = mysqli_real_escape_string($db->link, $_POST['body']);


    if($title==""|| $body==""){
     echo "<span class='error'>Field not must be empty</span>";
    }else{
            $query="UPDATE tbl_page
                   SET
                  title='$title',
                  body='$body'
                  WHERE id='$id'";
       $updatepage = $db->update($query);
    if ($updatepage) {
     echo "<span class='success'>page update Successfully.
     </span>";
    }else {
     echo "<span class='error'>page Not update !</span>";
    }
}



}

?>

                <div class="block">  
                <?php 
                $query="select * from tbl_page where id='$id'";
                $select=$db->select($query);
                if($select){
                    while($result=$select->fetch_assoc()){

                ?> 

                 <form action="" method="POST">
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
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                    <?php echo $result['body'];?>
                                </textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                                <span class="actiondel"> <a onclick="return confirm('Are you sure to Delete')" href="deletepage.php?pageid=<?php echo $result['id'];?>">Delete</a></span>
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



