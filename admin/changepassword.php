<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

           
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <div class="block">   

         <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
        $password=$fm->validation(md5($_POST['password']));
        $password=mysqli_real_escape_string($db->link,$password);

        $n_password=$fm->validation(md5($_POST['n_password']));
        $n_password=mysqli_real_escape_string($db->link,$n_password);

        $query="select * from tbl_user where password='$password'";
        $select=$db->select($query);
        if($select){
            while($result=$select->fetch_assoc()){
                $id=$result['id'];
            }

            $query="UPDATE tbl_user
                            SET
                         password='$n_password'
                         WHERE id='$id'";
                      $passupdate=$db->update($query);
                      if($password){
                        echo "password is change";
                      }else{
                        echo "not change";
                      }


        }else{
           echo "<span class='error'>please give the currect old password</span>";
        }


        }

            ?>





                 <form action="" method="POST" >
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="password" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="n_password" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
       <?php include 'inc/footer.php';?>