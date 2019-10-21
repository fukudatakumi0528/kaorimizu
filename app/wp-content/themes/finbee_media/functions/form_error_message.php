<?php

//
// お仕事の依頼エラーメッセージ
//
function my_validation_rule_job( $Validation, $data, $Data ) {
	// 担当者名
	$Validation->set_rule( 'name', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	// メールアドレス + 確認
	$Validation->set_rule( 'email', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	$Validation->set_rule( 'email', 'mail', array( 'message' => 'メールアドレスの形式ではありません' ) );
	$Validation->set_rule( 'email_confirm', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	$Validation->set_rule( 'email_confirm', 'mail', array( 'message' => 'メールアドレスの形式ではありません' ) );
	$Validation->set_rule( 'email_confirm', 'eq', array( 'target' => 'email', 'message' => 'メールアドレスが一致しません') );
	// 電話番号
	$Validation->set_rule( 'tel', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	$Validation->set_rule( 'tel', 'tel', array( 'message' => '電話番号の形式ではありません' ) );
	// チェックボックス
	$Validation->set_rule( 'type', 'required', array( 'message' => '必須項目を選択してください' ) );
	// 住所
	$Validation->set_rule( 'address', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	// 問い合わせ内容
	$Validation->set_rule( 'content', 'noEmpty', array( 'message' => '必須項目を入力してください' ) );
	// プライバシーポリシーチェック
	$Validation->set_rule( 'agreement', 'required', array( 'message' => 'プライバシーポリシーへの同意は必須です' ) );

	return $Validation;
}


// localhost
/*
add_filter( 'mwform_validation_mw-wp-form-6477', 'my_validation_rule_job', 10, 3 ); // お仕事の依頼
add_filter( 'mwform_validation_mw-wp-form-6480', 'my_validation_rule_appointment', 10, 3 ); // 取材・アポイントメント・営業
add_filter( 'mwform_validation_mw-wp-form-6482', 'my_validation_rule_partner', 10, 3 ); // 協力パートナー
add_filter( 'mwform_validation_mw-wp-form-6485', 'my_validation_rule_entry', 10, 3 ); // 採用エントリー
*/


// production
add_filter( 'mwform_validation_mw-wp-form-6480', 'my_validation_rule_job', 10, 3 ); // お仕事の依頼
add_filter( 'mwform_validation_mw-wp-form-6481', 'my_validation_rule_appointment', 10, 3 ); // 取材・アポイントメント・営業
add_filter( 'mwform_validation_mw-wp-form-6482', 'my_validation_rule_partner', 10, 3 ); // 協力パートナー
add_filter( 'mwform_validation_mw-wp-form-6483', 'my_validation_rule_entry', 10, 3 ); // 採用エントリー


