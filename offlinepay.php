<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php 
    if(isset($_GET['orderid']) && $_GET['orderid']== 'order'){
     $cmrid  = Session::get("cusId");
     $insertord = $cart->orderproduct($cmrid);
     $deldata    = $cart->detcatdata();   
     header("Location:success.php");   
    } 
?>
<style>
    .division{width: 50%; float: left; }  
    .ordernow{}
    .ordernow a{text-align: center; padding: 15px 20px; background: green; width: 200px; border-radius: 5px; color: aqua;  margin: 20px auto 0; display: block; font-size: 30px;}
    .ordernow a:hover{background: red;}
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="division">
                <table class="tblone">
                    <tr>
                        <th width="5">SL</th>
                        <th width="20%">Product</th>
                        <th width="10%">Price</th>
                        <th width="25%">Quantity</th>
                        <th width="10%">Total</th>
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
                        <td>$<?php echo $presutl['price']; ?></td>
                        <td><?php echo $presutl['quantity']; ?></td>

                        <td>$<?php 
                            $totalprice = $presutl['price']*$presutl['quantity'];
                            echo $totalprice; ?></td>
                    </tr>
                    <?php 
                        $qty   = $qty +  $presutl['quantity']; 
                        $sum   = $sum +$totalprice;
                    ?>
                    <?php  } } ?>
                </table>
                <table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Quentity</th>
								<td> : </td>
								<td><?php echo $qty;?></td>
							</tr>
							<tr>
								<th>Sub Total</th>
								<td> : </td>
								<td>TK. <?php echo $sum;?> </td>
							</tr>
							<tr>
								<th>VAT</th>
								<td> : </td>
								<td>10% = <?php echo  $vat  = $sum * 0.1; ?></td>
							</tr>
							<tr>
								<th>Grand Total</th>
								<td> : </td>
								<td>TK. <?php
                                    $vat  = $sum * 0.1;
                                    $total = $sum+$vat;
                                    echo $total;
                                    ?></td>
							</tr>
					   </table>
            </div>
            <div class="division">
                <?php
            $id = Session::get("cusId");
            $getdata    = $cus->getcustomarpdata($id);
            if($getdata){
                while($resutl   = $getdata->fetch_assoc()){ ?>
            <table class="tblone">
               <tr>
                   <td colspan="3"><h2>Youser Profile Details</h2></td>
               </tr>
                <tr>
                    <td width="25%">Name</td>
                    <td width="5">:</td>
                    <td><?php echo $resutl['name']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $resutl['address']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $resutl['city']; ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><?php echo $resutl['country']; ?></td>
                </tr>
                <tr>
                    <td>Zcode</td>
                    <td>:</td>
                    <td><?php echo $resutl['zcode']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $resutl['phone']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?php echo $resutl['email']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="editeprofile.php">Update Profile</a></td>
                </tr>
            </table>
         <?php }  } ?>
            </div>
        </div>
       <div class="clear"></div>
       <div class="ordernow">
           <a href="?orderid=order">Order Now</a>
       </div>
    </div>
 </div>
<?php include'inc/footer.php';?>