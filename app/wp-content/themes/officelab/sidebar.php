<?php
if(is_post_type_archive( 'realestate' ) || is_tax(array('tsubo','location')) || is_singular('realestate')) :
    $locations = get_terms('location', 'orderby=description&hide_empty=0');
    $tsubos = get_terms('tsubo', 'orderby=description&hide_empty=0');
?>

        <aside id="worksbar">
            <ul class="case">
                <li class="title">エリア</li>
<?php foreach ($locations as $location):?>
                <li><a href="<?php echo home_url().'/realestate/location/'.$location->slug; ?>/"><span><?php echo $location->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
            <ul class="case">
                <li class="title">坪数</li>
<?php foreach ($tsubos as $tsubo):?>
                <li><a href="<?php echo home_url().'/realestate/tsubo/'.$tsubo->slug; ?>/"><span><?php echo $tsubo->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
<?php else :
    $types = get_terms('type', 'orderby=description&hide_empty=0');
    $tastes = get_terms('taste', 'orderby=description&hide_empty=0');
    $cases = get_terms('case', 'orderby=description&hide_empty=0');
    $areas = get_terms('area', 'orderby=description&hide_empty=0');
    $dates = get_terms('date', 'orderby=description&order=desc&hide_empty=0');
?>
        <aside id="worksbar">
            <ul class="type">
                <li class="title">業種</li>
<?php foreach ($types as $type):?>
                <li><a href="<?php echo home_url().'/works/type/'.$type->slug; ?>/"><span><?php echo $type->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
            <ul class="taste">
                <li class="title">テイスト</li>
<?php foreach ($tastes as $taste):?>
                <li><a href="<?php echo home_url().'/works/taste/'.$taste->slug; ?>/"><span><?php echo $taste->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
            <ul class="case">
                <li class="title">事例別</li>
<?php foreach ($cases as $case):?>
                <li><a href="<?php echo home_url().'/works/case/'.$case->slug; ?>/"><span><?php echo $case->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
            <ul class="area">
                <li class="title">広さ</li>
<?php foreach ($areas as $area):?>
                <li><a href="<?php echo home_url().'/works/area/'.$area->slug; ?>/"><span><?php echo $area->name; ?></span></a></li>
<?php endforeach;?>
            </ul>
            <!--<ul class="date">
                <li class="title">年別</li>
<?php foreach ($dates as $date):?>
                <li><a href="<?php echo home_url().'/works/date/'.$date->slug; ?>/"><span><?php echo $date->name; ?></span></a></li>
<?php endforeach;?>
            </ul>-->
<?php endif;?>
            <hr class="line_gray" />
            <ul class="company">
                <li class="title">企業情報</li>
                <li><a href="<?php echo home_url(); ?>/company/info/"><span>会社概要</span></a></li>
                <li><a href="<?php echo home_url(); ?>/company/idea/"><span>代表挨拶</span></a></li>
                <li><a href="<?php echo home_url(); ?>/company/advantage/"><span>オフィス・ラボの強み</span></a></li>
            </ul>
            <div class="contact">
                <p class="button"><a href="/contact/">CONTACT US</a></p>
            </div>
        <!-- /worksbar --></aside>
