<?php

	namespace models;

	class turnos{

		protected $id_municipio;
		protected $id_ticket;
		protected $turno;
		
		public function __construct(
			$id_municipio,
			$id_ticket, 
			$turno
		){
			$this->id_municipio=$id_municipio;
			$this->id_ticket=$id_ticket;
			$this->turno=$turno;
		}

		//getters

		public function get_municipio(){
			return $this->id_municipio;
		}
		
		public function get_ticket(){
			return $this->id_ticket;
		}

		public function get_turno(){
			return $this->turno;
		}
		//setters

		public function set_municipio($nmunicipio){
			$this->id_municipio=$municipio;
		}

		public function set_turno($nmunicipio){
			$this->turno=$turno;
		}
	}

?>