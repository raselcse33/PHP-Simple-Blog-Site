<?php include 'inc/header.php';?>

<?php
if(!isset($_GET['pageid']) || $_GET['pageid']==NULL){
	header("Location:404.php");
}else{
	$id=$_GET['pageid'];
}

?>

	<div class="contentsection contemplete clear">

		<?php 
		$query="select * from tbl_page where id='$id'";
		$select=$db->select($query);
		if($select){
			while ($result=$select->fetch_assoc()) {

		?>
		<div class="maincontent clear">
			<div class="about">
				<h2>About us</h2>
	
				<p><?php echo $result['body'];?></p>
	       </div>
         
		</div>
		<?php } } else{header("Location:404.php");}?>

		<?php include 'inc/sideber.php';?>
		<?php include 'inc/footer.php';?>

	