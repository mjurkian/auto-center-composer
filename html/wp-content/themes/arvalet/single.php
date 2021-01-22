<?php get_header(); ?>
    <section itemscope itemprop="mainContentOfPage"
             itemtype="http://schema.org/Blog">

        <div class="container">

            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>

                <div id="post-<?php the_ID(); ?>" class="post col-md-8" itemscope
                         itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

                    <h1 class="entry-title single-title" itemprop="headline"
                        rel="bookmark"><?php the_title(); ?></h1>

                    <div id="post-content">
                        <?php
                        the_content();
                        ?>
                    </div>

                </div>

            <?php
                endwhile;
            ?>

                <div id="sidebar" class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>

            <?php
            endif;
            ?>

        </div>

    </section>
<?php get_footer(); ?>