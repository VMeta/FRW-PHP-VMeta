<?php

class Piel extends ModelCRUD{
	public $color = "";
	public $raza = "";
	public $clasificacion = 0;
	
	public function __construct(){
		parent::__construct("Example2");
	}
}
