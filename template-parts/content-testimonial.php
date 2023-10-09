<?php
    $designation = get_post_meta( $post->ID, '_truvik_testimonial_author_designation', true );
    $ratting =  get_post_meta( $post->ID, '_truvik_testimonial_author_ratting', true );
?>
<div class="col-lg-12">
    <div class="testimonials style1"> 
        <div class="testimonial-content">
            <blockquote class="testimonial-text"><?php Truvik\Post::excerpt('15'); ?></blockquote>
            <div class="star-ratings prt-section-wrapper-cell">
                <div class="star-ratings">
                    <ul class="rating">
                        <?php

                            for ( $i=0; $i < $ratting ; $i++ ) { 
                                echo '<li class="active"><i class="fa fa-star"></i></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="testimonial-bottom">
            <div class="testimonial-avatar">
                <div class="testimonial-img">
                    <img class="img-fluid" src="<?php Truvik\Post::thumbnail_url(); ?>" alt="testimonial-img" width="60" height="60">
                </div>
            </div>
            <div class="testimonial-caption">
                <h3><?php the_title(); ?></h3>
                <label><?php echo $designation; ?></label>
            </div>
        </div>
    </div><!-- testimonials end -->
</div>