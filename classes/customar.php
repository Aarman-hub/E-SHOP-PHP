<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php 
/*
***
*Customar CLASS
***
*/
class Customar{
    private  $db;
	private  $fm;
    
    public function __construct(){
    $this->db = new Database();
    $this->fm = new format();
    }
    
    public function customaRegister($data){
        
        $name       = $this->fm->validation($data['name']);
        $address    = $this->fm->validation($data['address']);
        $city       = $this->fm->validation($data['city']);
        $country    = $this->fm->validation($data['country']);
        $zcode      = $this->fm->validation($data['zcode']);
        $phone      = $this->fm->validation($data['phone']);
        $email      = $this->fm->validation($data['email']);
        $password   = $this->fm->validation(md5($data['password']));
        
        
        $name         = mysqli_real_escape_string($this->db->link,$name);
        $address      = mysqli_real_escape_string($this->db->link,$address);
        $city         = mysqli_real_escape_string($this->db->link,$city);
        $country      = mysqli_real_escape_string($this->db->link,$country);
        $zcode        = mysqli_real_escape_string($this->db->link,$zcode);
        $phone        = mysqli_real_escape_string($this->db->link,$phone);
        $email        = mysqli_real_escape_string($this->db->link,$email);
        $password     = mysqli_real_escape_string($this->db->link,$password);
        
        if( $name == " " || $address == " " || $city == " " || $country == " " || $zcode == " " ||$phone == " " ||$email == " " || $password == " "){
                echo '<h2 style="color:red; font-size:16px;">File must not be empty</h2>';
        }
        $mailquery  = "SELECT * FROM shop_tbl_customar WHERE email='$email' limit 1 ";
        $mailchack  = $this->db->select($mailquery);
        if($mailchack != false){
            $msg    = "<h2 style='color:red; font-size:16px;'>Mail Already Exsits!</h2>";
            return $msg;
        }else{
            $query  = "INSERT INTO shop_tbl_customar(name, address, city, country, zcode, phone,email,password) VALUES('$name', '$address', '$city', '$country', '$zcode', '$phone', '$email','$password') ";
            $inser_row  = $this->db->insert($query);
            if($inser_row){
                 echo '<h2 style="color:green; font-size:16px;">Register Successfully</h2>';
            }else{
                echo '<h2 style="color:red; font-size:16px;">Register Failed!!</h2>';
            }
        }
    }
    public function customarlogin($value){
        $email      = $this->fm->validation($value['email']);
        $password   = $this->fm->validation(md5($value['password']));
        
        $email        = mysqli_real_escape_string($this->db->link,$email);
        $password     = mysqli_real_escape_string($this->db->link,$password);
        
        if(empty($email) || empty($password)){
          $msg    = "<h2 style='color:red; font-size:16px;'>File must not be empty!</h2>";
        return $msg;  
        }
        $logquery  = "SELECT * FROM shop_tbl_customar WHERE email='$email' AND  password='$password' ";
        $logchack  = $this->db->select($logquery);
        if($logchack != false){
            $result     = $logchack->fetch_assoc();
            Session::set("cusLogin", true);
            Session::set("cusId", $result['id']);
            Session::set("cusName",$result['name']);
            header("Location:order.php");
        }else{
            $msg    = "<h2 style='color:red; font-size:16px;'>Email or Password Not Match!!</h2>";
            return $msg;  
        }
    }
    
    public function getcustomarpdata($id){
       $cusquery  = "SELECT * FROM shop_tbl_customar WHERE id='$id' ";
       $chackcuspro = $this->db->select($cusquery); 
        return $chackcuspro;
    }
    
    function updatecustomarpro($data,$cmrid){
        $name       = $this->fm->validation($data['name']);
        $address    = $this->fm->validation($data['address']);
        $city       = $this->fm->validation($data['city']);
        $country    = $this->fm->validation($data['country']);
        $zcode      = $this->fm->validation($data['zcode']);
        $phone      = $this->fm->validation($data['phone']);
        $email      = $this->fm->validation($data['email']);
        
        
        $name         = mysqli_real_escape_string($this->db->link,$name);
        $address      = mysqli_real_escape_string($this->db->link,$address);
        $city         = mysqli_real_escape_string($this->db->link,$city);
        $country      = mysqli_real_escape_string($this->db->link,$country);
        $zcode        = mysqli_real_escape_string($this->db->link,$zcode);
        $phone        = mysqli_real_escape_string($this->db->link,$phone);
        $email        = mysqli_real_escape_string($this->db->link,$email);
        
        if( $name == " " || $address == " " || $city == " " || $country == " " || $zcode == " " ||$phone == " " ||$email == " " ){
                echo '<h2 style="color:red; font-size:16px;">File must not be empty</h2>';
        }else{
            $query  = "UPDATE shop_tbl_customar SET
                name        ='$name', 
                address     ='$address', 
                city        ='$city', 
                country     ='$country', 
                zcode       ='$zcode', 
                phone       ='$phone', 
                email       ='$email' 
                
                WHERE id='$cmrid' ";
            $updatecmrpro      = $this->db->update($query);
            if($updatecmrpro){
                echo '<h2 style="color:green; font-size:16px;">Customar Profile Update succesfully</h2>';
            }else{
               echo '<h2 style="color:red; font-size:16px;">Customar Profile Update not succesfully!!!!</h2>'; 
            }
            
        }
    }
    
    
    
    
}