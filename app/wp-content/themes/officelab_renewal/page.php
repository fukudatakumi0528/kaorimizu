<?php

	//ページ別にテンプレート切り替え
	$page = $post->post_name;
	switch ($page) {
		case "company":
			include(TEMPLATEPATH . '/pages/company.php');
			break;
		case "recruit":
			include(TEMPLATEPATH . '/pages/recruit.php');
			break;
		case "policy":
			include(TEMPLATEPATH . '/pages/policy.php');
			break;
		case "service":
			include(TEMPLATEPATH . '/pages/service.php');
			break;
		case "message":
			include(TEMPLATEPATH . '/pages/message.php');
			break;
		case "contact":
			include(TEMPLATEPATH . '/pages/form-contact.php');
			break;
		case "partner":
			include(TEMPLATEPATH . '/pages/form-partner.php');
			break;
		case "appointment":
			include(TEMPLATEPATH . '/pages/form-appointment.php');
			break;
		case "entry":
			include(TEMPLATEPATH . '/pages/form-entry.php');
			break;
		case "thankyou_contact":
			include(TEMPLATEPATH . '/pages/thankyou_contact.php');
			break;
		case "thankyou_appointment":
			include(TEMPLATEPATH . '/pages/thankyou_appointment.php');
			break;
		case "thankyou_partner":
			include(TEMPLATEPATH . '/pages/thankyou_partner.php');
			break;
		case "thankyou_entry":
			include(TEMPLATEPATH . '/pages/thankyou_entry.php');
			break;
	}
