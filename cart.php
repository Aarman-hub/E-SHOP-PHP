<?php include'inc/header.php'; ?>
<?php 
    if(isset($_GET['delpro'])){
        $detId  = $_GET['delpro'];
        $delpro = $cart->detprobyid($detId);
        } ?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $cartid      = $_POST['cartid'];
    $quantity    = $_POST['quantity'];
    $upddcart     = $cart->updetetocart($quantity,$cartid);
    if($quantity <= 0){
        $delpro = $cart->detprobyid($cartid);
    }
}
?>
<?php if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=Arman' />";
} ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php
                if(isset($upddcart)){
                    echo $upddcart;
                }
                if(isset($delpro)){
                    echo $delpro;
                }
                ?>
						<table class="tblone">
							<tr>
							    <th width="5">SL</th>
								<th width="20%">Product Name</th>
								<th width="20%">Image</th>
								<th width="10%">Price</th>
								<th width="25%">Quantity</th>
								<th width="10%">Total Price</th>
								<th width="15%">Action</th>
							</tr>
							
							<?php 
                            $getPro    = $cart->getcartproduct();
                            if($getPro){
                                $i      = 0;
                                $sum    = 0;
                                $qty    = 0;
                                while($presutl = $getPro->fetch_assoc()){
                                 $i++;   
                            ?>
							<tr>
							    <td><?php echo $i; ?></td>
								<td><?php echo $presutl['ProductName']; ?></td>
								<td><img src="admin/<?php echo $presutl['image']; ?>" alt=""/></td>
								<td><?php echo $presutl['price']; ?></td>
								
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartid" value="<?php echo $presutl['cartid']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $presutl['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								
								<td><?php 
                                    $totalprice = $presutl['price']*$presutl['quantity'];
                                    echo $totalprice; ?></td>
								<td><a onclick="return confirm('Are you sure to delete this Product'); " href="?delpro=<?php echo $presutl['cartid']; ?>">X</a></td>
							</tr>
							<?php 
                                $qty   = $qty +  $presutl['quantity']; 
                                $sum   = $sum +$totalprice;
                                Session::set("qty",$qty);
                                Session::set("sum",$sum);
                            ?>
							<?php  } } ?>
							
							
						</table>
						<?php 
                            $getdate = $cart->getcartdata();
                            if($getdate){
                        ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $sum;?> </td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. <?php
                                    $vat  = $sum * 0.1;
                                    $total = $sum+$vat;
                                    echo $total;
                                    ?></td>
							</tr>
					   </table>
					   <?php } else{ header("Location:index.php");
                                //echo "Cart Empty!! Please shop now.";
                            } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.PHP"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
<?php include'inc/footer.php';?>