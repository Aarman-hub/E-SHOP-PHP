<?php include'../classes/category.php'; 
  $cat      = new Category();

if(!isset($_GET['catid'])|| $_GET['catid'] == NULL){
        //echo "<script>window.location ='catlist.php'</script>";
        header("Location:catlist.php");
    }else{
        $id =$_GET['catid'];
    }

?>
<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">  
               <?php if($_SERVER['REQUEST_METHOD']=='POST'){
                    $catname = $_POST['catname'];
                    $upcat   = $cat->updatecat($catname,$id); } ?>
                <?php if(isset($upcat)){
                        echo $upcat;
                }
                ?> <?php
                   $getcat      = $cat->getcatbyid($id);
                    if($getcat){
                        while($catresult  = $getcat->fetch_assoc()){
                   ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $catresult['catname']; ?>" name="catname" class="medium" />
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