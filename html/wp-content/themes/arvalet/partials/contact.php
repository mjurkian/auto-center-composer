<section class="contact">
    <div class="contact__inner">
        <div class="contact__row">

            <?php
            $header = get_sub_field('contact_header_left');
            $headerRight = get_sub_field('contact_header_right');
            $phone = get_field('phone_number', 'options');
            $fax = get_field('mobile', 'options');
            $email = get_field('email', 'options');
            $content = get_sub_field('contact_content_left');

            $phone_link = ltrim($phone, "0");
            ?>

            <div class="contact__left">

                <?php
                if ($header) :?>
                <h2><?php echo $header; ?></h2>
                <?php
                endif;
                
                if ($phone) :?>
                <div class="contact__left--phone">
                    <i class="phone"></i>
                    <a  href="tel:<?php echo str_replace(' ', '', $phone_link); ?>"> <?php echo  $phone; ?></a>
                </div>
                <?php
                endif;
                
                if ($fax) :?>
                <div class="contact__left--fax">
                    <i class="fax"></i>
                    <a  href="fax:<?php echo str_replace(' ', '', $fax); ?>"> <?php echo $fax; ?></a>
                </div>
                <?php
                endif;
               
                if ($email) :?>
                <div class="contact__left--envelope">
                    <i class="envelope"></i>
                    <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
                </div>
                <?php
                endif;
                ?>

                <div class="contact__left--address">
                    <i class="address"></i>
                    <?php
                    if ($content) :?>
                        <p><?php echo $content; ?></p>
                    <?php
                    endif;
                    ?>
                </div>

            </div>

            <div class="contact__right">
                <?php
                if ($headerRight) :?>
                    <h2><?php echo $headerRight; ?></h2>
                <?php
                endif;
                ?>

                <?php
                echo get_sub_field('contact_content_right');
                ?>
            </div>


        </div>


    </div>

    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=CONTACTS%203-38%20Matheson%20Parkway+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>

</section>
