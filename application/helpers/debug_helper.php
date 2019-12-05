<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Resource:
// https://stackoverflow.com/a/47964924/6351894

// require("application/third_party/debug.phar");

if ( ! function_exists('d'))
{
	function d($data){
	    if(is_null($data)){
	        $str = "<font color='red'><i>NULL</i></font>";
	    }elseif($data === ""){
	        $str = "<font color='red'><i>Empty</i></font>";
	    }elseif($data === true){
	        $str = "<font color='red'><i>True</i></font>";
	    }elseif($data === false){
	        $str = "<font color='red'><i>False</i></font>";
	    }elseif(is_numeric($data)){
	        $str = "<font color='red'><i>" . $data . "</i></font>";
	    }elseif(is_array($data)){
	        if(count($data) === 0){
	            $str = "<font color='red'><i>Empty Array</i></font>";
	        }else{
	            $str = "<table style=\"border-bottom:0px solid #000;\" cellpadding=\"0\" cellspacing=\"0\">";
	            foreach ($data as $key => $value) {
	                $str .= "<tr><td style=\"background-color:#008B8B; color:#FFF;border:1px solid #000;\">" . $key . "</td><td style=\"border:1px solid #000;\">" . d($value) . "</td></tr>";
	            }
	            $str .= "</table>";
	        }
	    }elseif(is_resource($data)){
	        while($arr = mysql_fetch_array($data)){
	            $data_array[] = $arr;
	        }
	        $str = d($data_array);
	    }elseif(is_object($data)){
	        $str = d(get_object_vars($data));
	    }elseif(is_bool($data)){
	        $str = "<i>" . ($data ? "True" : "False") . "</i>";
	    }else{
	        $str = $data;
	        $str = preg_replace("/\n/", "<br>\n", $str);
	    }
	    return $str;
	}
}

if ( ! function_exists('dnl'))
{
	function dnl($data){
	    echo d($data) . "<br>\n";
	}	
}

if ( ! function_exists('dd'))
{
	function dd($data){
	    echo dnl($data);
	    exit;
	}
}

if ( ! function_exists('ddt'))
{
	function ddt($message = ""){
	    echo "[" . date("Y/m/d H:i:s") . "]" . $message . "<br>\n";
	}
}
