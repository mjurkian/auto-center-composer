</div>
</main>
<footer id="footer" class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
<?php
$info_phone = get_field('phone_number', 'options');
$info_mobile = get_field('mobile', 'options');
$info_email = get_field('email', 'options');
$info_hours = get_field('business_hours', 'options');

$phone_link_number = ltrim($info_phone, "0");
$phone_link_mobile = ltrim($info_mobile, "0");

$about = get_field('about_arvalet', 'options');
$left_menu_header = get_field('left_menu_header', 'options');
$right_menu_header = get_field('right_menu_header', 'options');
$contact = get_field('contact_us_content', 'options');
$address = get_field('address', 'options');
$copyright = get_field('copyright', 'options');

$linkedin = get_field('linkedin', 'options');
$twitter = get_field('twitter', 'options');
$facebook = get_field('facebook', 'options');
$instagram = get_field('instagram', 'options');
$youtube = get_field('youtube', 'options');
?>
    <div class="footer__info">
        <div class="footer__info--container">
            <div class="footer__info--phone">
                <i class="icon phone"></i>
                <div class="footer__info--phone-content">
                    <h6>Phone / Fax</h6>
                    <p>Phone: <a  href="tel:<?php echo str_replace(' ', '', $phone_link_number); ?>"> <?php echo $info_phone; ?></a></p>
                    <p>Fax: <a  href="fax:<?php echo str_replace(' ', '', $phone_link_mobile); ?>"> <?php echo $info_mobile; ?></a></p>
                </div>
                
            </div>
            <div class="footer__info--email">
                <i class="icon email"></i>
                <div class="footer__info--email-content">
                    <h6>Email address</h6>
                    <a href="mailto:<?php echo $info_email; ?>" class="email"><?php echo $info_email; ?></a>
                </div>
            </div>
            <div class="footer__info--hours">
                <i class="icon hours"></i>
                <div class="footer__info--hours-content">
                    <h6>Opening hours</h6>
                    <p><?php echo $info_hours; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__main">
        <div class="footer__main--container">
            <div class="footer__main--row">

                <div class="footer__main--about">
                    <h4>About Arvalet</h4>
                    <p><?php echo $about; ?></p>

                    <div class="appointment">
                        <a class="button" href="/contact/">Make an Appointment<i class="arrow"></i></a>
                    </div>
                </div>
                
                <div class="footer__main--block">
                    <div class="footer__main--menu">
                        <h4><?php echo $left_menu_header; ?></h4>
                        <?php
                            wp_nav_menu( array(
                                'menu' => 'Footer Menu Left'
                            ) );
                        ?>
                    </div>

                    <div class="footer__main--category">
                        <h4><?php echo $right_menu_header; ?></h4>
                        <?php
                            wp_nav_menu( array(
                                'menu' => 'Footer Menu Right'
                            ) );
                        ?>
                    </div>
                </div>

                <div class="footer__main--contact">
                    <h4>Contact Us</h4>
                    <p><?php echo $address; ?></p>
                    <p><?php echo $contact; ?></p>

                    <ul>
                        <?php
                        if ($facebook != '') { ?>
                            <li class="facebook"><a href="<?php echo $facebook; ?>" target="_blank"></a></li>
                        <?php }

                        if ($twitter != '') { ?>
                            <li class="twitter"><a href="<?php echo $twitter; ?>" target="_blank"></a></li>
                        <?php }

                        if ($instagram != '') { ?>
                            <li class="instagram"><a href="<?php echo $instagram; ?>" target="_blank"></a></li>
                        <?php }

                        if ($linkedin != '') { ?>
                            <li class="linkedin"><a href="<?php echo $linkedin; ?>" target="_blank" title="Opens in a new window"></a></li>
                        <?php }

                        if ($youtube != '') { ?>
                            <li class="youtube"><a href="<?php echo $youtube; ?>" target="_blank"></a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer__copyright">
        <div class="footer__copyright--container">
            <div class="footer__copyright--text">
                <p><?php echo $copyright;  ?></p>                                
            </div>
            <div class="footer__copyright--menu">
                <?php
                    wp_nav_menu( array(
                        'menu' => 'Footer Menu Copyright'
                    ) );
                ?>                               
            </div>
        </div>
    </div>

</footer>

		<?php wp_footer(); ?>

</body>

</html>
