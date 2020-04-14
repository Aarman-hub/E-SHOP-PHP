<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			
			<?php
                $getiphon   = $pd->getIphone(); 
                if($getiphon){
                    while($result = $getiphon->fetch_assoc()){ 
            ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" / ></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['ProductName']; ?></h2>
						<p><?php echo $fm->textShorten($result['body'],20); ?></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?>" >Add to cart</a></span></div>
				   </div>
			   </div>		
			   <?php  }  } ?>
			   
			   
			   <?php
                    $getsumsung  = $pd->getsumsung();
                    if($getsumsung){
                        while($result = $getsumsung->fetch_assoc()){  
                ?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $result['ProductName']; ?></h2>
						  <p><?php echo $fm->textShorten($result['body'],20); ?></p>
						  <div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?>">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<?php  }  } ?>
			<?php
                $getiacer   = $pd->getacer();
                if($getiacer){
                    while($result = $getiacer->fetch_assoc()){ 
            ?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" / ></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $result['ProductName']; ?></h2>
						<p><?php echo $fm->textShorten($result['body'],20); ?></p>
						<div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php  }  } ?>
			   	<?php
                    $geticanon   = $pd->getIcanon();
                    if($geticanon){
                        while($result = $geticanon->fetch_assoc()){ 
                ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proId=<?php echo $result['ProductId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $result['ProductName']; ?></h2>
						  <p><?php echo $fm->textShorten($result['body'],20); ?></p>
						  <div class="button"><span><a href="details.php?proId=<?php echo $result['ProductId']; ?> ">Add to cart</a></span></div>
					</div>
				</div>
				<?php  }  } ?>
				
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>