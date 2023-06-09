<!DOCTYPE html>
<html>
<head>
<?php 
//forma fácil reutilizando estrategoa de inclusión, pero cargas cosas de más 
//include_once "inclusiones/css_y_favicon.php";
//include_once "inclusiones/js_incluidos.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
?>
<!-- forma específica pero solo incluimos lo necesario para el backend --> 
<link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
<script src="../js/sweetalert2.all.min.js" type="text/javascript"></script>
</head>
</html>
<?php
if ($_POST){
$rfc=isset($_POST["f_rfc"]) ? $rfc=strtoupper($_POST["f_rfc"]) : $rfc=null;
$nom=isset($_POST["f_nombre"]) ? $nom=strtoupper($_POST["f_nombre"]) : $nom=null;
$pat=isset($_POST["f_paterno"]) ? $pat=strtoupper($_POST["f_paterno"]) : $pat=null;
$mat=isset($_POST["f_materno"]) ? $mat=strtoupper($_POST["f_materno"]) : $mat=null;
$emp=isset($_POST["f_id_empresa"]) ? $emp=strtoupper($_POST["f_id_empresa"]) : $emp=null;
$tel=isset($_POST["f_telefono"]) ? $tel=strtoupper($_POST["f_telefono"]) : $tel=null;
$ema=isset($_POST["f_email"]) ? $ema=strtoupper($_POST["f_email"]) : $ema=null;
$cur=isset($_POST["f_id_curso"]) ? $cur=strtoupper($_POST["f_id_curso"]) : $cur=null;
	
	require_once '../php/funciones_php.php';
	$errores=array();

	

	///logica de insercion
	if (!$errores){
			include("../class/class_aspirante_dal.php");
			include("../class/class_aspirantes_cursos_dal.php");
			$metodos_asp=new aspirantes_dal;
			$metodos_asp_cur= new AspiranteCurso_dal;
				
/****reglas del negocio******/
			$cta_asp=$metodos_asp->existe_aspirante($rfc);
			if ($cta_asp==0){
				$obj_aspirante= new aspirantes($rfc,$nom,$pat,$mat,$emp,$tel,$ema);
				$obj_aspcur= new AspiranteCurso($cur,$rfc);

				if ($metodos_asp->insertar_aspirante($obj_aspirante)==1 and $metodos_asp_cur->inserta_aspirantecurso($obj_aspcur)==1){
						//print "Aspirante Agregado Correctmente";
						print '<script>';
						print 'Swal.fire({
                          title: "Registro a Aspirantes y Cursos",
                          text: "¡Aspirante y Curso Ingresado Correctamente!",
                          type: "success"
                          }).then(function() {
                            window.location = "aspirantes.php";
                          });';
						print '</script>';
					}
					else{//inserta aspirante
								print '<script>';
	                  				print 'Swal.fire({
	                          		title: "Registro a Aspirantes y Cursos",
	                          		text: "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar",
	                          		type: "error"
	                          		}).then(function() {
	                            	window.location = "aspirantes.php";
	                          		});';
                  				print '</script>';				
					}
			}
			else{//existe aspirante
					/*si el aspirante existe hay que validar rfc+curso, si existe rfc+curso en apsirantes_curso : no e s pisible, pero si no exste rfc+curso: insertamos aspirante curso*/
					if ($metodos_asp_cur->existe_aspirantecurso($cur,$rfc)==0){
						$obj_aspcur= new AspiranteCurso($cur,$rfc);
							if ($metodos_asp_cur->inserta_aspirantecurso($obj_aspcur)==1){
								msg("Registro de curso","Curso fue registrado correctamente","success");
							}else{
								print '<script>';
	                  				print 'Swal.fire({
	                          		title: "Registro de curso",
	                          		text: "Ocurrió un error al tratar de guardar su registro. Dicha registro no se guardó en nuestra Base de datos, vuelva a intentar",
	                          		type: "error"
	                          		}).then(function() {
	                            	window.location = "aspirantes.php";
	                          		});';
                  				print '</script>';
							}

					}
					else{
						//print "EL aspirante y curso ya estan registrado";
						print '<script>';
                  		print 'Swal.fire({
                          title: "Ya esta Registrado el curso",
                          text: "¡Aspirante y Curso y han sido registrados previamente, no puede haber duplicados!",
                          type: "warning"
                          }).then(function() {
                            window.location = "../views/aspirante.php";
                          });';
                  		print '</script>';
					}
			}	
/****************/

		}
		else{
			echo '<ul style="color:red;font-size:25px">';
				foreach ($errores as $error):
					echo '<li>'.$error.'</li>';
				endforeach;
			echo '</ul>';			
		}//end errores


}//end post

?>