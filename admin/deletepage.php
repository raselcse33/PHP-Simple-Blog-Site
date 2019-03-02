<?php
include '../lib/session.php';
session::cheeksession();
?>
<?php include '../lib/Database.php';?>
<?php include '../config/config.php';?>
<?php include '../helpers/format.php';?>

<?php 
$db=new Database();
?>
<?php
if(!isset($_GET['pageid']) || $_GET['pageid']== NULL){
	 echo "<script> window.location='index.php'</script>";
	}else{
		  $id=$_GET['pageid'];
		  $query="delete from tbl_page where id='$id'";
		  $deletepage=$db->delete($query);
		  if($deletepage){
		  echo "<script> alert('page delete successfully');</script>";
		  echo "<script> window.location='index.php'</script>";

		   }else{
			echo "<script> alert('data not delete successfully');</script>";
			echo "<script> window.location='index.php'</script>";
		   }
	}

?>