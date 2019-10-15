<?php

	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "feature":
			include(TEMPLATEPATH . '/singles/column.php');
			break;
		case "hobby":
			include(TEMPLATEPATH . '/singles/news.php');
			break;
		case "life":
			include(TEMPLATEPATH . '/singles/project.php');
			break;
		case "learn":
			include(TEMPLATEPATH . '/singles/project.php');
			break;
	}
