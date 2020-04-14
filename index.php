<?php include'inc/header.php'; ?>
<?php include'inc/slider.php'; ?>
   <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      
	      <?php $getFpruduct = $pd->getProductClass();
                if($getFpruduct){
                    while($result = $getFpruduct->fetch_assoc()){ ?>
                  
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['ProductName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'],70); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?>" class="details">Details</a></span></div>
				</div>      
         <?php  }  } ?>
				
			</div>
			<div class="content_bottom">
                <div class="heading">
                <h3>New Products</h3>
                </div>
                <div class="clear"></div>
    	    </div>
			<div class="section group">
			
			<?php $getFpruduct = $pd->getNFProductClass();
                if($getFpruduct){
                    while($result = $getFpruduct->fetch_assoc()){ ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['ProductName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['body'],70); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php  }  } ?>	
				
				
			</div>
    </div>
 </div>
</div>
<?php include'inc/footer.php'; ?>