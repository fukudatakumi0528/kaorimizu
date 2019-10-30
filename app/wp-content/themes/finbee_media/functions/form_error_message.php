<?php

//
// mw wp form エラーメッセージカスタマイズ
//
function my_validation_rule_job( $Validation, $data, $Data ) {
	// 問い合わせ項目
	$Validation->set_rule( 'kind', 'noEmpty', array( 'message' => '選択してください' ) );
	// お名前
	$Validation->set_rule( 'name', 'noEmpty', array( 'message' => '正しく入力してください' ) );
	$Validation->set_rule( 'furigana', 'noEmpty', array( 'message' => '正しく入力してください' ) );
	$Validation->set_rule( 'furigana', 'hiragana', array( 'message' => 'ひらがなで入力してください' ) );
	// メールアドレス + 確認
	$Validation->set_rule( 'email', 'noEmpty', array( 'message' => '正しく入力してください' ) );
	$Validation->set_rule( 'email', 'mail', array( 'message' => 'メールアドレスの形式ではありません' ) );
	$Validation->set_rule( 'email-conf', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	$Validation->set_rule( 'email-conf', 'mail', array( 'message' => 'メールアドレスの形式ではありません' ) );
	$Validation->set_rule( 'email-conf', 'eq', array( 'target' => 'email', 'message' => 'メールアドレスが一致しません') );
	// 電話番号
	$Validation->set_rule( 'tel', 'noEmpty', array( 'message' => '正しく入力してください' ) );
	$Validation->set_rule( 'tel', 'tel', array( 'message' => '電話番号の形式ではありません' ) );
	// 都道府県
	$Validation->set_rule( 'prefecture', 'noEmpty', array( 'message' => '選択してください' ) );
	// プライバシーポリシーチェック
	$Validation->set_rule( 'agreement', 'required', array( 'message' => 'プライバシーポリシー・利用規約に同意の上、チェックボックスにチェックを入れてください' ) );


/*
	// 住所
	$Validation->set_rule( 'address', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	// 問い合わせ内容
	$Validation->set_rule( 'content', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	// プライバシーポリシーチェック
	$Validation->set_rule( 'agreement', 'required', array( 'message' => 'プライバシーポリシーへの同意は必須です' ) );
*/

	return $Validation;
}



// production
//add_filter( 'mwform_validation_mw-wp-form-102', 'my_validation_rule_job', 10, 3 ); local
add_filter( 'mwform_validation_mw-wp-form-204', 'my_validation_rule_job', 10, 3 );
