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
		case "contact":
			include(TEMPLATEPATH . '/pages/form-contact.php');
			break;
		case "conf":
			include(TEMPLATEPATH . '/pages/form-conf.php');
			break;
		case "thanks":
			include(TEMPLATEPATH . '/pages/form-thanks.php');
			break;
		case "test-ranking":
			include(TEMPLATEPATH . '/pages/test/ranking.php');
			break;
	}
