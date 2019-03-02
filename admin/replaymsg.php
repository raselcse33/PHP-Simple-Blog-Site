<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Replay the message</h2>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  $toemail=$fm->validation($_POST['toemail']);
  $fromemail=$fm->validation($_POST['fromemail']);
  $subject=$fm->validation($_POST['subject']);
  $message=$fm->validation($_POST['message']);
  $sendmail=mail($toemail, $subject, $message,$fromemail);
  if($sendmail){
    echo "<span class='success'>message send successfully</span>";
  }else{
     echo "<span class='error'>message not send successfully</span>";
  }
}

?>

                <div class="block">   
                <?php
                if(!isset($_GET['repalymsg'])||$_GET['repalymsg']==NULL){
                    echo "<script> window.location='inbox.php'</script>";
                }else{
                    $id=$_GET['repalymsg'];
                    $query="select * from tbl_contuct where id='$id'";
                    $select=$db->select($query);
                    if($select){
                        while($result=$select->fetch_assoc()){
                ?>            
                 <form action="" method="POST">
                    <table class="form">
                       
                        
                         <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="toemail" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="give the email name" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="name of subject" class="medium" />
                            </td>
                        </tr>
                   
                 
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message"></textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="send" />
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



