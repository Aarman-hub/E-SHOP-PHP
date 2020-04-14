<?php include'../classes/brandc.php'; 
  $brand      = new Brandd();
    
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Brand List</h2>
                <div class="block">   
                   <?php 
                    if(isset($_GET['delbrand'])){
                        $detId      = $_GET['delbrand'];
                        $delbrand   = $brand->detcatbyid($detId);
                        }
                        if(isset($delbrand)){
                        echo $delbrand;
                    }
                    ?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					   <?php 
                        $getBrand    = $brand->getAllbrand();
                        if($getBrand){
                            $i = 0;
                            while($brandresult  = $getBrand->fetch_assoc()){
                            $i++;
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $brandresult['brandName']; ?></td>
							<td><a href="editbrand.php?brandid=<?php echo $brandresult['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this Brand'); " href="?delbrand=<?php echo $brandresult['brandId']; ?>">Delete</a></td>
						</tr>
						<?php } } ?>
												
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

