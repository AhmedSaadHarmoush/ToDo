<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of manage_todo
 *
 * @author DELL-AO
 */
class manage_todo {

    public $con;

    public function __construct() {
        include_once ('db_connect.php');
        $connect = new db_connect();
        $this->con = $connect->connect();
    }

    function create_todo($table_name, $array) {
        $con = $this->con;
        $keys = implode(",", array_keys($array));
        $valuees = "'" . implode("'" . "," . "'", array_values($array)) . "'";

         $query = "INSERT INTO $table_name VALUES (NULL," . "$valuees)";
        try {
            $sql = mysqli_query($con, $query);

             $num=mysqli_affected_rows($con);
           //mysqli_errno($con);
        } catch (Exception $exc) {
            $exc->getMessage();
        }
        return $num;
    }
   

    function listed_todo($user, $status = NULL,$title=NULL) {
        $con = $this->con;
        if (isset($status)) {
             $query = "SELECT * FROM manage WHERE (username='$user' AND status='$status') OR ( username='$user' AND status='$status' AND title LIKE '%$title%' ) ORDER BY ID DESC";
        } else {
            $query = "SELECT * FROM manage WHERE ( username='$user' AND title LIKE '%$title%' )";
        }

        $sql = mysqli_query($con, $query);



        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $row[$i] = mysqli_fetch_array($sql);
            }
            return $row;
        }
        else
            return $num ;
    }
    function search_todo($user, $status = NULL) {
        $con = $this->con;
        if (isset($status)) {
             $query = "SELECT * FROM manage WHERE title LIKE '%$user%' AND status='$status' ORDER BY ID DESC";
        }
        $sql = mysqli_query($con, $query);
        $num = mysqli_affected_rows($con);
        $error= mysqli_connect_errno($con);
        if ($num > 0) {
            for ($i = 0; $i < $num; $i++) {
                $row[$i] = mysqli_fetch_array($sql);
            }
            return$error;
        }
        else
            return $num.$error ;
    }

    
    function count_todo($user, $status) {
        $con = $this->con;
        $query = "SELECT count(*) AS TOTAL_TODO FROM manage WHERE username='$user' AND status='$status'";
        $sql = mysqli_query($con, $query);
        $result = mysqli_fetch_object($sql);
        return $result;
    }

    function edit_todo($array, $id) {
        $con = $this->con;
        $x=0;
        foreach ($array as $key => $value) {
            $query="UPDATE manage SET $key='$value' WHERE id=$id";
            $sql = mysqli_query($con, $query);
       $x.=  mysqli_affected_rows($con);
       $x++;
        }
        return $x;
        /*$k = array_keys($array);
        $num = count($k);
        $v=  array_values($array);
        $updqeury = "UPDATE manage SET ";
        for ($i = 0; $i < $num; $i++) {

            if ($i < ($num-1)) {
                $updqeury .="'$k[$i]'='$v[$i]' , ";
            }
            else {
                $updqeury .="'$k[$i]'='$v[$i]' ";
            }
        }
        $updqeury.=" WHERE id=$id ";
        $sql = mysqli_query($con, $updqeury);
        $num = mysqli_affected_rows($con);
     echo mysqli_errno($con);
        return $updqeury . $num;*/
        
        
    }

    function delete_todo($id) {
        $con = $this->con;
        $query = "DELETE FROM manage WHERE id=$id";
        $sql = mysqli_query($con, $query);
        $num = mysqli_affected_rows($con);
        return $num;
    }

    function show_by_id($id) {
        $con = $this->con;
        $query = "SELECT * FROM manage WHERE id='$id'";
        $sql = mysqli_query($con, $query);
        $num = mysqli_affected_rows($con);
        if ($num > 0) {
            
                $row = mysqli_fetch_array($sql);
            
            return $row;
        }
        else
            return $num;
    }

}

?>
