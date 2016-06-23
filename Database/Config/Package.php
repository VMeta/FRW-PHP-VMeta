<?php
require("Config.php");
require("Instance.php");	
require("Conection.php");
require("ModelCRUD.php");
/*
$myAllDatabases = scandir("../info");
foreach ($myAllDatabases as $path) {
	if($path != "." && $path != ".."){
		$models = scandir("../info/". $path);
		foreach ($models as $key => $model) {
			if($model != "." && $model != ".."){
				require("../info/".$path."/". $model);
			}
		}
	}
}*/

