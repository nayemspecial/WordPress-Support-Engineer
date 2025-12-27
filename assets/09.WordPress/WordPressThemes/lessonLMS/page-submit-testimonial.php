<?php
/*
* Template Name: Submit Testimonial 
*/
get_header();
$message = '';
$message_type = '';

$current_user = wp_get_current_user();
$user_id = $current_user->ID;

if ( isset($_POST['submit_testimonial_form']) && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if ( isset($_POST['testimonial_nonce_field']) && wp_verify_nonce($_POST['testimonial_nonce_field'], 'testimonial_form_action') ) {
        $student_name = sanitize_text_field($_POST['student_name']);
        $student_designation = sanitize_text_field($_POST['student_designation']);
        $student_message = sanitize_text_field($_POST['student_message']);
    }

    if( !empty($student_name) && !empty($student_message) ) {
        $new_testimonial = array(
            'post_title' => $student_name,
            'post_content' => $student_message,
            'post_type' => 'testimonial',
            'post_status' => 'pending'
        );

        $post_id = wp_insert_post($new_testimonial);

        if ( $post_id ) {
            update_post_meta($post_id, 'testimonial_designation', $student_designation);
            update_post_meta($post_id, 'testimonial_user_id', $user_id);
            $message = "Thank you for your valuable feedback!";
            $message_type = "success";
        } else {
            $message = "Sorry! Try again!";
            $message_type = "error";  
        }
    } else {
        $message = "Please Fill up all information";
        $message_type = "error"; 
    }
} elseif( !is_user_logged_in() ){
    $message = "Please Login First";
    $message_type = "error"; 
} else {
    $message = "Failed for security. Please refresh your page again";
    $message_type = "error"; 
}
?>
    <section class="cta section-padding" style="padding: 100px 0;">
        <div class="container">
            <div class="cta-wrapper" style="align-items: center; justify-content: center;">
                
                <div class="contact-form" style="width: 100%; max-width: 600px; background: #fff; padding: 40px; border-radius: 12px; box-shadow: 0px 16px 32px 0px rgba(0, 0, 0, 0.05);">
                    
                    <div class="courses-heading" style="text-align: center; margin-bottom: 30px;">
                        <h2>Submit Your Review</h2>
                        <p>Share your learning experience with us.</p>
                    </div>

                    <?php if ( !empty($message)) : ?>
                        <?php echo esc_html( $message ); ?>
                    <?php endif; ?>

                    <?php if( is_user_logged_in() ) : ?>

                    <form action="#" method="POST">

                        <?php wp_nonce_field('testimonial_form_action', 'testimonial_nonce_field'); ?>
                        
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 8px;">Name</label>
                            <input type="text" name="student_name" placeholder="Your Name" required 
                                   style="width: 100%; padding: 15px; border: 1px solid #E2DFDA; border-radius: 8px;" value="<?php echo isset($_POST['student_name']) ? esc_attr($_POST['student_name']) : ''; ?>">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 8px;">Designation / Course</label>
                            <input type="text" name="student_designation" placeholder="e.g. Student of Web Design" required 
                                   style="width: 100%; padding: 15px; border: 1px solid #E2DFDA; border-radius: 8px;" value="<?php echo isset($_POST['student_designation']) ? esc_attr($_POST['student_designation']) : ''; ?>">
                        </div>

                        <div style="margin-bottom: 30px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 8px;">Review</label>
                            <textarea name="student_message" rows="5" placeholder="Write your feedback..." required 
                                      style="width: 100%; padding: 15px; border: 1px solid #E2DFDA; border-radius: 8px; font-family: 'Poppins', sans-serif;" value="<?php echo isset($_POST['student_message']) ? esc_attr($_POST['student_message']) : ''; ?>"></textarea>
                        </div>

                        <button type="submit" name="submit_testimonial_form" class="yellow-bg-btn See-Courses-btn" style="border:none; width:100%; display:flex; align-items:center; justify-content:center;">
                            Submit Now
                        </button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>