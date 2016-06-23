<?php

class Example extends ModelCRUD{
 	
 	//  You can use this if you don't want the database generate an ID 'int ID' ;

	//You need to intialize your variable for in it typeof
	public $meExample = 0;
	public $oleaga = "";
	public $amadis = "";
	public $boolean = true;
	
	//For the variables have an object type class you need to declare this and  initialize in the constructor
	public $fecha;

	public function __construct(){
		//Need to call the parent consctruct
		parent::__construct("ExampleDB");

		//Intializing my variable type DateTime 
	    $this->fecha = new DateTime(); 
	 }
}

