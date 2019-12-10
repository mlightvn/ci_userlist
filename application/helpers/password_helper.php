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
	    if ($length < 1) {
	        throw new \RangeException("Length must be a positive integer");
	    }

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
	        $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

if(!function_exists('random_string'))
{
	/**
	 * Generate a random string, using a cryptographically secure 
	 * pseudorandom number generator (random_int)
	 *
	 * This function uses type hints now (PHP 7+ only), but it was originally
	 * written for PHP 5 as well.
	 * 
	 * For PHP 7, random_int is a PHP core function
	 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
	 * 
	 * @param int $length      How many characters do we want?
	 * @param string $keyspace A string of all possible characters
	 *                         to select from
	 * @return string
	 */
	function random_string(
	    int $length = 64,
	    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
	    if ($length < 1) {
	        throw new \RangeException("Length must be a positive integer");
	    }
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[random_int(0, $max)];
	    }
	    return implode('', $pieces);
	}
}

if(!function_exists('shuffle_string'))
{
	function shuffle_string(
	    int $length = 64,
	    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
	    if ($length < 1) {
	        throw new \RangeException("Length must be a positive integer");
	    }

		$password = substr(str_shuffle($keyspace), 0, $length);
	    return $password;
	}
}

if(!function_exists('random_bytes_string'))
{
	function random_bytes_string(
	    int $length = 64,
	    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
	): string {
	    if ($length < 1) {
	        throw new \RangeException("Length must be a positive integer");
	    }

		$bytes = random_bytes($length);
		$password = bin2hex($bytes);
	    return $password;
	}
}






