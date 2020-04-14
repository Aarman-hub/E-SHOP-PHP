<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include_once '../helpers/format.php';
        $fm = new format();
    include'../classes/productc.php'; 
        $pclass = new Product();

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block"> 
           <?php
            if(isset($_GET['delproduct'])){
                $detId      = $_GET['delproduct'];
                $delProduct = $pclass->detPRObyid($detId);
                }
                if(isset($delProduct)){
                echo $delProduct;
            } 
            ?> 
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">SL</th>
					<th width="10%">Name</th>
					<th width="10%">Category</th>
					<th width="10%">Brand</th>
					<th width="20%">Description</th>
					<th width="10%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Type</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
               $getproduct  = $pclass->getAllProduct(); 
                if($getproduct){
                    $i = 0;
                    while($result = $getproduct->fetch_assoc()){      
                    $i++;
             ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['ProductName']; ?></td>
					<td><?php echo $result['catname']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $fm->textShorten($result['body'],30); ?></td>
					<td><?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" alt="" height="40px;" width="60px;"></td>
					<td><?php if($result['type'] == 0 ){
                            echo "Feature";
                        }else{ echo "General"; } ?></td>
					<td><a href="editpuduct.php?editid=<?php echo $result['ProductId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this Product'); " href="?delproduct=<?php echo $result['ProductId']; ?>">Delete</a></td>
				</tr>
				<?php  } } ?>
				
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
