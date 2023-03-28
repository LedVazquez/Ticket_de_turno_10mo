<?php

	namespace models;

	class Usuario{

		protected $id_usuario;
		protected $usuario;
		protected $pass;

		public function __construct(
			$id_usuario,
			$usuario,
			$pass
		){
			$this->id_usuario=$id_usuario;
			$this->usuario=$usuario;
			$this->pass=$pass;
		}

		//getters

		public function get_id(){
			return $this->id_usuario;
		}
		
		public function get_usuario(){
			return $this->usuario;
		}
		
		public function get_pass(){
			return $this->pass;
		}

		//setters
		
		public function set_user($nuser){
			$this->usuario=$nuser;
		}
		
		public function set_pass($npass){
			$this->pass=$npass;
		}
		
	}

?>