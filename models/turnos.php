<?php

	namespace models;

	class turnos{

		protected $id_municipio;
		protected $municipio;
		
		public function __construct(
			$id_municipio,
			$municipio
		){
			$this->id_municipio=$id_municipio;
			$this->municipio=$municipio;
		}

		//getters

		public function get_id(){
			return $this->id_municipio;
		}
		
		public function get_municipio(){
			return $this->municipio;
		}

		//setters
		
		public function set_municipio($nmunicipio){
			$this->municipio=$municipio;
		}

	}

?>