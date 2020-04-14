<?php include'../classes/brandc.php'; 
  $brand      = new Brandd();

if(!isset($_GET['brandid'])|| $_GET['brandid'] == NULL){
        //echo "<script>window.location ='catlist.php'</script>";
        header("Location:brandlist.php");
    }else{
        $bid =$_GET['brandid'];
    }

?>
<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Brand</h2>
               <div class="block copyblock">  
               <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                    $BrnadName = $_POST['brandName'];
                    $upbrand   = $brand->updatebrand($BrnadName,$bid); } ?>
                <?php if(isset($upbrand)){
                        echo $upbrand;
                }
                ?> <?php
                   $getbrand      = $brand->getcatbyid($bid);
                    if($getbrand){
                        while($brandresult  = $getbrand->fetch_assoc()){
                   ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $brandresult['brandName']; ?>" name="brandName" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
            </div>
        </div>
<?php include'inc/footer.php'; ?>