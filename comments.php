<?php 

if( post_password_required() ){
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if(have_comments()): ?>

		<ul class="comments-list">
			<?php
				$args = array(
					'walker' 			=> null,
					'max_depth'			=> '1',
					'style' 			=> 'ul',
					'callback'			=> null,
					'end-callback' 		=> null,
					'type'				=> 'all',
					'reply_text'		=> 'Одговори',
					'page'				=> '',
					'per_page'			=> '',
					'avatar_size' 		=> '32',
					'reverse_top_level' => null, 
					'reverse_children'	=> '',
					'format'			=> 'html5',
					'short_ping'		=> false,
					'echo'				=> false
					); 
				echo wp_list_comments($args);
			?>
		</ul>

		<?php if( !comments_open()  AND get_comments_number() ): ?>
			<p class="no-comments"> <?php esc_html_e('Коментари су закључани.', 'novisportal'); ?> </p>
		<?php endif; ?>
			
	<?php endif;  ?> 


	<?php 

		$fields =  array(
    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Име *' ) . '</label> ' .
        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Eмаил *' ) . '</label> ' .
        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>'
);
		$args = array(
			'class_submit' 	=> 'post-comment-button',
			'label_submit' 	=> __('Пошаљи коментар'),
			'fields'		=> apply_filters( 'comment_form_default_fields', $fields)
			);
	?>

	<?php comment_form( $args ); ?>

</div>