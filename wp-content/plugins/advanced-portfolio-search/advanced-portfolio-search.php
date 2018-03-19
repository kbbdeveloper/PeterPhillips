<?php
/**
 * @package Advanced-portfolio-search
 * @version 1.0
 */
/*
Plugin Name: Advanced Portfolio Search
Plugin URI: https://webaissance.com
Description: Advanced Portfolio Search adapted from Carlo Daniele's Smashing Plugin https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/
Author: Webaissance
Version: 1.0
Author URI: https://webaissance.com
*/

/*

                                                                                                               
 _|          _|            _|                  _|                                                              
 _|          _|    _|_|    _|_|_|      _|_|_|        _|_|_|    _|_|_|    _|_|_|  _|_|_|      _|_|_|    _|_|    
 _|    _|    _|  _|_|_|_|  _|    _|  _|    _|  _|  _|_|      _|_|      _|    _|  _|    _|  _|        _|_|_|_|  
   _|  _|  _|    _|        _|    _|  _|    _|  _|      _|_|      _|_|  _|    _|  _|    _|  _|        _|        
     _|  _|        _|_|_|  _|_|_|      _|_|_|  _|  _|_|_|    _|_|_|      _|_|_|  _|    _|    _|_|_|    _|_|_|  
                                                                                                               
                                                                                                               
     _       _                               _   ____            _    __       _ _         ____                      _     
    / \   __| |_   ____ _ _ __   ___ ___  __| | |  _ \ ___  _ __| |_ / _| ___ | (_) ___   / ___|  ___  __ _ _ __ ___| |__  
   / _ \ / _` \ \ / / _` | '_ \ / __/ _ \/ _` | | |_) / _ \| '__| __| |_ / _ \| | |/ _ \  \___ \ / _ \/ _` | '__/ __| '_ \ 
  / ___ \ (_| |\ V / (_| | | | | (_|  __/ (_| | |  __/ (_) | |  | |_|  _| (_) | | | (_) |  ___) |  __/ (_| | | | (__| | | |
 /_/   \_\__,_| \_/ \__,_|_| |_|\___\___|\__,_| |_|   \___/|_|   \__|_|  \___/|_|_|\___/  |____/ \___|\__,_|_|  \___|_| |_|
                                                                                                                           

*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $webais_pf_shortcode_instructions;

include "function_aps_setup.php";
include "function_aps_utilities.php";
include "function_aps_toplevel_page.php";
include "function_aps_search.php";
//include "function_aps_portfolio.php";
