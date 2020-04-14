<?php include'../classes/customar.php'; 
     $cus     = new Customar();

include'../classes/category.php'; 
  $cat      = new Category();
?>
<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
       <?php
        if(!isset($_GET['cusid'])|| $_GET['cusid'] == NULL){
            echo "<script>window.location ='inbox.php'</script>";
        }else{
            $id =$_GET['cusid'];
        }

        if($_SERVER['REQUEST_METHOD']=='POST'){ 
             echo "<script>window.location ='inbox.php'</script>";
        } ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customar Details</h2>
               <div class="block copyblock">  
               
                <?php 
                    $getcust    = $cus->getcustomarpdata($id);
                   if($getcust){
                       while($result    = $getcust->fetch_assoc()){  
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                           <td>Name:</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>Address</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['address']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>City</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['city']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>Country</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['country']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>Z-Code</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['zcode']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>Phone</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['phone']; ?>" class="medium" />
                            </td>
                        </tr>					
                        <tr>
                           <td>E-mail</td>
                            <td>
                                <input type="text" readonly value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php  }  } ?>
                </div>
            </div>
        </div>
<?php include'inc/footer.php'; ?>