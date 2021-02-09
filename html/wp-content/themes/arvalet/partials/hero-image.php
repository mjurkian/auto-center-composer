<section class="hero-image">
	<div class="hero-image__inner">
		<div class="hero-image__wrapper">
            <?php

           
            $layout = get_field('hero_image_layout');
            $img = get_field('hero_image');
            $header = get_field('hero_header');

            $info_phone = get_field('phone_number', 'options');
            $info_mobile = get_field('mobile', 'options');
            $info_hours = get_field('business_hours', 'options');
            $info_address = get_field('address', 'options');

            $phone_link_number = ltrim($info_phone, "0");
            $phone_link_mobile = ltrim($info_mobile, "0");
          

            if ($layout === 'image') :
                $imgDeskRetina = $img['sizes']['hero-image-x2'];
                $imgDeskNonRetina = $img['sizes']['hero-image-x1'];
                $imgMobRetina = $img['sizes']['hero-image-mobile-x2'];
                $imgMobNonRetina = $img['sizes']['hero-image-mobile-x1'];
                $imgAlt = isset($img['alt']) ? $img['alt'] : '';
            ?>

            <div class="hero-image__image">
                <img class="desktop lazy-image"
                     data-src="<?php echo $imgDeskNonRetina; ?>"
                     alt="<?php echo $imgAlt; ?>"
                     srcset="<?php echo $imgDeskRetina; ?> 2x, <?php echo $imgDeskNonRetina; ?> 1x">

                <img class="mobile lazy-image"
                     data-src="<?php echo $imgMobNonRetina ?>"
                     alt="<?php echo $imgAlt; ?>"
                     srcset="<?php echo $imgMobRetina; ?> 2x, <?php echo $imgMobNonRetina; ?> 1x">

                <div class="hero-image__image--header">
                    <div class="header">
                        <h1><?php echo $header ? $header : get_the_title(); ?></h1>
                    </div>
                </div>
            </div>

            <?php
            elseif ($layout === 'slider'):
                ?>
            <div class="hero-image__container">
                <button class="hero-image__prev"><i></i></button>
                <button class="hero-image__next"><i></i></button>
                <div class="hero-image__slider">
                    <ul class="hero-image__slider--track">

                <?php

                if( have_rows('image_slider') ):
                    while ( have_rows('image_slider') ) : the_row();

                    $img =  get_sub_field('image');

                        $imgDeskRetina = $img['sizes']['hero-slider-x2'];
                        $imgDeskNonRetina = $img['sizes']['hero-slider-x1'];
                        $imgMobRetina = $img['sizes']['hero-slider-mobile-x2'];
                        $imgMobNonRetina = $img['sizes']['hero-slider-mobile-x1'];
                        $imgAlt = isset($img['alt']) ? $img['alt'] : '';


                    ?>
                        <li class="hero-image__slider--slide">
                            <img class="desktop lazy-image"
                                 data-src="<?php echo $imgDeskNonRetina; ?>"
                                 alt="<?php echo $imgAlt; ?>"
                                 srcset="<?php echo $imgDeskRetina; ?> 2x, <?php echo $imgDeskNonRetina; ?> 1x">

                            <img class="mobile lazy-image"
                                 data-src="<?php echo $imgMobNonRetina ?>"
                                 alt="<?php echo $imgAlt; ?>"
                                 srcset="<?php echo $imgMobRetina; ?> 2x, <?php echo $imgMobNonRetina; ?> 1x">

                            <div class="hero-image__slider--container">

                                <div class="hero-image__slider--row">

                                    <div class="hero-image__slider--header">
                                        <?php

                                            $slider_header_h1 = get_sub_field('slider_header_h1');
                                            $slider_header_h2 = get_sub_field('slider_header_h2');
                                            $slider_header_link = get_sub_field('slider_button');

                                            ?>
                                            <h1><?php echo $slider_header_h1; ?></h1>
                                            <?php
                                            if ($slider_header_h2) :
                                                ?>
                                                <p><?php echo $slider_header_h2; ?></p>
                                            <?php
                                            endif;

                                            if ($slider_header_link) :
                                                $link_url = $slider_header_link['url'];
                                                $link_title = $slider_header_link['title'];
                                                $link_target = $slider_header_link['target'] ? $slider_header_link['target'] : '_self';
                                                ?>
                                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i class="arrow"></i></a>
                                            <?php
                                            endif;
                                        ?>
                                    </div>

                                    <div class="hero-image__slider--info">
                                        <div class="hero-image__slider--hours">
                                            <div class="header">
                                                <h3>Working Time</h3>
                                            </div>
                                            
                                            <p><?php echo $info_hours; ?></p>
                                        </div>
                                        <div class="hero-image__slider--location">
                                            <div class="header">
                                                <h3>Location</h3>
                                            </div>
                                            
                                            <p><?php echo $info_address; ?></p>
                                        </div>
                                        <div class="hero-image__slider--phone">
                                            <div class="header">
                                                <h3>Phone / Fax</h3>
                                            </div>
                                            
                                            <p>Phone: <a  href="tel:<?php echo str_replace(' ', '', $phone_link_number); ?>"> <?php echo $info_phone; ?></a></p> 
                                            <p>Fax: <a  href="fax:<?php echo str_replace(' ', '', $phone_link_mobile); ?>"> <?php echo $info_mobile; ?></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <?php
                        endwhile;
                    endif;
                    ?>
                    </ul>
                </div>

                <div class="hero-image__slider--dots">
                    <?php
                    if( have_rows('image_slider') ):
                        $i = 0;
                        while ( have_rows('image_slider') ) : the_row();

                        ?>
                            <span class="hero-image__slider--dot" data-value="<?php echo $i ?>"></span>
                        <?php
                        $i++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

            <?php
            endif;
            ?>

		</div>
	</div>
</section>
