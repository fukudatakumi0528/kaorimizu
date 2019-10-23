<?php
	//ページ別にテンプレート切り替え
	$page = $post->post_name;
	switch ($page) {
		case "privacypolicy":
			include(TEMPLATEPATH . '/pages/privacypolicy.php');
			break;
		case "disclaimer":
		include(TEMPLATEPATH . '/pages/disclaimer.php');
		break;
	}
