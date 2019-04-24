<?php
	global $cssName;
	global $breadcrumb;

	$cssName = "service/index";
	$breadcrumb = "<li>サービス</li>";
	get_header();
?>


<main>
	<div class="l-head">
		<h1 class="m-ttl">SERVICE<span>サービス</span></h1>
	</div>
	<section class="l-service inner">
		<figure style="background-image: url(<?= assetsPath('img') ?>service/img_01.jpg)"></figure>
		<div class="service__wrap inner -m"><b>Total Produce</b>
			<h1>組織課題を<br>オフィスの在り方で<br>解決する</h1>
			<p>オフィス移転は働き方改革の実現をはじめ、企業変革、ブランディング、営業力強化など、企業が抱える様々な課題を解決する絶好の機会です。しかし、それらの課題解決を実現するのはオフィス自体だけではなく、適切なオフィス運用も重要な要素です。</p>
			<p>現在オフィスがどう運用されているか、それをふまえて今後オフィスをどう運用していくべきか、さらに人事異動、新卒入社、組織改革といった企業の成長に合わせ、オフィスをどう変化させるべきかなど、目的に沿った適切なオフィス運用が企業の発展を左右すると言っても過言ではありません。</p>
			<p>そこでオフィス・ラボは、移転プロジェクトを通じて様々な組織課題を解決する「オフィスの在り方」をご提案いたします。</p>
		</div>
	</section>
	<section class="l-feature inner -s">
		<h2><span>FEATURE</span> オフィス・ラボの特徴</h2>
		<div class="feature__sec -sec1">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_02.jpg)"></figure>
			<div>
				<h3>特徴1<br>移転のみで終わらせない、<br>オフィス変化への継続的な対応</h3>
				<p>移転プロジェクトでは組織課題を解決すべく、「フリーアドレス化させる」「コミュニケーションスペースの新設」など、様々な仕掛けを新たに施しますが、意図したとおりに機能しないこともしばしば見受けられます。気づけば「新しくつくったあのスペースは全然使われていない」ということも多々あります。</p>
				<p>オフィス・ラボでは、オフィス移転がスムーズに完了することをゴールと捉えず、企業が理想の組織へ成長することをゴールと考え、移転後も継続的なオフィス改善をサポートさせていただきます。</p>
			</div>
		</div>
		<div class="feature__sec -sec2">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_03.jpg)"></figure>
			<div>
				<h3>特徴2<br>徹底したサポート体制</h3>
				<p>オフィス移転は社内関係者だけでなく、ビル関連会社、施工会社等への管理・指示等の様々なコミュニケーション、手配業務など膨大な作業が発生します。そこでオフィス・ラボではお客様専任のプロジェクトチームを結成し、オフィス移転プロジェクトをトータルでサポートいたします。</p>
				<p>各コミュニケーション、各種調整のすべてを一元管理することはもちろん、専任チームによる密な連携によってスピード感のあるご対応を心がけております。</p>
				<p>さらに、お客様の組織課題に対する理解が重要であると考えているため、専門性の高い意思決定についてもお客様のブレーンとして、組織課題解決につながるご提案をさせていただき、企業成長を実現するオフィス移転をサポートいたします。</p>
			</div>
		</div>
		<div class="feature__sec -sec3">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_04.jpg)"></figure>
			<div>
				<h3>特徴3<br>最適なコストパフォーマンスの実現</h3>
				<p>私たちは物や工事だけでなく時間に関わる金額も含めてコストとして捉えています。各フェーズでの作業や意思決定の時間などにおいても徹底的に無駄を省きます。</p>
				<p>さらにオフィス・ラボでは主要なオフィス什器・商材メーカーと正規代理店契約を結んでいるため、高品質なサービスを適正な価格で提供することが可能です。独立企業であるがゆえにニュートラルな立ち位置で各パートナーと向き合い、お客様にとって最適なコストパフォーマンスを実現します。</p>
			</div>
		</div>
	</section>
	<section class="l-ourservices inner -s">
		<h2 class="m-ttl">OUR SERVICES<span>サービス内容</span></h2>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_01.jpg)"></figure>
			<div class="item__wrap">
				<h3>移転先ビル選定</h3>
				<p>入居される移転先ビルの選定はオフィスづくりの土台になる重要な要素です。立地条件やビルスペックは、企業ブランディングにも大きく寄与する要因になります。そして空調、防災、セキュリティ等の設備仕様は、入居時の工事コストに大きく関わりますので、事前の検証が不可欠です。<br>私たちはファシリティコンサルタントの立場から、お客様に最適な移転先のビル選定をサポートいたします。また、事前の計画に基づいたテストレイアウトを確認することにより、最適なサイズを算出します。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_03.jpg)"></figure>
			<div class="item__wrap">
				<h3>レイアウト設計</h3>
				<p>オフィスは経営装置です。社員が安心・安全・快適に働ける機能が不可欠です。また「組織は生き物」と考え、常に変化し続ける存在であるからこそ、オフィスのレイアウトも変化することを前提に設計することが重要です。<br>そして企業イメージの向上、コミュニケーションの活性化など、オフィスに求めるものは100社100通り。設計者がお客様それぞれの利用シーンを想定し、新しいオフィス提案をさせていただきます。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_02.jpg)"></figure>
			<div class="item__wrap">
				<h3>内装デザイン</h3>
				<p>企業イメージの改新・構築、働き方の改善などを行うには、オフィスの移転やリニューアルは最大の機会です。経験豊富なプロジェクトチームがそのチャンスを無駄にすることなくお客様の想いを具現化させていただきます。<br>そして経験と実績に裏付けされたデザイナーによる優れた意匠はもちろんのこと、建築の法規など豊富な知識でコンプライアンスも重視します。お客様のご要望を正確に理解し、経営視点を持って5年後10年後を見越した最適なデザイン提案をさせていただきます。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_04.jpg)"></figure>
			<div class="item__wrap">
				<h3>コスト算出</h3>
				<p>全てのプロジェクトには予算の上限があります。お客様の貴重な予算を最適なバランスで調整し、コストパフォーマンスの良いオフィスづくりをサポートいたします。<br>また時系列を持ったコスト表を作成することにより、的確に判断ができる資料を共有させていただきます。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_06.jpg)"></figure>
			<div class="item__wrap">
				<h3>スケジュール管理</h3>
				<p>オフィス移転プロジェクトのスケジュール管理は非常に煩雑です。全体感を捉えたスケジュールだけでなく、工事工程や引越しなどの細かいスケジュール管理が必要となり、各工程で誰に何を調整すべきかを把握しなければなりません。<br>特に設計フェーズ以降はビルの管理会社、施工業者、各専門業者、さらには消防署や役所などと関わる関係者も多くなっていきます。抜け漏れなくスムーズに移転が行われるよう、適切なスケジュール管理を実現いたします。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_05.jpg)"></figure>
			<div class="item__wrap">
				<h3>内装工事・施工監理</h3>
				<p>オフィス構築には床・壁・天井・設備・インフラ・什器・引越し等々、たくさんの作業員が出入りします。着工から移転完了までの限られた期間で効率的に無駄なく工事が進むよう、工程を監理させていただきます。<br>業者間で連携が必要な作業や、あいまいな工事区分も明確に調整いたします。専門知識が必要なネットワーク構築や空調、防災、セキュリティ等の各種設備工事も、私たちにお任せください。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_07.jpg)"></figure>
			<div class="item__wrap">
				<h3>引越し・移転手続き</h3>
				<p>梱包資材の手配はもちろんのこと、図面を利用して転用什器の行先を明確にします。事前に社員の皆様へ梱包方法、当日のスケジュール説明などの移転説明会を実施いたします。<br>他テナント様へのご挨拶も含め、オフィスの移転業務をトータルサポートさせていただきます。</p>
			</div>
		</div>
		<div class="ourservices__item">
			<figure style="background-image: url(<?= assetsPath('img') ?>service/img_ourservices_08.jpg)"></figure>
			<div class="item__wrap">
				<h3>原状回復工事</h3>
				<p>オフィス・ラボでは移転後の旧オフィスの原状回復工事もサポートしております。ビルにおいては業者の指定がされていますが、見積金額を専門家の視点から精査し、市場価格より高額な場合は減額交渉することが可能です。抑えられた予算はぜひ、新しいオフィスでご活用ください。</p>
			</div>
		</div>
	</section>
	<div class="l-hugelink">
		<div class="c-hugelinks">
			<ul>
				<li>PROJECT</li>
				<li>施工事例一覧</li>
				<a href="<?php home_url() ?>/project/"></a>
			</ul>
			<ul>
				<li>VOICE</li>
				<li>お客様の声</li>
				<a href="<?php home_url() ?>/voice/"></a>
			</ul>
			<ul>
				<li>CONTACT</li>
				<li>お問い合わせ</li>
				<a href="<?php home_url() ?>/contact/"></a>
			</ul>
			<div class="background-something"></div>
		</div>
	</div>
</main>


<?php get_footer() ?>
