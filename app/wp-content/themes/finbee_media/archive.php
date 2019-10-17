<?php
	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "feature":
			include(TEMPLATEPATH . '/archives/feature.php');
			break;
		case "hobby":
			include(TEMPLATEPATH . '/archives/hobby.php');
			break;
		case "life":
			include(TEMPLATEPATH . '/archives/life.php');
			break;
		case "learn":
			include(TEMPLATEPATH . '/archives/learn.php');
			break;
	}
