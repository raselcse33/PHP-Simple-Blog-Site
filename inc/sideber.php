<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
					<?php
					$query="SELECT * FROM tbl_category";
					$cetegory=$db->select($query);
					if($cetegory){
						while($result=$cetegory->fetch_assoc()){	
					?>
						<li><a href="posts.php?cetegory=<?php echo $result['id'];?>"><?php echo $result['name'];?></a></li>
						<?php } } else {?>
						<li> No cetegory found</li>
						<?php }?>
												
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
				$query="select * from tbl_post limit 5";
				$post=$db->select($query);
				if($post){
					while($result=$post->fetch_assoc()){

				?>
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php echo $fm->textshort($result['body'],125);?>	
					</div>

					<?php } } else{header("Location:404.php");}?>
					
					
	
			</div>
			
		</div>