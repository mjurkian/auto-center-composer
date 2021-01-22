<section class="image-slider">
  <div class="image-slider__container">
    <div class="image-slider__row">

    <?php 
    $count = count(get_sub_field('image_slider'));
    
    $offers_header = get_sub_field('offers_header');
    $offers_content = get_sub_field('offers_content');

    if ($count > 4) :
      $layout = 'slider';
    else :
      $layout = 'blocks';
    endif;

    if($offers_header || $offers_content) :
    ?>

    <div class="image-slider__header">
      <?php
      if($offers_header) :
      ?>
        <h4><?php echo $offers_header; ?></h4>
      <?php
      endif;
    
      if($offers_content) :
      ?>
        <p><?php echo $offers_content; ?></p>
      <?php
      endif;
      ?>
		</div>

    <?php
    endif;
    ?>


    <div id="myCarousel" 
        class="carousel carousel__<?php echo $layout; ?>" 
        aria-roledescription="carousel" 
        aria-label="carousel heading">

        <div id="carousel-items" 
            class="carousel__items" 
            aria-live="polite"> 
                    
          <?php
        
            if( have_rows('image_slider') ):
              $n = 0;
              while ( have_rows('image_slider') ) : the_row();

              $image = get_sub_field('image');
              $title = get_sub_field('title');
              $text = get_sub_field('content');
              $link = get_sub_field('link');

              $imgMobile = $image['sizes']['slider'];
              $imgDesktop = $image['sizes']['slider'];
              $imgAlt = isset($img['alt']) ? $img['alt'] : '';
          ?>
            <div class="carousel__item"
                role="group"
                aria-roledescription="slide"
                aria-label="<?php echo $n + 1 ?> of <?php echo $count; ?>"
                data-value="<?php echo $n ?>">

              <?php
              if ($link) :
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="carousel__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <?php
              endif;
              ?>
              
                  <div class="carousel__image">
                    <img class="carousel__image--mobile" src="<?php echo $imgMobile; ?>" alt="<?php echo $imgAlt ?>">
                    <img class="carousel__image--desktop" src="<?php echo $imgDesktop; ?>" alt="<?php echo $imgAlt ?>">
                  </div>

                  
                  <div class="carousel__caption">
                    <h3><?php echo $title ?></h3>
                    <p><?php echo $text ?></p>
                  </div>
              <?php
              if ($link) :
              ?>
                </a>
              <?php
              endif;
              ?>

            </div>
            
          <?php
            $n++;
              endwhile;
            endif;
          ?>

        </div>

        <button class="carousel__prev"><i></i></button>
        <button class="carousel__next"><i></i></button>

      </div>


     

      <?php
        if ($count > 4) :
      ?>

      <!-- <div class="carousel__controls">
        <div class="carousel__nav" aria-label="carousel-items"> -->
        <?php
          if( have_rows('image_slider') ):
            $i = 0;
            while ( have_rows('image_slider') ) : the_row();
        ?>

          <!-- <button class="carousel__nav--dot" data-value="<?php echo $i ?>"></button> -->

        <?php
        $i++;
            endwhile;
        endif;
        ?>
        
        <!-- </div>
      </div> -->

      <?php
      endif;
      ?>

    
    </div>
  </div>
</section>
