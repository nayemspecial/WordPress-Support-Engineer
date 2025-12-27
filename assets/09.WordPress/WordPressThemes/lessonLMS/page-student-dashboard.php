<?php
/*
Template Name: Student Dashboard
*/
if( ! is_user_logged_in() ) {
    wp_redirect( wp_login_url() );
    exit;
}
get_header();
$current_user = wp_get_current_user();
?>
<section class="dashboard-area" style="padding: 80px 0; background: #f9f9f9;">
    <div class="container">
        
        <div class="dashboard-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 40px; border-bottom: 2px solid #e5e5e5; padding-bottom: 20px;">
            <div>
                <h1 style="font-size: 32px; color: #171100;">Welcome, <?php echo esc_html($current_user->display_name); ?>!</h1>
                <p style="color: #5F5B53;">Your Learning Dashboard</p>
            </div>
            <div>
                <a href="#" class="button" style="background: #FF564F; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Logout</a>
            </div>
        </div>

        <h2 style="margin-bottom: 30px;">My Enrolled Courses</h2>
        
        <div class="courses-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">

            <?php 
            $enrolled_courses = get_user_meta( $current_user->ID, '_user_enrollments', true );
            if ( !empty( $enrolled_courses ) && is_array( $enrolled_courses ) ) :
                foreach ( $enrolled_courses as $enrollment ) :
                    $course_id = $enrollment['course_id'];
                    $course_post = get_post( $course_id );
                    if( $course_post && $course_post->post_status == 'publish' ) :
            ?>
                        
                        <div class="course" style="height: auto; border-radius: 12px; background: #FFF; border: 1px solid #E2DFDA; overflow: hidden;">
                            <div class="img" style="height: 200px;">
                                <?php echo get_the_post_thumbnail( $course_id, 'medium', array( 'style' => 'width:100%; height:100%; object-fit:cover' ) ); ?>
                            </div>
                            
                            <div class="course-details" style="padding: 20px;">
                                <h3 style="font-size: 18px; margin-bottom: 10px;"><?php echo get_the_title( $course_id ); ?></h3>
                                <p style="font-size: 14px; color: #5F5B53; margin-bottom: 15px;">
                                    Enrolled Date: <?php echo date( 'M j, Y', strtotime( $enrollment['date'] ) );  ?>
                                </p>
                                
                                <a href="<?php echo get_permalink( $course_id ); ?>" style="display: block; text-align: center; background: #FFB900; color: #fff; padding: 10px; border-radius: 5px; font-weight: 600;">
                                    Start Learning
                                </a>
                            </div>
                        </div>
                    <?php
                            endif;
                        endforeach;

                    else : 
                    ?>
                    <h3>You have not enrolled in any courses yet !</h3>
                    <?php endif; ?>
        </div>
        </div>
</section>

<?php get_footer(); ?>