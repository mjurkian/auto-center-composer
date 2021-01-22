<section class="brands">
  	<div class="brands__container">
		<?php
			$brands_heading = get_sub_field('text');
		?>

		<div class="brands__header">
			<?php
			if($brands_heading) :
			?>
				<h4><?php echo $brands_heading; ?></h4>
			<?php
			endif;
			?>
		</div>

    	<div class="brands__row">
			<?php
			if( have_rows('logos') ):
			while ( have_rows('logos') ) : the_row();

			$brands_image = get_sub_field('logo');

			$img = $brands_image['sizes']['brands'];
			$imgAlt = isset($brands_image['alt']) ? $brands_image['alt'] : '';
			?>
			<div class="brands__item">
			
				<img class="brands__item--image" src="<?php echo $img; ?>" alt="<?php echo $imgAlt ?>">

			</div>
			<?php
			endwhile;
			endif;
			?>
    	</div>
  	</div>
</section>
