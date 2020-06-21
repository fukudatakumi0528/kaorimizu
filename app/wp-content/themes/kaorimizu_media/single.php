<?php

	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "feature":
			include(TEMPLATEPATH . '/singles/feature.php');
			break;
		case "hobby":
			include(TEMPLATEPATH . '/singles/hobby.php');
			break;
		case "life":
			include(TEMPLATEPATH . '/singles/life.php');
			break;
		case "learn":
			include(TEMPLATEPATH . '/singles/learn.php');
			break;
	}
