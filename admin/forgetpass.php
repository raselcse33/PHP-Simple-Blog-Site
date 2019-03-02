<?php
include '../lib/session.php';
session::init();
?>

<?php include '../lib/Database.php';?>
<?php include '../config/config.php';?>
<?php include '../helpers/format.php';?>
<?php 
$db=new Database();
$fm=new format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
	<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$email=$fm->validation($_POST['email']);
		$email=mysqli_real_escape_string($db->link,$email);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	 echo "please give the valid email";
    }else{
			$query="SELECT * FROM tbl_user WHERE email='$email'";
			$result=$db->select($query);
			if($result!=false){
				while($value=$result->fetch_assoc()){
					$userid=$value['id'];
					$username=$value['username'];
				}

				$text=substr($email, 0,3);
				$rand=rand(10000,99999);
				$pass="$text$rand";
				$newpass=md5($pass);

				$query="UPDATE tbl_user
                            SET
                         password='$newpass'
                         WHERE id='$userid'";
                      $passupdate=$db->update($query);

                      $to="$email";
                      $from="raselcse330@gmail.com";
                      $headers="From:$from/n";
                      $headers .= 'MIME-Version: 1.0'."\r\n";
                      $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                      $subject ="Your password";
                      $message = "your username is:".$username."and password is".$pass."please visit your site";

                      $sendmail=mail($to, $subject, $message, $headers);
                      if($sendmail){
                      	"<span class='success'>mail send</span>";
                      }else{
                      	echo "<span class='error'>something is wrong</span>";
                      }
			      
			
				
		}else{
			echo"<span class='error'>its not valid email</span>";

		}
	}


}

	?>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="enter the valid email " required="" name="email"/>
			</div>
			
			<div>
				<input type="submit" value="send" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">login</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>