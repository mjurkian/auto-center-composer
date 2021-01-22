<section class="experts">
  	<div class="experts__container">
		<?php
			$experts_heading = get_sub_field('experts_heading');
			$experts_icon = get_sub_field('experts_icon');
			$experts_text = get_sub_field('experts_text');

			$experts_layout = get_sub_field('experts_layout');

			if ($experts_icon) :
			$new_icon = $experts_icon['sizes']['experts-icon'];
			$icon_alt = isset($experts_icon['alt']) ? $experts_icon['alt'] : '';
			endif;
		?>

		<div class="experts__header">
			<?php 
			if ($experts_heading) :
			?>
			<h4><?php echo $experts_heading; ?></h4>
			<?php
			endif;
		
			if ($experts_icon) :
			?>
			<img src="<?php echo $new_icon; ?>" alt="<?php echo $icon_alt; ?>">
			<?php
			endif;
		
			if($experts_text) :
			?>
			<p><?php echo $experts_text; ?></p>
			<?php
			endif;
			?>
		</div>

    	<div class="experts__row">
				
			<?php
			if( have_rows('our_experts') ):
			while ( have_rows('our_experts') ) : the_row();

			$experts_image = get_sub_field('image');
			$experts_name = get_sub_field('name');

			$img = $experts_image['sizes']['team'];
			$imgAlt = isset($experts_image['alt']) ? $experts_image['alt'] : '';
			?>
			<div class="experts__item experts__<?php echo $experts_layout; ?>">
			
				<img class="experts__item--image" src="<?php echo $img; ?>" alt="<?php echo $imgAlt ?>">
				
				<div class="experts__item--content">
					<h5><?php echo $experts_name ?></h5>
				</div>

			</div>
			<?php
			endwhile;
			endif;
			?>
    	</div>
  	</div>
</section>
