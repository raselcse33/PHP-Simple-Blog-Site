<?php include 'inc/header.php';?>
<?php 
if(!isset($_GET['cetegory'])|| $_GET['cetegory']==null){
	header("Location:404.php");
}else{
	$id=$_GET['cetegory'];
}

?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

       <?php
		$query="select * from tbl_post where cat=$id";
		$post=$db->select($query);
		if($post){
			while ($result=$post->fetch_assoc()) {     

		?>
		<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatdate($result['date']);?>, By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $fm->textshort($result['body']);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id'];?>">Read More</a>
				</div>
			</div>

			<?php } } else{?>
			<h3>No post available</h3>
			<?php }?>






</div>
<?php include 'inc/sideber.php';?>
<?php include 'inc/footer.php';?>