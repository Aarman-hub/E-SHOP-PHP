<?php include'../classes/brandc.php'; 
  $brand      = new Brandd();
?>
<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Brnad</h2>
               <div class="block copyblock">  
               <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                    $brandName = $_POST['brandName'];
                    $insbrand   = $brand->insetbranddd($brandName); } ?>
                    
                <?php if(isset($insbrand)){
                        echo $insbrand;
                }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Add New Brand" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include'inc/footer.php'; ?>