<?php

if($_GET["Controller"] && $_GET["View"] ){
	//echo $_GET["Controller"] . "    " .$_GET["View"];
	$myControllerThatINeedToCall = $_GET["Controller"] ."Controller";
	$myMethodIntheController = $_GET["View"];
	include("../Controller/" .$myControllerThatINeedToCall. ".php");

	$myClassController = new $myControllerThatINeedToCall();

	if(!isset($_GET['Parameter1']) && !isset($_GET['Parameter2']) && !isset($_GET['Parameter3']) && !isset($_GET['Parameter4']) && !isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController();
	}else if(isset($_GET['Parameter1']) && !isset($_GET['Parameter2']) && !isset($_GET['Parameter3']) && !isset($_GET['Parameter4']) && !isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && !isset($_GET['Parameter3']) && !isset($_GET['Parameter4']) && !isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && isset($_GET['Parameter3']) && !isset($_GET['Parameter4']) && !isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2'], $_GET['Parameter3']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && isset($_GET['Parameter3']) && isset($_GET['Parameter4']) && !isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2'],$_GET['Parameter3'], $_GET['Parameter4']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && isset($_GET['Parameter3']) && isset($_GET['Parameter4']) && isset($_GET['Parameter5']) && !isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2'],$_GET['Parameter3'], $_GET['Parameter4'],$_GET['Parameter5']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && isset($_GET['Parameter3']) && isset($_GET['Parameter4']) && isset($_GET['Parameter5']) && isset($_GET['Parameter6']) && !isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2'],$_GET['Parameter3'], $_GET['Parameter4'],$_GET['Parameter5'],$_GET['Parameter6']);	
	}else if(isset($_GET['Parameter1']) && isset($_GET['Parameter2']) && isset($_GET['Parameter3']) && isset($_GET['Parameter4']) && isset($_GET['Parameter5']) && isset($_GET['Parameter6']) && isset($_GET['Parameter7'])){
		$myClassController->$myMethodIntheController($_GET['Parameter1'],$_GET['Parameter2'],$_GET['Parameter3'], $_GET['Parameter4'],$_GET['Parameter5'],$_GET['Parameter6'],$_GET['Parameter7']);	
	}

}