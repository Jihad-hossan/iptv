<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPTV
 */

?>

	<?php 
		$first_column = get_field('first_column', 'option'); 
		$footer_logo = $first_column['footer_logo'];
		$footer_description = $first_column['footer_description'];

		$second_column = get_field('second_column', 'option'); 
		$title = $second_column['title'];
		$links = $second_column['links'];

		$third_column = get_field('third_column', 'option');
		$title_2 = $third_column['title'];
		$links_2 = $third_column['links'];

		$fourth_column = get_field('fourth_column', 'option');
		$title_3 = $fourth_column['title'];
		$links_3 = $fourth_column['links'];

		$footer_bottom = get_field('footer_bottom', 'option');
		$copyright_text = $footer_bottom['copyright_text'];
		$social_media = $footer_bottom['social_media'];
	?>

	<footer id="colophon" class="site-footer">
		<div class="footer-container">
			<div class="row pb-5">
				<?php if(!empty($first_column)): ?>
					<div class="col-md-4">
						<div class="first-col">
							<?php if(!empty($footer_logo)): ?>
								<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo  esc_attr($footer_logo['alt']); ?>" class="footer-logo">
							<?php endif; ?>
							<?php if(!empty($footer_description)): ?>
								<p class="footer-description"><?php echo esc_html(_e($footer_description, 'iptv')); ?></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if(!empty($second_column)): ?>
					<div class="col-md-3">
						<div class="links-div second-div">
							<?php if(!empty($title)): ?>
								<h4 class="title"><?php echo esc_html(_e($title, 'iptv')); ?></h4>
							<?php endif; ?>
							<?php if(!empty($links)): ?>
								<ul class="links">
									<?php foreach($links as $item): 
										$link = $item["link"];	
									?>
										<li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"> <?php echo esc_html(_e($link['title'], 'iptv')); ?></a></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if(!empty($third_column)): ?>
					<div class="col-md-3">
						<div class="links-div">
							<?php if(!empty($title_2)): ?>
								<h4 class="title"><?php echo esc_html(_e($title_2, 'iptv')); ?></h4>
							<?php endif; ?>
							<?php if(!empty($links_2)): ?>
								<ul class="links">
									<?php foreach($links_2 as $item): 
										$link = $item["link"];	
									?>
										<li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"> <?php echo esc_html(_e($link['title'], 'iptv')); ?></a></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				
				<?php if(!empty($fourth_column)): ?>
					<div class="col-md-2">
						<div class="links-div">
							<?php if(!empty($title_3)): ?>
								<h4 class="title"><?php echo esc_html(_e($title_3, 'iptv')); ?></h4>
							<?php endif; ?>
							<?php if(!empty($links_3)): ?>
								<ul class="links">
									<?php foreach($links_3 as $item): 
										$link = $item["link"];	
									?>
										<li><a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"> <?php echo esc_html(_e($link['title'], 'iptv')); ?></a></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="row">
				<div class="footer-bottom">
					<?php if(!empty($copyright_text)): ?>
						<p class="copyright"><?php echo esc_html(_e($copyright_text, 'iptv')); ?></p>
					<?php endif; ?>

					<?php if(!empty($social_media)): ?>
						<div class="social-media">
							<?php foreach($social_media as $item): 
								$social_icon = $item["social_icon"];
								$media_name_and_link = $item["media_name_and_link"];
							?>
								<a href="<?php echo esc_url( $media_name_and_link['url'] ); ?>" target="<?php echo esc_attr( $media_name_and_link['target'] ); ?>"><img src="<?php echo esc_url($social_icon['url']); ?>" alt="<?php echo  esc_attr($social_icon['alt']); ?>" class="social"></a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
