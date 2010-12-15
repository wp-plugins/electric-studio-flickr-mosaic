<?php

if ( is_admin() ){

  /* Call the html code */
  add_action('admin_menu', 'ES_flickr_mosaic_admin_menu');

  function ES_flickr_mosaic_admin_menu() {
    add_options_page('ES flickr Mosaic', 'ES flickr Mosaic', 'administrator',
  'ES-flickr-mosaic', 'ES_flickr_mosaic_html_page');
  }
}

function ES_flickr_mosaic_html_page() {
?>
  <div>
  <h2>Electric Studio - Flickr Mosaic</h2>

  <form method="post" action="options.php">
    <?php wp_nonce_field('update-options'); ?>

 <h3>Feed Settings</h3>
 <label for="ES_flickr_mosaic_data">Enter Text (including the http://) :</label> 
      <input name="ES_flickr_mosaic_data" type="text" size="150" id="ES_flickr_mosaic_data"
      value="<?php echo get_option('ES_flickr_mosaic_data'); ?>" /><br/>
      
  <h3>Thumbnail Settings</h3>    
      
  <label for="ES_flickr_mosaic_img_height">Height :</label> 
      <input name="ES_flickr_mosaic_img_height" type="text" size="10" id="ES_flickr_mosaic_img_height" value="<?php echo get_option('ES_flickr_mosaic_img_height'); ?>" />px<br/>     

  <label for="ES_flickr_mosaic_img_height">Weight :</label> 
      <input name="ES_flickr_mosaic_img_width" type="text" size="10" id="ES_flickr_mosaic_img_width" value="<?php echo get_option('ES_flickr_mosaic_img_width'); ?>" />px<br/>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="ES_flickr_mosaic_data,ES_flickr_mosaic_img_height,ES_flickr_mosaic_img_width" />

    <p>
      <input type="submit" value="<?php _e('Save Changes') ?>" />
    </p>

  </form>
  </div>
<?php
}
?>
