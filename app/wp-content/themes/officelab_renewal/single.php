<?php

	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "column":
			include(TEMPLATEPATH . '/singles/column.php');
			break;
		case "news":
			include(TEMPLATEPATH . '/singles/news.php');
			break;
		case "project":
			include(TEMPLATEPATH . '/singles/project.php');
			break;
	}
