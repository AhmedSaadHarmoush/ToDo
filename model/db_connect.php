<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of db_connect
 *
 * @author DELL-AO
 */
class db_connect {

    public $con;

    public function connect() {
        try {
            $this->con = mysqli_connect("localhost", "root", "", "todo");
            return $this->con;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}

?>
