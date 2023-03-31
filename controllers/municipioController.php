<?php
	include('../models/municipios.php');
	include('../models/db_model.php');

	class municipiosController extends class_db{

		function __construct(){
            parent::__construct();
        }

		function __destruct(){
            parent::__destruct();
        }

		function get_municipios(){
			$sql="SELECT * FROM municipios;";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $municipias=mysqli_num_rows($result);

			$obj_det=null;

			if ($municipias>0){
                $i=0;
                while ($renglon = mysqli_fetch_assoc($result)){
                    $obj_det=new municipios(
                            $renglon["id_municipio"],
                            $renglon["municipio"]
                        );
                    print_r($obj_det);

                    
                    $lista[$i]=$obj_det;
					$i++;
                    unset($obj_det);

                }//end while    
                // var_dump($lista);
                    return $lista;
            }//end if 
		}
	}
?>