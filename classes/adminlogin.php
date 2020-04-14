<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
Session::checkLogin();
include_once ($filepath.'/../helpers/format.php');

/*
***************
 ADMIN LOGIN
***************
*/
class adminLogin{
	private  $db;
	private  $fm;
    public function __construct(){
    	$this->db = new Database();
    	$this->fm = new format();
    }
    public function adminLogin($adminUser,$adminPass){
        $adminUser      = $this->fm->validation($adminUser);
        $adminPass      = $this->fm->validation($adminPass);
        
        $adminUser      =mysqli_real_escape_string($this->db->link,$adminUser);
        $adminPass      =mysqli_real_escape_string($this->db->link,$adminPass);
        
        if(empty($adminUser) || empty($adminPass)){
            $logmsg     = "User or Password Must Not be Empty";
            return $logmsg;
        }else{
            $query = "SELECT * FROM shop_tbl_admin WHERE useradmin='$adminUser' AND userpassword='$adminPass' ";
            $result     = $this->db->select($query);
            if($result  != false){
                $value      = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("adminId",   $value['adminId']);
                Session::set("username",  $value['username']);
                Session::set("useradmin", $value['useradmin']);
                header("Location:index.php");
            }else{
               $logmsg     = "User or Password Not Match!!";
               return $logmsg; 
            }
        }
    }
}