<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

class Product{
    private  $db;
    private  $fm;

    public function __construct(){
    $this->db = new Database();
    $this->fm = new format();
    }
    public function insertpruduct($data,$file){
        $productName      = $this->fm->validation($data['ProductName']);
        $productcat       = $this->fm->validation($data['catId']);
        $productbrand     = $this->fm->validation($data['brandId']);
        $productdesc      = $this->fm->validation($data['body']);
        $productprice     = $this->fm->validation($data['price']);
        $producttype      = $this->fm->validation($data['type']);
        
        $productName      = mysqli_real_escape_string($this->db->link,$productName);
        $productcat       = mysqli_real_escape_string($this->db->link,$productcat);
        $productbrand     = mysqli_real_escape_string($this->db->link,$productbrand);
        $productdesc      = mysqli_real_escape_string($this->db->link,$productdesc);
        $productprice     = mysqli_real_escape_string($this->db->link,$productprice);
        $producttype      = mysqli_real_escape_string($this->db->link,$producttype);
        
        $permited       = array('jpg', 'jpeg', 'png', 'gif');
        $file_name      = $file['image']['name'];
        $file_size      = $file['image']['size'];
        $file_temp      = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
        if($productName == " " || $productcat == " " || $productbrand == " " || $file_name == " " || $productdesc == " " || $productprice == " " ||$producttype == " "){
                echo '<h2 style="color:red; font-size:16px;">File must not be empty</h2>';
            }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query  = "INSERT INTO shop_tbl_product(ProductName, catId, brandId, body, price, image,type) VALUES('$productName', '$productcat', '$productbrand', '$productdesc', '$productprice', '$uploaded_image', '$producttype')";
            $productIns     = $this->db->insert($query);
            if($productIns){
                echo '<h2 style="color:green; font-size:16px;">Added Product Succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Category Product Not Succesfully!!!!</h2>'; 
            }
        }
    }
    public function getAllProduct(){
       /* $query  = "SELECT shop_tbl_product.*, shop_tbl_cat.catname, shop_tbl_brand.brandName FROM shop_tbl_product FROM INNER JOIN shop_tbl_cat ON shop_tbl_product.catId = shop_tbl_cat.catId
        INNER JOIN shop_tbl_brand ON shop_tbl_product.brandId = shop_tbl_brand.brandId  
        ORDER BY shop_tbl_product.ProductId DESC";*/
        
        $query  = "SELECT p.*, c.catname, b.brandName 
        FROM shop_tbl_product as p, shop_tbl_cat as c, shop_tbl_brand as b 
        WHERE p.catId = c.catId AND p.brandId = b.brandId ORDER BY p.ProductId DESC
        ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getProductId($upid){
        $query      = "SELECT * FROM shop_tbl_product WHERE ProductId='$upid' ";
        $result     = $this->db->select($query);
        return $result;
    }
    public function updatepruduct($data,$file,$upid){
        $productName      = $this->fm->validation($data['ProductName']);
        $productcat       = $this->fm->validation($data['catId']);
        $productbrand     = $this->fm->validation($data['brandId']);
        $productdesc      = $this->fm->validation($data['body']);
        $productprice     = $this->fm->validation($data['price']);
        $producttype      = $this->fm->validation($data['type']);
        
        $productName      = mysqli_real_escape_string($this->db->link,$productName);
        $productcat       = mysqli_real_escape_string($this->db->link,$productcat);
        $productbrand     = mysqli_real_escape_string($this->db->link,$productbrand);
        $productdesc      = mysqli_real_escape_string($this->db->link,$productdesc);
        $productprice     = mysqli_real_escape_string($this->db->link,$productprice);
        $producttype      = mysqli_real_escape_string($this->db->link,$producttype);
        
        $permited       = array('jpg', 'jpeg', 'png', 'gif');
        $file_name      = $file['image']['name'];
        $file_size      = $file['image']['size'];
        $file_temp      = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;
        
        if($productName == " " || $productcat == " " || $productbrand == " " || $productdesc == " " || $productprice == " " ||$producttype == " "){
                echo '<h2 style="color:red; font-size:16px;">File must not be empty</h2>';
            }else{
                if(!empty($file_name)){  
                if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";
                } 
                elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-" .implode(', ', $permited)."</span>";
                 }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                   /* $query  = "INSERT INTO shop_tbl_product(ProductName, catId, brandId, body, price, image,type) VALUES('$productName', '$productcat', '$productbrand', '$productdesc', '$productprice', '$uploaded_image', '$producttype')"; */
                    
                    $query  = "UPDATE shop_tbl_product SET
                    ProductName     ='$productName',
                    catId           ='$productcat',
                    brandId         ='$productbrand',
                    body            ='$productdesc',
                    price           ='$productprice',
                    image           ='$uploaded_image',
                    type            ='$producttype'
                    WHERE ProductId = '$upid'
                    ";
                    $productup     = $this->db->update($query);
                    if($productup){
                        echo '<h2 style="color:green; font-size:16px;">Added Product Succesfully</h2>';
                    }else{
                       echo '<h2 style="color:red; font-size:16px;">Category Product Not Succesfully!!!!</h2>'; 
                    }
                }
            }else{
                 $query  = "UPDATE shop_tbl_product SET
                    ProductName     ='$productName',
                    catId           ='$productcat',
                    brandId         ='$productbrand',
                    body            ='$productdesc',
                    price           ='$productprice',
                    type            ='$producttype'
                    WHERE ProductId = '$upid'
                    ";
                    $productup     = $this->db->update($query);
                    if($productup){
                        echo '<h2 style="color:green; font-size:16px;">Added Product Succesfully</h2>';
                    }else{
                       echo '<h2 style="color:red; font-size:16px;">Category Product Not Succesfully!!!!</h2>'; 
                    }   
                }
            } 
        }
    public function detPRObyid($detId){
        $query    = "select * from shop_tbl_product where ProductId='$detId' ";
         $getdata = $this->db->select($query);
        if($getdata){
            while($delImg = $getdata->fetch_assoc()){
                $delimglink = $delImg['image'];
                 unlink($delimglink);
                }
            }
        $delquery = "delete from shop_tbl_product where ProductId='$detId' ";
         $deldate = $this->db->delete($delquery);
        if($deldate){
                echo '<h2 style="color:green; font-size:16px;">Product Delete succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Product Delete not succesfully!!!!</h2>'; 
            }
    }
    public function getProductClass(){
        $query          = "select * from shop_tbl_product where type='0' order by ProductId desc limit 4 ";
         $getfproduct   = $this->db->select($query);
        return $getfproduct;
    }
    public function getNFProductClass(){
       $query    = "select * from shop_tbl_product order by ProductId desc limit 4 ";
         $getdata = $this->db->select($query); 
        return $getdata;
    }
    public function gettProductId($bid){
        
        $query  = "SELECT p.*, c.catname, b.brandName 
        FROM shop_tbl_product as p, shop_tbl_cat as c, shop_tbl_brand as b 
        WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.ProductId='$bid' ";
        $result = $this->db->select($query);
        return $result; 
    }
    public function getIphone(){
        $query    = "SELECT * FROM shop_tbl_product WHERE brandid = '1' ORDER BY ProductId DESC LIMIT 1";
         $getdata = $this->db->select($query);
        return $getdata;
    }
    public function getsumsung(){
        $query    = "SELECT * FROM shop_tbl_product WHERE brandid = '2' ORDER BY ProductId DESC LIMIT 1";
        $getdata = $this->db->select($query);
        return $getdata;
    }
    public function getacer(){
        $query    = "SELECT * FROM shop_tbl_product WHERE brandid = '4' ORDER BY ProductId DESC LIMIT 1";
        $getdata = $this->db->select($query);
        return $getdata;
    }
    public function getIcanon(){
        $query    = "SELECT * FROM shop_tbl_product WHERE brandid = '3' ORDER BY ProductId DESC LIMIT 1 ";
        $getdata = $this->db->select($query);
        return $getdata;
    }
    public function getPorductbyCat($cid){
        $query      = "SELECT * FROM shop_tbl_product WHERE catId='$cid' ";
        $result     = $this->db->select($query);
        return $result;
    }
    
    public function getcustordaredProduct(){
        $query      = "SELECT * FROM shop_tbl_order ORDER BY date ";
        $result     = $this->db->select($query);
        return $result;
    }
    
}