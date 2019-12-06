<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 */
if(!function_exists('getHashedPassword'))
{
    function getHashedPassword($plainPassword)
    {
    	return hash('sha256', $plainPassword);
        // return password_hash($plainPassword, PASSWORD_BCRYPT);
    }
}
/**
 * This function used to generate the hashed password
 * @param {string} $plainPassword : This is plain text password
 * @param {string} $hashedPassword : This is hashed password
 */
// if(!function_exists('verifyHashedPassword'))
// {
//     function verifyHashedPassword($plainPassword, $hashedPassword)
//     {
//         return password_verify($plainPassword, $hashedPassword) ? true : false;
//     }
// }

if(!function_exists('generatePassword'))
{
	function generatePassword($length = 10, $has_special_char = false) {
		$options = ['number', 'letter'];
		if($has_special_char){
			$options[] = 'special_char';
		}
		$characters_set = [
			'number' 		=> '0123456789',
			'letter' 		=> 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'special_char' 	=> '`~!@#$%^&*()-_=+[]{}|\\;:\'",.<>/?',
		];

	    $characters = '';
	    foreach ($options as $key => $option) {
	    	$characters .= $characters_set[$option];
	    }
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}
