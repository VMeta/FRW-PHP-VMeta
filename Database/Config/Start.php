<?php

class CreatorAll{

	private $todasLasClases;
	private $con;
	function __construct(){
		$this->todasLasClases = array();
		$this->con = Conection::get();

	}

	function creatorDatabases (){
		$myDatabases = scandir("../info");
		$mySqlType = array('string' => 'varchar(100)', 'integer' => 'int', 'DateTime' => "datetime", 'boolean' => 'BOOLEAN');

		foreach ($myDatabases as $path) {
			
			if($path != "." && $path != ".."){
				mysqli_query($this->con, "drop database " . $path);
				mysqli_query($this->con, "create database ". $path);
				echo "<br>Create database " . $path;
				$models = scandir("../info/". $path);

				foreach ($models as $key => $model) {
					if($model != "." && $model != ".."){
						$nameAndExtentions = explode(".",$model);
						mysqli_query($this->con, "use ". $path);

						//include("../info/".$path."/". $model);
						$allVariable = get_class_vars($nameAndExtentions[0]);
						$class = new $nameAndExtentions[0] ();
						//$ad = get_class_methods($nameAndExtentions[0]);
						$variables = "";
						
						foreach ($allVariable  as $variable => $type) {
							$myVariable = $class->$variable;

							if(@get_class($myVariable)){
								if(@get_class($myVariable) == 'DateTime'){
									$myVariable = 'DateTime';
								}else{
									$this->todasLasClases [$path][$nameAndExtentions[0]][] = @get_class($myVariable)."-".$variable;
								}
							}else{
								if($variable == "Id"){
									$variables .= "Id int PRIMARY KEY NOT NULL AUTO_INCREMENT";
								}
								else{
									$myVariable = gettype($class->$variable);
								}

								if($variable != "Id"){
									$variables .= $variable . " ".$mySqlType[$myVariable].",";
								}
							}
						}
						mysqli_query($this->con, " create table ". $nameAndExtentions[0] ." (
							 ".$variables."
							) "
						);
						echo "<br>Create table " . $nameAndExtentions[0];

					}
				}

			}
		}
		
	}

	function createForeignkey(){
		foreach ($this->todasLasClases as $key => $value) {
			mysqli_query($this->con, "use ". $key);
			foreach ($value as $key2 => $value2) {
				foreach ( $value2 as $value3) {
					$modelsAndReferences = explode("-", $value3);
					mysqli_query($this->con, "ALTER TABLE ".$key2 ." ADD CONSTRAINT fk_".$modelsAndReferences[1]."_id FOREIGN KEY (" .$modelsAndReferences[1]. "Id) REFERENCES " .$modelsAndReferences[0]."(Id);");
				}
			}
		}
	}
}

