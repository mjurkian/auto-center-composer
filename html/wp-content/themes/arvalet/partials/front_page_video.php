<section class="video">
	<div class="video__container">
		<div class="video__row">
			<?php
			$left_content = get_sub_field('left_content');
			$right_content = get_sub_field('right_content');
			?>
			<div class="video__dual">
				<div class="video__dual--left video__dual--<?php echo $left_content; ?>">
					<?php
					if ($left_content === 'text') :
						$left_text = get_sub_field('left_text');
						$left_button = get_sub_field('left_button');
					?>
					<p><?php echo $left_text; ?></p>

					<?php
					if ($left_button) :
						$link_url = $left_button['url'];
						$link_title = $left_button['title'];
						$link_target = $left_button['target'] ? $left_button['target'] : '_self';
						?>
							<a class="button light" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i class="arrow"></i></a>
						<?php
					endif;
					?>


					<?php
					elseif ($left_content === 'image') :
						$left_image = get_sub_field('left_image');

						$imgDesk = $left_image['sizes']['content-desk'];
						$imgMobile = $left_image['sizes']['content-mobile'];
					?>
					<img class="desktop"
						src="<?php echo $imgDesk; ?>"
						alt="<?php echo $left_image['alt']?>">

					<img class="mobile"
						src="<?php echo $imgMobile ?>"
						alt="<?php echo $left_image['alt']?>">

					<?php
					elseif ($left_content === 'video') :
						$left_video = get_sub_field('left_video');
					?>

					<div class="video-wrapper">
						<div id="<?php echo $left_video ?>" class="youtube-player"  data-id="<?php echo $left_video; ?>"></div>
					</div>

					<?php
					endif;
					?>
				</div>

				<div class="video__dual--right video__dual--<?php echo $right_content; ?>">

				<?php
					if ($right_content === 'text') :
						$right_text = get_sub_field('right_text');
						$right_button = get_sub_field('right_button');
					?>
					<p><?php echo $right_text; ?></p>

					<?php
						if ($right_button) :
							$link_url = $right_button['url'];
							$link_title = $right_button['title'];
							$link_target = $right_button['target'] ? $right_button['target'] : '_self';
							?>
								<a class="button light" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i class="arrow"></i></a>
							<?php
						endif;
					
					elseif ($right_content === 'image') :
						$right_image = get_sub_field('right_image');

						$imgDesk = $right_image['sizes']['content-desk'];
						$imgMobile = $right_image['sizes']['content-mobile'];
					?>
					<img class="desktop"
						src="<?php echo $imgDesk; ?>"
						alt="<?php echo $right_image['alt']?>">

					<img class="mobile"
						src="<?php echo $imgMobile ?>"
						alt="<?php echo $right_image['alt']?>">

					<?php
					elseif ($right_content === 'video') :
						$right_video = get_sub_field('right_video');
					?>

					<div class="video-wrapper">
						<div id="<?php echo $right_video ?>" class="youtube-player" data-id="<?php echo $right_video; ?>"></div>
					</div>

					<?php
					endif;
					?>
						
				</div>

			</div>
		</div>
	</div>
</section>