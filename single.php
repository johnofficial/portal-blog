<?php 
	get_header();
		?>
	<section class="site-content clearfix">

		<main class="main-column">
		<?php 
if(have_posts()) :
	while(have_posts()) : the_post(); ?>
		<article class="post">
			<h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>

			<p class="post-info">
			<?php the_time('j. F Y. g:i '); ?> 
				| Аутор: <a href=" <?php echo get_author_posts_url(get_the_author_meta('ID')); ?> "><?php  the_author(); ?></a>
				| Категорија: 
				<?php 
					$categories = get_the_category();
					$separator 	= ", ";
					$output		= '';
					if($categories){
						foreach($categories as $category){
							$output .= '<a href="' . get_category_link($category->term_id ). '">' .$category->cat_name. '</a>' . $separator;
						}
						echo trim($output, $separator);
					}
				 ?>

			</p>
			<?php the_post_thumbnail('banner-image'); ?>
			<?php the_content(); ?>
			<hr>
			<?php if(comments_open()) { comments_template(); } else{
				echo '<h5> Коментари нису омогућени. </h5>'; }
			 ?>
		</article>
	<?php endwhile;
	else :
		echo 'Trenutno nema sadržaja.';
endif;
?>
		</main>
		<aside class="secondary-column">
			<a href="https://www.facebook.com/jovan.saviic" target="_blank">
				<img src="<?php bloginfo('template_directory'); ?>/banner-novis.png" />
			</a>
		</aside>

	</section>
	<?php 
	get_footer();
 ?>