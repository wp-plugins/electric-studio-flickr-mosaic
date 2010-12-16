<?php
header("Content-Type: text/css");
?>
ul#flickrMosaic {
		float: left; display: block;
		clear: both;
}
ul#flickrMosaic li {
		position: relative;
		width: 66px; height: 57px;
		float: left; display: inline;
		list-style: none;
		padding: 0px !important; margin: 0px !important;
		overflow: hidden;
		line-height: 0px;
		background-color: black;
}
ul#flickrMosaic li:hover {
		opacity: 0.8;
		filter: alpha(opacity = 80);
}
ul#flickrMosaic img {
		position: absolute; top: 0px; left: 0px;
		width: 80px;
		z-index: 1;
}
