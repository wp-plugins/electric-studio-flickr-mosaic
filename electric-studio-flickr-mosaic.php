<?php
/*
Plugin Name: Electric Studio flickr Mosaic
Plugin URI: http://www.electricstudio.co.uk
Description: Creates a mosaic of images from the a flickr feed.
Version: 1.0
Author: James Irving-Swift
Author URI: http://www.irving-swift.com
License: GPL2
*/

include 'php/install.php';
include 'php/options.php';

add_action('wp_enqueue_scripts', 'add_my_script');
add_action('wp_print_styles', 'add_my_style');

//this function is to add all the required scripts 
function add_my_script() {
  wp_enqueue_script('jquery.easing-1.3', plugin_dir_url(__FILE__).'js/fancybox/jquery.easing-1.3.pack.js', array('jquery'), '3.0.4', false);
  wp_enqueue_script('jquery.mousewheel-3.0.4', plugin_dir_url(__FILE__).'js/fancybox/jquery.mousewheel-3.0.4.pack.js', array('jquery'), '3.0.4', false);
  wp_enqueue_script('jquery.fancybox-1.3.4', plugin_dir_url(__FILE__).'js/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.3.4', false);
	wp_enqueue_script('flickrAddOn', plugin_dir_url(__FILE__).'js/flickrAddOn.js', array('jquery'), '1.0', false);
}


//this functions is to add all the required stylesheets
function add_my_style() {
  wp_enqueue_style('mosaic', plugin_dir_url(__FILE__).'css/mosaic.php',array(),'1.0','all');
  wp_enqueue_style('jquery.fancybox-1.3.4', plugin_dir_url(__FILE__).'js/fancybox/jquery.fancybox-1.3.4.css',array(),'1.3.4','all');  
}

function ES_fm_show()
{
    include_once("php/lastRSS.php"); 
	  // Create lastRSS object
    $rssflickr = new lastRSS;

    // Set cache dir and cache time limit (1200 seconds)
    // (don't forget to chmod cahce dir to 777 to allow writing)
    $rssflickr->cache_dir = '';
    $rssflickr->cache_time = 10;
    //$rss->cp = 'US-ASCII';
    $rssflickr->date_format = 'l';
    $rssflickr->stripHTML = false;

    $flickrrssurl = get_option('ES_flickr_mosaic_data');

    $img_height = get_option('ES_flickr_mosaic_img_height');
    $img_width = get_option('ES_flickr_mosaic_img_width');

    if($img_height!=""){
      $img_height = " height=\"".$img_height."px\"";
    }
    if($img_width!=""){
      $img_width = " width=\"".$img_width."px\"";
    }

    //initiate array of images
    $images = array();

    //array containing the patterns for height and weight declarations in the images string
    $patterns = array(
        '/height=&quot;[0-9]*?&quot;/',
        '/width=&quot;[0-9]*?&quot;/',);

    //set css class that will be given to the images.
    $cssImgClass = 'flickrMosaicImg';

    //set class for the ul
    $cssUlId = 'flickrMosaic';

    //this is the needle which is required to find where there image starts in the rss feed
    $needle = 'posted a photo:</p>';

    if ($rsflkr = $rssflickr->get($flickrrssurl)) {
        // Show last published items (description)
        foreach($rsflkr['items'] as $item) {
            //get the description with the HTML tags decoded
            $temp = htmlspecialchars_decode($item['description'], ENT_NOQUOTES);

            //remove the 'posted:' part of the description
            $temp = substr($temp, strpos($temp, $needle)+strlen($needle));
            
            //remove <p></p> tags
            $tags = array('<p>','</p>');
            $temp = str_replace($tags,'',$temp);

            $temp = preg_replace($patterns, '', $temp);

            //get quotes back!
            $temp = preg_replace('/&quot;/', '"', $temp);
            
            //get thumbnails instead of medium sized images
            $temp = preg_replace('/_m.jpg/','_t.jpg', $temp);

            $temp = str_replace('/></a>','class="'.$cssImgClass.'"'.$img_height.$img_width.'/></a>',$temp);

            //$temp = preg_replace('/<a href="http[0-9a-zA-z:\/]*"/','hello',$temp);
            $temp = preg_replace("#((http|https|ftp)://(www.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",
                    "'$1lightbox/'",
                    $temp);
            
            
            //find image url (found by finding a url beginning with 'farm')
            preg_match("#((http|https|ftp)://(farm\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie",$temp,$image_url);               
            
            //set the image_url to the big image rather than the thumbnail
            $image_url[0] = preg_replace('/_t.jpg/','_b.jpg', $image_url[0]);
            
            //change the flickr url to the url of the image        
            $temp = preg_replace('/http:\/\/www.flickr.com\/[A-Za-z0-9@_.\/]*\/lightbox\//',''.$image_url[0].' rel="flickrfeed"',$temp);      

            //add image to the array
            array_push($images, $temp);
         }

    }else{
        echo "Error: Feed is currently unavailable\n";
    } 

    echo "<ul id=".$cssUlId.">\n";
    foreach($images as $image){
        echo "\t<li".$img_height.$img_width.">".$image."\n\t</li>\n";
    }
    echo "</ul>";


}


?>
