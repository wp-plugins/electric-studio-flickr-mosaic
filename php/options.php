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

    <table width="510">
      <tr valign="top">
      <th width="92" scope="row">Enter Text (including the http://) : </th>
      <td width="406">
      <input name="ES_flickr_mosaic_data" type="text" size="150" id="ES_flickr_mosaic_data"
      value="<?php echo get_option('ES_flickr_mosaic_data'); ?>" /></td>
      </tr>
    </table>

    <input type="hidden" name="action" value="update" />
    <input type="hidden" name="page_options" value="ES_flickr_mosaic_data" />

    <p>
      <input type="submit" value="<?php _e('Save Changes') ?>" />
    </p>

  </form>
  </div>
<?php
}
?>
