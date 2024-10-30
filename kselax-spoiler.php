<?php 
/*
Plugin Name: Kselax spoiler
Description: plugin add shortcode [k_spoiler][/k_spoiler] where you add insert text and it will wrape and will look like spoiler on the front end
Author: Author
Author URI: http://kselax.ru
Version: 1.0
License: GPL2
Text Domain: kselax_spoiler
*/

/*

    Copyright (C) Year  Author  Email

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


function kselax_function1($atts, $content=null){
  ob_start();
  ?>
  <div class="kselax_spoiler">
    <button class="but"><?php _e("expand", "kselax_spoiler"); ?></button><div class="cont"><?php echo $content; ?></div>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('k_spoiler', "kselax_function1");


//include scripts
function kselax_add_script_to_front(){
  global $post;
    if(!has_shortcode($post->post_content, 'k_spoiler')){
    return; //ничего не подключаем
  }
  //include bootstrap.min.css
  wp_enqueue_style( 'main_front_css', plugins_url('/css/main_front.css', __FILE__), null);

  //include bootstrap.min.js
  wp_enqueue_script( 'main_front_js', plugins_url('/js/main_front.js', __FILE__), array('jquery'), null, true );
}
add_action("wp_enqueue_scripts", "kselax_add_script_to_front");


//include language files
function wpdocs_load_textdomain() {
  load_plugin_textdomain( 'kselax_spoiler', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action('init', 'wpdocs_load_textdomain');
