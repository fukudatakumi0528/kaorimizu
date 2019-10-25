<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "contact/index";
	$breadcrumb = '<li><a href="/news/">ニュース</a></li><li></li>';
	get_header();

?>
<main>
	<section class="p-contact__topper">
		<div class="o-topperSection">
			<div class="o-topperSection__main">
				<div class="o-topperSection__main__title"><img class="o-topperSection__main__title__icon" src="/assets/img/common/icon/mail.png" alt="">
					<div class="o-topperSection__main__title__text">
						<h1 class="o-topperSection__main__title__text__main">お問い合わせ</h1>
						<p class="o-topperSection__main__title__text__sub">Contact</p>
					</div>
				</div>
				<div class="o-topperSection__main__description">be-topia のコンテンツに参加してみたい方は以下フォームより、お問い合わせください。</div>
			</div>
		</div>
	</section>

	<section class="p-contact__main">

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content() ?>
		<?php endwhile; endif; ?>






<!--
<div class="p-contact__main__input">

  <div class="m-selectboxArea">
    <div class="m-selectboxArea__topper">
      <p class="m-selectboxArea__topper__required">必須</p>
      <p class="m-selectboxArea__topper__title">お問い合わせ項目</p>
    </div>

    <div class="m-selectboxArea__under">
	    <div class="m-selectboxArea__under_validationwrap is-validation">
	      <select class="m-selectboxArea__under__input js-selectbox" name="">
	        <option disabled selected>選択してください</option>
	        <option value="1">取材を受けたい</option>
	        <option value="2">記事を書きたい</option>
	        <option value="3">撮影したい</option>
	        <option value="4">広告を掲載したい</option>
	        <option value="5">その他</option>
	      </select>
	    </div>
      <div class="m-selectboxArea__under__icon"><span class="icon-head"></span></div>
      <p class="m-selectboxArea__under_validationtext">選択してください</p>
    </div>
  </div>

  <div class="m-inputArea">
    <div class="m-inputArea__topper">
      <p class="m-inputArea__topper__required">必須</p>
      <p class="m-inputArea__topper__title">氏名</p>
    </div>
    <div class="m-inputArea__under">
	    <div class="m-inputArea__under_validationwrap is-validation">
		    <input class="m-inputArea__under__input" placeholder="山田太郎">
	    </div>
      <p class="m-inputArea__under_validationtext">選択してください</p>
    </div>
  </div>
