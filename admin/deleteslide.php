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
if(!isset($_GET['slidedelid']) || $_GET['slidedelid']== NULL){
	 echo "<script> window.location='slidelist.php'</script>";
	}else{
		$id=$_GET['slidedelid'];
		$query="select * from tbl_slide where id='$id'";
		$select=$db->select($query);
		if($select){
			while($deletlink=$select->fetch_assoc()){
				$deleteimage=$deletlink['image'];
				unlink($deleteimage);
			}
		}
		$query="delete from tbl_slide where id='$id'";
		$deletepost=$db->delete($query);
		if($deletepost){
			echo "<script> alert('slide delete successfully');</script>";
			echo "<script> window.location='slidelist.php'</script>";

		}else{
			echo "<script> alert('slide not delete successfully');</script>";
			echo "<script> window.location='slidelist.php'</script>";

		}

	}

?>