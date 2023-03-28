<?php

	namespace models;

	class Ticket{

		protected $id_ticket;
		protected $nom_completo;
		protected $curp;
		protected $nombres;
		protected $paterno;
		protected $materno;
		protected $telefono;
		protected $celular;
		protected $email;
		protected $nivel;
		protected $estatus;

		public function __construct(
			$id_ticket,
			$nom_completo,
			$curp,
			$nombres,
			$paterno,
			$materno,
			$telefono,
			$celular,
			$email,
			$nivel,
			$estatus
		){
			$this->id_ticket=$id_ticket;
			$this->nom_completo=$nom_completo;
			$this->curp=$curp;
			$this->nombres=$nombres;
			$this->paterno=$paterno;
			$this->materno=$materno;
			$this->telefono=$telefono;
			$this->celular=$celular;
			$this->email=$email;
			$this->nivel=$nivel;
			$this->estatus=$estatus;
		}

		//getters

		public function get_id(){
			return $this->id_ticket;
		}
		
		public function get_nom_completo(){
			return $this->nom_completo;
		}
		
		public function get_curp(){
			return $this->curp;
		}
		
		public function get_nombres(){
			return $this->nombres;
		}
		
		public function get_paterno(){
			return $this->paterno;
		}
		
		public function get_materno(){
			return $this->materno;
		}

		public function get_telefono(){
			return $this->telefono;
		}

		public function get_celular(){
			return $this->celular;
		}
		
		public function get_email(){
			return $this->email;
		}

		public function get_nivel(){
			return $this->nivel;
		}

		public function get_estatus(){
			return $this->estatus;
		}

		//setters
		
		public function set_nom_completo($nnom_comp){
			$this->nom_completo=$nnom_comp;
		}
		
		public function set_curp($ncurp){
			$this->curp=$ncurp;
		}
		
		public function set_nombres($nnombres){
			$this->nombres=$nnombres;
		}
		
		public function set_paterno($npaterno){
			$this->paterno=$npaterno;
		}
		
		public function set_materno($nmaterno){
			$this->materno=$nmaterno;
		}

		public function set_telefono($ntelefono){
			$this->telefono=$ntelefono;
		}

		public function set_celular($ncelular){
			$this->celular=$ncelular;
		}
		
		public function set_email($nemail){
			$this->email=$nemail;
		}

		public function set_nivel($nnivel){
			$this->nivel=$nnivel;
		}

		public function set_estatus($nestatus){
			$this->estatus=$nestatus;
		}

		//CRUD


	}

?>