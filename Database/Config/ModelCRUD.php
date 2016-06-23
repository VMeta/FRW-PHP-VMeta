<?php

class ModelCRUD {
	public  $Id = 0;
	private $mySonName;

	function __construct($object){
		$this->mySonName = get_class($this);
		mysqli_query (Conection::get(), "use ".$object);
	}

	public function get($id = null, $selection = "*"){
		$condition = "";
		if($id != null){
			$condition = " where id = ". $id;
		}
		$sql = "select ". $selection . " from " . $this->mySonName . $condition;
		$rs = mysqli_query(Conection::get(),$sql);
		$resultado = array();
		while ($fila = mysqli_fetch_assoc($rs)){
		
			$resultado[] = $fila;
		}
		return $resultado;
	}

	public function insert($objectClass = null){
		if($objectClass == null){
			$objectClass = $this;
		}
		$mySqlType = array('string' => '"', 'integer' => '', 'DateTime' => '"', 'boolean' => '');
		$sql = "INSERT INTO `".get_class($objectClass) ."` (";
		$coma = "";
		$fieldValid = array();
		$sentence1="";
		$sentence2 = ") VALUES (";
		$coma = "";

		foreach ($objectClass as $key => $value) {
			if(@get_class($value)){
				if(@get_class($value) == 'DateTime'){
					$type = 'DateTime';
					//$a = strlen($value);
					$fieldValid[] =$key ;
					foreach ($value as $key2 => $value2) {
						$sentence2 .= $coma.$mySqlType[$type].$value2.$mySqlType[$type];
						break;
					}
					
				}
			}else{
				if($key != "Id" && $key != "mySonName" ){
					$type = gettype($value);
					$sentence2 .= $coma.$mySqlType[$type].$value.$mySqlType[$type];
					$fieldValid[] =$key ;
				}
			}
			
			$coma = ",";
		}

		$sentence2 .= ")";

		$coma = "";

		foreach ($fieldValid as $key => $value) {
			$sql .= $coma ."`" .$value . "`";	
			$coma = ",";
		}
		$sql .= $sentence2;
		
		//var_dump($sql);
		//var_dump($objectClass);

		$rs = mysqli_query(Conection::get(),$sql);
		
		

	}

	public function update($id, $updateFields){
		$mySqlType = array('string' => '"', 'integer' => '', 'DateTime' => '"', 'boolean' => '');
		$sql = "UPDATE `". get_class($this)."` SET ";
		
		$coma = "";

		foreach ($updateFields as $key => $value) {
			$type = gettype($value);
			$sql.= $coma."`".$key."` =".$mySqlType[$type].$value.$mySqlType[$type];
			$coma = ",";
		}

		$sql .= " WHERE `id` =" . $id;

		$rs = mysqli_query(Conection::get(),$sql);
	}

	public function ownQuery($sql){
		$rs = mysqli_query(Conection::get(),$sql);

		if( @get_class($rs) == "mysqli_result"){
			$resultado = array();

			while ($fila = mysqli_fetch_assoc($rs)){
			
				$resultado[] = $fila;
			}
		return $resultado;

		}
	}

	public function delete($id = null){
		$condition = "";
		if($id != null){
			$condition = " where id = ". $id;
		}

		$sql = "delete from " . $this->mySonName . $condition;
		$rs = mysqli_query(Conection::get(),$sql);
	}
} 






	/*
		public $myDatabase;
	private $con;
		$slash = " \ ";
		$myPathComplete = explode(trim($slash), $object);
		$this->myDatabase =  end($myPathComplete);
		*/


	/*public function getAll(){
		$sql = "select * from " . $this->mySonName;
		$rs = mysqli_query(Conection::get(),$sql);
		$resultado = array();
		while ($fila = mysqli_fetch_assoc($rs)){
		
			$resultado[] = $fila;
		}
		return $resultado;
	}

	public function getById($id){
		$sql = "select * from " . $this->mySonName . " where id =" .  $id;
		$rs = mysqli_query(Conection::get(),$sql);
		$resultado = array();
		while ($fila = mysqli_fetch_assoc($rs)){
			$resultado[] = $fila;
		}
		return $resultado;
	}*/
