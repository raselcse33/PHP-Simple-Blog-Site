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
if(!isset($_GET['delid']) || $_GET['delid']== NULL){
	 echo "<script> window.location='postlist.php'</script>";
	}else{
		$id=$_GET['delid'];
		$query="select * from tbl_post where id='$id'";
		$select=$db->select($query);
		if($select){
			while($deletlink=$select->fetch_assoc()){
				$deleteimage=$deletlink['image'];
				unlink($deleteimage);
			}
		}
		$query="delete from tbl_post where id='$id'";
		$deletepost=$db->delete($query);
		if($deletepost){
			echo "<script> alert('data delete successfully');</script>";
			echo "<script> window.location='postlist.php'</script>";

		}else{
			echo "<script> alert('data not delete successfully');</script>";
			echo "<script> window.location='postlist.php'</script>";

		}

	}

?>