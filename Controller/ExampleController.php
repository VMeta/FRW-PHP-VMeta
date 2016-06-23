<?php

require("../Core/Controller.php");
includeModel("ExampleDB", "Example");

class ExampleController extends Controller {

	public function Index (){
		$this->view("Index");
	}

	public function clientes (){

		/*$db = new Example();
		
		$db->meExample = 0;
		$db->oleaga = "anja";
		$db->amadis = "ok";
		$db->boolean = true;
		//If You don't the variable datetime this let to complete with actual's date.
		$db->fecha = null;
		
		$db->insert();
		*/

		/*$db = new Example();

		$arregloExample= [
			"meExample" => 2,
			"oleaga" => "hey"
		];
			$db->update(1,$arregloExample);
		*/

		//var_dump($db->ownQuery("Select * from Example"));

		$Data["Name"] = "VMeta";
		$Data["Example"] = "Example";


		$this->view("clientes", $Data);
	}

	


	public function Example(){
		$this->view("Example");
	}
}

