<?php

function onesignal_send_notification_filter($fields, $new_status, $old_status, $post)
{
  if($new_status == 'publish'){
    if($post->post_type == 'feature' || $post->post_type == 'hobby' || $post->post_type == 'learn' || $post->post_type == 'life'){
      //contents設定
      $contents = "「" .get_the_title($post->ID) ."」が公開されました！";

      //image設定
      $image = assetsPath('img') . "/logo/be-topia_symbol.png";

      //image設定(記事ごとにWEBプッシュ通知画像を変更したい時) 
      if ( has_post_thumbnail($post->ID) ) {
        $thumbnail =  get_the_post_thumbnail_url($post->ID);
      } else {
        $thumbnail = assetsPath('img') . "/logo/be-topia_symbol.png";
      };

      // アクティブユーザーのみに通知する
      $fields = array(
          'app_id' => "92105a34-bce9-4de5-8cff-5bb235ac159f",//prod環境のapp_idを入力（stgでテストしたい時は、記載変更する。）
          'included_segments' => array('Active Users'),
          'headings' => array("en" => "be-topia(ビートピア)", "ja" => "be-topia(ビートピア)"),
          'isAnyWeb' => true,
          'url' => get_permalink($post->ID),
          'contents' => array("en" => $contents, "ja" => $contents),
          'chrome_web_icon' => $image,
          //'chrome_web_icon' => $thumbnail, 記事ごとにWEBプッシュ通知画像を変更したい時
      );
    }
  }
  return $fields;
}
add_filter('onesignal_send_notification', 'onesignal_send_notification_filter', 10, 4);
