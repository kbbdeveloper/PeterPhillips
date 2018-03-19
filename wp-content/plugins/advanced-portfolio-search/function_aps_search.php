<?php //function_aps_search.php

/**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function aps_register_query_vars( $vars ) {
    $vars[] = 'search_medium';
    $vars[] = 'search_year';
    $vars[] = 'search_title';
    $vars[] = 'debug';
    return $vars;
} 
add_filter( 'query_vars', 'aps_register_query_vars' );

/**
 * Build a custom query based on several conditions
 * The pre_get_posts action gives developers access to the $query object by reference
 * any changes you make to $query are made directly to the original object - no return value is requested
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 *
 */
function aps_pre_get_posts( $query ) {
	// check if the user is requesting an admin page 
	// or current query is not the main query
	if ( is_admin() || ! $query->is_main_query() ){
		return;
	}

	$searchterms = '';

	if ( is_post_type_archive( 'work' )){ // attachment

    $meta_query = array();


	// get query var values
	// defaults to empty string
    if( !empty( get_query_var( 'search_medium' ) ) ){
  //      $values = explode(" ", get_query_var( 'search_medium' ));
//var_dump($values); die;
    	$meta_query[] = array( 
				'key' => 'work_medium', 
				'value' => get_query_var( 'search_medium' ), 
				'compare' => 'LIKE' );
    }
	if( !empty( get_query_var( 'search_year' ) ) ){
		$meta_query[] = array( 
			'key' => 'work_year', 
			'value' => get_query_var( 'search_year' ), 
			'compare' => 'LIKE' );
	}
	if( !empty( get_query_var( 'search_title' ) ) ){
		$searchterms = get_query_var( 'search_title' );
		$query->set( 's', $searchterms  ); // set the search term to the title search
	}
    if( count( $meta_query ) > 1 ){
       	$meta_query['relation'] = 'AND';
    }
    if( count( $meta_query ) > 0 ){
    	$query->set( 'meta_query', $meta_query );
    }
	} else {
		return;
	}

		$query->set( 'posts_per_page', -1 );

		global $searchquery;
		$searchquery ='';
		if (get_query_var( 'debug' ) =='yes'){
			$searchquery = $query; // show the full query if s = debug
		}

		global $searchterms;
		$searchterms = $query->query; // send the query terms
}
add_action( 'pre_get_posts', 'aps_pre_get_posts', 1 );


/**
 * Build search form markup
 */
function adv_portfolio_search_function( $atts ){

		extract( shortcode_atts( array(
        'sidebar' => 'no'
    ), $atts )) ;

		$output ="";

		$sidebarclass="";

		if ($sidebar=='yes') {
     $output .= '<div id="findworkbutton">FIND WORK</div>';
		 $sidebarclass="formhidden";
		}

    $output .= '<form id="apsform" action="'.esc_url( home_url() ).'" method="GET" role="search" class="'.$sidebarclass.'">';

		$output .= '<div class="smtextfield">' . '<input type="hidden" name="s"></div>';
    $output .= '<div  class="apsinputdiv"><input class="apsinput" type="text" name="search_medium" placeholder="Medium" value="'.get_query_var( 'search_medium' ).'"></div>';
    $output .= '<div class="apsinputdiv"><input class="apsinput"  type="text" name="search_title" placeholder="Title" value="'. get_query_var( 'search_title' ).'"></div>';
    $output .= '<div class="apsinputdiv"><input class="apsinput" type="text" name="search_year" placeholder="Year" value="'.get_query_var( 'search_year' ).'"></div>';
    $output .= '<input type="hidden" name="post_type" value="work" />';
    $output .= '<p><button type="submit" class="apsbutton" /><span>Search</span></button></p></form>';



		global $searchterms;
		if ($searchterms!='') {
			$searchphrase = '';
			foreach($searchterms as $term => $value){
				 if ($value!='') {
					 if ($term=='search_title') {
							 $searchphrase .= "Title:".$value." ";
					 }
					 if ($term=='search_medium') {
							 $searchphrase .= "Medium:".$value." ";
					 }
					 if ($term=='search_year') {
							 $searchphrase .= "Year:".$value." ";
					 }
				 }
			}
			if ($searchphrase=='') { $searchphrase = "all works";}
			$searchphrase="<p><h2>Search results for ".$searchphrase."</h2></p>";
			$output .= $searchphrase;
						
		}

		global $searchquery;
		if ($searchquery!='') {
			$output .= "<pre>".print_r($searchquery,true)."</pre>"; // show the search query 
		}

		//$output .= the_search_query();
		//$output .= get_search_query(); 

		
		return $output;

}
add_shortcode( 'adv_portfolio_search', 'adv_portfolio_search_function' );

/**
 * Plugin setup
 * Register post type and shortcode
 */
//function aps_setup() {
//	add_shortcode( 'adv_portfolio_search', 'adv_portfolio_search' );
//}
//add_action( 'init', 'aps_setup' );

global $aps_shortcode_instructions;
$aps_shortcode_instructions.='
	<p>&#x25cf; <span class="pre">[adv_portfolio_search]</span> Add this shortcode wherever you want the search box. <br> 
It includes fields for Medium, Title and Year.
	</p>
	<p>&#x25cf; <span class="pre">[adv_portfolio_search sidebar="yes"]</span> adds a FIND WORK button and hides the form until the FIND WORK button is hovered over.</p>
	<p>&#x25cf; Add <span class="pre">&debug=yes</span> at the end of the query to see full query data
	</p>

';
