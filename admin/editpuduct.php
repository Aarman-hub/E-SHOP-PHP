<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include'../classes/category.php'; ?>
<?php include'../classes/brandc.php'; ?>
<?php include'../classes/productc.php'; 
    $pclass = new Product();

if(!isset($_GET['editid'])|| $_GET['editid'] == NULL){
        echo "<script>window.location ='editpuduct.php'</script>";
    }else{
        $upid =$_GET['editid'];
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block"> 
        <?php
             if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
                $upproduct    = $pclass->updatepruduct($_POST,$_FILES,$upid);
             }
            if(isset($upproduct)){ echo $upproduct; } ?>   
            
         <?php $getporduc= $pclass->getProductId($upid); 
            if($getporduc){
                while($presult = $getporduc->fetch_assoc()){
            ?>                       
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="ProductName" value="<?php echo $presult['ProductName']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option >Select Category</option>
                            <?php
                            $cat       = new Category();
                            $catlist   = $cat->getAllCat();
                            if($catlist){
                                while($result = $catlist->fetch_assoc()){    
                            ?>
                            <option <?php if($presult['catId'] == $result['catId']){ ?>
                                 selected="selected"   
                        <?php  } ?> value="<?php echo $result['catId']; ?>"><?php echo $result['catname']; ?></option>
                            <?php    } }  ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 
                            $brand      = new Brandd();
                            $getbrand   = $brand->getAllbrand();
                            if($getbrand){
                                while($bresult = $getbrand->fetch_assoc()){
                            ?>
                            <option <?php if($presult['brandId'] == $bresult['brandId']){ ?>
                                 selected="selected"   
                        <?php  } ?> value="<?php echo $bresult['brandId']; ?>"><?php echo $bresult['brandName']; ?></option>
                            <?php  } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea name="body" class="tinymce">
                            <?php echo $presult['body']; ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $presult['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                       <img src="<?php echo $presult['image']; ?>" alt="" height="200px" width="250px" style="display:block; padding-bottom:30px;" >
                        <input name="image" type="file" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php if($presult['type']== 0){ ?>
                            <option selected="selected" value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php }else{ ?>
                            <option value="0">Featured</option>
                            <option value="1">Non-Featured</option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Udate" />
                    </td>
                </tr>
            </table>
            </form>
            <?php  } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


