<?php
class Persona extends ModelCRUD{
	public $edad = 0;
	public $nombre = "";

	public $pielId = 0;
	public $pielMyParentId = 0;

	/* Important!!!!!!!!!!
		For make foreignkey you need :

		1- To declare the variable with the name of the field plus 'Id'
			for example:  
				piel + id = pielId;
				public $pielId = 0;

		2- To declare a variable with the instance of my  principal field but that don't need the pluss 'Id'.
			for example: 
				public piel;

		3- To initialize the variable of instance in the __construct.
			for example:
				$this->piel = new Piel();

	*/
				
	//ForeignKey
	public $piel;
	public $pielMyParent;

	public function __construct(){
		parent::__construct("Example2");
		
		//ForeignKey;
		$this->piel = new Piel();
		$this->pielMyParent = new Piel();
	}
}