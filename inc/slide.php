<div class="slidersection templete clear">


        <div id="slider">
        	<?php
        	$query="select * from tbl_slide";
        	$select=$db->select($query);
        	if($select){
        		while($result=$select->fetch_assoc()){
        	?>
            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="nature 1" title="<?php echo $result['title'];?>" /></a>
            <?php } }?>
            
        </div>

</div>