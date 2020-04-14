<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
    if($login == false){
        header("Location:login.php");
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
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php';?>