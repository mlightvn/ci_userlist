<?php

$domain = strtolower($_SERVER['HTTP_HOST']);

switch($domain) {
	case "localhost:8080":
	case "localhost":
		include_once("application/config/env/development.php");
	break;

	default:
		if(file_exists("application/config/env/" . $domain . ".php")){
			include_once("application/config/env/" . $domain . ".php");
		}else{
			include_once("application/config/env/default.php");
		}
	break;
}
