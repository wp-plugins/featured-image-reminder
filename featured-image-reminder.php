<?php
/*
Plugin Name: Featured Image Reminder
Plugin URI: http://aaronhockley.com/code/featured-image-reminder
Description: When you choose the "Publish" button, a dialog box warns you if you've forgotten to set a featured image on the post.
Version: 1.0
Author: Aaron B. Hockley
Author URI: http://aaronhockley.com
License: GPL2
*/


/*  Copyright 2014 Aaron B. Hockley - aaronhockley.com - aaron@wp-photographers.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


$w_message = 'You haven\'t specified a featured image, are you sure you want to publish this post?';
function abh_check_featured() {
	if ( !get_the_post_thumbnail() ) {
		global $w_message;
		echo '
		<script type="text/javascript"><!--
		var publishbutton = document.getElementById("publish");
		if (publishbutton !== null) publishbutton.onclick = function(){
			return confirm("'.$w_message.'");
		};
		// --></script>';
	}
}

add_action('admin_footer', 'abh_check_featured');
?>