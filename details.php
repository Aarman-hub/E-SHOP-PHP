<?php include'inc/header.php'; ?>
<?php 
if(!isset($_GET['proId'])|| $_GET['proId'] == NULL){
        echo "<script>window.location ='404.php';</script>";
    }else{
        $bid =$_GET['proId'];
    }
?>
<?php if($_SERVER['REQUEST_METHOD']=='POST'){
    $quantity = $_POST['quantity'];
    $addcart   = $cart->addtocart($quantity,$bid); } ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
				<?php $getpro  = $pd->gettProductId($bid);
                    if($getpro){
                        while($value = $getpro->fetch_assoc()){
                    ?>			
                <div class="grid images_3_of_2">
                    <img src="admin/<?php echo $value['image']; ?>" alt="" />
                </div>
				<div class="desc span_3_of_2">
					<h2><?php echo $value['ProductName']; ?></h2>
					<p><?php echo $fm->textShorten($value['body'],170); ?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $value['price']; ?></span></p>
						<p>Category: <span><?php echo $value['catname']; ?></span></p>
						<p>Brand:<span><?php echo $value['brandName']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<div class="add-cart">
				    <a class="buysubmit" href="?wlistid=<?php echo $value['ProductId']; ?>">Add to list</a>			
				    <a class="buysubmit" href="?compareid=<?php echo $value['ProductId']; ?>">Add to compare</a>			
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $value['body']; ?></p>
	    </div>
			<?php }  } ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
                  <?php 
                    $getcat = $cat->getAlCat();
                    if($getcat){
                        while($result   = $getcat->fetch_assoc()){
                    ?>
				      <li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catname']; ?></a></li>
				   <?php   } } ?>    
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
<?php include'inc/footer.php';?>