<?php
/*
 * functionsフォルダにあるファイルをすべて読み込む
*/
foreach(glob(TEMPLATEPATH."/functions/*.php") as $file){
	require_once $file;
}

function my_tiny_mce_before_init( $init_array ) {
    $init_array['valid_elements']          = '*[*]';
    $init_array['extended_valid_elements'] = '*[*]';

    return $init_array;
}
add_filter( 'tiny_mce_before_init' , 'my_tiny_mce_before_init' );