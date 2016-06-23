<?php
	
	const BASE_URL = "http://localhost:8080/VMetaWork/";

	function includeModel($database, $model){
		require("../Database/Config/Package.php");
		require("../Database/Info/" . $database . "/". $model.".php");
	}
	
	function includeAllModel(){
		require("../Database/Config/Package.php");
		$myAllDatabases = scandir("../Database/Info");
		foreach ($myAllDatabases as $path) {
			if($path != "." && $path != ".."){
				$models = scandir("../Database/Info/". $path);
				foreach ($models as $key => $model) {
					if($model != "." && $model != ".."){
						require("../Database/Info/".$path."/". $model);
					}
				}
			}
		}
	}
