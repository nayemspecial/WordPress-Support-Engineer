        <section class="testimonial">
            <div class="container">
                <div class="testimonial-items">

                    <?php 
                    $arg = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => 1,
                        'order' => 'DESC'
                    );
                    $testimonial_query = new WP_Query($arg);
                    if ( $testimonial_query->have_posts()) :
                        while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();

                        $designation = get_post_meta(get_the_ID(), 'testimonial_designation', true);
                    ?>
                    <!----- review 1 ----->
                    <div class="testimonial-wrapper">
                        <!----- student box ----->
                        <div class="student-details">

                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail('thumbnail'); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/student-1.png" alt="">
                            <?php endif; ?>

                            <div class="name">
                                <h3><?php the_title(); ?></h3>
                                <?php if (!empty($designation)) : ?>
                                    <span><?php echo esc_html($designation); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!----- review box ----->
                        <div class="reviews">
                            <div class="absolute-svg">
                                <svg width="30" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.9168 1.23505V6.26199C12.9168 6.94407 12.3663 7.49652 11.6875 7.49652C9.26544 7.49652 7.94779 9.99114 7.76491 14.9155H11.6875C12.3662 14.9155 12.9168 15.4688 12.9168 16.1501V26.7647C12.9168 27.4465 12.3663 27.999 11.6875 27.999H1.22938C0.550795 27.999 1.90735e-06 27.4459 1.90735e-06 26.7647V16.15C1.90735e-06 13.7896 0.237282 11.6235 0.703081 9.71055C1.1816 7.74949 1.91613 6.035 2.8858 4.61422C3.88306 3.15417 5.13161 2.00845 6.59457 1.21054C8.06863 0.407543 9.78211 0 11.688 0C12.3662 0.000516891 12.9168 0.553486 12.9168 1.23505ZM28.771 7.49696C29.4496 7.49696 30 6.94407 30 6.26294V1.23497C30 0.553488 29.4496 0.000951767 28.771 0.000951767C26.866 0.000951767 25.1517 0.408579 23.6785 1.21149C22.2148 2.00931 20.9664 3.15408 19.9693 4.61517C18.999 6.03595 18.2645 7.75052 17.786 9.71254C17.32 11.6255 17.0832 13.7917 17.0832 16.151V26.7657C17.0832 27.4476 17.6341 28 18.3125 28H28.771C29.4496 28 30 27.447 30 26.7657V16.151C30 15.4693 29.4496 14.9165 28.771 14.9165H24.9035C25.0841 9.99165 26.3828 7.49696 28.771 7.49696Z" fill="#634700"/>
                                </svg>
                            </div>

                        <p><?php the_content(); ?></p>
                        </div>
                    </div>

                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else: ?>
                    <h3>No Testimonial Found.</h3>
                <?php endif; ?>
                </div>

                <div class="testimonial-actions" style="display: flex; justify-content:center; gap: 20px; margin-bottom: 50px; flex-wrap: wrap; margin-left: 80px">
                    <a href="<?php echo get_post_type_archive_link('testimonial'); ?>" class="See-Courses-btn" style="background-color: transparent; border: 2px solid #FFB900; color: #FFF; display:flex; align-items:center; justify-content:center;">All Testimonials</a>
                    
                    <a href="<?php echo home_url('/submit'); ?>" class="yellow-bg-btn See-Courses-btn" style="display:flex; align-items:center; justify-content:center;">Submit Feedback</a>
                </div>
            </div>
        </section>