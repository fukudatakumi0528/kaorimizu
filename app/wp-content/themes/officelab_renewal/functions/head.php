<?php
	function my_delete_local_jquery() {
	wp_deregister_script('jquery');
	}
	add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );
