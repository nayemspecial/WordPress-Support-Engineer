<?php
// Enqueue scripts and styles
function lessonlms_theme_scripts(){
    // Google Font
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,400&family=Sen:wght@700&display=swap', array(), null);


    // Theme Style CSS
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css');

    // Responsive CSS
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/assets/css/responsive.css');
    
    // Slick Slider CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0');

    // Boxicon
    wp_enqueue_style('boxico-css', 'https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css', array(), '2.1.4');

    // Font Awesome
    wp_enqueue_style('font-awesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css', array(), '7.0.0');
    
    // Style CSS 
    wp_enqueue_style('lesson-theme-style', get_stylesheet_uri());


    // jQuery
    wp_enqueue_script('jquery');

    // Slick JS 
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '1.9.0', true);
    
    // Main JS
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.9.0', true);


}
add_action("wp_enqueue_scripts","lessonlms_theme_scripts");

function lessonlms_theme_registration() {

    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height' => 30,
        'width'  => 80,
    ) );

    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'lessonlms'),
        'mobile_menu' => __('Mobile Menu', 'lessonlms'),
        'footer_menu_1' => __('Footer Menu 1', 'lessonlms'),
        'footer_menu_2' => __('Footer Menu 2', 'lessonlms'),
    ));
}
add_action('after_setup_theme', 'lessonlms_theme_registration');



function lessonlms_customize_register($wp_customize) {

    // Hero Section Start Here
    $wp_customize->add_section('hero_settings', array(
        'title' => __('Hero Settings', 'lessonlms'),
        'priority' => 30,
    ));

    // Hero Image
    $wp_customize->add_setting('hero_image', array(
        'default' => get_template_directory_uri() . '/assets/images/hero-img.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Hero Image', 'lessonlms'),
        'settings' => 'hero_image',
        'section' => 'hero_settings'
    )));

    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Learn without limits and spread knowledge.',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Heor Title', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));   

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default' => 'Build new skills for that “this is my year” feeling with courses, certificates, and degrees from world-class universities and companies.',
    ));
    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'textarea'
    ));

    // Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default' => 'See Courses',
    ));
    $wp_customize->add_control('hero_button_text', array(
        'label' => __('Hero Button Text', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));

    // Hero Button Link
    $wp_customize->add_setting('hero_button_link', array(
        'default' => '#',
    ));
    $wp_customize->add_control('hero_button_link', array(
        'label' => __('Hero Button Link', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'url'
    ));

    // video Text
    $wp_customize->add_setting('hero_video_text', array(
        'default' => 'Watch Video',
    ));
    $wp_customize->add_control('hero_video_text', array(
        'label' => __('Hero Video Text', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));

    // Hero Video Link
    $wp_customize->add_setting('hero_video_link', array(
        'default' => '#',
    ));
    $wp_customize->add_control('hero_video_link', array(
        'label' => __('Hero Video Link', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'url'
    ));


    // Engagement Title
    $wp_customize->add_setting('engagement_title', array(
        'default' => 'Recent engagement.',
    ));
    $wp_customize->add_control('engagement_title', array(
        'label' => __('Engagement Title', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));

    // Students Count
    $wp_customize->add_setting('students_count', array(
        'default' => '50K',
    ));
    $wp_customize->add_control('students_count', array(
        'label' => __('Students Count', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));

    // Students Label
    $wp_customize->add_setting('students_label', array(
        'default' => 'Students',
    ));
    $wp_customize->add_control('students_label', array(
        'label' => __('Students Label', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));
    
    // Courses Count
    $wp_customize->add_setting('courses_count', array(
        'default' => '70K',
    ));
    $wp_customize->add_control('courses_count', array(
        'label' => __('Courses Count', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));

    // Courses Label
    $wp_customize->add_setting('courses_label', array(
        'default' => 'Courses',
    ));
    $wp_customize->add_control('courses_label', array(
        'label' => __('Courses Label', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'text'
    ));
    
    // UI/UX Courses Count
    $wp_customize->add_setting('uiux_courses_count', array(
        'default' => '20',
    ));
    $wp_customize->add_control('uiux_courses_count', array(
        'label' => __('UI/UX Courses Count', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'number'
    ));
    
    // Development Courses Count
    $wp_customize->add_setting('dev_courses_count', array(
        'default' => '20',
    ));
    $wp_customize->add_control('dev_courses_count', array(
        'label' => __('Development Courses Count', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'number'
    ));
    
    // Marketing Courses Count
    $wp_customize->add_setting('marketing_courses_count', array(
        'default' => '30',
    ));
    $wp_customize->add_control('marketing_courses_count', array(
        'label' => __('Marketing Courses Count', 'lessonlms'),
        'section' => 'hero_settings',
        'type' => 'number'
    ));

    // Features Section Start Here
    $wp_customize->add_section('features_settings', array(
        'title' => __('Features Settings', 'lessonlms'),
        'priority' => 100,
    ));

    // Features Title
    $wp_customize->add_setting('features_title', array(
        'default' => 'Learner outcomes through our awesome platform.',
    ));
    $wp_customize->add_control('features_title', array(
        'label' => __('Features Title', 'lessonlms'),
        'section' => 'features_settings',
        'type' => 'text'
    ));


    // Features Description
    $wp_customize->add_setting('features_description', array(
        'default' => '87% of people learning for professional development report career benefits like getting a promotion, a raise, or starting a new career.',
    ));
    $wp_customize->add_control('features_description', array(
        'label' => __('Features Description', 'lessonlms'),
        'section' => 'features_settings',
        'type' => 'textarea'
    ));


    // Features Description Two
    $wp_customize->add_setting('features_description_two', array(
        'default' => 'Lesson Impact Report (2025)',
    ));
    $wp_customize->add_control('features_description_two', array(
        'label' => __('Features Description Two', 'lessonlms'),
        'section' => 'features_settings',
        'type' => 'textarea'
    ));

    // Features Button Text
    $wp_customize->add_setting('features_button_text', array(
        'default' => 'Sign Up',
    ));
    $wp_customize->add_control('features_button_text', array(
        'label' => __('Features Button Text', 'lessonlms'),
        'section' => 'features_settings',
        'type' => 'text'
    ));


    // Features Button URL
    $wp_customize->add_setting('features_button_url', array(
        'default' => '#',
    ));
    $wp_customize->add_control('features_button_url', array(
        'label' => __('Features Button URL', 'lessonlms'),
        'section' => 'features_settings',
        'type' => 'url'
    ));

    // Featuer Image One
    $wp_customize->add_setting('features_image_one', array(
        'default' => get_template_directory_uri() . '/assets/images/features-img-1.png'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_one', array(
        'label' => __('Featuer Image One', 'lessonlms'),
        'settings' => 'features_image_one',
        'section' => 'features_settings'
    )));

    // Featuer Image Two
    $wp_customize->add_setting('features_image_two', array(
        'default' => get_template_directory_uri() . '/assets/images/features-img-2.png'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'features_image_two', array(
        'label' => __('Featuer Image Two', 'lessonlms'),
        'settings' => 'features_image_two',
        'section' => 'features_settings'
    )));



    // CTA Section Start Here
    $wp_customize->add_section('cta_settings', array(
        'title' => __('CTA Settings', 'lessonlms'),
        'priority' => 105,
    ));

    // CTA Title
    $wp_customize->add_setting('cta_title', array(
        'default' => 'Take the next step toward your personal and professional goals with Lesson.',
    ));
    $wp_customize->add_control('cta_title', array(
        'label' => __('CTA Title', 'lessonlms'),
        'section' => 'cta_settings',
        'type' => 'text'
    ));


    // CTA Description
    $wp_customize->add_setting('cta_description', array(
        'default' => 'Take the next step toward. Join now to receive personalized and more recommendations from the full Coursera catalog.',
    ));
    $wp_customize->add_control('cta_description', array(
        'label' => __('CTA Description', 'lessonlms'),
        'section' => 'cta_settings',
        'type' => 'textarea'
    ));

    // CTA Button Text
    $wp_customize->add_setting('cta_button_text', array(
        'default' => 'Join Now',
    ));
    $wp_customize->add_control('cta_button_text', array(
        'label' => __('CTA Button Text', 'lessonlms'),
        'section' => 'cta_settings',
        'type' => 'text'
    ));


    // CTA Button URL
    $wp_customize->add_setting('cta_button_url', array(
        'default' => '#',
    ));
    $wp_customize->add_control('cta_button_url', array(
        'label' => __('CTA Button URL', 'lessonlms'),
        'section' => 'cta_settings',
        'type' => 'url'
    ));

    // CTA Image
    $wp_customize->add_setting('cta_image', array(
        'default' => get_template_directory_uri() . '/assets/images/cta-img.png'
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_image', array(
        'label' => __('CTA Image', 'lessonlms'),
        'settings' => 'cta_image',
        'section' => 'cta_settings'
    )));



    // Blog Section Start Here
    $wp_customize->add_section('blog_settings', array(
        'title' => __('Blog Settings', 'lessonlms'),
        'priority' => 110,
    ));

    
    // Blog Section Title
    $wp_customize->add_setting('blog_section_title', array(
        'default' => 'Our Blog',
    ));
    $wp_customize->add_control('blog_section_title', array(
        'label' => __('Blog Section Title', 'lessonlms'),
        'section' => 'blog_settings',
        'type' => 'text'
    ));

    
    
    // Blog Section Description
    $wp_customize->add_setting('blog_section_description', array(
        'default' => 'Read our regular travel blog and know the latest update of tour and travel',
    ));
    $wp_customize->add_control('blog_section_description', array(
        'label' => __('Blog Section Description', 'lessonlms'),
        'section' => 'blog_settings',
        'type' => 'text'
    ));

    // Footer Section Start Here
    $wp_customize->add_section('footer_settings', array(
        'title' => __('Footer Settings', 'lessonlms'),
        'priority' => 120,
    ));

    // Footer Logo
    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', array(
        'label' => __('Footer Logo', 'lessonlms'),
        'settings' => 'footer_logo',
        'section' => 'footer_settings'
    )));

    // Social Links
    $socials = ['twitter', 'facebook', 'linkedin', 'instagram'];
    foreach ( $socials as $social ) {
        $wp_customize->add_setting("footer_{$social}_link", array(
            'default' => '#',
        ));
        $wp_customize->add_control("footer_{$social}_link", array(
            'label' => sprintf(__('%s URL', 'lessonlms'), ucfirst($social)),
            'section' => 'footer_settings',
            'type' => 'url'
        ));
    }

    // About Text
    $wp_customize->add_setting('footer_about_text', array(
        'default' => 'Need to help for your dream Career? trust us. With Lesson, study becomes a lot easier with us.',
    ));
    $wp_customize->add_control('footer_about_text', array(
        'label' => __('About Text', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'textarea'
    ));

    // Footer menu 1 Title
    $wp_customize->add_setting('footer_menu_1_title', array(
        'default' => 'Company',
    ));
    $wp_customize->add_control('footer_menu_1_title', array(
        'label' => __('Footer Menu 1 Title', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer menu 2 Title
    $wp_customize->add_setting('footer_menu_2_title', array(
        'default' => 'Support',
    ));
    $wp_customize->add_control('footer_menu_2_title', array(
        'label' => __('Footer Menu 2 Title', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Address
    $wp_customize->add_setting('footer_address_title', array(
        'default' => 'Address',
    ));
    $wp_customize->add_control('footer_address_title', array(
        'label' => __('Footer Address Title', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Location
    $wp_customize->add_setting('footer_location', array(
        'default' => '',
    ));
    $wp_customize->add_control('footer_location', array(
        'label' => __('Footer Location', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Location Description
    $wp_customize->add_setting('footer_location_description', array(
        'default' => '27 Division St, New York, NY 10002, USA',
    ));
    $wp_customize->add_control('footer_location_description', array(
        'label' => __('Footer Location Description', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Email Title
    $wp_customize->add_setting('footer_email_title', array(
        'default' => 'Email',
    ));
    $wp_customize->add_control('footer_email_title', array(
        'label' => __('Footer Email Title', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Email 
    $wp_customize->add_setting('footer_email', array(
        'default' => 'email@gmail.com',
    ));
    $wp_customize->add_control('footer_email', array(
        'label' => __('Footer Email', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'email'
    ));

    // Footer Phone Title
    $wp_customize->add_setting('footer_phone_title', array(
        'default' => 'Phone',
    ));
    $wp_customize->add_control('footer_phone_title', array(
        'label' => __('Footer Phone Title', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'text'
    ));

    // Footer Phone 
    $wp_customize->add_setting('footer_phone', array(
        'default' => '+ 000 1234 567 890',
    ));
    $wp_customize->add_control('footer_phone', array(
        'label' => __('Footer Phone', 'lessonlms'),
        'section' => 'footer_settings',
        'type' => 'tel'
    ));
}
add_action('customize_register','lessonlms_customize_register');


function lessonlms_register_sidebar() {
    register_sidebar(array(
        'name' => __('Blog Sidebar','lessonlms'),
        'id'   => 'blog_sidebar',
        'description' => __('Widgets in this area will be shown on the blog sidebar.', 'lessonlms'),
        'before_widget' => '<div class="sidebar-widget recent-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'lessonlms_register_sidebar');


function lessonlms_register_course(){
	register_post_type('course',
		array(
			'labels'      => array(
				'name'          => __('Courses', 'lessonlms'),
				'singular_name' => __('Course', 'lessonlms'),
                'add_new'       => __('Add New Course', 'lessonlms'),
                'add_new_item'  => __('Add New Course', 'lessonlms'),
                'edit_item'     => __('Edit Course', 'lessonlms'),
                'new_item'      => __('New Course', 'lessonlms'),
                'search_items'  => __('Search Courses', 'lessonlms'),
			),
				'public'      => true,
				'has_archive' => true,
                'rewrite'     => array('slug' => 'course'),
                'supports'    => array('title', 'editor', 'thumbnail', 'author'),
                'menu_icon'   => 'dashicons-welcome-learn-more',
		)
	);

}
add_action('init','lessonlms_register_course');


function lessonlms_course_meta_box() {
    add_meta_box(
        'course_details',
        'Course Details',
        'lessonlms_course_meta_box_callback',
        'course',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_course_meta_box');

function lessonlms_course_meta_box_callback($post){
    $price = get_post_meta($post->ID, 'price', true);
    $original_price = get_post_meta($post->ID, 'original_price', true);
    $video_hours = get_post_meta($post->ID, 'video_hours', true);
    $article_count = get_post_meta($post->ID, 'article_count', true);
    $downloadable_resources = get_post_meta($post->ID, 'downloadable_resources', true);
    $language = get_post_meta($post->ID, 'language', true);
    $subtitles = get_post_meta($post->ID, 'subtitles', true);

    $learn_points_data = get_post_meta($post->ID, 'learn_points', true);
    $learn_points = is_array($learn_points_data) ? implode("\n", $learn_points_data) : $learn_points_data;

    $requirements_data = get_post_meta($post->ID, 'requirements', true);
    $requirements = is_array($requirements_data) ? implode("\n", $requirements_data) : $requirements_data;

    $target_audience_data = get_post_meta($post->ID, 'target_audience', true);
    $target_audience = is_array($target_audience_data) ? implode("\n", $target_audience_data) : $target_audience_data;

    ?>
    <div>
        <p>
            <label for="price">Price:</label>
            <input type="number" name="price" step="0.01" value="<?php echo esc_attr($price); ?>">
        </p>
        <p>
            <label for="original_price">Original Price:</label>
            <input type="number" name="original_price" step="0.01" value="<?php echo esc_attr($original_price); ?>">
        </p>
        <p>
            <label for="video_hours">Video Hours:</label>
            <input type="number" name="video_hours" step="0.1" value="<?php echo esc_attr($video_hours); ?>">
        </p>
        <p>
            <label for="article_count">Article Count:</label>
            <input type="number" name="article_count" value="<?php echo esc_attr($article_count); ?>">
        </p>
        <p>
            <label for="downloadable_resources">Downloadable Resources:</label>
            <input type="number" name="downloadable_resources" value="<?php echo esc_attr($downloadable_resources); ?>">
        </p>
        <p>
            <label for="language">Language:</label>
            <input type="text" name="language" value="<?php echo esc_attr($language); ?>">
        </p>
        <p>
            <label for="subtitles">Subtitles:</label>
            <input type="text" name="subtitles" value="<?php echo esc_attr($subtitles); ?>">
        </p>

        <p>
            <label for="learn_points"><strong>What You'll Learn</strong></label><br>
            <small>Input your list items</small>
            <textarea name="learn_points" id="learn_points" rows="5" style="width:100%;">
                <?php echo esc_textarea($learn_points); ?>
            </textarea>
        </p>

        <p>
            <label for="requirements"><strong>Requirements</strong></label><br>
            <small>Input your list items</small>
            <textarea name="requirements" id="requirements" rows="5" style="width:100%;">
                <?php echo esc_textarea($requirements); ?>
            </textarea>
        </p>

        <p>
            <label for="target_audience"><strong>Who this course is for:</strong></label><br>
            <small>Input your list items</small>
            <textarea name="target_audience" id="target_audience" rows="5" style="width:100%;">
                <?php echo esc_textarea($target_audience); ?>
            </textarea>
        </p>
    </div>

    <?php
}

function lessonlms_save_course_meta($post_id){

    $fields = array(
        'price', 'original_price', 'video_hours', 'article_count', 'downloadable_resources', 'language', 'subtitles',
    );
    foreach ($fields as $field) {
        if(isset($_POST[$field])){
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }

    $textarea_fields = array(
        'learn_points', 'requirements', 'target_audience'
    );
    foreach ($textarea_fields as $textarea_field) {
        if(isset($_POST[$textarea_field])){
            update_post_meta($post_id, $textarea_field, sanitize_textarea_field($_POST[$textarea_field]));
        }
    }

}
add_action('save_post_course', 'lessonlms_save_course_meta');

function lessonlms_register_testimonial() {
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('Testimonials', 'lessonlms'),
            'singular_name' => __('Testimonial', 'lessonlms'),
            'add_new' => __('Add New', 'lessonlms'),
            'add_new_item' => __('Add New Testimonial', 'lessonlms'),
            'edit_item' => __('Edit Testimonial', 'lessonlms'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports'  => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonials'),
    ));
}
add_action('init', 'lessonlms_register_testimonial');

function lessonlms_testimonial_meta_box() {
    add_meta_box(
        'testimonial_info',
        'Student Designation',
        'lessonlms_testimonial_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'lessonlms_testimonial_meta_box');

function lessonlms_testimonial_callback($post) {
    $designation = get_post_meta( $post->ID, 'testimonial_designation', true);
    ?>
    <p>
        <label><strong>Designation / Course Name:</strong></label><br>
        <input type="text" name="testimonial_designation" style="width:100%; margin-top:5px;" value="<?php echo esc_attr($designation); ?>" placeholder="e.g. Student  of WordPrss Theme Development">
    </p>
    <?php
}

function lessonlms_save_testimonial_meta($post_id) {
    if(isset($_POST['testimonial_designation'])) {
        update_post_meta($post_id, 'testimonial_designation', sanitize_text_field($_POST['testimonial_designation']));
    }
}
add_action('save_post_testimonial', 'lessonlms_save_testimonial_meta');

// ইউজার রিভিউ সাবমিট করলে তা প্রসেস হবে এবং সেভ হবে।
function lessonlms_handle_review_submission(){
    if ( isset($_POST['submit_review']) && isset($_POST['course_id']) ) {
        $course_id = intval($_POST['course_id']);
        $rating = intval($_POST['rating']);
        $review_text = sanitize_text_field($_POST['review_text']);
        $reviewer_name = sanitize_text_field($_POST['reviewer_name']);

        if ( $rating >= 1 && $rating <= 5 && !empty($review_text) && !empty($reviewer_name) ) {
            $reviews = get_post_meta($course_id, '_course_reviews', true);

            if ( !is_array($reviews) ) {
                $reviews = array();
            }

            $new_review = array(
                'rating' => $rating,
                'review' => $review_text,
                'name'   => $reviewer_name,
                'date'   => current_time('mysql')
            );

            $reviews[] = $new_review;

            update_post_meta($course_id, '_course_reviews', $reviews);

            lessonlms_update_review_stats($course_id);
        }
    }
}
add_action('init', 'lessonlms_handle_review_submission');


// কোর্সের রিভিউ থেকে মোট রিভিউ সংখ্যা এবং গড় রেটিং আপডেট করবে।
function lessonlms_update_review_stats($course_id) {
    $reviews = get_post_meta($course_id, '_course_reviews', true);

    if ( is_array($reviews) && !empty($reviews) ) {
        $total_rating = 0;
        $review_count = count($reviews);

        foreach ( $reviews as $review) {
            $total_rating = $total_rating + $review['rating'];
        }

        $average_rating = round($total_rating / $review_count, 1);

        update_post_meta($course_id, '_total_reviews', $review_count);
        update_post_meta($course_id, '_average_rating', $average_rating);
    }
}

// কোর্সের মোট রিভিউ ও গড় রেটিং রিটার্ন করে
function lessonlms_get_review_stats($course_id) {
    $total_reviews = get_post_meta($course_id, '_total_reviews', true) ?: 0;
    $average_rating = get_post_meta($course_id, '_average_rating', true) ?: 0;

    return array(
        'total_reviews' => $total_reviews,
        'average_rating' => $average_rating
    );
}


// কোর্সের সকল রিভিউ অ্যারে রিটার্ন করে
function lessonlms_get_course_reviews($course_id){
    return get_post_meta($course_id, '_course_reviews', true) ?: array();
}

function lessonlms_handle_enrollment() {
    $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;

    if ( $course_id <= 0 ){
        wp_send_json_error('Invalid Course ID');
    }

    $user_id = get_current_user_id();

    if ( $user_id == 0 ) {
        wp_send_json_error('Please Login to enroll');
    }

    $current_enrolled = get_post_meta($course_id, '_enrolled_students', true ?: 0 );
    $new_count = intval($current_enrolled) + 1;
    update_post_meta($course_id, '_enrolled_students', $new_count);


    $user_enrollments = get_user_meta($user_id, '_user_enrollments', true);

    if ( !is_array($user_enrollments) ) {
        $user_enrollments = array();
    }

    $user_enrollments[] = array(
        'course_id' => $course_id,
        'date' => current_time('mysql'),
    );

    update_user_meta($user_id, '_user_enrollments', $user_enrollments);

    $formatted_count = number_format($new_count);
    wp_send_json_success($formatted_count);

}
add_action('wp_ajax_lessonlms_enroll_course', 'lessonlms_handle_enrollment');
add_action('wp_ajax_nopriv_lessonlms_enroll_course', 'lessonlms_handle_enrollment');

function lessonlms_ajax_scripts() {
    ?>
    
    <script type="text/javascript">
        var ajax_object = {
            ajaxurl: '<?php echo admin_url('admin-ajax.php'); ?>'
        }
    </script>

    <?php
}
add_action('wp_head', 'lessonlms_ajax_scripts');

function lessonlms_dashboard_enrollment_widget() {
    global $wpdb;

    $total_enrollments = $wpdb->get_var(
        "SELECT SUM(meta_value) FROM $wpdb->postmeta WHERE meta_key = '_enrolled_students'"
    );

    $recent_enrollments = $wpdb->get_results(
        "SELECT u.user_login, p.post_title, um.meta_value
        FROM $wpdb->usermeta um
        JOIN $wpdb->users u ON u.ID = um.user_id
        JOIN $wpdb->posts p ON p.ID = um.meta_value
        WHERE um.meta_key = '_user_enrollments'
        ORDER BY um.umeta_id DESC
        LIMIT 5"
    );
    ?>

    <div class="enrollment-dashboard-widget">
        <h3>Enrollment Status</h3>

        <div class="enrollment-stats">
            <div class="stat-item">
                <span class="stat-number"><?php echo number_format($total_enrollments ?: 0 ); ?></span>
                <span class="stat-label">Total Enrollments</span>
            </div>
        </div>

        <?php if ( $recent_enrollments ) : ?>
            <div class="recent-enrollments">
                <h4>Last Enrollment</h4>
                <ul>
                    <?php foreach ( $recent_enrollments as $enrollment ) : ?>
                        <li>
                            <strong><?php echo esc_html($enrollment->user_login); ?></strong>
                            - <?php echo esc_html($enrollment->post_title); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;?>
    </div>



    <?php

}

function lessonlms_add_enrollment_dashboard_widget() {
    wp_add_dashboard_widget(
        'enrollment_dashboard_widget',
        'Course Enrollment Status',
        'lessonlms_dashboard_enrollment_widget'
    );
}
add_action('wp_dashboard_setup', 'lessonlms_add_enrollment_dashboard_widget');


function lessonlms_add_custom_roles() {
    add_role('student', 'Student', get_role('subscriber')->capabilities);
    add_role('instructor', 'Instructor', get_role('author')->capabilities);
}
add_action('init', 'lessonlms_add_custom_roles');

function lessonlms_login_redirect( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if( in_array( 'administrator', $user->roles )  || in_array( 'instructor', $user->roles ) ){
            return admin_url();
        }
        elseif( in_array( 'student', $user->roles ) ){
            return home_url('/student-dashboard');
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'lessonlms_login_redirect', 10, 3);


function lessonlms_block_student_admin_access(){
    if ( is_user_logged_in() && is_admin() && ! defined( 'DOING_AJAX' ) ) {
        $user = wp_get_current_user();

        if( in_array( 'student', (array) $user->roles ) ){
            wp_redirect( home_url('/student-dashboard'));
            exit;
        }
    }
}
add_action( 'init', 'lessonlms_block_student_admin_access' );

function lessonlms_show_own_courses_only( $query ) {
    if ( ! is_admin() || $query->is_main_query() ) {
        return;
    }
    $user = wp_get_current_user();

    if( in_array('instructor', (array) $user->roles )){
        $query->set('author', $user->ID);
    }
}
add_action('pre_get_posts', 'lessonlms_show_own_courses_only');