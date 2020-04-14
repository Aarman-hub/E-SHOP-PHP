<?php include'../classes/adminlogin.php'; ?>
<?php 
$al = new adminLogin();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $adminUser = $_POST['useradmin'];
    $adminPass = md5($_POST['userpassword']);
    
    $loginChk   = $al->adminLogin($adminUser,$adminPass);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
    <div class="container">
        <section id="content">
            <form action="" method="post">
                <h1>Admin Login</h1>
                <?php if(isset($loginChk)){
                        echo $loginChk;
                }
                ?>
                <div>
                    <input type="text" placeholder="useradmin"  name="useradmin"/>
                </div>
                <div>
                    <input type="password" placeholder="Password"  name="userpassword"/>
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Training with <b>Arman V  ai</b></a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>
</html>