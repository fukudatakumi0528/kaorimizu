<?php
add_action( 'admin_head-post-new.php', 'post_edit_required' );
add_action( 'admin_head-post.php', 'post_edit_required' );
function post_edit_required() {
?>
<script type="text/javascript">
jQuery(function($) {
  //特集
  if( 'feature' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if ( '' == $('#title').val() ) {
        alert('タイトルを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
      // コンテンツ（エディタ）
      if ( $('.wp-editor-area').val().length < 1 ) {
        alert('コンテンツを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        return false;
      }
      // 抜粋
      /*
      if ( '' == $('#excerpt').val() ) {
        alert('抜粋を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#excerpt').focus();
        return false;
      }
      */
      // カテゴリー
      if ( $('#feature_taxonomy-all input:checked').length < 1 ) {
        alert('カテゴリーを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // タグ
      if ( $('#feature_tagchecklist input:checked').length < 1 ) {
        alert('タグを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // アイキャッチ
      if ( $('#set-post-thumbnail img').length < 1 ) {
        alert('アイキャッチ画像を設定してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#set-post-thumbnail').focus();
        return false;
      }
    });
  }

  //趣味
  if( 'hobby' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if ( '' == $('#title').val() ) {
        alert('タイトルを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
      // コンテンツ（エディタ）
      if ( $('.wp-editor-area').val().length < 1 ) {
        alert('コンテンツを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        return false;
      }
      // 抜粋
      /*
      if ( '' == $('#excerpt').val() ) {
        alert('抜粋を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#excerpt').focus();
        return false;
      }
      */
      // カテゴリー
      if ( $('#hobby_taxonomy-all input:checked').length < 1 ) {
        alert('カテゴリーを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // タグ
      if ( $('#hobby_tagchecklist input:checked').length < 1 ) {
        alert('タグを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // アイキャッチ
      if ( $('#set-post-thumbnail img').length < 1 ) {
        alert('アイキャッチ画像を設定してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#set-post-thumbnail').focus();
        return false;
      }
    });
  }

  //生活
  if( 'life' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if ( '' == $('#title').val() ) {
        alert('タイトルを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
      // コンテンツ（エディタ）
      if ( $('.wp-editor-area').val().length < 1 ) {
        alert('コンテンツを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        return false;
      }
      // 抜粋
      /*
      if ( '' == $('#excerpt').val() ) {
        alert('抜粋を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#excerpt').focus();
        return false;
      }
      */
      // カテゴリー
      if ( $('#life_taxonomy-all input:checked').length < 1 ) {
        alert('カテゴリーを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // タグ
      if ( $('#life_tagchecklist input:checked').length < 1 ) {
        alert('タグを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // アイキャッチ
      if ( $('#set-post-thumbnail img').length < 1 ) {
        alert('アイキャッチ画像を設定してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#set-post-thumbnail').focus();
        return false;
      }
    });
  }

  //学び
  if( 'learn' == $('#post_type').val() ) {
    $('#post').submit(function(e) {
      // タイトル
      if ( '' == $('#title').val() ) {
        alert('タイトルを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#title').focus();
        return false;
      }
      // コンテンツ（エディタ）
      if ( $('.wp-editor-area').val().length < 1 ) {
        alert('コンテンツを入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        return false;
      }
      // 抜粋
      /*
      if ( '' == $('#excerpt').val() ) {
        alert('抜粋を入力してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#excerpt').focus();
        return false;
      }
      */
      // カテゴリー
      if ( $('#learn_taxonomy-all input:checked').length < 1 ) {
        alert('カテゴリーを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // タグ
      if ( $('#learn_tagchecklist input:checked').length < 1 ) {
        alert('タグを選択してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#taxonomy-category a[href="#category-all"]').focus();
        return false;
      }
      // アイキャッチ
      if ( $('#set-post-thumbnail img').length < 1 ) {
        alert('アイキャッチ画像を設定してください');
        $('.spinner').css('visibility', 'hidden');
        $('#publish').removeClass('button-primary-disabled');
        $('#set-post-thumbnail').focus();
        return false;
      }
    });
  }
});
</script>
<?php
}
?>