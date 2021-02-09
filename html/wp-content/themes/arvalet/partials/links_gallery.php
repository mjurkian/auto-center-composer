<section class="maintenance">
  	<div class="maintenance__container">
		<?php
			$maintenance_heading = get_sub_field('maintenance_heading');
			$maintenance_icon = get_sub_field('maintenance_icon');
			$maintenance_text = get_sub_field('maintenance_text');

			$maintenance_layout = get_sub_field('maintenance_layout');

			if ($maintenance_layout === 'gallery') :
				$how_many_boxes = get_sub_field('how_many_boxes');
			endif;

			if ($maintenance_icon) :
			$new_icon = $maintenance_icon['sizes']['experts-icon'];
			$icon_alt = isset($maintenance_icon['alt']) ? $maintenance_icon['alt'] : '';
			endif;
		?>

		<div class="maintenance__header">
			<?php 
			if ($maintenance_heading) :
			?>
			<h4><?php echo $maintenance_heading; ?></h4>
			<?php
			endif;
		
			if ($maintenance_icon) :
			?>
			<img src="<?php echo $new_icon; ?>" alt="<?php echo $icon_alt; ?>">
			<?php
			endif;
		
			if($maintenance_text) :
			?>
			<p><?php echo $maintenance_text; ?></p>
			<?php
			endif;
			?>
		</div>

    	<div class="maintenance__row">
				
			<?php
			if( have_rows('boxes') ):
			while ( have_rows('boxes') ) : the_row();

			$maintenance_image = get_sub_field('image');
			$maintenance_title = get_sub_field('title');
			$maintenance_link = get_sub_field('link');

			if ($maintenance_layout === 'links') :
				$img = $maintenance_image['sizes']['team'];
				$mobile_image = '';
				
			elseif ($maintenance_layout === 'gallery') :
				if ($how_many_boxes === '4') :
					$img = $maintenance_image['sizes']['team'];
					$mobile_image = 'maintenance__half';

				elseif ($how_many_boxes === '3') :
					$img = $maintenance_image['sizes']['gallery-3'];
					$mobile_image = 'maintenance__full';

				elseif ($how_many_boxes === '2') :
					$img = $maintenance_image['sizes']['gallery-2'];
					$mobile_image = 'maintenance__full';

				endif;
			endif;
			
			$imgAlt = isset($maintenance_image['alt']) ? $maintenance_image['alt'] : '';

			
			?>
			<div class="maintenance__item maintenance__<?php echo $maintenance_layout; ?> <?php echo $mobile_image ?>">

				<?php
				if ($maintenance_link) :
				$link_url = $maintenance_link['url'];
				$link_target = $maintenance_link['target'] ? $maintenance_link['target'] : '_self';
				?>
				<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
				<?php
				endif;
				?>
					<img class="maintenance__item--image" src="<?php echo $img; ?>" alt="<?php echo $imgAlt ?>">
				<?php
				if ($maintenance_title) :
				?>
					<div class="maintenance__item--content">
						<p><?php echo $maintenance_title ?></p>
					</div>
				<?php
				endif;
				if ($maintenance_link) :
				?>
				</a>
				<?php
				endif;
				?>
			</div>
			<?php
			endwhile;
			endif;
			?>
    	</div>
  	</div>
</section>
