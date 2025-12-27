<?php get_header(); ?>    

<?php while(have_posts()) : the_post() ?>

    <?php
    $price = get_post_meta(get_the_ID(), 'price', true) ?: '0.00';
    $original_price = get_post_meta(get_the_ID(), 'original_price', true) ?: '';
    $video_hours = get_post_meta(get_the_ID(), 'video_hours', true) ?: '0';
    $article_count = get_post_meta(get_the_ID(), 'article_count', true) ?: '0';
    $downloadable_resources = get_post_meta(get_the_ID(), 'downloadable_resources', true) ?: '0';
    $language = get_post_meta(get_the_ID(), 'language', true) ?: 'English';
    $subtitles = get_post_meta(get_the_ID(), 'subtitles', true) ?: 'English';

    $learn_points_raw = get_post_meta(get_the_ID(), 'learn_points', true);
    $learn_points = $learn_points_raw ? array_filter(array_map('trim', explode("\n", $learn_points_raw))) : [];

    $requirements_raw = get_post_meta(get_the_ID(), 'requirements', true);
    $requirements = $requirements_raw ? array_filter(array_map('trim', explode("\n", $requirements_raw))) : [];

    $target_audience_raw = get_post_meta(get_the_ID(), 'target_audience', true);
    $target_audience = $target_audience_raw ? array_filter(array_map('trim', explode("\n", $target_audience_raw))) : [];

    $discount = '';
    if (!empty($original_price) && $original_price > $price ) {
        $discount = round((($original_price - $price)/$original_price) * 100 );
    }

    $enrolled_students = get_post_meta(get_the_ID(), '_enrolled_students', true) ?: 0;
    $current_user_id = get_current_user_id();
    ?>

    <section class="single-course">
        <div class="container">
            <div class="course-header">
                <div class="breadcrumb">
                    <a href="<?php echo get_post_type_archive_link('course'); ?>">Courses</a> / <span><?php the_title(); ?></span>
                </div>
                <h1><?php echo the_title(); ?></h1>
                <div class="course-meta">
                    <div class="rating">
                        <div class="stars">
                            <?php 
                            $stats = lessonlms_get_review_stats(get_the_ID()); 
                            $avg_rating = $stats['average_rating'];
                            $total_reviews = $stats['total_reviews'];
                            ?>

                            <?php for( $i = 1 ; $i <= 5 ; $i++ ) : ?>
                                <?php if( $i <= $avg_rating ) : ?>
                                    <i class="fas fa-star"></i>
                                <?php elseif ( $i - 0.5 <= $avg_rating  ) : ?>
                                    <i class="fas fa-star-half-alt"></i>
                                <?php esle : ?>
                                    <i class="fa-thin fa-star"></i>
                                <?php endif; ?>
                            <?php endfor; ?>

                        </div>
                        <span> <?php echo esc_html($avg_rating); ?> ( <?php echo esc_html($total_reviews); ?> reviews)</span>
                    </div>
                    <div class="enrolled">
                        <i class="fas fa-users"></i>
                        <span><?php echo number_format($enrolled_students); ?> students enrolled</span>
                    </div>
                </div>
            </div>

            <div class="course-content">
                <div class="course-main">
                    <div class="course-hero">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('full', array( 
                                'class' => 'course-image', 
                                'alt' => get_the_title() 
                                )); ?>
                        <?php endif; ?>
                        <img src="assets/images/course-1.png" alt="Web App Design Course" class="course-image">
                        <div class="price-box">
                            <div class="current-price">$<?php echo esc_html($price); ?></div>
                            <div class="original-price">$<?php echo esc_html($original_price); ?></div>
                            
                            <?php if(!empty($discount)) : ?>
                                <div class="discount-badge"><?php echo esc_html($discount); ?>% OFF</div>
                            <?php endif; ?>
                            
                            <?php if ($current_user_id > 0) : ?>
                                <button class="enroll-btn" data-course-id="<?php echo get_the_ID(); ?>">Enroll Now</button>
                            <?php else : ?>
                                <div class="login-required">
                                    <p>Please Register</p>
                                    <a href="<?php echo wp_login_url(get_permalink()); ?>" class="login-btn">Login</a>
                                    <a href="<?php echo wp_registration_url(); ?>" class="register-btn">Registration</a>
                                </div>
                            <?php endif; ?>
                            <div class="includes">
                                <h4>This course includes:</h4>
                                <ul>
                                    <li><i class="far fa-file-video"></i> <?php echo esc_html($video_hours); ?> Hours on-demand video</li>
                                    <li><i class="far fa-file-alt"></i> <?php echo esc_html($article_count); ?> articles</li>
                                    <li><i class="fas fa-download"></i> <?php echo esc_html($downloadable_resources); ?> downloadable resources</li>
                                    <li><i class="fas fa-infinity"></i> Full lifetime access</li>
                                    <li><i class="fas fa-mobile-alt"></i> Access on mobile and TV</li>
                                    <li><i class="fas fa-trophy"></i> Certificate of completion</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="course-tabs">
                        <nav class="tabs-nav">
                            <button class="tab-btn active" data-tab="overview">Overview</button>
                            <button class="tab-btn" data-tab="curriculum">Curriculum</button>
                            <button class="tab-btn" data-tab="instructor">Instructor</button>
                            <button class="tab-btn" data-tab="reviews">Reviews</button>
                        </nav>

                        <div class="tab-content active" id="overview">
                            <h2>Course Description</h2>
                            <p>Master the art of designing modern web applications with this comprehensive course. You'll learn industry-standard tools and techniques used by professional UI/UX designers to create beautiful, functional web applications.</p>
                            <?php if (!empty($learn_points)) : ?>
                            
                            <h2>What You'll Learn</h2>

                            <ul class="learn-list">
                                <?php foreach ( $learn_points as $point ) : ?>
                                    <li>
                                        <i class="fas fa-check"></i> 
                                        <?php echo esc_html($point); ?> 
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <?php endif; ?>


                            <h2>Requirements</h2>

                            <?php if (!empty($requirements)) : ?>
                            <ul class="requirements-list">
                                <?php foreach($requirements as $requirement ) : ?>
                                <li><i class="fas fa-circle"></i> <?php echo esc_html($requirement); ?></li>
                                <?php endforeach;?>
                            </ul>
                            <?php endif; ?>
                        </div>

                        <div class="tab-content" id="curriculum">
                            <h2>Course Curriculum</h2>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        <span>Section 1: Introduction to Web App Design</span>
                                        <span>6 lectures • 45 min</span>
                                    </button>
                                    <div class="accordion-content">
                                        <ul>
                                            <li><i class="far fa-play-circle"></i> Welcome to the course <span>5:20</span></li>
                                            <li><i class="far fa-play-circle"></i> What is web app design? <span>8:15</span></li>
                                            <li><i class="far fa-play-circle"></i> Industry tools overview <span>12:40</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <button class="accordion-header">
                                        <span>Section 2: User Research</span>
                                        <span>8 lectures • 1 hr 20 min</span>
                                    </button>
                                    <div class="accordion-content">
                                        <ul>
                                            <li><i class="far fa-play-circle"></i> Understanding user needs <span>15:20</span></li>
                                            <li><i class="far fa-play-circle"></i> Creating user personas <span>18:30</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="instructor">
                            <div class="instructor-profile">
                                <?php 
                                $instructor_id = get_the_author_meta('ID');
                                $instructor_name = get_the_author_meta('display_name');
                                $instructor_bio = get_the_author_meta('description');
                                ?>

                                <?php echo get_avatar($instructor_id, 96, '', $instructor_name, array( 'alt' => $instructor_name)); ?>
                                <div class="instructor-info">
                                    <h3><?php echo esc_html($instructor_name); ?></h3>
                                    <?php if ( !empty($instructor_bio) ) : ?>
                                        <span class="title"><?php echo wp_kses_post( $instructor_bio ); ?></span>
                                    <?php endif; ?>
                                    
                                    <div class="rating">
                                        <div class="stars">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span>4.9 Instructor Rating</span>
                                    </div>
                                    <div class="stats">
                                        <div class="stat">
                                            <span class="number"><?php echo number_format($enrolled_students); ?></span>
                                            <span class="label">Students</span>
                                        </div>
                                        <div class="stat">
                                            <span class="number"><?php echo count_user_posts($instructor_id, 'course'); ?></span>
                                            <span class="label">Courses</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="reviews">
                            <h2>Student Reviews</h2>
                            
                            <!-- Review Form -->
                            <div class="review-form">
                                <h3>Add Your Review</h3>
                                <form method="post">
                                    <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">
                                    
                                    <div class="form-group">
                                        <label>Your Rating:</label>
                                        <div class="star-rating">
                                            <input type="radio" id="star5" name="rating" value="5" required>
                                            <label for="star5">★</label>
                                            <input type="radio" id="star4" name="rating" value="4">
                                            <label for="star4">★</label>
                                            <input type="radio" id="star3" name="rating" value="3">
                                            <label for="star3">★</label>
                                            <input type="radio" id="star2" name="rating" value="2">
                                            <label for="star2">★</label>
                                            <input type="radio" id="star1" name="rating" value="1">
                                            <label for="star1">★</label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="reviewer_name">Your Name:</label>
                                        <input type="text" id="reviewer_name" name="reviewer_name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="review_text">Your Review:</label>
                                        <textarea id="review_text" name="review_text" rows="4" required></textarea>
                                    </div>
                                    
                                    <button type="submit" name="submit_review" class="submit-btn">Submit Review</button>
                                </form>
                            </div>
                            
                            <!-- Reviews List -->
                            <div class="reviews-list">

                                <?php
                                $reviews = lessonlms_get_course_reviews(get_the_ID());
                                if ($reviews) : ?>
                                    <?php foreach ( array_reverse($reviews) as $review ) : ?>
                                        <div class="review-item">
                                            <div class="review-header">
                                                <strong><?php echo esc_html($review['name']); ?></strong>
                                                <div class="review-stars">

                                                    <?php for( $i = 1 ; $i <= 5 ; $i++ ) : ?>
                                                        <?php if( $i <= $review['rating'] ) : ?> 
                                                            <span class="star filled">★</span>
                                                        <?php else: ?>
                                                            <span class="star filled">★</span>
                                                        <?php endif; ?>
                                                    
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                            <p><?php echo esc_html($review['review']); ?></p>
                                            <small><?php echo date('F j, Y', strtotime($review['date'])); ?></small>
                                        </div>

                                    <?php endforeach; ?>

                                <?php else : ?>
                                    <p>No review yet.</p>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="course-sidebar">
                    <div class="sidebar-card">
                        <h3>Course Details</h3>
                        <ul class="course-details-list">
                            <li>
                                <i class="far fa-clock"></i>
                                <div>
                                    <span>Duration</span>
                                    <strong>42 hours</strong>
                                </div>
                            </li>
                            <li>
                                <i class="far fa-calendar-alt"></i>
                                <div>
                                    <span>Last Updated</span>
                                    <strong>June 15, 2023</strong>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-language"></i>
                                <div>
                                    <span>Language</span>
                                    <strong><?php echo esc_html($language); ?></strong>
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-closed-captioning"></i>
                                <div>
                                    <span>Subtitles</span>
                                    <strong><?php echo esc_html($subtitles); ?></strong>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-card">
                        <h3>Who this course is for:</h3>
                        <?php if (!empty($target_audience)) : ?>
                        <ul class="audience-list">
                            <?php foreach ( $target_audience as $audience ) : ?>
                            <li><i class="fas fa-check"></i> <?php echo esc_html($audience); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-courses">
        <div class="container">
            <div class="courses-grid">
                <!-- Related courses would be inserted here -->
                <!-- Reuse the course card component from courses.html -->
            </div>
        </div>
    </section>

    <script>
        // Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');
                
                // Remove active class from all buttons and contents
                tabBtns.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                btn.classList.add('active');
                document.getElementById(tabId).classList.add('active');
            });
        });

        // Accordion functionality
        const accordionHeaders = document.querySelectorAll('.accordion-header');
        
        accordionHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const accordionItem = header.parentElement;
                const accordionContent = header.nextElementSibling;
                
                // Close all other accordion items
                document.querySelectorAll('.accordion-item').forEach(item => {
                    if (item !== accordionItem) {
                        item.classList.remove('active');
                        item.querySelector('.accordion-content').style.maxHeight = null;
                    }
                });
                
                // Toggle current item
                accordionItem.classList.toggle('active');
                if (accordionItem.classList.contains('active')) {
                    accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
                } else {
                    accordionContent.style.maxHeight = null;
                }
            });
        });

        // Enroll Button click Handler
        document.querySelectorAll('.enroll-btn').forEach(button => {
            button.addEventListener('click', function() {
                const courseId = this.getAttribute('data-course-id');
                const enrolledElement = document.querySelector('.enrolled span');

                fetch(ajax_object.ajaxurl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=lessonlms_enroll_course&course_id=' + courseId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success){
                        enrolledElement.textContent = data.data + 'student enrolled';

                        this.textContent = 'Enrolled';
                        this.disabled = true;

                        alert('Enrolled Successfully');
                    }else{
                        if (data.data === 'Please Login to enroll'){
                            alert('Please Login first');
                            window.location.href = '<?php echo wp_login_url(get_permalink()); ?>';
                        }else{
                            alert('opps! Enrollment Unsuccessfull.' + data.data);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Please try again');
                });
            });
        });
    </script>

<?php endwhile; ?>

<?php get_footer(); ?>