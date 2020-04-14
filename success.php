<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style>
    .order h2{
        border-bottom: 2px solid #000;
    }
    .order{
        text-align: center;
        padding: 50px;
        width: 500px;
        margin: 0 auto;
        margin-bottom: 15px;
    }
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="order">
                <h2>Success</h2>
                <?php 
                    $cusid  = Session::get("cusId");
                    $amount = $cart->totalpybleamaunt($cusid);
                    if($amount){
                        $sum   = 0;
                        while($result   = $amount->fetch_assoc()){ 
                        $price  = $result['price'];
                        $sum    = $sum + $price;
                        }  }  ?>
                <p>Total payble amount (including vat):$
                   <?php 
                        $vat    = $sum * 0.1;
                        $total  = $sum + $vat;
                        echo $total;
                    ?>
                 </p>
                <p>Thanks for success. Your order is successfullyu. We will contact your ASAP with delivary details. Here is your delivery details... <a href="orderdetails.php">Visit....</a></p>
            </div>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>