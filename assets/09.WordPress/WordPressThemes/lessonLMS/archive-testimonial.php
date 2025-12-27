<?php
/*
* Template Name: All Testimonials
*/
get_header();
?>

    <section class="courses" style="background: #FFFCF4; padding: 100px 0;">
        <div class="container">
            
            <div class="courses-heading" style="text-align: center;">
                <h2>All Testimonials</h2>
                <p>What our students have to say</p>
            </div>

            <?php 
            $args =  array(
                'post_type' => 'testimonial',
                'posts_per_page' => 9,
                'post_status' => 'publish',
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // পেজিনেশন ঠিক রাখার জন্য
            );
            $testimonial_query = new WP_Query($args);
            ?>
            
            <div class="courses-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px;">
                
                <?php if( $testimonial_query->have_posts()) : ?>
                    <?php while ( $testimonial_query->have_posts()) : $testimonial_query->the_post(); 
                        
                        // 1. Designation মেটা ডেটা আনা
                        $designation = get_post_meta( get_the_ID(), 'testimonial_designation', true );
                        
                        // 2. পোস্টের অথর আইডি আনা (ভুল মেটা কি-এর পরিবর্তে এটি ব্যবহার করুন)
                        $author_id = get_the_author_meta('ID'); 
                        ?>

                        <div class="course" style="height: auto; padding: 30px; border-radius: 12px; background: #FFF; border: 1px solid #E2DFDA;">
                            <div class="student-details" style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">

                                <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden;">
                                    <?php 
                                    // ছবি দেখানোর লজিক (Priority: Featured Image > User Avatar > Default Image)
                                    
                                    if ( has_post_thumbnail() ) {
                                        // যদি অ্যাডমিন ফিচার্ড ইমেজ দিয়ে থাকে
                                        the_post_thumbnail('thumbnail', array('style' => 'width: 100%; height: 100%; object-fit: cover;'));
                                    } 
                                    elseif ( $author_id ) {
                                        // যদি ফিচার্ড ইমেজ না থাকে, ইউজারের গ্রাভাটার দেখাবে
                                        echo get_avatar( $author_id, 60, '', get_the_title(), array('class' => 'testimonial-avatar', 'style' => 'width: 100%; height: 100%; object-fit: cover;') );
                                    } 
                                    else {
                                        // কিছুই না থাকলে ডিফল্ট ইমেজ
                                        ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/student-1.png" alt="Default" style="width: 100%; height: 100%; object-fit: cover;">
                                        <?php
                                    }
                                    ?>
                                </div>

                                <div>
                                    <h3 style="font-size: 18px; font-weight: 700; color: #171100; margin:0;"><?php the_title(); ?></h3>
                                    <?php if($designation): ?>
                                        <span style="font-size: 14px; color: #5F5B53;"><?php echo esc_html($designation); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="review-text">
                                <p style="color: #5F5B53; font-size: 16px; line-height: 175%; font-style: italic;">
                                    "<?php echo get_the_content(); ?>"
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p style="text-align:center; grid-column: 1/-1;">No Testimonials Found!</p>
                <?php endif; ?>

            </div>

            <div class="pagination" style="margin-top: 40px; display: flex; justify-content: center; gap: 10px;">
                <?php 
                echo paginate_links(array(
                    'total' => $testimonial_query->max_num_pages,
                    'prev_text' => '<span class="page-btn">Prev</span>',
                    'next_text' => '<span class="page-btn next">Next <i class="bx bx-chevron-right"></i></span>',
                    'mid_size'  => 1,
                )); 
                ?>
            </div>

        </div>
    </section>

<?php get_footer(); ?>