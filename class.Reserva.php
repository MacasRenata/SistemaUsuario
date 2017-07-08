<?php
		  /**
	 	  *  Iniciando a classe sala
	 	  */
	class Reserva {
		   /**
			 *Declarando os atributos da classe
			 */
	 
		private $idreserva;
		private $idsala;
		private $idusuario;
		private $data;
		private $horainicio;
		private $horafim;
			
			/**
			  * Chamando o método Construtor
			  * Inicializando os atributos
			  */
		
		public function __Construct(){
			$this->idreserva = 0;
			$this->idsala = 0;
			$this->idusuario = 0;
			$this->data = "";
			$this->horainicio = "";
			$this->horafim = "";	
		}
		
			/**
			  * Fim do metodo construtor
			  * Inicio dos Metodos gets
			  */
		public function getIdreserva(){
			return $this->idreserva;
		}
		public function getIdsala(){
			return $this->idsala;
		}
		public function getIdusuario(){
			return $this->idusuario;
		}
		public function getData(){
			return $this->data;
		}
		public function getHorainicio(){
			return $this->horainicio;
		}
		public function getHorafim(){
			return $this->horafim;
		}
	
			/**
			  * Fim dos metodos gets
		  	  * Inicio dos Metodos Sets
		  	  */
		  
		public function setIdreserva($value){
			$this->idreserva= $value;
		} 
		public function setIdsala($value){
			$this->idsala= $value;
		} 
		public function setIdusuario($value){
			$this->idusuario= $value;
		} 
		public function setData($value){
			$this->data = $value;		
		}
		public function setHorainicio($value){
			$this->horainicio = $value;		
		}
		public function setHorafim($value){
			$this->horafim = $value;		
		}

		/* Carrega usuarios */	
		public function Carrega($id){
			$id= (int) $id;
			$query= "SELECT * FROM reservas
		   			WHERE idreserva = {$id}";
					
			$db= new DB();
			$db->Sql($query);
			if($db->NumRows() == 0){
				throw new Exception('reserva inválida');
			}

			$dado= $db->Fetch();
		   
			$this->setIdreserva($dado->idreserva);
			$this->setIdsala($dado->idsala);
			$this->setIdusuario($dado->idusuario);
			$this->setData($dado->data);
			$this->setHorainicio($dado->horainicio);
			$this->setHorafim($dado->horafim);
		}
		
        public function Cadastra(){
            $db= new DB();
            $query= "INSERT INTO reservas (
                      idsala
                      idusuario
                      data
                      horainicio
                      horafim
                     )VALUES(
                      '{$this->getIdsala()}'
                      '{$this->getIdusuario()}'
                      '{$this->getData()}'
                      '{$this->getHorainicio()}'
                      '{$this->getHorafim()}'
					  )";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao cadastrar a reserva');
            }
            $this->setIdreserva($db->LastInsertId());
        }
		
        public function Edita(){
            $db= new DB();
            $query= "UPDATE reservas SET
                      idsala= '{$this->getIdsala()}',
                      idusuario= '{$this->getIdusuario()}', 
                      data= '{$this->getData()}', 
                      horainicio= '{$this->getHorainicio()}',
                      horafim= '{$this->getHorafim()}', 
                     WHERE idreserva = {$this->getIdreserva()}";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao editar os dados da reserva');
            }
		}
		
        public function Remove(){
            $db= new DB();
            $query= "DELETE FROM reservas 
                     WHERE idreserva = {$this->getIdreserva()}
                     LIMIT 1";
            if(!$db->Sql($query)){
                throw new Exception('Falha ao remover os dados da reserva');
            }
        }
	}
?>