<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
    }
?>
<?php
     $cmrid    = Session::get("cusId");
     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
        $custFUp   = $cus->updatecustomarpro($_POST,$cmrid);
     } 
?>
 <div class="main">
    <div class="content">
        <div class="section group">
           <?php
            $id = Session::get("cusId");
            $getdata    = $cus->getcustomarpdata($id);
            if($getdata){
                while($resutl   = $getdata->fetch_assoc()){ ?>
            <form action="" method="post">
                <table class="tblone">
                  
                   <tr>
                      <td colspan="2"><h2>
                       <?php
                        if(isset($custFUp)){
                            echo $custFUp;
                        }
                       ?>
                   </h2></td>
                   </tr>
                   <tr>
                       <td colspan="2"><h2>Update Youser Profile Details</h2></td>
                   </tr>
                    <tr>
                        <td width="15%">Name</td>
                        <td><input type="text" name="name" value="<?php echo $resutl['name']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" value="<?php echo $resutl['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><input type="text" name="city" value="<?php echo $resutl['city']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><input type="text" name="country" value="<?php echo $resutl['country']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Zcode</td>
                        <td><input type="text" name="zcode" value="<?php echo $resutl['zcode']; ?>"></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone" value="<?php echo $resutl['phone']; ?> "></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" name="email" value="<?php echo $resutl['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" value="Update"></td>
                    </tr>
                </table>
            </form>
         <?php }  } ?>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>