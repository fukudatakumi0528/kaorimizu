<!DOCTYPE html>
<html lang="ja-jp" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
<head>
<?php get_template_part('element/head') ?>
</head>

<body>
<div class="wrap">
	<header class="l-header">
		<div class="o-headerInner">
			<a class="m-logo" href="<?= home_url() ?>/">
				<img class="m-logo__image" src="<?php echo assetsPath('img') ?>common/be-topia-logo.svg" alt="be-topia">
			</a>
			<div class="o-headerInner__left">
				<a class="icon-instagram" href=""></a>
				<a class="icon-twitter" href=""></a>
				<a class="icon-facebook" href="">
					<span class="path1"></span>
					<span class="path2"></span>
				</a>
			</div>
		</div>
		<div class="o-headerInnerPc"><a class="m-logo" href="<?= site_url('') ?>"><img class="m-logo__image" src="<?php echo assetsPath('img') ?>common/be-topia-logo.svg" alt="be-topia"></a>
			<div class="o-headerInnerPc__left">
				<ul class="o-headerInnerPc__left__category">
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('feature/') ?>">
							<span class="icon-feature o-headerInnerPc__left__category__list__link__icon">
								<span class="path1"></span><span class="path2"></span><span class="path3"></span>
							</span>
							<p class="o-headerInnerPc__left__category__list__link__text">特集</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('hobby/') ?>">
							<span class="icon-hobby o-headerInnerPc__left__category__list__link__icon">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
								<span class="path5"></span>
							</span>
							<p class="o-headerInnerPc__left__category__list__link__text">趣味</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('life/') ?>">
							<span class="icon-life o-headerInnerPc__left__category__list__link__icon">
								<span class="path1"></span>
								<span class="path2"></span>
							</span>
							<p class="o-headerInnerPc__left__category__list__link__text">生活</p>
						</a>
					</li>
					<li class="o-headerInnerPc__left__category__list">
						<a class="o-headerInnerPc__left__category__list__link" href="<?= site_url('learn/') ?>">
							<span class="icon-learn o-headerInnerPc__left__category__list__link__icon">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
							</span>
							<p class="o-headerInnerPc__left__category__list__link__text">学び</p>
						</a>
					</li>
				</ul>
				<ul class="o-headerInnerPc__left__button">
					<li class="o-headerInnerPc__left__button__list js-headerInnerPc__search">
						<div class="o-headerInnerPc__left__button__list__icon">
							<span class="icon-search2">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
							</span>
						</div>
						<p class="o-headerInnerPc__left__button__list__text">したい・ほしいを<br><strong>探す</strong></p>
					</li>
					<li class="o-headerInnerPc__left__button__list js-headerInnerPc__grant">
						<div class="o-headerInnerPc__left__button__list__icon">
							<span class="icon-star2">
								<span class="path1"></span>
								<span class="path2"></span>
							</span>
						</div>
						<p class="o-headerInnerPc__left__button__list__text">したい・ほしいを<br><strong>叶える</strong></p>
					</li>
				</ul>
				<div class="o-headerInnerPc__left__icon">
					<a class="icon-instagram o-headerInnerPc__left__icon__list" href="<?= home_url() ?>/"></a>
					<a class="icon-twitter o-headerInnerPc__left__icon__list" href="<?= home_url() ?>/"></a>
					<a class="icon-facebook o-headerInnerPc__left__icon__list" href="<?= home_url() ?>/">
						<span class="path1"></span>
						<span class="path2"></span>
					</a>
					<div class="icon-search o-headerInnerPc__left__icon__list js-headerInnerPc__Menu"></div>
				</div>
			</div>
		</div>
	</header>
