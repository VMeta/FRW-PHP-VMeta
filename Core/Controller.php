<?php

require("../Core/Global.php");
//includeAllModel();

class Controller{
	
	function view($nameView ,$_DATA = null){
		
		if($_DATA == null){
			unset($_DATA);
		}
		
		include("../View/" . substr(get_class($this), 0, -10)."/".$nameView.".php");
	}
	
}

