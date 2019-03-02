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
		$username=$fm->validation($_POST['username']);
		$password=$fm->validation(md5($_POST['password']));

		$username=mysqli_real_escape_string($db->link,$username);
		$password=mysqli_real_escape_string($db->link,$password);

		$query="SELECT * FROM tbl_user WHERE username='$username' AND password='$password' ";
		$result=$db->select($query);
		if($result!=false){
			$value=$result->fetch_assoc();
			
				session::set("login",true);
				session::set("username",$value['username']);
				session::set("userId",$value['id']);
				session::set("userRole",$value['role']);
				header("Location:index.php");

		}else{
			echo "not match username & password";

		}


	}

	?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forget password</a>
		</div>
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>