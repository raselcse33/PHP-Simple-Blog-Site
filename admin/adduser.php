<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">

            <?php
            if(!session::get('userRole')=='0'){
                echo "<script> window.location='userlist.php'</script>";
            }

            ?>
		
            <div class="box round first grid">
                <h2>Add New User</h2>

                
               <div class="block copyblock"> 

               <?php
               if($_SERVER['REQUEST_METHOD']=='POST'){

               $username=$fm->validation($_POST['username']);
               $password=$fm->validation(md5($_POST['password']));
               $email=$fm->validation($_POST['email']);
               $role=$fm->validation($_POST['role']);
               
                $username = mysqli_real_escape_string($db->link,$username);
                $password = mysqli_real_escape_string($db->link,$password);
                $email    = mysqli_real_escape_string($db->link,$email);
                $role     = mysqli_real_escape_string($db->link,$role);

                if(empty($username)) {
                    $error="field not be empty";
            }elseif(empty($password)){
                $error="field not be empty";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $emailmsg="valied email must be provide";
            }else{

                $query="select * from tbl_user where email='$email' limit 1";
                $cheekemail=$db->select($query);
                if($cheekemail!=false){
                    echo "<span class='error'>Email Allready Exit</span>";
                }
                else{
                    $query="INSERT INTO  tbl_user(username,password,email,role) VALUES ('$username','$password','$email','$role')";
                    $adduser=$db->insert($query);
                    if($adduser){
                        echo "<span class='success'>User create success</span>";
                    }else{
                        echo "<span class='error'>user not success</span>";
                    }
                }
              }
          }

               ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>User Name</label>

                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter Username." class="medium" />
                                <?php if(isset($error)){ echo "<span style='color:red'>$error</span>";}?>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Password</label>
                            </td>
                            <td>
                                <input type="text" name="password" placeholder="Enter password." class="medium" />
                                <?php if(isset($error)){ echo "<span style='color:red'>$error</span>";}?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter  valid email." class="medium" />
                                <?php if(isset($emailmsg)){ echo "<span style='color:red'>$emailmsg</span>";}?>
                            </td>
                        </tr>




                        <tr>
                            <td>
                                <label>Rule</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select the user rule</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
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
                </div>
            </div>
        </div>
        <?php include 'inc/footer.php';?>
