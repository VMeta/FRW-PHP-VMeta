<?php

class Conection extends Instance{
	public static $instance = null;
	
	static function get(){
		if(Conection::$instance == null){
			Conection::$instance = new Instance();
		}
		return Conection::$instance->con;
	}
}
	
