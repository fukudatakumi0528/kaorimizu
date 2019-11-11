<?php

function onesignal_send_notification_filter($fields, $new_status, $old_status, $post)
{
  $contents = "「" .get_the_title($post->ID) ."」が公開されました！";
    if (defined('ENV') && ENV == 'prod') {
      if($new_status == 'publish'){
        if($post->post_type == 'feature' || $post->post_type == 'hobby' || $post->post_type == 'learn' || $post->post_type == 'life'){
          switch($old_status){
              case 'draft':
              case 'pending':
              case 'auto-draft':
              case 'future':
              case 'new':
                  // アクティブユーザーのみに通知する
                  $fields = array(
                      'app_id' => "fa6c61c4-e8f0-4c0a-ad34-89ef3f2c2175",
                      'included_segments' => array('Active Users'),
                      'headings' => array("en" => "be-topia(ビートピア)"),
                      'isAnyWeb' => true,
                      'isAndroid' => true,
                      'isIos' => true,
                      'url' => get_permalink($post->ID),
                      'contents' => array("en" => $contents),
                  );
          }
        }
      }
    }
    return $fields;
}
add_filter('onesignal_send_notification', 'onesignal_send_notification_filter', 10, 4);
