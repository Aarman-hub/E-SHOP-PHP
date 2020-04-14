<?php include'../classes/category.php'; 
  $catlist      = new Category();
    
?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">   
                   <?php 
                    if(isset($_GET['delcat'])){
                        $detId  = $_GET['delcat'];
                        $delCat = $catlist->detcatbyid($detId);
                        }
                        if(isset($delCat)){
                        echo $delCat;
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
                        $getCat    = $catlist->getAllCat();
                        if($getCat){
                            $i = 0;
                            while($catresult  = $getCat->fetch_assoc()){
                           $i++;
                        ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $catresult['catname']; ?></td>
							<td><a href="editcat.php?catid=<?php echo $catresult['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this category'); " href="?delcat=<?php echo $catresult['catId']; ?>">Delete</a></td>
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

