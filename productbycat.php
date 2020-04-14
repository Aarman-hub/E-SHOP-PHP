<?php include'inc/header.php'; ?>
<?php 
if(!isset($_GET['catId'])|| $_GET['catId'] == NULL){
        //echo "<script>window.location ='catlist.php'</script>";
        header("Location:404.php");
    }else{
        $cid =$_GET['catId'];
    }
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Catagory</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      
	      <?php
              $getspcat  = $pd->getPorductbyCat($cid);
              if($getspcat){
                  while($cresult    = $getspcat->fetch_assoc()){
            ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $cresult['ProductId']; ?>"><img src="admin/<?php echo $cresult['image']; ?>" alt="" /></a>
					 <h2><?php echo $cresult['ProductName']; ?></h2>
				     <p><?php echo $fm->textShorten($cresult['body'],50); ?></p>
					 <p><span class="price"><?php echo $cresult['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $cresult['ProductId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php  } }else{
                  echo "Catagory No Avilable";
              } ?>	
				
			</div>
    </div>
 </div>
 <?php include'inc/footer.php'; ?>