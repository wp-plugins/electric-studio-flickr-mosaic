=== Plugin Name ===
Contributors: irvingswiftj, Electric Studio
Tags: flickr, rss, mosaic
Requires at least: 3.0
Tested up to: 3.0.3
Stable tag: 1.1.1

Add a mosaic from a flickr feed on your blog

== Description ==

Add a mosaic from a flickr feed on your blog. All you have to do is put your flickr RSS feed in the admin page and then you can place the mosaic wherever you want on your site/blog.

The plugin displays thumbnails from your flickr feed and uses 'fancybox' to display a larger version of the image without having to leave your website.

When the images are enlarged, next and previous arrows can be used to cycle through the images.

== Installation ==

To use the plugin:
1. Install the .zip file into wordpress
2. Activate the plugin
3. insert the following code where you want the plugin to output to:

`<?php if(function_exists('ES_fm_show')) {ES_fm_show();}?>`

== Frequently Asked Questions ==

=How do I change the style?=

To change the style of the mosaic, edit the plugin file mosaic.css.
In version 2 I would like to make a more user friendly way to change settings like image sizes.

=Is it possible to place the mosaic as a widget in the sidebar?=

This is planned for version 2

== Screenshots ==

1. This is what the mosaic look like by default
2. This plugin uses fancybox to enlarge pictures
3. This is the admin menu

== Changelog ==

= 1.0 =
Version 1!

= 1.1 =
Thumbnail sizes can now be change in the admin panel
Bug fixed on problems with some Flickr RSS urls

= 1.1.1 =
* Shortcode [es_flickr_mosaic] now included

== Upgrade Notice ==

= 1.0 =
Version 1!

= 1.1 =
Bug fix and an enhancement

= 1.1.1 =
* Shortcode [es_flickr_mosaic] now included
