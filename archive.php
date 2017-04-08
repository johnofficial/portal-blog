<?php 
	get_header();
	?>
	<section class="site-content clearfix">

		<main class="main-column">
		<?php 
if(have_posts()) : ?>
	<h2>
		<?php 
			if (is_tag()){
				single_tag_title();
			} elseif (is_author()){
				the_post();
				echo  'Аутор: ' . get_the_author();
				rewind_posts();
			}elseif(is_day()){
				echo 'Архива за дан: ' .get_the_date('d. m. Y.');
			}elseif(is_month()){
				echo 'Архива за месец: ' .get_the_date('m. Y.');
			}elseif(is_year()){
				echo 'Архива за годину: ' .get_the_date('Y');
			}
		 ?>
	 </h2>

<?php 	while(have_posts()) : the_post(); 
			get_template_part('content', get_post_format());
		endwhile;
		echo paginate_links( );
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