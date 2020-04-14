<?php include'inc/header.php'; ?>
<?php 
    $login  = Session::get("cusLogin");
        if($login == true){
            header("Location:order.php");
        }
?>
<?php
     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
        $custlog   = $cus->customarlogin($_POST);
     } 
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<?php if(isset($custlog)){
                    echo $custlog;
                } ?>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                <input name="email" type="text" placeholder="Email" >
                <input name="password" type="password" placeholder="Enter Your Password" >
                <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
             </form>
            </div>
    	<div class="register_account">
    	<?php
             if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
                $customar   = $cus->customaRegister($_POST);
             } 
         ?>
    		<h3>Register New Account</h3>
    		<?php if(isset($customar)){
                    echo $customar;
                } ?>
    		<form action="" method="post" >
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							    <input type="text" name="name" placeholder="Name"  >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City"  >
							</div>
							
							<div>
								<input type="text" name="zcode" placeholder="Z-Code"   >
							</div>
							<div>
								<input type="text" name="email" placeholder="Email"   >
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address" >
						</div>
                        <div>
                        	<input type="text" name="country" placeholder="Country" >
                        </div>		        
	
		           <div>
		          <input type="text" value="" name="phone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include'inc/footer.php'; ?>