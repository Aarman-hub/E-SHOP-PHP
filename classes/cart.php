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
class Caart{
    private  $db;
	private  $fm;
    public function __construct(){
    	$this->db = new Database();
    	$this->fm = new format();
        }
    
    public function addtocart($quantity,$bid){
        $quantity      = $this->fm->validation($quantity);
        $quantity      = mysqli_real_escape_string($this->db->link,$quantity);
        $proId         = mysqli_real_escape_string($this->db->link,$bid );
        $sid           = session_id();
        
        $query      = "SELECT * FROM shop_tbl_product WHERE productId='$proId' ";
        $result     = $this->db->select($query)->fetch_assoc();
        
        $productName     = $result['ProductName'];
        $productPrice    = $result['price'];
        $productImage    = $result['image'];
        
        $query  = "INSERT INTO shop_tbl_cart(sid, productId, ProductName, price, quantity, image) VALUES('$sid', '$proId', '$productName', '$productPrice', '$quantity', '$productImage')";
            $productIns     = $this->db->insert($query);
            if($productIns){
               header("Location:cart.php");
            }else{
               header("Location:404.php"); 
            }
        
    }
    public function getcartproduct(){
        $sid           = session_id();
        $query      = "SELECT * FROM shop_tbl_cart WHERE sid='$sid' ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function updetetocart($quantity,$cartid){
        $cartid        = mysqli_real_escape_string($this->db->link,$cartid);
        $quantity      = mysqli_real_escape_string($this->db->link,$quantity);
        $query  = "UPDATE shop_tbl_cart SET
                    quantity        ='$quantity'
                    WHERE cartid ='$cartid'
                    ";
                    $upquan     = $this->db->update($query);
                    if($upquan){
                        echo '<h2 style="color:green; font-size:16px;">Quentity Update Succesfully</h2>';
                    }else{
                       echo '<h2 style="color:red; font-size:16px;">Quentity Update Not Succesfully!!!!</h2>'; 
                    }   
    }
    
    public function detprobyid($detId){
        
        $delquery = "delete from shop_tbl_cart where cartid='$detId' ";
         $delpro = $this->db->delete($delquery);
        if($delpro){
                echo "<script>window.location = 'cart.php' </script>";
            }else{
               echo '<h2 style="color:red; font-size:16px;">Product Delete not succesfully!!!!</h2>'; 
            }
    }
    public function getcartdata(){
        $sid           = session_id();
        $query      = "SELECT * FROM shop_tbl_cart WHERE sid='$sid' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function detcatdata(){
        $sid     = session_id();
        $query ="delete from shop_tbl_cart where sid='$sid' ";
        $this->db->delete($query);
    }
    
    public function orderproduct($cmrid){
        $sid        = session_id();
        $query      = "SELECT * FROM shop_tbl_cart WHERE sid='$sid' ";
        $getproduct = $this->db->select($query);
        if($getproduct){
            while($result   = $getproduct->fetch_assoc()){
                $productId       = $result['productId'];
                $productName     = $result['ProductName'];
                $productquentity = $result['quantity'];
                $productprice    = $result['price'] * $productquentity;
                $productImage    = $result['image'];
                
                $query  = "INSERT INTO shop_tbl_order(cmrId, productId, ProductName, quantity, price, image) VALUES('$cmrid', '$productId', '$productName', '$productquentity', '$productprice', '$productImage')";
                
                $orderIns     = $this->db->insert($query);
            }
        }
    }
    
    public function totalpybleamaunt($cusid){
        $query      = "SELECT price FROM shop_tbl_order WHERE cmrId='$cusid' AND date = now() ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getorderproduct($cusid){
        $query      = "SELECT * FROM shop_tbl_order WHERE cmrId='$cusid' ORDER BY date ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function getorderPro($cmrId){
        $sid           = session_id();
        $query      = "SELECT * FROM shop_tbl_order WHERE cmrId='$cmrId' ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function productshift($shiftid,$price,$date){
         $shiftid        = mysqli_real_escape_string($this->db->link,$shiftid);
         $price          = mysqli_real_escape_string($this->db->link,$price);
         $date           = mysqli_real_escape_string($this->db->link,$date);
        $query  = "UPDATE shop_tbl_order SET
                status        ='1'
                WHERE cmrId ='$shiftid' AND price='$price' AND date='$date'
                ";
                $upquan     = $this->db->update($query);
                if($upquan){
                    echo '<h2 style="color:green; font-size:16px;">Update Succesfully</h2>';
                }else{
                   echo '<h2 style="color:red; font-size:16px;">Update Not Succesfully!!!!</h2>'; 
                }
    }
    public function Orderdelelte($delid,$price,$date){
         $delid        = mysqli_real_escape_string($this->db->link,$delid);
         $price          = mysqli_real_escape_string($this->db->link,$price);
         $date           = mysqli_real_escape_string($this->db->link,$date);
        
        $delquery = "DELETE FROM shop_tbl_order  WHERE cmrId ='$delid' AND price='$price' AND date='$date' ";
         $delord = $this->db->delete($delquery);
        if($delord){
                echo '<h2 style="color:green; font-size:16px;">Order Delete succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Order Delete not succesfully!!!!</h2>'; 
            }
    }
    public function confirmshiftorder($confid,$price,$date){
         $confid        = mysqli_real_escape_string($this->db->link,$confid);
         $price          = mysqli_real_escape_string($this->db->link,$price);
         $date           = mysqli_real_escape_string($this->db->link,$date);
        $query  = "UPDATE shop_tbl_order SET
                status        ='2'
                WHERE cmrId ='$confid' AND price='$price' AND date='$date'
                ";
                $upquan     = $this->db->update($query);
                if($upquan){
                    echo '<h2 style="color:green; font-size:16px;">Update Succesfully</h2>';
                }else{
                   echo '<h2 style="color:red; font-size:16px;">Update Not Succesfully!!!!</h2>'; 
                }
    }
}