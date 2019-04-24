<div class="social-single">
	<ul>
		<li class="social-single-share">
			<div class="fb-share-button" data-href="<?php echo get_shared_url( get_the_ID() );?>" data-layout="box_count" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_shared_url( get_the_ID() ));?>&amp;src=sdkpreparse">シェア</a></div>
		</li>
		<li class="social-single-facebook">
			<div class="fb-like" data-href="<?php echo get_shared_url( get_the_ID() );?>" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
		</li>
		<li class="social-single-twitter">
			<?php echo get_third_party_tweet_button(); ?>
		</li>
		<li class="social-single-hatebu">
			<a href="http://b.hatena.ne.jp/entry/<?php echo get_shared_url( get_the_ID() );?>" data-hatena-bookmark-title="<?php echo get_the_title( get_the_ID() );?>" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical-large" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="https://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20"></a>
		</li>
		<li class="social-single-google">
			<div class="g-plusone" data-size="tall" data-callback="plusone_vote"></div>
		</li>
		<li class="social-single-pocket">
			<a data-pocket-label="pocket" data-pocket-count="vertical" class="pocket-btn" data-lang="en" data-save-url="<?php echo get_shared_url( get_the_ID() );?>"></a>
		</li>
	</ul>
</div>