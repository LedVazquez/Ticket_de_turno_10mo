<?php
	include('../models/ticket.php');
	include('../models/db_model.php');

	class TicketController extends class_db{

		function __construct(){
            parent::__construct();
        }

		function __destruct(){
            parent::__destruct();
        }

		function get_one_ticket($parameter){
			$parameter=$this->db_conn->real_escape_string($parameter);
            $sql="select * from tickets where nom_completo='$parameter' or curp='$parameter'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $tickets=mysqli_num_rows($result);
            $obj_det=null;

			if ($tickets>0){
                $i=0;
                while ($renglon = mysqli_fetch_assoc($result)){
                    $obj_det=new aspirantes(
                            $renglon["id_ticket"],
                            $renglon["nom_completo"],
                            $renglon["curp"],
                            $renglon["nombres"],
                            $renglon["paterno"],
                            $renglon["materno"],
                            $renglon["telefono"],
                            $renglon["celular"],
							$renglon["email"],
                            $renglon["nivel"],   
                            $renglon["estatus"]
                        );

                    
                    $lista[$i]=$obj_det;
					$i++;
                    unset($obj_det);

 


                }//end while    
                    return $lista;
            }//end if 
		}

		function insertar_aspirante($obj){
            
            $fecha=date("Y-m-d H:i:s");
            $sql="insert into tickets(";
            $sql.="id_ticket,";
            $sql.="nom_completo,";
            $sql.="curp,";
            $sql.="nombres,";
            $sql.="paterno,";
            $sql.="materno,";
            $sql.="telefono,";
			$sql.="celular,";
			$sql.="email,";
			$sql.="nivel,";                                                
            $sql.="estatus)";            
            $sql.=" values (";
            $sql.="'".$obj->get_nom_completo()."',";    
            $sql.="'".$obj->get_curp()."',";
            $sql.="'".$obj->get_nombres()."',";
            $sql.="'".$obj->get_paterno()."',";
            $sql.="'".$obj->get_materno()."',";
            $sql.="'".$obj->get_telefono()."',";
            $sql.="'".$obj->get_celular()."',";
			$sql.="'".$obj->get_email()."',";
			$sql.="'".$obj->get_nivel()."',";
			$sql.="'".$obj->get_estatus()."'";
            $sql.=")";

 

            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }

 

            unset($obj);
            return $insertado;
        }//end function
		
	}
?>