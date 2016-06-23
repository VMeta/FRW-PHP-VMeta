<?php

class Instance {

	public $con;


	function __construct(){
		
		$this->con = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
	}
	
	function __destruct(){
		mysqli_close($this->con);
	}
}