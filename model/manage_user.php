<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_user
 *
 * @author DELL-AO
 */
include_once ('db_connect.php');
class manage_user 
{
    
    public $con;
    function __construct() {
     $connect= new db_connect();
     $this->con= $connect->connect();
    }
    function register($array){
        $con=  $this->con;
        $k=  implode(",",  array_keys($array));
        $v= "'".  implode("'".","."'", array_values($array))."'";
        $query="INSERT INTO users ($k) VALUES ($v)";
        $sql=  mysqli_query($con, $query);
        $num=  mysqli_affected_rows($con);
        return $num;
    }
    function login($user,$pass){
         $con=  $this->con;
         $query="SELECT * FROM users WHERE username='$user' AND password='$pass'";
         $sql=  mysqli_query($con, $query);
        $num=  mysqli_affected_rows($con);
        return $num;
    }
    function user_check($user){
        $con=  $this->con;
         $query="SELECT * FROM users WHERE username='$user'";
         $sql=  mysqli_query($con, $query);
        $num=  mysqli_affected_rows($con);
        
        return $num;
    }
    function check_field($field,$data){
        $con=  $this->con;
         $query="SELECT id FROM users WHERE $field='$data'";
         $sql=  mysqli_query($con, $query);
        $num=  mysqli_affected_rows($con);
        
        return $num;
    }
    
}

?>
