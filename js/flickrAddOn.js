$esm = jQuery.noConflict();
$esm(document).ready(function(){
  $esm("ul#flickrMosaic li a").fancybox({
      'autoScale'     	: true,
      'transitionIn'		: 'none',
      'transitionOut'		: 'none',
  });
});

