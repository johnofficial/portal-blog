<?php 
	get_header(); ?>
	
	<section class="site-content clearfix">

		<main class="main-column">
			<?php 
				if(have_posts()) :
				while(have_posts()) : the_post(); 
					get_template_part('content', get_post_format());
				endwhile;

				echo paginate_links();

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