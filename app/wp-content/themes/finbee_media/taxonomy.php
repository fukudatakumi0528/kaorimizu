<?php
	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "feature":
			include(TEMPLATEPATH . '/taxonomy/feature.php');
			break;
		case "hobby":
			include(TEMPLATEPATH . '/taxonomy/hobby.php');
			break;
		case "life":
			include(TEMPLATEPATH . '/taxonomy/life.php');
			break;
		case "learn":
			include(TEMPLATEPATH . '/taxonomy/learn.php');
			break;
	}
