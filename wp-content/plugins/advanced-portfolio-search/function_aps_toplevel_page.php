<?php // function_aps_toplevel_page.php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;



function aps_toplevel_page() {
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

		global $aps_shortcode_instructions;


    echo "<h2>" . __( 'Advanced Portfolio Search by Webaissance', 'aps' ) . "</h2>";

		?>

		<img src="/wp-content/plugins/advanced-portfolio-search/webaissance.png" class="logos" >

		<?php

    $hidden_field_name = 'hiddenfield';

    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
					
		}
	  ?>
		
		  
    <div class="descrip">
			<p>Welcome to the Advanced Portfolio Search by Webaissance. This plugin does several things:
			   <ol>
           <li>Provides a shortcode that adds advanced search</li>
           <li>Provides a list of related resources for your reference</li>
				 </ol>
			</p>
			</div>

			<hr><h2>SHORTCODES & FEATURES</h2>

   <?=$aps_shortcode_instructions?>

<hr><h2>RESOURCES</h2>
<div id="resourcesdiv">
<div class="descrip">
Follow these links for more information about the system and resources for assistance
</div>

<a href="https://webaissance.com"  target="_blank">Webaissance Site</a><br>
<a href="https://facebook.com/webaissance"  target="_blank">Webaissance Facebook Page</a></p><br>


</div>

</div>

<?php } 