<?php
include("../models/db_model.php");
include("../models/usuario.php");

class Login extends class_db {

    function __construct(){
        parent::__construct();
    }


    function __destruct(){
        parent::__destruct();
    }

    function check_user($user){
        $sql="SELECT * FROM usuarios u WHERE u.id_usuario='$user'";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $renglon=mysqli_fetch_array($rs);
        $cuantos=$renglon[0];
        return $cuantos;
    }

    

}