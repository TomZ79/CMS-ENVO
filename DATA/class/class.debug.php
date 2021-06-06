<?php

/* Debugging PHP in browser’s Javascript console
 * =============================================
 * http://www.codeforest.net/debugging-php-in-browsers-javascript-console
 *
 * HOW TO USE THIS CLASS
 *
 * Include and instantiate the class
 * -------------------------------------
 * require_once("PHPDebug.php");
 * $debug = new PHPDebug();
 *
 * Simple message to console
 * -------------------------------------
 * $debug->debug("A very simple message");
 *
 * Variable to console
 * -------------------------------------
 * $x = 3;
 * $y = 5;
 * $z = $x/$y;
 * $debug->debug("Variable Z: ", $z);
 *
 * A warning
 * -------------------------------------
 * $debug->debug("A simple Warning", null, WARN);
 *
 * Info
 * -------------------------------------
 * $debug->debug("A simple Info message", null, INFO);
 *
 * An error
 * -------------------------------------
 * $debug->debug("A simple error messsage", null, ERROR);
 *
 * Array in console
 * -------------------------------------
 * $fruits = array("banana", "apple", "strawberry", "pineaple");
 * $fruits = array_reverse($fruits);
 * $debug->debug("Fruits array", $fruits);
 *
 * Object to console
 * -------------------------------------
 * $book               = new stdClass;
 * $book->title        = "Harry Potter and the Prisoner of Azkaban";
 * $book->author       = "J. K. Rowling";
 * $book->publisher    = "Arthur A. Levine Books";
 * $book->amazon_link  = "http://www.amazon.com/dp/0439136369/";
 * $debug->debug("Object", $book);
 */

class PHPDebug
{

	function __construct ()
	{
		if (!defined("LOG")) define("LOG", 1);
		if (!defined("INFO")) define("INFO", 2);
		if (!defined("WARN")) define("WARN", 3);
		if (!defined("ERROR")) define("ERROR", 4);

		define("NL", "\r\n");

		/* this is for IE and other browsers w/o console
		echo '<script>' . NL;
		echo 'if (!window.console) console = {};' . NL;
		echo 'console.log = console.log || function(){};' . NL;
		echo 'console.warn = console.warn || function(){};' . NL;
		echo 'console.error = console.error || function(){};' . NL;
		echo 'console.info = console.info || function(){};' . NL;
		echo 'console.debug = console.debug || function(){};' . NL;
		echo '</script>' . NL;
		*/
	}

	function debug ($name, $var = NULL, $type = LOG)
	{
		$output = '<script>' . NL;
		switch ($type) {
			case LOG:
				$output .= 'console.log("' . $name . '");' . NL;
				break;
			case INFO:
				$output .= 'console.info("' . $name . '");' . NL;
				break;
			case WARN:
				$output .= 'console.warn("' . $name . '");' . NL;
				break;
			case ERROR:
				$output .= 'console.error("' . $name . '");' . NL;
				break;
		}

		if (!empty($var)) {
			if (is_object($var) || is_array($var)) {
				$object = json_encode($var);
				$output .= 'var object' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ' = \'' . str_replace("'", "\'", $object) . '\';' . NL;
				$output .= 'var val' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ' = eval("(" + object' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ' + ")" );' . NL;
				switch ($type) {
					case LOG:
						$output .= 'console.debug(val' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ');' . NL;
						break;
					case INFO:
						$output .= 'console.info(val' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ');' . NL;
						break;
					case WARN:
						$output .= 'console.warn(val' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ');' . NL;
						break;
					case ERROR:
						$output .= 'console.error(val' . preg_replace('~[^A-Z|0-9]~i', "_", $name) . ');' . NL;
						break;
				}
			} else {
				switch ($type) {
					case LOG:
						$output .= 'console.debug("' . str_replace('"', '\\"', $var) . '");' . NL;
						break;
					case INFO:
						$output .= 'console.info("' . str_replace('"', '\\"', $var) . '");' . NL;
						break;
					case WARN:
						$output .= 'console.warn("' . str_replace('"', '\\"', $var) . '");' . NL;
						break;
					case ERROR:
						$output .= 'console.error("' . str_replace('"', '\\"', $var) . '");' . NL;
						break;
				}
			}
		}
		$output .= '</script>' . NL;

		return $output;
	}
}

?>