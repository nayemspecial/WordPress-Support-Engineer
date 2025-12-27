
<?php 
/*
lessonLMS/ 
    assets/ 
        css/ 
        js/ 
        images/ 
    inc/ 
        setup.php
        enqueue.php
        customizer.php
        custome-post-type.php 
        metaboxes.php 
        ajax-functions.php 
        review-functions.php 
        dashboard-widgets.php 
    template-parts/ 
        sections/ 
            hero
            courses
            testimonials
            etc
        content/ 
            content-course.php 
            etc
    languages/ 
        lessonlms.pot 
    index.php (for Blog Page)
    style.css 
    screenshot.png 
    functions.php
    header.php 
    footer.php 
    front-page.php (for Home Page) 
    page.php
    404.php 
    etc
*/
get_header(); ?>

    <main>
        <!----- hero section ----->
        <?php get_template_part('sections/hero'); ?>

        
        <!----- Courses section ----->
        <?php get_template_part('sections/courses'); ?>


        <!----- testimonial section ----->
        <?php get_template_part('sections/testimonials'); ?>
        
        
        <!----- features section ----->
        <?php get_template_part('sections/features'); ?>
        
        
        <!----- CTA section ----->
        <?php get_template_part('sections/cta'); ?>
        
        
        
        <!----- our blog section ----->
        <?php get_template_part('sections/blog'); ?>

    </main>


<?php get_footer(); ?>