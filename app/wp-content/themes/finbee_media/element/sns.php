<ul class="socialBtn">
	<!-- line -->
	<li>
		<a class="sns-line" href="//timeline.line.me/social-plugin/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="LINEでシェアする">
			<img src="<?php echo assetsPath('img') . "logo/sns/sns-logo-line.svg" ?>">
		</a>
	</li>

	<!-- twitter -->
	<li>
		<a class="sns-twitter" href="//twitter.com/intent/tweet?text=<?php echo urlencode(the_title("","",0)); ?>&<?php echo urlencode(get_permalink()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Twitterでシェアする">
			<img src="<?php echo assetsPath('img') . "logo/sns/sns-logo-twitter.svg" ?>">
		</a>
	</li>

	<!-- facebook -->
	<li>
		<a class="sns-facebook" href="//www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&t=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" title="facebookでシェアする">
			<img src="<?php echo assetsPath('img') . "logo/sns/sns-logo-facebook.svg" ?>">
		</a>
	</li>

	<!-- pocket -->
	<li>
		<a class="sns-pocket" href="//getpocket.com/edit?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Pocketであとで読む">
			<img src="<?php echo assetsPath('img') . "logo/sns/sns-logo-pocket.svg" ?>">
		</a>
	</li>

	<!-- hatena -->
	<li>
		<a class="sns-hatena" href="//b.hatena.ne.jp/add?mode=confirm&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(the_title("","",0)); ?>" target="_blank" data-hatena-bookmark-title="<?php the_permalink(); ?>" title="このエントリーをはてなブックマークに追加する">
			<img src="<?php echo assetsPath('img') . "logo/sns/sns-logo-hatena.svg" ?>">
		</a>
	</li>
</ul>