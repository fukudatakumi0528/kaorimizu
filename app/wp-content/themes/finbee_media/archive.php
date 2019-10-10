<?php
	//ポストタイプ別にテンプレート切り替え
	$type = get_post_type();
	switch ($type) {
		case "column":
			include(TEMPLATEPATH . '/archives/column.php');
			break;
		case "news":
			include(TEMPLATEPATH . '/archives/news.php');
			break;
		case "project":
			include(TEMPLATEPATH . '/archives/project.php');
			break;
	}
