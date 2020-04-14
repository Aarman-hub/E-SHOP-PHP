<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<style>
    .payment{ margin: 0 auto; padding: 50px; text-align: center; width: 500px; min-height: 200px; border: 2px solid #000; }
    .payment h2{color: green; border-bottom: 2px solid gray; font-size: 20px;}
    .payment a{
        display: inline-block; background: green; margin: 50px 0; color: #fff; padding: 25px 20px; font-size: 20px; font-weight: 600;
    }
    .payment a:hover{background: red;}
    .back a{
        background: yellow; color: royalblue;
    }
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
               <h2>Choose Your Payment</h2>
               <a href="offlinepay.php">Off Line Payment</a>
               <a href="onlinepay.php">On Line Payment</a>
               
                <div class="back">
                    <a href="cart.php">Back to Cart</a>
                </div>
            </div>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>