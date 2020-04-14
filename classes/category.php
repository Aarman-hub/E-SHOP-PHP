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
class Category{
    private  $db;
	private  $fm;
    public function __construct(){
    	$this->db = new Database();
    	$this->fm = new format();
        }
    public function insetcat($catname){
        $catname      = $this->fm->validation($catname);
        $catname      =mysqli_real_escape_string($this->db->link,$catname);
        if(empty($catname)){
            $logmsg     = '<h2 style="color:green; font-size:16px;">Filed Must Not be Empty</h2>';
            return $logmsg;
        }else{
            $query      = "INSERT INTO shop_tbl_cat(catname) VALUES('$catname')";
            $result     = $this->db->insert($query);
            if($result){
                echo '<h2 style="color:green; font-size:16px;">Added Category succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Category add not succesfully!!!!</h2>'; 
            }
        }
    }
    public function getAllCat(){
        $query      = "SELECT * FROM shop_tbl_cat ORDER BY catId DESC ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function getcatbyid($id){
        $query      = "SELECT * FROM shop_tbl_cat WHERE catId ='$id' ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function updatecat($catname,$id){
        $catname      = $this->fm->validation($catname);
        $catname      =mysqli_real_escape_string($this->db->link,$catname);
        if(empty($catname)){
            $logmsg     = '<h2 style="color:green; font-size:16px;">Filed Must Not be Empty</h2>';
            return $logmsg;
        }else{
            $query  = "UPDATE shop_tbl_cat SET
                catname   ='$catname' WHERE catId='$id' ";
            $updatecat      = $this->db->update($query);
            if($updatecat){
                echo '<h2 style="color:green; font-size:16px;">Category Update succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Category Update not succesfully!!!!</h2>'; 
            }
        }
    }
    
    public function detcatbyid($detId){
        $delquery = "delete from shop_tbl_cat where catId='$detId' ";
         $deldate = $this->db->delete($delquery);
        if($deldate){
                echo '<h2 style="color:green; font-size:16px;">Category Delete succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Category Delete not succesfully!!!!</h2>'; 
            }
    }
    public function getAlCat(){
        $query      = "SELECT * FROM shop_tbl_cat ";
        $result     = $this->db->select($query);
        return $result;
    }
}