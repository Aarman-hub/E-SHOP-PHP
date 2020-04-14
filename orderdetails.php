<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php 
    if(isset($_GET['confid'])){
        $confid     = $_GET['confid'];
        $price      = $_GET['price'];
        $date       = $_GET['date'];
        $confirm    = $cart->confirmshiftorder($confid,$price,$date);
    }
?>
<style>
    .order h2{
    }
    .order{
    }
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="order">
                <h2>Your Order Details</h2>
                <table class="tblone">
							<tr>
							    <th>No</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Quantity</th> 
								<th>Total Price</th>
								<th>Date</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							
							<?php 
                            $cusid  = Session::get("cusId");
                            $getorderPro    = $cart->getorderproduct($cusid);
                            if($getorderPro){
                                $i      = 0;
                                while($presutl = $getorderPro->fetch_assoc()){
                                 $i++;   
                            ?>
							<tr>
							    <td><?php echo $i; ?></td>
								<td><?php echo $presutl['ProductName']; ?></td>
								<td><img src="admin/<?php echo $presutl['image']; ?>" alt=""/></td>
								<td><?php echo $presutl['quantity']; ?></td>
								<td><?php echo $presutl['price']; ?></td>
                                <td><?php echo $fm->dateFormat($presutl['date']);?></td>
                                <td><?php if($presutl['status']=='0'){
                                        echo "pending";
                                        }elseif($presutl['status']=='1'){
                                        echo "Shifte";
                                        }else{
                                        echo "Ok";
                                    } ?></td>
                                <?php if($presutl['status']=='1'){  ?>  
								<td><a href="?confid=<?php echo $cusid; ?> & price=<?php echo $presutl['price']; ?> & date=<?php echo $presutl['date']; ?> ">Confirm</a></td>
                                <?php }elseif($presutl['status']=='2'){?>
                                <td>Ok</td>
                                <?php }elseif($presutl['status']=='0'){ ?>
                                    <td>N/A</td>
                                <?php } ?>    
							</tr>
							<?php  } } ?>
							
							
						</table>
            </div>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>