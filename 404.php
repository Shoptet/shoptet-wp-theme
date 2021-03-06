<?php get_header(); ?>

<section class="section section-perex">
    <div class="section-inner container text-center">
        <h1>404</h1>
        <p><?php _e('We are sorry, but the requested page was not found.', 'shoptet'); ?></p>
    </div>
</section>

<section class="section section-primary">
    <div class="section-inner container">
        <div class="row search">
            <div class="col-sm-12 col-md-8 col-lg-6 align-self-center">
                <?php get_template_part( 'template-parts/search/content', 'search' ); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
