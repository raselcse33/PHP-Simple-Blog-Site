<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>View Message</h2>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    echo "<script> window.location='inbox.php'</script>";

}

?>

                <div class="block">   
                <?php
                if(!isset($_GET['viewid'])||$_GET['viewid']==NULL){
                    echo "<script> window.location='inbox.php'</script>";
                }else{
                    $id=$_GET['viewid'];
                    $query="select * from tbl_contuct where id='$id'";
                    $select=$db->select($query);
                    if($select){
                        while($result=$select->fetch_assoc()){
                ?>            
                 <form action="" method="POST">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['firstname'].''.$result['lastname'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name="date" value="<?php echo $result['date'];?>" class="medium" />
                            </td>
                        </tr>
                   
                 
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"><?php echo $result['body'];?></textarea>
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

                    <?php } } }?>
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



