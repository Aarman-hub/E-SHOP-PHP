<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
       <?php 
            if(isset($_GET['shiftid'])){
                $shiftid    = $_GET['shiftid'];
                $price    = $_GET['price'];
                $date    = $_GET['date'];
                $shift  = $cart->productshift($shiftid,$price,$date);
            }
            if(isset($_GET['delid'])){
                $delid     = $_GET['delid'];
                $price     = $_GET['price'];
                $date      = $_GET['date'];
                $delorder  = $cart->Orderdelelte($delid,$price,$date);
            }
        ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php 
                    if(isset($shift)){
                        echo $shift;
                    }
                    if(isset($delorder)){
                        echo $delorder;
                    }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Id</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quentity</th>
							<th>Price</th>
							<th>Cust Id</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
                        $cpro   = $pro->getcustordaredProduct();
                        if($cpro){
                            while($result = $cpro->fetch_assoc()){
                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->dateFormat($result['date']); ?></td>
							<td><?php echo $result['ProductName']; ?></td>
							<td><?php echo $result['quantity']; ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><?php echo $result['cmrId']; ?></td>
							<td><a href="customar.php?cusid=<?php echo $result['cmrId']; ?>">Cust View</a></td>
							<?php if($result['status']=='0'){ ?>
							<td><a href="?shiftid=<?php echo $result['cmrId']; ?> & price=<?php echo $result['price']; ?> & date=<?php echo $result['date']; ?> ">Shifte</a></td>
							<?php }elseif($result['status']=='1'){ ?>
							    <td>Pending</td>
							<?php }else{ ?>
							    <td><a href="?delid=<?php echo $result['cmrId']; ?> & price=<?php echo $result['price']; ?> & date=<?php echo $result['date']; ?> ">Remove</a></td>
							<?php  } ?>
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
