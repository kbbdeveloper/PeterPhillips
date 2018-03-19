<?php // function_webaissance_utilities.php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


// sanitize text for matching 
function apssanitize($text){
			$text = strtolower($text);
			$text = html_entity_decode($text);
			$text = preg_replace("/[^a-zA-Z0-9]+/", "", $text); // use the condensed title to match if no Diamond ID
      $text = str_replace("’","",$text );
		  $text = str_replace("'","",$text);
			return $text;
}