</div>
-->



































		<!--validationエラー時の画面-->
		<!--
		<div class="p-contact__main__input">
			<div class="m-selectboxArea">
				<div class="m-selectboxArea__topper">
					<p class="m-selectboxArea__topper__required">必須</p>
					<p class="m-selectboxArea__topper__title">お問い合わせ項目</p>
				</div>
				<div class="m-selectboxArea__under">
					<select class="m-selectboxArea__under__input js-selectbox is-validation" name="">
						<option disabled selected>選択してください</option>
						<option value="1">取材を受けたい</option>
						<option value="2">記事を書きたい</option>
						<option value="3">撮影したい</option>
						<option value="4">広告を掲載したい</option>
						<option value="5">その他</option>
					</select>
					<div class="m-selectboxArea__under__icon is-validation"><span class="icon-head"></span></div>
					<div class="m-selectboxArea__under__validation">
						<div class="m-selectboxArea__under__validation__text">選択してください</div>
					</div>
				</div>
			</div>
			<div class="m-inputArea is-validation">
				<div class="m-inputArea__topper">
					<p class="m-inputArea__topper__required">必須</p>
					<p class="m-inputArea__topper__title">氏名</p>
				</div>
				<div class="m-inputArea__under is-validation">
					<input class="m-inputArea__under__input is-validation" placeholder="山田太郎">
					<div class="m-inputArea__under__validation">
						<div class="m-inputArea__under__validation__text">正しく入力してください</div>
					</div>
				</div>
			</div>
			<div class="m-inputArea is-validation">
				<div class="m-inputArea__topper">
					<p class="m-inputArea__topper__required">必須</p>
					<p class="m-inputArea__topper__title">ふりがな</p>
				</div>
				<div class="m-inputArea__under is-validation">
					<input class="m-inputArea__under__input is-validation" placeholder="やまだたろう">
					<div class="m-inputArea__under__validation">
						<div class="m-inputArea__under__validation__text">正しく入力してください</div>
					</div>
				</div>
			</div>
			<div class="p-contact__main__input__email is-active">
				<div class="m-inputArea is-validation">
					<div class="m-inputArea__topper">
						<p class="m-inputArea__topper__required">必須</p>
						<p class="m-inputArea__topper__title">メールアドレス</p>
					</div>
					<div class="m-inputArea__under is-validation">
						<input class="m-inputArea__under__input is-validation" placeholder="be_topia.com">
						<div class="m-inputArea__under__validation">
							<div class="m-inputArea__under__validation__text">正しい形式で入力してください</div>
						</div>
					</div>
				</div>
				<div class="m-inputArea is-validation">
					<div class="m-inputArea__topper">
						<p class="m-inputArea__topper__required">必須</p>
						<p class="m-inputArea__topper__title">メールアドレス（確認）</p>
					</div>
					<div class="m-inputArea__under is-validation">
						<input class="m-inputArea__under__input is-validation" placeholder="be_topia.com">
						<div class="m-inputArea__under__validation">
							<div class="m-inputArea__under__validation__text">上と同じアドレスを入力してください</div>
						</div>
					</div>
				</div>
			</div>
			<div class="p-contact__main__input__tel is-active">
				<div class="m-inputArea is-validation">
					<div class="m-inputArea__topper">
						<p class="m-inputArea__topper__required">必須</p>
						<p class="m-inputArea__topper__title">電話番号</p>
					</div>
					<div class="m-inputArea__under is-validation">
						<input class="m-inputArea__under__input is-validation" placeholder="080-△△△△-××××">
						<div class="m-inputArea__under__validation">
							<div class="m-inputArea__under__validation__text">正しく入力してください</div>
						</div>
					</div>
				</div>
			</div>
			<div class="m-selectboxArea">
				<div class="m-selectboxArea__topper">
					<p class="m-selectboxArea__topper__required">必須</p>
					<p class="m-selectboxArea__topper__title">お住まいの都道府県</p>
				</div>
				<div class="m-selectboxArea__under">
					<select class="m-selectboxArea__under__input js-selectbox is-validation" name="">
						<option disabled selected>選択してください</option>
						<option value="1">北海道</option>
						<option value="2">青森県</option>
					</select>
					<div class="m-selectboxArea__under__icon is-validation"><span class="icon-head"></span></div>
					<div class="m-selectboxArea__under__validation">
						<div class="m-selectboxArea__under__validation__text">選択してください</div>
					</div>
				</div>
			</div>
			<div class="p-contact__main__checkbox">
				<div class="p-contact__main__checkbox__topper">
					<p class="p-contact__main__checkbox__topper__required">必須</p>
					<input type="checkbox" id="confirm">
					<label class="p-contact__main__checkbox__topper__icon" for="confirm"><span class="icon-check"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></label>
					<p class="p-contact__main__checkbox__topper__title"><a href="">プライバシーポリシー・利用規約</a>に同意する</p>
				</div>
				<div class="p-contact__main__checkbox__validation">
					<div class="p-contact__main__checkbox__validation__text">プライバシーポリシー・利用規約に同意の上、<br>チェックボックスにチェックを入れてください</div>
				</div>
			</div>
			<button class="m-wideButton"><span class="icon-btn"></span>
				<p class="m-wideButton__text">確認する</p>
			</button>
		</div>
		-->





	</section>



	<section class="p-contact__footer">
		<div class="m-breadcrumb">
			<ul class="m-breadcrumb__list">
				<li class="m-breadcrumb__list__link"> <a class="m-breadcrumb__list__link__text" href="">TOP</a><span class="icon-head"></span></li>
				<li class="m-breadcrumb__list__link"> <a class="m-breadcrumb__list__link__text" href="">
						<p class="m-breadcrumb__list__link__text__inner"> 特集</p></a><span class="icon-head"></span></li>
			</ul>
		</div>
	</section>




</main>
<?php get_footer() ?>
