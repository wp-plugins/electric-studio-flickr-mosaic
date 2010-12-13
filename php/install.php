<?php

/* Runs when plugin is activated */
register_activation_hook(__FILE__,'ES_flickr_mosaic_install'); 

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'ES_flickr_mosaic_remove' );

function ES_flickr_mosaic_install() {
/* Creates new database field */
add_option("ES_flickr_mosaic_data", 'Default', '', 'yes');
}

function ES_flickr_mosaic_remove() {
/* Deletes the database field */
delete_option('ES_flickr_mosaic_data');
}

?>
