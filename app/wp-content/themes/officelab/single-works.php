<?php
    $slug = get_post_type_object(get_post_type())->name;
    $name = get_post_type_object(get_post_type())->label;

    $type = get_the_terms($post->ID, 'type');
    $type = $type[0]->name;
    $taste = get_the_terms($post->ID, 'taste');
    $taste = $taste[0]->name;
    $case = get_the_terms($post->ID, 'case');
    $case = $case[0]->name;
    $area = get_the_terms($post->ID, 'area');
    $area = $area[0]->name;
    $date = get_the_terms($post->ID, 'date');
    $date = $date[0]->name;
get_header(); ?>
<main id="contents" class="works">
    <!-- <h2 id="page_title">施工事例</h2> -->
    <ol id="breadcrumb">
        <li><a href="<?php echo home_url(); ?>/">株式会社オフィス・ラボ ホーム</a></li>
        <li><a href="<?php echo home_url().'/'.$slug; ?>/"><?php echo $name; ?></a></li>
        <li><?php the_title(); ?></li>
    </ol>
    <div class="heading">
        <h2><i><img src="<?php echo get_template_directory_uri(); ?>/img/icon_works_title01.png" width="31" height="24" alt="施工事例"></i><?php the_title(); ?></h2>
    </div>
    <section id="single">
        <article class="post">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if($cfs->get('works_images')):?>
<div id="slider" class="flexslider">
  <ul class="slides">
<?php
$images = $cfs->get('works_images');
$size   = "works_single";
foreach ($images as $image):
?>
    <li>
      <img src="<?php
$image_id = $image['works_image'];
$img=wp_get_attachment_image_src($image_id, $size);
echo $img[0];
?>" />
    </li>
<?php
endforeach;
?>
  </ul>
</div>
<div id="carousel" class="flexslider">
  <ul class="slides" id="carousel_line">
<?php
$images = $cfs->get('works_images');
$size   = "works_hot";
foreach ($images as $image):
?>
    <li>
      <img src="<?php
$image_id = $image['works_image'];
$img=wp_get_attachment_image_src($image_id, $size);
echo $img[0];
?>" />
    </li>
<?php
endforeach;
?>
  </ul>
</div>


<?php
$workTags = get_the_terms($post->ID,'work_tag');
$nearTagList=array();
if(!empty($workTags)):
?>
		<div class="work_tag">
       		<ul>
<?php 
foreach($workTags as $workTag):
$nearTagList[]=$workTag->slug;
?>	
			<li><?php echo $workTag->name;?></li>
<?php endforeach;?>
			</ul>
		</div>
<?php endif;?>

<?php
endif;?>

<?php endwhile; ?>
<?php else : ?>
            <h3>記事はまだありません。</h3>
<?php
    endif;
    wp_reset_postdata();
?>
        <!-- /post --></article>
<?php
$designContainerTypeTitle=nl2br(get_post_meta($post->ID, 'design_container_type_title',true));
$designContainerTypeText1=nl2br(get_post_meta($post->ID, 'design_container_type_text1',true));
if(!empty($designContainerTypeTitle)||!empty($designContainerTypeText1)):
?>
        <div class="design_container">
			<h1>Designer’s Comment<?php echo '&nbsp;&nbsp;'.$designContainerTypeTitle;?></h1>
			<p><?php echo $designContainerTypeText1;?></p>
		</div>
<?php
endif;
?>
<div class="projectDetail">
	<h2>プロジェクト概要</h2>
	<table class="detailLine">
		<tr>
			<th>テイスト</th>
			<td><?php echo $taste; ?></td>
			<th>事例</th>
			<td><?php echo $case; ?></td>
		</tr>
		<tr>
			<th>広さ</th>
			<td><?php echo $area; ?></td>
			<th>業種</th>
			<td><?php echo $type; ?></td>
		</tr>
	</table>
</div>


        <div class="contact" align="center">
			<p class="button"><a href="/contact/">メールによるお問い合わせ</a></p>
        </div>
        <div class="sns">
        	<?php get_template_part( 'parts/parts_sns' ); //SNS ?>
		</div>
<?php

$workNearList=getWorkNearList($nearTagList,'DESC',3,$post->ID);
if(empty($workNearList)){
	$workNearList=getWorkNearList(array(),'DESC',3,$post->ID);
}
//pr($workNearList);
?>
        <div class="near">
			<h2>関連記事</h2>
			<ul>
<?php
if(!empty($workNearList)):
foreach($workNearList as $nears):
$metaValues = get_post_meta($nears->ID,'works_image');
$img=array();
if(!empty($metaValues)&&isset($metaValues[0])){
	$size   = "works_hot";
	$img = wp_get_attachment_image_src($metaValues[0], $size);
}
?>
				<li><a href="<?php echo get_permalink($nears->ID);?>"><?php
if(!empty($img)):?>
	<img src="<?php
echo $img[0];
?>" width="260" /><br>
<?php
endif;?><?php
echo $nears->post_title;?></a></li>
<?php
endforeach;
endif;
?>
			</ul>
		</div>
    <!-- /single --></section>
<?php get_sidebar(); ?>
<!-- /contents --></main>

<script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>


<?php get_footer(); ?>