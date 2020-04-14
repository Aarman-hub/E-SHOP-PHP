<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php 
/*
***
*CATEGORY CLASS
***
*/
class Brandd{
    private  $db;
	private  $fm;
    
    public function __construct(){
    $this->db = new Database();
    $this->fm = new format();
    }
    
    
    public function insetbranddd($brandName){
        $brandName      = $this->fm->validation($brandName);
        $brandName      =mysqli_real_escape_string($this->db->link,$brandName);
        if(empty($brandName)){
            $logmsg     = '<h2 style="color:green; font-size:16px;">Filed Must Not be Empty</h2>';
            return $logmsg;
        }else{
            $query      = "INSERT INTO shop_tbl_brand(brandName) VALUES('$brandName')";
            $result     = $this->db->insert($query);
            if($result){
                echo '<h2 style="color:green; font-size:16px;">Added Brand succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Category Brand not succesfully!!!!</h2>'; 
            }
        }
    }
    public function getAllbrand(){
        $query      = "SELECT * FROM shop_tbl_brand ORDER BY brandId DESC ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function updatebrand($BrnadName,$bid){
        $BrnadName      = $this->fm->validation($BrnadName);
        $BrnadName      =mysqli_real_escape_string($this->db->link,$BrnadName);
        if(empty($BrnadName)){
            $logmsg     = '<h2 style="color:green; font-size:16px;">Filed Must Not be Empty</h2>';
            return $logmsg;
        }else{
            $query  = "UPDATE shop_tbl_brand SET
                brandName   ='$BrnadName' WHERE brandId='$bid' ";
            $updatebrand      = $this->db->update($query);
            if($updatebrand){
                echo '<h2 style="color:green; font-size:16px;">Brnad Update succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Brnad Update not succesfully!!!!</h2>'; 
            }
        }
    }
    public function getcatbyid($bid){
        $query      = "SELECT * FROM shop_tbl_brand WHERE brandId ='$bid' ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function detcatbyid($detId){
        $delquery  = "delete from shop_tbl_brand where brandId='$detId' ";
         $delbrand = $this->db->delete($delquery);
        if($delbrand){
                echo '<h2 style="color:green; font-size:16px;">Brnad Delete succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Brnad Delete not succesfully!!!!</h2>'; 
            }
    }
    
    
}